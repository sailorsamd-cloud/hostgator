<?php get_header() ?>
<div class="container">
    <div class="breadcrumbs">
        <?php adsTmpl::breadcrumbs() ?>
    </div>
    <div class="simple content thankyoupage">
        <?php if( have_posts() ) : while( have_posts() ) : the_post() ?>
            <h1><?php _e( 'Thank you for contacting us', 'elgreco' ) ?></h1>
            <p class="text-center"><?php _e( 'We\'ll get back to you as soon as possible', 'elgreco' ) ?></p>
            <p class="text-center"><a href="<?php echo adstm_home_url() ?>" class="btn btn-black"><?php _e( 'Back to the site', 'elgreco' ) ?></a></p>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer() ?>
