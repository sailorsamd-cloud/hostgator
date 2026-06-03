<?php
/**
 * Plugin Name: ShipWiki Membership Setup
 * Description: Applies and enforces registration, forum, and membership settings for shipwiki.net.
 * Version: 1.4.0
 *
 * @package ShipWiki
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Central setup + enforcement for UM, Tutor, and wpForo.
 */
final class ShipWiki_Membership_Setup {

	const OPTION_KEY     = 'shipwiki_membership_config';
	const CONFIG_VERSION = '1.4.0';
	const DELETE_BATCH   = 50;

	/**
	 * Bootstrap hooks.
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'register_admin_page' ) );
		add_action( 'admin_post_shipwiki_save_membership_config', array( __CLASS__, 'handle_save' ) );
		add_action( 'admin_post_shipwiki_apply_membership_config', array( __CLASS__, 'handle_apply' ) );
		add_action( 'template_redirect', array( __CLASS__, 'gate_forum_for_unapproved_users' ), 5 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_scripts' ) );
		add_action( 'wp_ajax_shipwiki_bulk_delete_users', array( __CLASS__, 'ajax_bulk_delete_users' ) );
		add_action( 'admin_post_shipwiki_flush_um_cache', array( __CLASS__, 'handle_flush_um_cache' ) );

		add_action( 'plugins_loaded', array( __CLASS__, 'repair_um_subscriber_role_meta' ), 20 );
		add_filter( 'um_change_role_data', array( __CLASS__, 'filter_role_registration_status' ), 999, 2 );
		add_action( 'um_registration_complete', array( __CLASS__, 'enforce_registration_account_status' ), 5, 3 );
		add_action( 'um_registration_after_auto_login', array( __CLASS__, 'revoke_session_if_not_approved' ), 1, 1 );
		add_action( 'user_register', array( __CLASS__, 'enforce_status_on_any_registration' ), 20, 1 );
		add_filter( 'rest_pre_insert_user', array( __CLASS__, 'block_rest_user_registration' ), 10, 2 );
		add_filter( 'registration_errors', array( __CLASS__, 'block_unprotected_wp_registration' ), 99, 3 );
	}

	/**
	 * @param string $hook Admin page hook.
	 */
	public static function enqueue_admin_scripts( $hook ) {
		if ( 'tools_page_shipwiki-membership-setup' !== $hook ) {
			return;
		}

		wp_register_script( 'shipwiki-membership-admin', false, array( 'jquery' ), self::CONFIG_VERSION, true );
		wp_enqueue_script( 'shipwiki-membership-admin' );
		wp_add_inline_script(
			'shipwiki-membership-admin',
			'var shipwikiBulkDelete = ' . wp_json_encode(
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'shipwiki_bulk_delete_users' ),
				)
			) . ';',
			'before'
		);
		wp_add_inline_script(
			'shipwiki-membership-admin',
			<<<'JS'
jQuery(function ($) {
	var $btn = $('#shipwiki-start-bulk-delete');
	var $progress = $('#shipwiki-bulk-delete-progress');
	var $log = $('#shipwiki-bulk-delete-log');
	var $confirm = $('#shipwiki-bulk-delete-confirm');

	if (!$btn.length) {
		return;
	}

	function logLine(message) {
		$log.append($('<div/>').text(message));
		$log.scrollTop($log[0].scrollHeight);
	}

	function runBatch() {
		$.post(shipwikiBulkDelete.ajaxUrl, {
			action: 'shipwiki_bulk_delete_users',
			nonce: shipwikiBulkDelete.nonce
		}).done(function (response) {
			if (!response || !response.success) {
				logLine((response && response.data && response.data.message) ? response.data.message : 'Delete batch failed.');
				$btn.prop('disabled', false);
				return;
			}

			logLine(response.data.message);

			if (response.data.remaining > 0) {
				$progress.val(response.data.progress);
				runBatch();
				return;
			}

			$progress.val(100);
			logLine('Finished. Remaining non-admin users: ' + response.data.remaining);
			$btn.prop('disabled', false);
			$('#shipwiki-deletable-count').text(response.data.remaining);
		}).fail(function () {
			logLine('Request failed. Try again.');
			$btn.prop('disabled', false);
		});
	}

	$btn.on('click', function () {
		if ($confirm.val() !== 'DELETE ALL NON-ADMIN USERS') {
			window.alert('Type DELETE ALL NON-ADMIN USERS in the confirmation box first.');
			return;
		}

		if (!window.confirm('This permanently deletes every user except Administrators, including their forum posts, topics, and other content. Continue?')) {
			return;
		}

		$btn.prop('disabled', true);
		$log.empty();
		$progress.val(0);
		logLine('Starting bulk delete...');
		runBatch();
	});
});
JS
		);
	}

	/**
	 * Default configuration values.
	 *
	 * @return array<string, mixed>
	 */
	public static function default_config() {
		return array(
			'recaptcha_site_key'     => '',
			'recaptcha_secret_key'   => '',
			'default_wp_role'        => 'subscriber',
			'um_registration_status' => 'checkmail',
			'register_page_slug'     => 'join-us',
			'login_page_slug'        => 'login',
			'paid_role_slug'         => '',
			'block_forum_until_approved' => 1,
		);
	}

	/**
	 * @return array<string, mixed>
	 */
	public static function get_config() {
		$config = get_option( self::OPTION_KEY, array() );
		if ( ! is_array( $config ) ) {
			$config = array();
		}
		return array_merge( self::default_config(), $config );
	}

	/**
	 * Register Tools submenu.
	 */
	public static function register_admin_page() {
		add_management_page(
			'ShipWiki Membership Setup',
			'ShipWiki Membership',
			'manage_options',
			'shipwiki-membership-setup',
			array( __CLASS__, 'render_admin_page' )
		);
	}

	/**
	 * Admin UI.
	 */
	public static function render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$config = self::get_config();
		$applied_at = ! empty( $config['applied_at'] ) ? (int) $config['applied_at'] : 0;
		?>
		<div class="wrap">
			<h1>ShipWiki Membership Setup</h1>
			<p>Configure registration, Ultimate Member, Tutor LMS, and wpForo in one place. Save your keys first, then click <strong>Apply configuration</strong>.</p>
			<p><strong>Runtime protection (v1.4+):</strong> New signups are forced to require email activation or admin review even if Ultimate Member role settings were left on auto-approve. Auto-login after register is blocked until approved.</p>

			<?php if ( isset( $_GET['updated'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>
			<?php endif; ?>
			<?php if ( isset( $_GET['applied'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-success is-dismissible"><p>Configuration applied to WordPress, Ultimate Member, Tutor, and wpForo.</p></div>
			<?php endif; ?>
			<?php if ( isset( $_GET['um_cache_cleared'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-success is-dismissible"><p>Ultimate Member user count cache cleared.</p></div>
			<?php endif; ?>
			<?php if ( isset( $_GET['error'] ) && 'keys' === $_GET['error'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-error is-dismissible"><p>Enter both reCAPTCHA v2 site key and secret key before applying.</p></div>
			<?php endif; ?>

			<?php if ( $applied_at ) : ?>
				<p><strong>Last applied:</strong> <?php echo esc_html( wp_date( 'Y-m-d H:i:s', $applied_at ) ); ?></p>
			<?php endif; ?>

			<?php self::render_security_audit_panel( $config ); ?>

			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<?php wp_nonce_field( 'shipwiki_membership_config' ); ?>
				<input type="hidden" name="action" value="shipwiki_save_membership_config" />
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="recaptcha_site_key">Google reCAPTCHA v2 site key</label></th>
						<td><input name="recaptcha_site_key" id="recaptcha_site_key" type="text" class="regular-text" value="<?php echo esc_attr( $config['recaptcha_site_key'] ); ?>" autocomplete="off" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="recaptcha_secret_key">Google reCAPTCHA v2 secret key</label></th>
						<td><input name="recaptcha_secret_key" id="recaptcha_secret_key" type="password" class="regular-text" value="<?php echo esc_attr( $config['recaptcha_secret_key'] ); ?>" autocomplete="new-password" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="default_wp_role">Default WordPress role</label></th>
						<td>
							<select name="default_wp_role" id="default_wp_role">
								<?php foreach ( wp_roles()->roles as $slug => $role ) : ?>
									<option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $config['default_wp_role'], $slug ); ?>><?php echo esc_html( translate_user_role( $role['name'] ) ); ?></option>
								<?php endforeach; ?>
							</select>
							<p class="description">Free registrations via <code>/join-us/</code> receive this role.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="um_registration_status">Ultimate Member registration status</label></th>
						<td>
							<select name="um_registration_status" id="um_registration_status">
								<option value="pending" <?php selected( $config['um_registration_status'], 'pending' ); ?>>Require admin review</option>
								<option value="checkmail" <?php selected( $config['um_registration_status'], 'checkmail' ); ?>>Require email activation</option>
								<option value="approved" <?php selected( $config['um_registration_status'], 'approved' ); ?>>Auto approve (not recommended)</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="register_page_slug">Register page slug</label></th>
						<td><input name="register_page_slug" id="register_page_slug" type="text" class="regular-text" value="<?php echo esc_attr( $config['register_page_slug'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="login_page_slug">Login page slug</label></th>
						<td><input name="login_page_slug" id="login_page_slug" type="text" class="regular-text" value="<?php echo esc_attr( $config['login_page_slug'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="paid_role_slug">Paid member role slug (optional)</label></th>
						<td>
							<input name="paid_role_slug" id="paid_role_slug" type="text" class="regular-text" value="<?php echo esc_attr( $config['paid_role_slug'] ); ?>" placeholder="e.g. paid_member" />
							<p class="description">Create this role in Ultimate Member for paying members. Leave empty until you add a payment extension.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">Forum gate</th>
						<td>
							<label>
								<input type="checkbox" name="block_forum_until_approved" value="1" <?php checked( ! empty( $config['block_forum_until_approved'] ) ); ?> />
								Block <code>/forum/</code> until Ultimate Member account is approved
							</label>
						</td>
					</tr>
				</table>
				<?php submit_button( 'Save settings' ); ?>
			</form>

			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="margin-top:1em;">
				<?php wp_nonce_field( 'shipwiki_membership_apply' ); ?>
				<input type="hidden" name="action" value="shipwiki_apply_membership_config" />
				<?php submit_button( 'Apply configuration to site', 'primary', 'submit', false ); ?>
			</form>

			<h2>What “Apply” changes</h2>
			<ul style="list-style:disc;padding-left:1.5em;">
				<li><strong>WordPress:</strong> default role, membership registration enabled</li>
				<li><strong>Ultimate Member:</strong> reCAPTCHA v2 on register/login, subscriber role requires approval/email, <code>/join-us/</code> register form role</li>
				<li><strong>Tutor LMS:</strong> fraud protection + reCAPTCHA on Tutor and WP login/register</li>
				<li><strong>wpForo:</strong> register URL → <code>/join-us/</code>, native forum registration off, reCAPTCHA on wpForo login</li>
				<li><strong>CAPTCHA 4WP:</strong> registration/login enabled, fail if captcha missing</li>
			</ul>
			<p><strong>Manual step still required:</strong> In Ultimate Member → User Roles, set <em>Access Permissions</em> so restricted pages and forum require an approved (or paid) role.</p>

			<hr />

			<h2>Bulk delete fake users</h2>
			<p>Deletes <strong>all users except Administrators</strong> in batches of <?php echo (int) self::DELETE_BATCH; ?>. Content owned by deleted users is removed entirely — including wpForo forum topics, replies, profiles, activity, and WordPress posts/comments.</p>

			<?php
			$admin_users      = self::get_administrator_users();
			$deletable_count  = self::count_deletable_users();
			$total_users      = self::count_all_users();
			?>

			<table class="widefat striped" style="max-width:720px;margin-bottom:1em;">
				<tbody>
					<tr><th scope="row">Total users</th><td><?php echo (int) $total_users; ?></td></tr>
					<tr><th scope="row">Administrators kept</th><td><?php echo (int) count( $admin_users ); ?></td></tr>
					<tr><th scope="row">Users to delete</th><td id="shipwiki-deletable-count"><?php echo (int) $deletable_count; ?></td></tr>
				</tbody>
			</table>

			<?php if ( ! empty( $admin_users ) ) : ?>
				<p><strong>These administrator accounts will be kept:</strong></p>
				<ul style="list-style:disc;padding-left:1.5em;">
					<?php foreach ( $admin_users as $admin_user ) : ?>
						<li>
							<?php echo esc_html( $admin_user->user_login ); ?>
							(<?php echo esc_html( $admin_user->user_email ); ?>, ID <?php echo (int) $admin_user->ID; ?>)
						</li>
					<?php endforeach; ?>
				</ul>
			<?php else : ?>
				<div class="notice notice-error inline"><p>No administrator accounts found. Bulk delete is disabled for safety.</p></div>
			<?php endif; ?>

			<p>
				<label for="shipwiki-bulk-delete-confirm"><strong>Type exactly:</strong> <code>DELETE ALL NON-ADMIN USERS</code></label><br />
				<input type="text" id="shipwiki-bulk-delete-confirm" class="regular-text" autocomplete="off" />
			</p>

			<p>
				<button type="button" class="button button-secondary" id="shipwiki-start-bulk-delete" <?php disabled( empty( $admin_users ) || $deletable_count < 1 ); ?>>
					Delete all non-admin users
				</button>
			</p>

			<progress id="shipwiki-bulk-delete-progress" max="100" value="0" style="width:100%;max-width:720px;height:18px;"></progress>
			<div id="shipwiki-bulk-delete-log" style="margin-top:1em;max-width:720px;max-height:240px;overflow:auto;background:#fff;border:1px solid #ccd0d4;padding:10px;font-family:monospace;font-size:12px;"></div>

			<hr />

			<h2>Ultimate Member count cache</h2>
			<p>The Ultimate Member dashboard caches user totals for up to an hour. After bulk delete it may still show the old count (e.g. 2627) even though users are gone. WordPress → <strong>Users</strong> shows the real count.</p>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<?php wp_nonce_field( 'shipwiki_flush_um_cache' ); ?>
				<input type="hidden" name="action" value="shipwiki_flush_um_cache" />
				<?php submit_button( 'Clear Ultimate Member user count cache', 'secondary', 'submit', false ); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * @return \WP_User[]
	 */
	public static function get_administrator_users() {
		return get_users(
			array(
				'role'    => 'administrator',
				'orderby' => 'ID',
				'order'   => 'ASC',
			)
		);
	}

	/**
	 * @return int[]
	 */
	public static function get_administrator_user_ids() {
		return array_map(
			'intval',
			wp_list_pluck( self::get_administrator_users(), 'ID' )
		);
	}

	/**
	 * @return int
	 */
	public static function count_all_users() {
		global $wpdb;
		return (int) $wpdb->get_var( "SELECT COUNT(ID) FROM {$wpdb->users}" );
	}

	/**
	 * @return int
	 */
	public static function count_deletable_users() {
		global $wpdb;

		$admin_ids = self::get_administrator_user_ids();
		if ( empty( $admin_ids ) ) {
			return 0;
		}

		$placeholders = implode( ',', array_fill( 0, count( $admin_ids ), '%d' ) );
		$sql          = "SELECT COUNT(ID) FROM {$wpdb->users} WHERE ID NOT IN ($placeholders)";
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		return (int) $wpdb->get_var( $wpdb->prepare( $sql, $admin_ids ) );
	}

	/**
	 * @param int $limit Batch size.
	 * @return int[]
	 */
	public static function get_next_deletable_user_ids( $limit = self::DELETE_BATCH ) {
		global $wpdb;

		$admin_ids = self::get_administrator_user_ids();
		if ( empty( $admin_ids ) ) {
			return array();
		}

		$placeholders = implode( ',', array_fill( 0, count( $admin_ids ), '%d' ) );
		$sql          = "SELECT ID FROM {$wpdb->users} WHERE ID NOT IN ($placeholders) ORDER BY ID ASC LIMIT %d";
		$args         = array_merge( $admin_ids, array( (int) $limit ) );
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$ids = $wpdb->get_col( $wpdb->prepare( $sql, $args ) );

		return array_map( 'intval', $ids );
	}

	/**
	 * AJAX batch delete handler.
	 */
	public static function ajax_bulk_delete_users() {
		if ( ! current_user_can( 'delete_users' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'Unauthorized.' ), 403 );
		}

		check_ajax_referer( 'shipwiki_bulk_delete_users', 'nonce' );

		if ( empty( self::get_administrator_user_ids() ) ) {
			wp_send_json_error( array( 'message' => 'No administrator accounts found. Aborting.' ), 400 );
		}

		if ( ! function_exists( 'wp_delete_user' ) ) {
			require_once ABSPATH . 'wp-admin/includes/user.php';
		}

		@set_time_limit( 120 );

		$admin_ids = self::get_administrator_user_ids();
		$user_ids  = self::get_next_deletable_user_ids( self::DELETE_BATCH );
		$deleted   = 0;
		$failed    = 0;

		foreach ( $user_ids as $user_id ) {
			if ( in_array( $user_id, $admin_ids, true ) ) {
				continue;
			}

			if ( self::delete_user_and_all_content( $user_id ) ) {
				++$deleted;
			} else {
				++$failed;
			}
		}

		$remaining = self::count_deletable_users();
		$total     = self::count_all_users();
		$progress  = $total > 0 ? (int) round( ( ( $total - $remaining ) / $total ) * 100 ) : 100;

		if ( 0 === $remaining ) {
			self::flush_um_user_count_caches();
		}

		wp_send_json_success(
			array(
				'message'   => sprintf(
					'Deleted %1$d users this batch (%2$d failed). Remaining: %3$d.',
					$deleted,
					$failed,
					$remaining
				),
				'deleted'   => $deleted,
				'failed'    => $failed,
				'remaining' => $remaining,
				'progress'  => min( 100, $progress ),
			)
		);
	}

	/**
	 * Clear Ultimate Member cached dashboard user counts.
	 */
	public static function flush_um_user_count_caches() {
		$statuses = array(
			'approved',
			'awaiting_admin_review',
			'awaiting_email_confirmation',
			'inactive',
			'rejected',
			'pending_dot',
			'unassigned',
		);

		foreach ( $statuses as $status ) {
			delete_transient( "um_count_users_{$status}" );
		}

		delete_transient( 'um_count_users_all' );
		do_action( 'um_flush_user_status_cache' );
	}

	/**
	 * Manual UM cache clear from admin UI.
	 */
	public static function handle_flush_um_cache() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'default' ) );
		}
		check_admin_referer( 'shipwiki_flush_um_cache' );

		self::flush_um_user_count_caches();

		wp_safe_redirect( admin_url( 'tools.php?page=shipwiki-membership-setup&um_cache_cleared=1' ) );
		exit;
	}

	/**
	 * Delete a user and all plugin content (forum posts, WP posts, etc.).
	 *
	 * @param int $user_id User ID.
	 * @return bool
	 */
	private static function delete_user_and_all_content( $user_id ) {
		$user_id = (int) $user_id;
		if ( $user_id <= 0 ) {
			return false;
		}

		self::purge_wpforo_user_content( $user_id );

		// wpForo reads this during WordPress deleted_user to delete rather than reassign.
		$_REQUEST['wpforo_user_delete_option'] = 'delete';

		// No reassign: WordPress deletes posts and comments authored by the user.
		$deleted = wp_delete_user( $user_id );

		unset( $_REQUEST['wpforo_user_delete_option'] );

		return (bool) $deleted;
	}

	/**
	 * Remove wpForo topics, replies, profile, activity, and related data.
	 *
	 * @param int $user_id User ID.
	 */
	private static function purge_wpforo_user_content( $user_id ) {
		if ( ! function_exists( 'WPF' ) ) {
			return;
		}

		$wpf = WPF();
		if ( ! is_object( $wpf ) || ! isset( $wpf->member, $wpf->board, $wpf->db, $wpf->tables ) ) {
			return;
		}

		$user_id = (int) $user_id;

		// member->delete() removes the profile and fires wpforo_after_delete_user, which
		// cascades to topics, posts, reactions, subscriptions, bookmarks, and follows.
		if ( ! $wpf->member->delete( $user_id, null ) ) {
			do_action( 'wpforo_after_delete_user', $user_id, null );
		}

		if ( ! method_exists( $wpf->board, 'get_active_boardids' ) ) {
			return;
		}

		$boardids = $wpf->board->get_active_boardids();
		if ( ! is_array( $boardids ) ) {
			return;
		}

		foreach ( $boardids as $boardid ) {
			$wpf->change_board( $boardid );
			if ( ! empty( $wpf->tables->activity ) ) {
				$wpf->db->delete(
					$wpf->tables->activity,
					array( 'userid' => $user_id ),
					array( '%d' )
				);
			}
		}
	}

	/**
	 * Save form fields only.
	 */
	public static function handle_save() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'default' ) );
		}
		check_admin_referer( 'shipwiki_membership_config' );

		$config = self::get_config();
		$config['recaptcha_site_key']   = sanitize_text_field( wp_unslash( $_POST['recaptcha_site_key'] ?? '' ) );
		$config['recaptcha_secret_key'] = sanitize_text_field( wp_unslash( $_POST['recaptcha_secret_key'] ?? '' ) );
		$config['default_wp_role']      = sanitize_key( wp_unslash( $_POST['default_wp_role'] ?? 'subscriber' ) );
		$config['um_registration_status'] = sanitize_key( wp_unslash( $_POST['um_registration_status'] ?? 'checkmail' ) );
		$config['register_page_slug']   = sanitize_title( wp_unslash( $_POST['register_page_slug'] ?? 'join-us' ) );
		$config['login_page_slug']      = sanitize_title( wp_unslash( $_POST['login_page_slug'] ?? 'login' ) );
		$config['paid_role_slug']       = sanitize_key( wp_unslash( $_POST['paid_role_slug'] ?? '' ) );
		$config['block_forum_until_approved'] = empty( $_POST['block_forum_until_approved'] ) ? 0 : 1;

		update_option( self::OPTION_KEY, $config, false );
		wp_safe_redirect( admin_url( 'tools.php?page=shipwiki-membership-setup&updated=1' ) );
		exit;
	}

	/**
	 * Apply stored config to plugin options.
	 */
	public static function handle_apply() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'default' ) );
		}
		check_admin_referer( 'shipwiki_membership_apply' );

		$config = self::get_config();
		if ( empty( $config['recaptcha_site_key'] ) || empty( $config['recaptcha_secret_key'] ) ) {
			wp_safe_redirect( admin_url( 'tools.php?page=shipwiki-membership-setup&error=keys' ) );
			exit;
		}

		self::apply_configuration( $config );
		$config['applied_at'] = time();
		$config['config_version'] = self::CONFIG_VERSION;
		update_option( self::OPTION_KEY, $config, false );

		wp_safe_redirect( admin_url( 'tools.php?page=shipwiki-membership-setup&applied=1' ) );
		exit;
	}

	/**
	 * Push settings into WordPress and plugins.
	 *
	 * @param array<string, mixed> $config Config.
	 */
	public static function apply_configuration( array $config ) {
		$site_key   = $config['recaptcha_site_key'];
		$secret_key = $config['recaptcha_secret_key'];
		$wp_role    = $config['default_wp_role'];
		$um_status  = $config['um_registration_status'];

		update_option( 'default_role', $wp_role );
		update_option( 'users_can_register', 1 );

		self::apply_um_settings( $site_key, $secret_key, $wp_role, $um_status, $config );
		self::apply_tutor_settings( $site_key, $secret_key );
		self::apply_wpforo_settings( $site_key, $secret_key, $config );
		self::apply_c4wp_settings( $site_key, $secret_key );
		self::configure_um_register_form( $config );
	}

	/**
	 * Ultimate Member options + role meta.
	 *
	 * @param string               $site_key Site key.
	 * @param string               $secret_key Secret key.
	 * @param string               $wp_role Default role.
	 * @param string               $um_status Registration status.
	 * @param array<string, mixed> $config Config.
	 */
	private static function apply_um_settings( $site_key, $secret_key, $wp_role, $um_status, array $config ) {
		if ( ! function_exists( 'UM' ) ) {
			return;
		}

		$updates = array(
			'register_role'                 => $wp_role,
			'g_recaptcha_status'              => 1,
			'g_recaptcha_version'             => 'v2',
			'g_recaptcha_sitekey'             => $site_key,
			'g_recaptcha_secretkey'           => $secret_key,
			'g_reCAPTCHA_site_key'            => $site_key,
			'g_reCAPTCHA_secret_key'          => $secret_key,
			'g_recaptcha_wp_register_form'    => 1,
			'g_recaptcha_wp_login_form'       => 1,
			'g_recaptcha_wp_lostpasswordform' => 1,
		);

		foreach ( $updates as $key => $value ) {
			UM()->options()->update( $key, $value );
		}

		$role_meta = get_option( 'um_role_' . $wp_role . '_meta', array() );
		if ( ! is_array( $role_meta ) ) {
			$role_meta = array();
		}
		$role_meta['_um_status'] = self::get_required_registration_status( $config );
		update_option( 'um_role_' . $wp_role . '_meta', $role_meta, false );

		if ( ! empty( $config['paid_role_slug'] ) ) {
			$paid_meta = get_option( 'um_role_' . $config['paid_role_slug'] . '_meta', array() );
			if ( is_array( $paid_meta ) && empty( $paid_meta['_um_status'] ) ) {
				$paid_meta['_um_status'] = 'approved';
				update_option( 'um_role_' . $config['paid_role_slug'] . '_meta', $paid_meta, false );
			}
		}
	}

	/**
	 * Tutor Pro fraud protection.
	 *
	 * @param string $site_key Site key.
	 * @param string $secret_key Secret key.
	 */
	private static function apply_tutor_settings( $site_key, $secret_key ) {
		$tutor = get_option( 'tutor_option', array() );
		if ( ! is_array( $tutor ) ) {
			$tutor = maybe_unserialize( $tutor );
		}
		if ( ! is_array( $tutor ) ) {
			$tutor = array();
		}

		$tutor['enable_spam_protection']   = 'on';
		$tutor['spam_protection_method']     = 'recaptcha_v2';
		$tutor['spam_protection_location']   = array(
			'tutor_login',
			'tutor_registration',
			'wp_login',
			'wp_registration',
		);
		$tutor['recaptcha_v2_site_key']      = $site_key;
		$tutor['recaptcha_v2_secret_key']    = $secret_key;

		update_option( 'tutor_option', $tutor, false );
	}

	/**
	 * wpForo authorization + recaptcha.
	 *
	 * @param string               $site_key Site key.
	 * @param string               $secret_key Secret key.
	 * @param array<string, mixed> $config Config.
	 */
	private static function apply_wpforo_settings( $site_key, $secret_key, array $config ) {
		$auth = get_option( 'wpforo_authorization', array() );
		if ( ! is_array( $auth ) ) {
			$auth = array();
		}

		$register_slug = trim( $config['register_page_slug'], '/' );
		$login_slug    = trim( $config['login_page_slug'], '/' );

		$auth['register_url']        = $register_slug . '/';
		$auth['login_url']           = $login_slug ? $login_slug . '/' : '';
		$auth['user_register']       = false;
		$auth['role_synch']          = true;
		$auth['use_our_register_url'] = true;
		$auth['use_our_login_url']   = true;

		update_option( 'wpforo_authorization', $auth, false );

		$recaptcha = get_option( 'wpforo_recaptcha', array() );
		if ( ! is_array( $recaptcha ) ) {
			$recaptcha = array();
		}
		$recaptcha['version']         = 'v2_checkbox';
		$recaptcha['site_key']        = $site_key;
		$recaptcha['secret_key']      = $secret_key;
		$recaptcha['wpf_login_form']  = true;
		$recaptcha['wpf_reg_form']    = false;
		$recaptcha['login_form']      = false;
		$recaptcha['reg_form']        = false;

		update_option( 'wpforo_recaptcha', $recaptcha, false );
	}

	/**
	 * CAPTCHA 4WP hardening.
	 *
	 * @param string $site_key Site key.
	 * @param string $secret_key Secret key.
	 */
	private static function apply_c4wp_settings( $site_key, $secret_key ) {
		$c4wp = get_option( 'c4wp_admin_options', array() );
		if ( ! is_array( $c4wp ) ) {
			$c4wp = array();
		}

		$c4wp['site_key']                   = $site_key;
		$c4wp['secret_key']                 = $secret_key;
		$c4wp['registration']               = 1;
		$c4wp['login']                      = 1;
		$c4wp['lost_password']              = 1;
		$c4wp['pass_on_no_captcha_found']     = 'fail';
		$c4wp['captcha_version']            = 'v2_checkbox';

		update_option( 'c4wp_admin_options', $c4wp, false );
	}

	/**
	 * Configure UM register forms used on join-us.
	 *
	 * @param array<string, mixed> $config Config.
	 */
	private static function configure_um_register_form( array $config ) {
		if ( ! function_exists( 'UM' ) ) {
			return;
		}

		$register_page = get_page_by_path( $config['register_page_slug'] );
		$forms         = get_posts(
			array(
				'post_type'      => 'um_form',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);

		foreach ( $forms as $form ) {
			$mode = get_post_meta( $form->ID, '_um_mode', true );
			if ( 'register' !== $mode ) {
				continue;
			}

			update_post_meta( $form->ID, '_um_register_use_custom_settings', 1 );
			update_post_meta( $form->ID, '_um_register_role', $config['default_wp_role'] );
			update_post_meta( $form->ID, '_um_register_g_recaptcha_status', 1 );
		}

		if ( $register_page && function_exists( 'UM' ) ) {
			UM()->options()->update( 'core_register', $register_page->ID );
		}
	}

	/**
	 * Registration status enforced for new members (never auto-approve at runtime).
	 *
	 * @param array<string, mixed> $config Config.
	 * @return string pending|checkmail
	 */
	private static function get_required_registration_status( array $config ) {
		$status = $config['um_registration_status'] ?? 'pending';
		if ( ! in_array( $status, array( 'pending', 'checkmail' ), true ) ) {
			return 'pending';
		}
		return $status;
	}

	/**
	 * Fix subscriber role meta if still set to auto-approve (common spam cause).
	 */
	public static function repair_um_subscriber_role_meta() {
		if ( ! function_exists( 'UM' ) ) {
			return;
		}

		$config    = self::get_config();
		$role_slug = $config['default_wp_role'] ?? 'subscriber';
		$required  = self::get_required_registration_status( $config );
		$role_meta = get_option( 'um_role_' . $role_slug . '_meta', array() );

		if ( ! is_array( $role_meta ) ) {
			$role_meta = array();
		}

		if ( empty( $role_meta['_um_status'] ) || 'approved' === $role_meta['_um_status'] ) {
			$role_meta['_um_status'] = $required;
			update_option( 'um_role_' . $role_slug . '_meta', $role_meta, false );
		}
	}

	/**
	 * Override UM role registration status so um_user( 'status' ) is not "approved".
	 *
	 * @param array<string, mixed> $role_data Role data.
	 * @param string               $role_id   Role slug.
	 * @return array<string, mixed>
	 */
	public static function filter_role_registration_status( $role_data, $role_id ) {
		$config      = self::get_config();
		$target_role = $config['default_wp_role'] ?? 'subscriber';

		if ( $role_id !== $target_role ) {
			return $role_data;
		}

		$role_data['status'] = self::get_required_registration_status( $config );
		return $role_data;
	}

	/**
	 * After UM register: set account to pending or awaiting email (never approved).
	 *
	 * @param int                  $user_id   User ID.
	 * @param array<string, mixed> $args      Form args.
	 * @param array<string, mixed>|null $form_data Form data.
	 */
	public static function enforce_registration_account_status( $user_id, $args, $form_data ) {
		if ( is_admin() || null === $form_data || ! function_exists( 'UM' ) ) {
			return;
		}

		self::apply_account_status_for_user( (int) $user_id, self::get_config() );
	}

	/**
	 * Catch Tutor/WP paths that bypass UM role hooks.
	 *
	 * @param int $user_id User ID.
	 */
	public static function enforce_status_on_any_registration( $user_id ) {
		if ( ! function_exists( 'UM' ) ) {
			return;
		}

		if ( is_admin() && ! wp_doing_ajax() && current_user_can( 'create_users' ) ) {
			return;
		}

		$user = get_userdata( $user_id );
		if ( ! $user ) {
			return;
		}

		$config      = self::get_config();
		$target_role = $config['default_wp_role'] ?? 'subscriber';

		if ( ! in_array( $target_role, (array) $user->roles, true ) ) {
			return;
		}

		if ( user_can( $user_id, 'manage_options' ) ) {
			return;
		}

		$current = UM()->common()->users()->get_status( $user_id, 'raw' );
		if ( empty( $current ) || 'approved' === $current ) {
			self::apply_account_status_for_user( (int) $user_id, $config );
		}
	}

	/**
	 * @param int                  $user_id User ID.
	 * @param array<string, mixed> $config  Config.
	 */
	private static function apply_account_status_for_user( $user_id, array $config ) {
		if ( $user_id <= 0 || ! function_exists( 'UM' ) ) {
			return;
		}

		$status = self::get_required_registration_status( $config );

		if ( 'pending' === $status ) {
			UM()->common()->users()->set_as_pending( $user_id, true );
		} else {
			UM()->common()->users()->send_activation( $user_id, true );
		}

		UM()->common()->users()->remove_cache( $user_id );
	}

	/**
	 * Ultimate Member may auto-login before status is saved; revoke if not approved.
	 *
	 * @param int $user_id User ID.
	 */
	public static function revoke_session_if_not_approved( $user_id ) {
		if ( ! function_exists( 'UM' ) ) {
			return;
		}

		if ( UM()->common()->users()->has_status( $user_id, 'approved' ) ) {
			return;
		}

		wp_clear_auth_cookie();
		wp_set_current_user( 0 );
	}

	/**
	 * Block public REST user creation.
	 *
	 * @param object|\WP_Error     $prepared_user Prepared user.
	 * @param \WP_REST_Request     $request       Request.
	 * @return object|\WP_Error
	 */
	public static function block_rest_user_registration( $prepared_user, $request ) {
		if ( current_user_can( 'create_users' ) ) {
			return $prepared_user;
		}

		return new WP_Error(
			'shipwiki_rest_registration_blocked',
			__( 'User registration via REST API is disabled on this site.', 'default' ),
			array( 'status' => 403 )
		);
	}

	/**
	 * Block native wp-login.php registration unless UM form + captcha present.
	 *
	 * @param \WP_Error $errors               Errors.
	 * @param string    $sanitized_user_login Login.
	 * @param string    $user_email           Email.
	 * @return \WP_Error
	 */
	public static function block_unprotected_wp_registration( $errors, $sanitized_user_login, $user_email ) {
		unset( $sanitized_user_login, $user_email );

		if ( is_admin() ) {
			return $errors;
		}

		// Ultimate Member register form.
		if ( ! empty( $_POST['form_id'] ) && ! empty( $_POST['mode'] ) && 'register' === $_POST['mode'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			return $errors;
		}

		// Tutor student/instructor register (must pass Tutor + registration_errors captcha).
		if ( ! empty( $_POST['tutor_action'] ) && in_array( $_POST['tutor_action'], array( 'tutor_register_student', 'tutor_register_instructor' ), true ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			return $errors;
		}

		$errors->add(
			'shipwiki_registration_blocked',
			__( 'Registration is only available through the membership form.', 'default' )
		);

		return $errors;
	}

	/**
	 * Whether current user may use the forum.
	 */
	public static function user_can_access_forum() {
		if ( ! is_user_logged_in() ) {
			return false;
		}

		$config = self::get_config();
		if ( empty( $config['block_forum_until_approved'] ) ) {
			return true;
		}

		if ( ! function_exists( 'UM' ) ) {
			return true;
		}

		$user_id = get_current_user_id();
		if ( user_can( $user_id, 'manage_options' ) ) {
			return true;
		}

		$status = get_user_meta( $user_id, 'account_status', true );
		if ( empty( $status ) ) {
			return false;
		}

		return 'approved' === $status;
	}

	/**
	 * Run registration security checks against saved config and live plugin options.
	 *
	 * @param array<string, mixed> $config Saved config.
	 * @return array<int, array{severity: string, label: string, detail: string}>
	 */
	public static function run_security_audit( array $config ) {
		$findings = array();

		$add = static function ( $severity, $label, $detail ) use ( &$findings ) {
			$findings[] = array(
				'severity' => $severity,
				'label'    => $label,
				'detail'   => $detail,
			);
		};

		if ( empty( $config['recaptcha_site_key'] ) || empty( $config['recaptcha_secret_key'] ) ) {
			$add( 'error', 'reCAPTCHA keys not saved', 'Enter both site and secret keys below, then click Apply configuration.' );
		} else {
			$add( 'ok', 'reCAPTCHA keys saved', 'Site and secret keys are stored in ShipWiki settings.' );
		}

		if ( empty( $config['applied_at'] ) ) {
			$add( 'error', 'Configuration never applied', 'Click Apply configuration after saving reCAPTCHA keys.' );
		} elseif ( ( time() - (int) $config['applied_at'] ) > ( 30 * DAY_IN_SECONDS ) ) {
			$add(
				'warning',
				'Configuration not applied recently',
				'Last applied ' . wp_date( 'Y-m-d', (int) $config['applied_at'] ) . '. Re-apply if plugin settings may have changed.'
			);
		} else {
			$add( 'ok', 'Configuration applied recently', 'Last applied ' . wp_date( 'Y-m-d H:i:s', (int) $config['applied_at'] ) . '.' );
		}

		if ( 'approved' === ( $config['um_registration_status'] ?? '' ) ) {
			$add( 'error', 'ShipWiki set to auto-approve registrations', 'Change Ultimate Member registration status to email activation or admin review.' );
		} else {
			$enforced = self::get_required_registration_status( $config );
			$add(
				'ok',
				'ShipWiki registration status',
				'Saved: ' . (string) ( $config['um_registration_status'] ?? 'checkmail' ) . '. Runtime enforces: ' . $enforced . '.'
			);
		}

		$add(
			'ok',
			'Runtime registration lockdown (v1.4)',
			'Active: overrides auto-approve, blocks REST signup, revokes auto-login for unapproved users.'
		);

		if ( empty( $config['block_forum_until_approved'] ) ) {
			$add( 'warning', 'Forum gate disabled in ShipWiki', 'Enable “Block /forum/ until Ultimate Member account is approved” below.' );
		} else {
			$add( 'ok', 'Forum gate enabled', 'Unapproved users are redirected away from /forum/.' );
		}

		if ( ! function_exists( 'UM' ) ) {
			$add( 'error', 'Ultimate Member not loaded', 'Ultimate Member plugin must be active.' );
		} else {
			$role_slug = $config['default_wp_role'] ?? 'subscriber';
			$role_meta = get_option( 'um_role_' . $role_slug . '_meta', array() );
			if ( ! is_array( $role_meta ) ) {
				$role_meta = array();
			}
			$live_status = $role_meta['_um_status'] ?? '';
			if ( 'approved' === $live_status ) {
				$add(
					'error',
					'Ultimate Member role auto-approves new users',
					'Role "' . $role_slug . '" has Registration status = Auto approve. v1.4 runtime override is active, but click Apply configuration to fix the stored role setting.'
				);
			} elseif ( empty( $live_status ) ) {
				$add(
					'warning',
					'Ultimate Member role registration status unset',
					'Role "' . $role_slug . '" has no _um_status. Click Apply configuration or set it manually.'
				);
			} elseif ( $live_status !== ( $config['um_registration_status'] ?? '' ) ) {
				$add(
					'warning',
					'Ultimate Member role status differs from ShipWiki',
					'Live role status is "' . $live_status . '" but ShipWiki saved "' . (string) ( $config['um_registration_status'] ?? '' ) . '". Click Apply configuration.'
				);
			} else {
				$add( 'ok', 'Ultimate Member role registration status', 'Role "' . $role_slug . '" requires "' . $live_status . '".' );
			}

			$um_recaptcha_on = (bool) UM()->options()->get( 'g_recaptcha_status' );
			$um_site_key     = UM()->options()->get( 'g_recaptcha_sitekey' ) ?: UM()->options()->get( 'g_reCAPTCHA_site_key' );
			$um_secret_key   = UM()->options()->get( 'g_recaptcha_secretkey' ) ?: UM()->options()->get( 'g_reCAPTCHA_secret_key' );
			if ( ! $um_recaptcha_on || empty( $um_site_key ) || empty( $um_secret_key ) ) {
				$add( 'error', 'Ultimate Member reCAPTCHA not fully enabled', 'UM global reCAPTCHA is off or keys are missing. Click Apply configuration.' );
			} else {
				$add( 'ok', 'Ultimate Member global reCAPTCHA', 'Enabled with keys configured.' );
			}
		}

		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		if ( is_plugin_active( 'um-recaptcha/um-recaptcha.php' ) ) {
			$add( 'ok', 'UM reCAPTCHA extension active', 'Server-side captcha validation is available on UM forms.' );
		} else {
			$add( 'error', 'UM reCAPTCHA extension inactive', 'Activate “Ultimate Member - Google reCAPTCHA” (um-recaptcha) plugin.' );
		}

		$register_forms = get_posts(
			array(
				'post_type'      => 'um_form',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);
		$forms_without_captcha = array();
		$register_form_count   = 0;
		foreach ( $register_forms as $form ) {
			if ( 'register' !== get_post_meta( $form->ID, '_um_mode', true ) ) {
				continue;
			}
			++$register_form_count;
			if ( ! get_post_meta( $form->ID, '_um_register_g_recaptcha_status', true ) ) {
				$forms_without_captcha[] = $form->post_title . ' (ID ' . $form->ID . ')';
			}
		}
		if ( 0 === $register_form_count ) {
			$add( 'warning', 'No Ultimate Member register forms found', 'Publish at least one UM register form on /join-us/.' );
		} elseif ( ! empty( $forms_without_captcha ) ) {
			$add(
				'error',
				'Register form(s) missing reCAPTCHA',
				implode( ', ', $forms_without_captcha ) . '. Click Apply configuration or enable reCAPTCHA on each form.'
			);
		} else {
			$add( 'ok', 'All UM register forms use reCAPTCHA', $register_form_count . ' register form(s) checked.' );
		}

		$wpforo_auth = get_option( 'wpforo_authorization', array() );
		if ( ! is_array( $wpforo_auth ) ) {
			$wpforo_auth = array();
		}
		if ( ! empty( $wpforo_auth['user_register'] ) ) {
			$add( 'error', 'wpForo native registration enabled', 'Turn off “Users can register on forum” in wpForo → Settings → Authorization, or click Apply configuration.' );
		} else {
			$add( 'ok', 'wpForo native registration disabled', 'Forum signups should use /join-us/ only.' );
		}

		$expected_register = trim( (string) ( $config['register_page_slug'] ?? 'join-us' ), '/' ) . '/';
		$live_register     = isset( $wpforo_auth['register_url'] ) ? (string) $wpforo_auth['register_url'] : '';
		if ( $live_register && $live_register !== $expected_register ) {
			$add(
				'warning',
				'wpForo register URL mismatch',
				'Live register URL is "' . $live_register . '" but ShipWiki expects "' . $expected_register . '".'
			);
		} elseif ( $live_register ) {
			$add( 'ok', 'wpForo register URL', 'Points to ' . $live_register . '.' );
		}

		$c4wp = get_option( 'c4wp_admin_options', array() );
		if ( ! is_array( $c4wp ) ) {
			$c4wp = array();
		}
		if ( empty( $c4wp['registration'] ) || empty( $c4wp['login'] ) ) {
			$add( 'warning', 'CAPTCHA 4WP login/registration incomplete', 'Enable registration and login in CAPTCHA 4WP, or click Apply configuration.' );
		} elseif ( ( $c4wp['pass_on_no_captcha_found'] ?? '' ) !== 'fail' ) {
			$add( 'warning', 'CAPTCHA 4WP allows missing captcha', 'Set “Pass/fail on missing captcha” to Fail. Click Apply configuration.' );
		} else {
			$add( 'ok', 'CAPTCHA 4WP hardened', 'Registration, login, and fail-on-missing are set.' );
		}

		$tutor = get_option( 'tutor_option', array() );
		if ( ! is_array( $tutor ) ) {
			$tutor = maybe_unserialize( $tutor );
		}
		if ( ! is_array( $tutor ) ) {
			$tutor = array();
		}
		if ( empty( $tutor['enable_spam_protection'] ) || 'on' !== $tutor['enable_spam_protection'] ) {
			$add( 'warning', 'Tutor LMS spam protection off', 'Enable fraud/spam protection in Tutor settings or click Apply configuration.' );
		} else {
			$locations = $tutor['spam_protection_location'] ?? array();
			if ( ! is_array( $locations ) ) {
				$locations = array();
			}
			$needed = array( 'tutor_registration', 'wp_registration' );
			$missing = array_diff( $needed, $locations );
			if ( ! empty( $missing ) ) {
				$add(
					'warning',
					'Tutor spam protection missing locations',
					'Enable protection on: ' . implode( ', ', $missing ) . '.'
				);
			} else {
				$add( 'ok', 'Tutor LMS spam protection', 'Enabled on Tutor and WordPress registration.' );
			}
		}

		if ( ! get_option( 'users_can_register' ) ) {
			$add( 'warning', 'WordPress registration disabled', 'Ultimate Member requires Settings → General → “Anyone can register” to be checked.' );
		} else {
			$add( 'ok', 'WordPress membership registration enabled', 'Required for Ultimate Member (wp-login.php redirects to /join-us/).' );
		}

		return $findings;
	}

	/**
	 * Render the security audit panel in admin.
	 *
	 * @param array<string, mixed> $config Saved config.
	 */
	public static function render_security_audit_panel( array $config ) {
		$findings = self::run_security_audit( $config );
		$errors   = 0;
		$warnings = 0;
		foreach ( $findings as $finding ) {
			if ( 'error' === $finding['severity'] ) {
				++$errors;
			} elseif ( 'warning' === $finding['severity'] ) {
				++$warnings;
			}
		}

		$summary_class = 'notice-success';
		$summary_text  = 'No registration security issues detected.';
		if ( $errors > 0 ) {
			$summary_class = 'notice-error';
			$summary_text  = sprintf(
				'%1$d issue(s) need attention before the site is fully protected.',
				$errors
			);
		} elseif ( $warnings > 0 ) {
			$summary_class = 'notice-warning';
			$summary_text  = sprintf(
				'%1$d warning(s). Review recommended.',
				$warnings
			);
		}
		?>
		<h2>Registration security audit</h2>
		<div class="notice <?php echo esc_attr( $summary_class ); ?> inline" style="max-width:720px;padding:10px 12px;margin-bottom:1em;">
			<p style="margin:0;"><strong><?php echo esc_html( $summary_text ); ?></strong></p>
		</div>
		<table class="widefat striped" style="max-width:720px;margin-bottom:1.5em;">
			<thead>
				<tr>
					<th scope="col" style="width:90px;">Status</th>
					<th scope="col">Check</th>
					<th scope="col">Details</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $findings as $finding ) : ?>
					<?php
					$badge = 'OK';
					$color = '#00a32a';
					if ( 'error' === $finding['severity'] ) {
						$badge = 'Fix';
						$color = '#d63638';
					} elseif ( 'warning' === $finding['severity'] ) {
						$badge = 'Warn';
						$color = '#dba617';
					}
					?>
					<tr>
						<td><strong style="color:<?php echo esc_attr( $color ); ?>;"><?php echo esc_html( $badge ); ?></strong></td>
						<td><?php echo esc_html( $finding['label'] ); ?></td>
						<td><?php echo esc_html( $finding['detail'] ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Redirect unapproved users away from /forum/.
	 */
	public static function gate_forum_for_unapproved_users() {
		if ( is_admin() || ! self::is_forum_request() ) {
			return;
		}

		if ( self::user_can_access_forum() ) {
			return;
		}

		$config = self::get_config();
		$target = home_url( '/' . trim( $config['register_page_slug'], '/' ) . '/' );

		if ( is_user_logged_in() ) {
			$target = add_query_arg( 'forum_access', 'pending', $target );
		} else {
			$target = add_query_arg( 'redirect_to', rawurlencode( home_url( '/forum/' ) ), $target );
		}

		wp_safe_redirect( $target );
		exit;
	}

	/**
	 * Detect forum front-end requests.
	 */
	private static function is_forum_request() {
		$path = wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH );
		if ( ! is_string( $path ) ) {
			return false;
		}
		return ( false !== strpos( $path, '/forum' ) );
	}
}

ShipWiki_Membership_Setup::init();
