<?php
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 2,
);

query_posts( $args );
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
?>

<?php if ( have_posts() ) :?>

    <div id="blog-home">
        <div class="container">
            <div class="p-heading">
                <h3 class="p-title">
                    <a href="<?php echo home_url('/blog/')?>"><?php _e( 'Blog', 'rap' ); ?></a>
                </h3>
            </div>

            <div class="slider-blog">
                <?php while ( have_posts() ) :	the_post();

                    ?>

                    <div>
                        <div class="blog-item">
                            <?php printf('<div class="blog-thumb"><div class="thumb"><a href="%s"><img %s="%s?1000" alt=""></a></div></div>', get_the_permalink(),$src, theme_thumb_photo_url($post->ID, 'medium')) ?>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <time class="meta-time" datetime="<?php echo get_the_date() ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>
                                    <span class="separator">|</span> <div class="category">
                                        <?php
                                        get_the_category( $post->ID );
                                        echo '<span>'.__('Category', 'rap').': </span>';
                                        echo get_the_category_list( ', ', 1 );
                                        ?>
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>

                                <div class="footer-content">
                                    <?php printf( '<a class="more-link" href="%1$s" target="_blank">%2$s</a>',
                                        get_the_permalink(),
                                        __( 'Read More', 'rap' )
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;?>
            </div>
        </div>
    </div>

<?php endif;

wp_reset_query(); ?>