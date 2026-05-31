<div class="search-blog-item">

        <?php printf('<a class="search-blog-item__img-wrap" href="%s">%s</a>', get_the_permalink(), theme_thumb_photo($post->ID, 'medium')) ?>

        <div class="search-blog-item__meta-wrap">

            <?php the_title( '<h2 class="search-blog-item__title"><a href="' . get_the_permalink() . '">', '</a></h2>' ); ?>

            <div class="search-blog-item__date-and-views-wrap">

                <time class="search-blog-item__date" datetime="<?php echo get_the_date() ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>

                <div class="search-blog-item__views-comments">

                    <span class="search-blog-item__views"><i class="fa fa-eye"></i> <?php echo getPostViews($post->ID) ?></span>

                    <span class="search-blog-item__comments">
                        <i class="fa fa-comment"></i>
                        <?php echo get_comments_number(); ?>
                    </span>

                </div>

            </div>

            <div class="blog-post-item__tag-list">
                <?php
                $categories = get_the_category( $post->ID );

                printf( '<strong>%s: </strong>', __( 'Category', 'rap' ) );

                echo get_the_category_list( ', ', 1 );
                ?>
            </div>


            <div class="search-blog-item__desc">

                <div class="search-blog-item__desc-text">
                    <?php the_excerpt(); ?>
                </div>

                <?php printf( '<a class="search-blog-item__link" href="%1$s" target="_blank">%2$s</a>',
                    get_the_permalink(),
                    __( 'Read More', 'rap' )
                ); ?>

            </div>

        </div>

</div>