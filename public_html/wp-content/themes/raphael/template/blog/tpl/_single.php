<?php while ( have_posts() ) : the_post(); ?>

    <?php

    global $post;

    $post_id              = get_the_ID();
    $post_category_links  = get_the_category_list( ', ', 1 );
    $post_author          = get_the_author();
    $post_date            = date_i18n( 'M j, Y', strtotime( get_the_date() ) );
    $post_comments_number = get_comments_number( $post_id );
    $post_views_count     = getPostViews($post->ID);

    ?>

    <div class="blog-single">

        <div class="blog-single__title">
            <?php the_title(); ?>
        </div>

        <div class="blog-single-data">

            <div class="blog-single-data__local-info">

                <div class="blog-single-data__local-info-author">
                    <span class="blog-single-data__author-span-by">
                        <?php _e( 'by', 'rap' ) ?>
                    </span>
                    <?php echo $post_author; ?>
                </div>

                <div class="blog-single-data__local-info-date-and-comments">

                    <span class="blog-single-data__local-info-date">
                        <?php echo $post_date; ?> /
                    </span>

                    <a href="#blog-single-comments-section" class="blog-single-data__local-info-comments-count">
                        <?php echo $post_comments_number; ?> <?php _e( 'comments', 'rap' ) ?>
                    </a>

                </div>

            </div>

            <div class="blog-single-data__social-info">

                <div class="blog-single-data__share-and-views">

                    <div class="blog-share blog-page__social-share-bottom">
	                    <?php do_action('adstm_single_share') ?>
                    </div>

                    <div class="blog-single-data__local-info-views-count">
                        <i class="fa fa-eye"></i> <?php echo $post_views_count; ?>
                    </div>

                </div>

            </div>

        </div>

        <div class="blog-single__user-content">

            <?php the_content(); ?>

        </div>

        <div class="blog-single-comments-section" id="blog-single-comments-section">

            <?php if( ( comments_open() || get_comments_number() ) ) { comments_template(); } ?>

        </div>

        <?php get_template_part( 'template/blog/tpl/_related_posts' ); ?>

    </div>

<?php endwhile; ?>
