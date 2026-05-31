<?php get_header() ?>
    <div class="container">
        <div class="simple content page-confirmation">
            <h1><?php echo function_exists( 'ads_set_custom_title' ) ? ads_set_custom_title( '', '' ) : '' ?></h1>
            <?php adstm_confirmation() ?>
        </div>
    </div>
<?php get_footer() ?>