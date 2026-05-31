<?php global $post; ?>

<?php if ( $post->post_content != '' ) : ?>

    <div class="wrap-content"><?php the_content() ?></div>

<?php endif; ?>