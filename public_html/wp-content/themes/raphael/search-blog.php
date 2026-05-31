<?php $typePost = isset( $_GET[ 'post_type' ] ) && $_GET[ 'post_type' ] == 'post'; ?>

<?php get_header() ?>

<?php if( $typePost ): ?>
    <div style="display: none;" id="blog-search-page"></div>
<?php endif; ?>

<?php get_template_part( 'template/blog/index' ); ?>

<?php get_footer() ?>