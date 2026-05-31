<?php

function theme_list_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

	<div <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>">
	<?php
	if ($comment->user_id > 0) {
		$user = get_userdata($comment->user_id);
		$username = (!empty($user->first_name) || !empty($user->last_name)) ? $user->first_name . " " . $user->last_name : $user->display_name;
	} else {
		$username = $comment->comment_author;
	}
	?>
	<div class="comment-author">
		<i class="fa fa-user margin-right"></i>
		<?php printf(__('<span class="comment-author-name">%s</span>'), $username); ?>
		<?php printf(__('<span class="comment-date" data-now="%1$s"></span>'), get_comment_date()) ?>
	</div>

	<div class="comment-text">

		<?php if ($comment->comment_approved == '0') : ?>
		<div class="alert alert-info margin-bottom">Your comment is awaiting moderation.</div>
		<?php endif; ?>

		<?php comment_text(); ?>
	</div>

	<div class="comment-meta">

		<?php if (comments_open() AND (get_option('thread_comments') == 1) AND ($depth != $args['max_depth'])) : ?>
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		<?php endif; ?>

		<?php edit_comment_link(__('Edit'), '  ', '') ?>

	</div>


	</div>

<?php
}

function theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

	  <article id="comment-<?php comment_ID(); ?>">

	    <div class="comment-author">
	      <i class="fa fa-user text-danger"></i>
	      <?php printf('<span class="comment-author-name">%s</span>', get_comment_author_link()); ?>
	      <?php printf('<span class="comment-date text-danger" data-now="%1$s %2$s" data-zone="%3$s">%1$s %2$s</span>', get_comment_date('F j, Y'), get_comment_time('G:i:s'), get_option('gmt_offset')) ?>
	    </div>

	    <div class="comment-text">

	      <?php if ($comment->comment_approved == '0') : ?>
	        <div class="alert alert-info margin-bottom">Your comment is awaiting moderation.</div>
	      <?php endif; ?>

	      <?php comment_text(); ?>

	    </div>


	    <div class="comment-meta">

	      <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
	      <?php edit_comment_link(__('Edit'), '  ', '') ?>

	    </div>

	  </article><!-- #comment-## -->

	</div>
	<?php
}


add_filter('comment_form_default_fields', function($fields) {
	unset($fields['url']);
	return $fields;
});


//output comments
function theme_show_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	?>
	<div class="text" id="comment-<?php comment_ID(); ?>">
	<?php comment_text(); ?>
	<div class="author"><?php comment_author(); ?></div>
	</div>
<?php
}


function custom_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );

	$fields   =  array(
		'author' => '<p class="col-md-30">
				<input class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Your Name" />
			</p>',

		'email' => '<p class="col-md-30">
				<input class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="Your Email" required />
			</p>',

		'url' => '<p class="col-md-60">
				<input class="form-control" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Your Site" />
			</p>',
	);

	/**
	 * Filter the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields = apply_filters('comment_form_default_fields', $fields);
	$defaults = array(
	'fields'               => $fields,

	'comment_field'        => '<p class="comment-form-comment">
			<textarea class="form-control" name="comment" rows="5" placeholder="Your comment" required></textarea>
		</p>',

	/** This filter is documented in wp-includes/link-template.php */
	'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',

	/** This filter is documented in wp-includes/link-template.php */
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'comment_notes_before' => '<div class="row row-margin">',
	'comment_notes_after'  => '</div>',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'class_submit'         => 'submit btn btn-lg btn-default',
	'name_submit'          => 'submit',
	'title_reply'          => __('Leave a comment'),
	'title_reply_to'       => __('Leave a reply to %s'),
	'cancel_reply_link'    => __('Cancel reply'),
	'label_submit'         => __('Submit'),
	'format'               => 'xhtml',
	);

	/**
	 * Filter the comment form default arguments.
	 *
	 * Use 'comment_form_default_fields' to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
	<?php if ( comments_open( $post_id ) ) : ?>

		<?php do_action( 'comment_form_before' ); ?>

		<div id="respond" class="comment-respond">

			<div class="comment-meta">
				<?php cancel_comment_reply_link($args['cancel_reply_link']); ?>
			</div>

			<div id="reply-title" class="h3 comment-reply-title">
				<?php comment_form_title($args['title_reply'], $args['title_reply_to']); ?>
			</div>

			<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>

				<?php echo $args['must_log_in']; ?>

				<?php do_action( 'comment_form_must_log_in_after' ); ?>

			<?php else : ?>

				<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form form-comment" data-toggle="validator" role="form">

					<?php

					do_action('comment_form_top');

					if ( is_user_logged_in() ) :

						echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

						do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

					else :

						echo $args['comment_notes_before'];

						do_action( 'comment_form_before_fields' );

						foreach ((array)$args['fields'] as $name => $field) {
							echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
						}

						do_action( 'comment_form_after_fields' );

						echo $args['comment_notes_after'];

					endif;

					echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );

					?>

					<div class="form-submit">
					<?php /*<input name="<?php echo esc_attr( $args['name_submit'] ); ?>" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" class="<?php echo esc_attr( $args['class_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" /> */ ?>
					<button name="<?php echo esc_attr( $args['name_submit'] ); ?>" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" class="<?php echo esc_attr( $args['class_submit'] ); ?>"><?php echo esc_attr( $args['label_submit'] ); ?></button>
					<?php comment_id_fields( $post_id ); ?>
					</div>
					<?php
					/**
					 * Fires at the bottom of the comment form, inside the closing </form> tag.
					 *
					 * @since 1.5.0
					 *
					 * @param int $post_id The post ID.
					 */
					do_action( 'comment_form', $post_id );
					?>
				</form>
			<?php endif; ?>

		</div><!-- #respond -->

		<?php
		/**
		 * Fires after the comment form.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_after' );
	else :
		/**
		 * Fires after the comment form if comments are closed.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_comments_closed' );
	endif;
}


if (post_password_required()) {
	return;
}

?>

<div id="comments" class="comments">

	<?php if (have_comments()) : ?>

		<div class="h3 comments-header">
			<?php comments_number(); ?>
		</div>

		<div class="comments-list">
			<?php wp_list_comments('callback=theme_comment'); ?>
		</div>

	<?php endif; // have_comments() ?>

	<?php custom_comment_form(); ?>

</div><!-- #comments.comments -->
