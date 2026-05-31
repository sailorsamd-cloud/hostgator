<?php

get_template_part( 'template/blog/tpl/_top_category_menu' );
get_template_part( 'template/blog/tpl/_print_blog_post_item' );
$is_blog_single_page = is_single();
$blog_page_title = get_the_title( get_option('page_for_posts', true) );

?>

<style>

    <?php if( cz('blog_page_separator_1_img_mobile') ): ?>

    @media (max-width: 640px) {
        .blog-page-separator_one {
            background-image: url("<?php echo cz('blog_page_separator_1_img_mobile'); ?>") !important;
        }
    }

    <?php endif;?>

    <?php if( cz('blog_page_separator_2_img_mobile') ): ?>

    @media (max-width: 640px) {
        .blog-page-separator_two {
            background-image: url("<?php echo cz('blog_page_separator_2_img_mobile'); ?>") !important;
        }
    }

    <?php endif;?>

</style>

<div class="blog-wrapper">

    <!-- BREADCRUMBS -->
    <?php get_template_part( 'template/blog/tpl/_breadcrumbs' ); ?>
    <!-- BREADCRUMBS -->

    <?php if ( !$is_blog_single_page ): ?>

        <?php

        $blog_posts = array();
        $blog_posts_count = 0;
        $show_page_separator_two = false;
        $max_items_count_before_first_page_separator = false;
        $min_posts_count = 4;

        while ( have_posts() ) {

            the_post();

            $post_item = array(
                'post_link'           => get_the_permalink(),
                'post_img'            => theme_thumb_photo($post->ID, 'large'),
                'post_category_links' => get_the_category_list(', ', 1),
                'post_title'          => get_the_title(),
                'post_author'         => get_the_author(),
                'post_date'           => date_i18n('M j, Y', strtotime(get_the_date())),
                'post_views_count'    => getPostViews($post->ID)
            );

            array_push($blog_posts, $post_item);

        }

        $blog_posts_count = count( $blog_posts );

        if( $blog_posts_count > $min_posts_count && cz('blog_show_page_separator_2') ) {
            $show_page_separator_two = true;
            $max_items_count_before_first_page_separator = $min_posts_count;
        }

        if( $blog_posts_count >= ($min_posts_count * 2) ) {

            $max_items_count_before_first_page_separator = round( $blog_posts_count / 2, 0, PHP_ROUND_HALF_UP );

            if($max_items_count_before_first_page_separator % 2 > 0 ) {
                $max_items_count_before_first_page_separator++;
            }

        }

	    ?>

        <div id="blog-top-full-screen" class="blog-top-full-screen-block" data-bg="<?php echo cz('blog_top_full_screen_block_img'); ?>" style="background-image: url(<?php echo cz('blog_top_full_screen_block_img'); ?>)">
            <div class="blog-top-full-screen-block__inner">
                <div class="container">

                    <div class="blog-top-full-screen-block__info-wrap js-blog-subscribe-form-wrap">

                        <div class="blog-top-full-screen-block__title">
                            <?php echo cz('blog_top_full_screen_block_title'); ?>
                        </div>

                        <div class="blog-top-full-screen-block__text">
                            <?php echo cz('blog_top_full_screen_block_text'); ?>
                        </div>

                        <span id="blog-subscribe-form"></span>

                        <?php if( cz('blog_top_subscribe_form') ): ?>
                            <?php echo cz('blog_top_subscribe_form'); ?>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div id="blog-top-category-menu" class="blog-top-category-menu-wrap">

                <?php get_top_blog_category_menu( 'blog-top-category-menu-list', 'active', true, 'blog-top-category-mobile-menu' ); ?>

            </div>

            <?php if ( wp_is_mobile() ): ?>

                <div class="blog-mobile-footer__item">
                    <?php get_template_part( 'template/blog/tpl/_search' ); ?>
                </div>

            <?php endif; ?>

        </div>

        <div class="container">
            <div class="blog-content">

                <div class="blog-content__main">

                    <?php if ( !$is_blog_single_page ): ?>

                        <div class="blog-posts-wrap">

                            <?php

                            $i = 0;

                            foreach ( $blog_posts as $post_item ) {

                                if( $show_page_separator_two ) {

                                    if( $i < $max_items_count_before_first_page_separator ) {
                                        echo print_blog_post_item( $post_item );
                                    } else {
                                        break;
                                    }

                                    $i++;

                                } else {

                                    echo print_blog_post_item( $post_item );

                                }

                            }

                            ?>

                        </div>

                        <?php

                        if( !$show_page_separator_two ) {
                            get_template_part( 'template/blog/tpl/_pagination' );
                        }

                        ?>

                    <?php elseif( $is_blog_single_page ):  ?>

                        <?php get_template_part( 'template/blog/tpl/_single' ); ?>

                    <?php endif;  ?>

                </div>

                <div class="blog-content__sidebar">

                    <?php if ( !wp_is_mobile() ): ?>

                        <div class="blog-content__sidebar-item">
                            <?php get_template_part( 'template/blog/tpl/_search' ); ?>
                        </div>

                    <?php endif; ?>

                    <?php if( cz('blog_banner_1') ): ?>
                        <div class="blog-content__sidebar-item">

                            <div class="blog-sidebar-promo">
                                <?php echo cz('blog_banner_1'); ?>
                            </div>

                        </div>
                    <?php endif; ?>

                    <div class="blog-content__sidebar-item">
                        <?php get_template_part( 'template/blog/tpl/_popular_posts' ); ?>
                    </div>

<!--                    --><?php //if ( is_widget_social() ): ?>
<!--                        <div class="blog-content__sidebar-item">-->
<!--                            --><?php //get_template_part( 'b', 'social' ); ?>
<!--                        </div>-->
<!--                    --><?php //endif; ?>

                    <?php if( !$show_page_separator_two && cz('blog_banner_2') ): ?>
                        <div class="blog-content__sidebar-item">

                            <div class="blog-sidebar-promo">
                                <?php echo cz('blog_banner_2'); ?>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>

        <?php if( cz('blog_show_page_separator_1') ): ?>

            <div class="blog-page-separator blog-page-separator_one" style="background-image: url(<?php echo cz('blog_page_separator_1_img_desktop'); ?>)">
                <div class="container">
                    <div class="blog-page-separator__content">

                        <div class="blog-page-separator-item">

                            <div class="blog-page-separator-item__title">
                                <?php echo cz('blog_page_separator_1_title'); ?>
                            </div>

                            <div class="blog-page-separator-item__text">
                                <?php echo cz('blog_page_separator_1_text'); ?>
                            </div>

                            <a href="<?php echo cz('blog_page_separator_1_btn_link'); ?>" class="blog-page__btn">
                                <?php echo cz('blog_page_separator_1_btn_text'); ?>
                            </a>

                        </div>

                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if( $show_page_separator_two ): ?>

            <div class="container">
                <div class="blog-content">

                    <div class="blog-content__main">

                        <div class="blog-posts-wrap">

                            <?php

                            $b = 1;

                            foreach ( $blog_posts as $post_item ) {

                                if( $show_page_separator_two ) {

                                    if( $b > $max_items_count_before_first_page_separator ) {
                                        echo print_blog_post_item( $post_item );
                                    }

                                    $b++;
                                }

                            }

                            ?>

                        </div>

                        <?php get_template_part( 'template/blog/tpl/_pagination' ); ?>

                    </div>

                    <div class="blog-content__sidebar">

                        <?php if( cz('blog_banner_2') ): ?>
                            <div class="blog-content__sidebar-item">

                                <div class="blog-sidebar-promo">
                                    <?php echo cz('blog_banner_2'); ?>
                                </div>

                            </div>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

            <?php if( cz('blog_show_page_separator_2') ): ?>

                <div class="blog-page-separator blog-page-separator_two blog-page-separator_content-align-left" style="background-image: url(<?php echo cz('blog_page_separator_2_img_desktop'); ?>)">
                    <div class="container">
                        <div class="blog-page-separator__content">

                            <div class="blog-page-separator-item">

                                <div class="blog-page-separator-item__title">
                                    <?php echo cz('blog_page_separator_2_title'); ?>
                                </div>

                                <div class="blog-page-separator-item__text">
                                    <?php echo cz('blog_page_separator_2_text'); ?>
                                </div>

                                <a href="<?php echo cz('blog_page_separator_2_btn_link'); ?>" class="blog-page__btn">
                                    <?php echo cz('blog_page_separator_2_btn_text'); ?>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php if( cz('blog_show_bottom_subscribe') && cz('blog_top_subscribe_form') ): ?>

            <div class="blog-footer">
                <div class="container">

                    <div class="blog-footer__title">
                        <?php echo cz('blog_bottom_subscribe_title'); ?>
                    </div>

                    <div class="blog-footer__text">
                        <?php echo cz('blog_bottom_subscribe_text'); ?>
                    </div>

                    <a href="<?php echo cz('blog_bottom_subscribe_btn_link'); ?>" class="blog-footer__btn js-blog-footer-subscribe-btn">
                        <?php echo cz('blog_bottom_subscribe_btn_text'); ?>
                    </a>

                </div>
            </div>

        <?php endif; ?>



    <?php elseif( $is_blog_single_page ):  ?>

        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="blog-top-full-screen-block" style="background-image: url(<?php echo cz('blog_top_full_screen_block_img'); ?>)">
            <div class="blog-top-full-screen-block__inner">
                <div class="container">

                    <div class="blog-top-full-screen-block__info-wrap">

                        <div class="blog-top-full-screen-block__single-top-text">
                            <?php echo $blog_page_title; ?>
                        </div>

                    </div>

                </div>
            </div>
        </a>

        <div class="container">
            <div class="blog-top-category-menu-wrap">

                <?php get_top_blog_category_menu( 'blog-top-category-menu-list', 'active', true, 'blog-top-category-mobile-menu' ); ?>

            </div>
        </div>

        <div class="container">
            <div class="blog-content">

                <div class="blog-content__main">

                    <?php get_template_part( 'template/blog/tpl/_single' ); ?>

                </div>

                <div class="blog-content__sidebar">

                    <div class="blog-content__sidebar-item">
                        <?php get_template_part( 'template/blog/tpl/_search' ); ?>
                    </div>

                    <?php if( cz('blog_banner_1') ): ?>
                        <div class="blog-content__sidebar-item">

                            <div class="blog-sidebar-promo">
                                <?php echo cz('blog_banner_1'); ?>
                            </div>

                        </div>
                    <?php endif; ?>

                    <div class="blog-content__sidebar-item">
                        <?php get_template_part( 'template/blog/tpl/_popular_posts' ); ?>
                    </div>

<!--                    --><?php //if ( is_widget_social() ): ?>
<!--                        <div class="blog-content__sidebar-item">-->
<!--                            --><?php //get_template_part( 'b', 'social' ); ?>
<!--                        </div>-->
<!--                    --><?php //endif; ?>

                    <?php if( cz('blog_banner_2') ): ?>
                        <div class="blog-content__sidebar-item">

                            <div class="blog-sidebar-promo">
                                <?php echo cz('blog_banner_2'); ?>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>

    <?php endif;  ?>

    <?php if ( wp_is_mobile() ): ?>

        <div class="blog-mobile-footer">

            <div class="container">
                <div class="blog-content">
                    <div class="blog-content__main">

                        <?php if( cz('blog_banner_mobile_show_1') && cz('blog_banner_1') ): ?>
                            <div class="blog-mobile-footer__item">

                                <div class="blog-sidebar-promo">
                                    <?php echo cz('blog_banner_1'); ?>
                                </div>

                            </div>
                        <?php endif; ?>

                        <div class="blog-mobile-footer__item">
                            <?php get_template_part( 'template/blog/tpl/_popular_posts' ); ?>
                        </div>

                        <?php if( cz('blog_banner_mobile_show_2') && cz('blog_banner_2') ): ?>
                            <div class="blog-mobile-footer__item">

                                <div class="blog-sidebar-promo">
                                    <?php echo cz('blog_banner_2'); ?>
                                </div>

                            </div>
                        <?php endif; ?>

<!--                        --><?php //if ( is_widget_social() ): ?>
<!--                            <div class="blog-mobile-footer__item">-->
<!--                                --><?php //get_template_part( 'b', 'social' ); ?>
<!--                            </div>-->
<!--                        --><?php //endif; ?>

                    </div>
                </div>
            </div>

        </div> <!-- End .blog-mobile-footer -->

    <?php endif;  ?>

</div> <!-- End .blog-wrapper -->









