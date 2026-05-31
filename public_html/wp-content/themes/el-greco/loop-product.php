<?php get_header();
/*
if(cz('tp_products_not_in') && $_SERVER['REDIRECT_SCRIPT_URL'] == '/product/'){
    $args = $wp_query->query_vars;
    $args['post__not_in'] = explode(',',cz('tp_products_not_in'));
    query_posts( $args );
}*/


$queryvar_paged = get_query_var('paged');
$posts_pp = $wp_query->query_vars[ 'posts_per_page' ];
$posts_found = $wp_query->found_posts;
$posts_curr = $queryvar_paged ? $queryvar_paged : 1;
$posts_from = 1+ $posts_pp*($posts_curr - 1);
$posts_last = min($posts_found, $posts_curr*$posts_pp);
?>
    <div class="category aship-box-products">
        <div class="container">
            <div class="breadcrumbs">
                <?php adsTmpl::breadcrumbs() ?>
            </div>
            <div class="h1cont aship-title h1contflex"><?php echo adsTmpl::singleTerm( false ) ?> <span>(<?php echo $posts_found; ?>)</span></div>
            <div class="cat_filter">
                <div class="cat_results_count">

                </div>
                <div class="category-select"><?php do_action( 'sortby_show_select' ) ?></div>
            </div>
            <div class="products_cont js-list_product">
                <?php if( have_posts() ) : while ( have_posts() ) : the_post();
                    do_action( 'adstm_product_item', 'ads-big' );
                endwhile; endif; ?>
            </div>
            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <div class="pagercont">
                    <div class="pager js-pagination pagination">
                        <?php do_action( 'adstm_paging_nav' ) ?>
                    </div>
                </div>
                <script>
                    ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    true_posts = '<?php echo base64_encode(serialize($wp_query->query_vars)); ?>';
                    current_page = <?php echo $posts_curr; ?>;
                    max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                </script>
            <?php endif; ?>
        </div>
    </div>

<?php $queried_object = get_queried_object();
if(isset($queried_object->description) && $queried_object->description ){ ?>
    <div class="container">
        <div class="simple-content category_article content">
            <?php echo $queried_object->description; ?>
        </div>
    </div>
<?php } ?>

<?php if(cz('tp_trustbox_enable') && cz('tp_trustbox_code')){ ?>
    <div class="pilot_cont">
        <div class="container">
            <?php _cz('tp_trustbox_code'); ?>
        </div>
    </div>
    <?php
}?>

<?php get_template_part( 'template/widget/_features' ); ?>



<?php get_footer(); ?>