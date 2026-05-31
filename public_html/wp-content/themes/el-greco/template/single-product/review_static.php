<?php
global $ADSTM;
$reviews        = $ADSTM[ 'review' ];
$stars = $reviews->getStat();
?>
<div class="reviews_static">
    <div class="aggregateRating">
        <div class="star-rating">
            <?php
            printf( '<div class="info"><span class="average-star">%1$s</span> %2$s <span>5</span></div>',
                $reviews->averageStar(),
                __( 'out of', 'elgreco' )
            ); ?>
        </div>
        <div class="l-star">
            <div class="stars stars-big">
                <?php $reviews->renderStarRating( $reviews->averageStar() ); ?>
            </div>
            <?php
            printf( '<div class="info-count"><span>%1$s</span> %2$s</div>',
                $reviews->countFeedback(),
                __( 'reviews', 'elgreco' )
            ); ?>
        </div>
    </div>
    <div class="rs_cont">
        <?php $stars[ 'stars' ] = array_reverse( $stars[ 'stars' ], true );
        foreach( $stars[ 'stars' ] as $key => $value ){ ?>
            <div class="rs_rev_one">
                <div class="rs_desc">
                    <?php echo $key.' '.($key == 1 ? __( 'star', 'elgreco' ) : __( 'stars', 'elgreco' )) ?>
                </div>
                <div class="rs_perc percent">
                    <span style="width:<?php echo str_replace(',','.',$value[ 'percent' ]) ?>%"></span>
                </div>
                <div class="rs_count">(<?php echo $value[ 'count' ] ?>)</div>
            </div>
        <?php } ?>
    </div>
</div>
