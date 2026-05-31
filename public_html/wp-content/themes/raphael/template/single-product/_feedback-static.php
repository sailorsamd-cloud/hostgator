<?php $reviews = adsTmpl::review(); ?>

<div class="feedback-static">
    <div class="row">
        <div class="col-xs-60 col-sm-30">
            <div class="aggregateRating">
                <div class="star-rating">
                    <div property="aggregateRating" typeof="AggregateRating">
                        <?php
                        printf( '<div class="info"><span class="average-star" itemprop="ratingValue">%1$s</span> %2$s <span itemprop="bestRating">5</span></div>',
                            $reviews->averageStar(),
                            __( 'out of', 'rap' )
                        ); ?>
                    </div><!-- .star-rating -->
                </div>

                <div class="l-star">
                    <div class="stars stars-big">
                        <?php $reviews->renderStarRating( $reviews->averageStar() ); ?>
                    </div>
                    <?php
                    printf( '<div class="info-count"><span itemprop="reviewCount">%1$s</span> %2$s</div>',
                        $reviews->countFeedback(),
                        __( 'reviews', 'rap' )
                    ); ?>
                </div>

            </div>
        </div>

        <div class="col-xs-60 col-sm-30">
                <div class="feedback-rating">
			<?php
			$stars = $reviews->getStat();

			$stars[ 'stars' ] = array_reverse( $stars[ 'stars' ], true );

			foreach ( $stars[ 'stars' ] as $key => $value ) {

				printf( '<div class="row-star">
							<div class="col1">
							    <div class="star-info">%3$d %4$s</div>
							</div>
							<div class="col2">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="%2$d" aria-valuemin="0" aria-valuemax="100" style="width: %2$s%%;">
                                            <span class="sr-only">%2$s%%</span>
                                        </div>
                                </div>
							</div>
							<div class="col3">( %1$s )</div>
						</div>',
					$value[ 'count' ],
					$value[ 'percent' ],
					$key,
					$key == 1 ? __( 'star', 'rap' ) : __( 'stars', 'rap' )
				);
			}; ?>
            </div>

        </div>
    </div>
</div>