<?php
    $random_int = random_int (1, 10);
    if($random_int<11){
        global $ADSTM;

        $review  = $ADSTM[ 'review' ];

        global $wpdb;
        $countFeedback = $review->countFeedback();
        if($countFeedback>0){
            $wpdb->update( $wpdb->ads_products,
                [
                    'countReview'   => $countFeedback,
                    'evaluateScore' => $review->averageStar()
                ],
                [
                    'post_id' => $post->ID
                ],
                [ '%d', '%f' ],
                [ '%d' ]
            );
        }
    }
