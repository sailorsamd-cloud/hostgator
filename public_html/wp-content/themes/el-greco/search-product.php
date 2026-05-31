<?php
get_header();
global $wp_query;
$typePost = isset( $_GET[ 'post_type' ] ) && $_GET[ 'post_type' ] == 'post';
$is_empty = 0;
?>
    <div class="category aship-box-products">
        <div class="container">
            <div class="searchH1 search_title aship-title">
                <?php printf( '<h1>%s</h1><div>%s <span>(%s)</span></div>',
                    __( 'Search results for :', 'elgreco' ),
                    get_search_query(),
                    $wp_query->found_posts
                ); ?>
            </div>
            <?php if( have_posts() ) { ?>
                <div class="cat_filter">
                    <div class="category-select"><?php do_action( 'sortby_show_select' ) ?></div>
                </div>
                <div class="products_cont js-list_product">
                    <?php while (have_posts()) : the_post();
                        do_action('adstm_product_item', 'ads-large');
                    endwhile; ?>
                </div>
            <?php }else{
                $is_empty = 1;
                ?>
                <div class="searchpops">
                    <p><?php _e( 'Double-check your spelling or try again with a less specific term', 'elgreco' ) ?></p>
                    <div class="h1"><?php _e( 'Check These Popular Products', 'elgreco' ) ?></div>
                </div>
                <div class="products_cont js-list_product">
                    <?php
                    $posts_pp = $wp_query->query_vars[ 'posts_per_page' ];
                    $posts_found = $wp_query->found_posts;
                    $posts_curr = isset( $wp_query->query[ 'paged' ] ) ? intval( $wp_query->query[ 'paged' ] ) : 1;
                    $posts_from = 1+ $posts_pp*($posts_curr - 1);
                    $posts_last = min($posts_found, $posts_curr*$posts_pp);

                    global $GLOBAL;

                    if ( ! isset( $GLOBAL[ 'id_post_show' ] ) ) {
                        $GLOBAL[ 'id_post_show' ] = [];
                    }
                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $posts_curr,
                        '_orderby'       => 'promotionVolume',
                        '_order'         => 'DESC',
                        'post__not_in'   => $GLOBAL[ 'id_post_show' ]
                    ];
                    query_posts( $args );
                    get_template_part('template/loop/home/loop'); ?>

                </div>
            <?php }
            if ($wp_query->max_num_pages > 1){ ?>
                <div class="pagercont <?php if($is_empty){?>force_load_more<?php } ?>">
                    <div class="pager js-pagination pagination">
                        <?php do_action('adstm_paging_nav') ?>
                    </div>
                </div>
                <script>
                    ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    true_posts = '<?php echo base64_encode(serialize($wp_query->query_vars)); ?>';
                    current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                </script>
            <?php } ?>
        </div>
    </div>
<?php get_footer() ?>