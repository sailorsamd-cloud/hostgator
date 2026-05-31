<?php
/**
 * Plugin Name: ShipWiki Membership Setup
 * Description: Applies and enforces registration, forum, and membership settings for shipwiki.net.
 * Version: 1.0.0
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

	const OPTION_KEY   = 'shipwiki_membership_config';
	const CONFIG_VERSION = '1.0.0';

	/**
	 * Bootstrap hooks.
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'register_admin_page' ) );
		add_action( 'admin_post_shipwiki_save_membership_config', array( __CLASS__, 'handle_save' ) );
		add_action( 'admin_post_shipwiki_apply_membership_config', array( __CLASS__, 'handle_apply' ) );
		add_action( 'template_redirect', array( __CLASS__, 'gate_forum_for_unapproved_users' ), 5 );
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

			<?php if ( isset( $_GET['updated'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>
			<?php endif; ?>
			<?php if ( isset( $_GET['applied'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-success is-dismissible"><p>Configuration applied to WordPress, Ultimate Member, Tutor, and wpForo.</p></div>
			<?php endif; ?>
			<?php if ( isset( $_GET['error'] ) && 'keys' === $_GET['error'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-error is-dismissible"><p>Enter both reCAPTCHA v2 site key and secret key before applying.</p></div>
			<?php endif; ?>

			<?php if ( $applied_at ) : ?>
				<p><strong>Last applied:</strong> <?php echo esc_html( wp_date( 'Y-m-d H:i:s', $applied_at ) ); ?></p>
			<?php endif; ?>

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
		</div>
		<?php
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
		$role_meta['_um_status'] = $um_status;
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
			$status = 'approved';
		}

		return 'approved' === $status;
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
