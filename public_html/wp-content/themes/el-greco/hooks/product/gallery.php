<?php

function adstm_single_gallery( $items = [], $video=[]) {
	
    if ( ! $items || count( $items ) == 0 ) {
        global $post;
        if($post->imageUrl){
            $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $post->imageUrl );
            $items[] = ['full' => $featured_img,'ads-large' => $featured_img];
        }else{
            return null;
        }
    }else{
        if(cz('tp_single_feat_img')){
            global $ADSTM;
            if(!empty($ADSTM['product']['thumb'])){
                $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $ADSTM['product']['thumb'] );
                array_unshift($items, ['full' => $featured_img,'ads-large' => $featured_img]);
            }

        }
    }
    if(!is_array($video)){
        $video=[];
    }

    $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-lazy' : 'src';

?>

    <div class="single_slide_cont <?php echo cz('tp_single_gallery_minis_bottom') ? 'single_slide_cont_hor' : ''; ?> ">
        <div class="single_slide">
            <div class="item_slider" data-video="<?php _cz('video_order'); ?>">
                <?php
                $video_except=[];
                $video_tpl='';
                foreach( $video as $k => $video_item ) {
                    $video_except[] = $video_item[ 'img' ];
                    if(trim($video_item[ 'url' ])){
                        $video_tpl .= sprintf(
                            '<div class="item"><div class="itembgr itembgr_video" data-poster="%1$s"  data-video="%2$s"><img %4$s="%3$s" alt=""></div></div>',
                            $video_item[ 'img' ],
                            $video_item[ 'url' ],
                            ads_get_size_img( $video_item[ 'img' ], 'ads-small' ),
                            $src
                        );
                    }

                }
                if(cz('video_order')=='first'){
                    echo $video_tpl;
                }

                $first_image='';
                $first_image_zoom='';
                foreach( $items as $k => $item ) {
                    if(!in_array($item[ 'full' ], $video_except)){
                        if(isset($item['id'])){
                            $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                            $image_title = get_the_title($item['id']);
                        }else{
                            $image_alt = false;
                            $image_title = false;
                        }

                        printf(
                            '<div class="item"><div class="itembgr" data-img="%1$s"  data-zoom-image="%3$s"><img %4$s="%2$s" alt="%5$s" %6$s/></div></div>',
                            ads_get_size_img( $item[ 'full' ], 'ads-large' ),
                            ads_get_size_img( $item[ 'full' ], 'ads-small' ),
                            $item[ 'full' ],
                            $src,
                            $image_alt ? $image_alt : '',
                            $image_title ? 'title="'.$image_title.'"' : ''
                        );
                    }
                    if(!$first_image){
                        $first_image=$item[ 'ads-large' ];
                        $first_image_zoom = $item[ 'full' ];
                    }

                }
                if(cz('video_order')=='last'){
                    echo $video_tpl;
                }
                ?>
            </div>
        </div>
        <div class="single_showroom">
            <?php do_action( 'single_showroom_before_img' ); ?>
            <img style="display:none;" class="makezoom" <?php echo $src; ?>="<?php echo $first_image;?>" data-zoom-image="<?php echo $first_image_zoom;?>" alt=""/>
            <div class="slider-next"></div>
            <div class="slider-prev"></div>
            <div class="play_video_showroom"></div>
        </div>
    </div>
	<?php
}
add_action( 'adstm_single_gallery', 'adstm_single_gallery', 10, 2 );



function adstm_single_gallery_adap( $items = [], $video=[]) {

    if ( ! $items || count( $items ) == 0 ) { ?>
        <?php
        return null;
    }else{
        if(cz('tp_single_feat_img')){
            global $ADSTM;
            if(!empty($ADSTM['product']['thumb'])){
                $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $ADSTM['product']['thumb'] );
                array_unshift($items, ['full' => $featured_img,'ads-large' => $featured_img]);
            }

        }
    }
    if(!is_array($video)){
        $video=[];
    }

    $tp_item_imgs_lazy_load = cz( 'tp_item_imgs_lazy_load' );

    ?>

    <div class="item_adap_slider">
        <div class="item_adap_slider_cont">
            <?php
            $video_except='';
            $video_tpl='';
            foreach( $video as $k => $video_item ) {
                $video_except=$video_item[ 'img' ];
                if(trim($video_item[ 'url' ])){
                    $video_tpl = sprintf(
                        '<div class="item"><div class="itembgr itembgr_video_adap"><video disablePictureInPicture width="%4$s" height="%4$s" %3$s="%1$s"
                                   controlslist="nodownload nofullscreen" controls="true" id="item-video" src="%2$s" preload="none"></video></div></div>',
                        ads_get_size_img($video_item['img'], 'ads-big'),
                        $video_item['url'],
                        cz('video_order')=='last' ? 'data-lazy-poster' : 'poster',
                        '100%'

                    );
                }
            }
            if(cz('video_order')=='first'){
                echo $video_tpl;
            }
            foreach( $items as $k => $item ) {
                if($item[ 'full' ]!=$video_except) {
                    printf(
                        '<div class="item"><div class="itembgr"><img %3$s %2$s="%1$s" alt=""/>%4$s</div></div>',
                        $item['ads-large'],
                        ($tp_item_imgs_lazy_load && $k!==0) ? 'data-lazy' : 'src',
                        $tp_item_imgs_lazy_load ? '' : '',
                        $tp_item_imgs_lazy_load ? '' : ''
                    );
                }
            }
            if(cz('video_order')=='last'){
                echo $video_tpl;
            }
            ?>
        </div>
        <?php do_action( 'item_adap_slider_after' ); ?>
    </div>
    <?php
}
add_action( 'adstm_single_gallery_adap', 'adstm_single_gallery_adap', 10, 2 );


function adstm_single_gallery_tiled( $items = [], $video=[]) {

    if ( ! $items || count( $items ) == 0 ) {
        global $post;
        if($post->imageUrl){
            $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $post->imageUrl );
            $items[] = ['full' => $featured_img,'ads-large' => $featured_img];
        }else{
            return null;
        }
    }else{
        if(cz('tp_single_feat_img')){
            global $ADSTM;
            if(!empty($ADSTM['product']['thumb'])){
                $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $ADSTM['product']['thumb'] );
                array_unshift($items, ['full' => $featured_img,'ads-large' => $featured_img]);
            }

        }
    }
    if(!is_array($video)){
        $video=[];
    }

    $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
    ?>
    <div class="tiled_gallery_cont">

    <?php


    $video_except=[];
    $video_tpl=[];
    foreach( $video as $k => $video_item ) {
        $video_except[] = $video_item[ 'img' ];
        if(trim($video_item[ 'url' ])){
            if(isset($video_item[ 'order_number' ]) && $video_item[ 'order_number' ]>0){
                $num = intval($video_item[ 'order_number' ]) - 1;
                $video_tpl[$num] = sprintf(
                    '<div class="item"><div class="ppd_video_sqr"><div class="ppd_init_video" data-source="%1$s"></div></div></div>',
                    $video_item[ 'url' ]
                );
            }else{
                $video_tpl[] = sprintf(
                    '<div class="item"><div class="ppd_video_sqr"><div class="ppd_init_video" data-source="%1$s"></div></div></div>',
                    $video_item[ 'url' ]
                );
            }

        }
    }

    $items_tpl = [];


    $count_video = count($video_tpl);
    $count_items = count($items);

    $used_video_count = 0;
    $used_items_count = 0;
    $last_k = 0;

    $first_image='';
    if($count_items){
        $first_image=$items[0][ 'ads-large' ];
    }

    if($count_video){

    }
    $first_k = 0;
    if(isset($video_tpl[0])){
        array_unshift($items, $items[0]);
    }


    if($count_items>4){



        ?>
        <div class="tiled_gallery_3">
            <?php
            $items_can_use = 3;
            foreach( $items as $k => $item ) {
                if($k > 0 && $k<4 && $items_can_use>0){
                    if(!in_array($item[ 'full' ], $video_except)){
                        if(isset($item['id'])){
                            $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                            $image_title = get_the_title($item['id']);
                        }else{
                            $image_alt = false;
                            $image_title = false;
                        }

                        if(isset($video_tpl[($k)])){
                            echo $video_tpl[$k];
                            $items_can_use--;
                            $last_k = $k;
                            $used_video_count++;
                        }else{
                            printf(
                                '<div class="item"><div class="itembgr"><img %2$s="%1$s" alt="%3$s" %4$s/></div></div>',
                                ads_get_size_img( $items[$k-$used_video_count][ 'full' ], 'ads-large' ),
                                $src,
                                $image_alt ? $image_alt : '',
                                $image_title ? 'title="'.$image_title.'"' : ''
                            );
                            $last_k = $k;
                            $items_can_use--;
                        }




                    }
                }
            }


            ?>
        </div>

        <?php
    }




    ?>



        <div class="single_showroom_sqr">
            <?php do_action( 'single_showroom_before_img' );
            if(isset($video_tpl[0])){
                echo $video_tpl[0];
            }else{ ?>
                <img <?php echo $src; ?>="<?php echo $first_image;?>" alt=""/>

            <?php } ?>

        </div>
        <?php


        if($count_items>6){


            ?>
            <div class="tiled_gallery_2">
                <?php
                $items_can_use = 2;
                foreach( $items as $k => $item ) {

                    if($k > $last_k && $k < 6 && $items_can_use>0){
                        if(!in_array($item[ 'full' ], $video_except)){
                            if(isset($item['id'])){
                                $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                                $image_title = get_the_title($item['id']);
                            }else{
                                $image_alt = false;
                                $image_title = false;
                            }

                            if(isset($video_tpl[($k)])){
                                echo $video_tpl[$k];
                                $items_can_use--;
                                $last_k = $k;
                                $used_video_count++;
                            }else{
                                printf(
                                    '<div class="item"><div class="itembgr"><img %2$s="%1$s" alt="%3$s" %4$s/></div></div>',
                                    ads_get_size_img( $items[$k-$used_video_count][ 'full' ], 'ads-large' ),
                                    $src,
                                    $image_alt ? $image_alt : '',
                                    $image_title ? 'title="'.$image_title.'"' : ''
                                );
                                $last_k = $k;
                                $items_can_use--;
                            }


                        }
                    }
                }
                $last_k = $last_k - $used_video_count;


                ?>
            </div>


            <?php
        }
    if($count_items>$last_k){?>
        <div class="tiled_more_cont">
            <span class="tiled_more btn-black"><?php _e('Load more images', 'elgreco') ?></span>
        </div>
    <?php }
        ?>

        <div class="tiled_gallery_2_other_cont">
            <div class="tiled_gallery_2_other">
                <?php
                $items_tpl_str = '';

                if($count_items>$last_k){
                    foreach( $items as $k => $item ) {
                        if($k > $last_k){
                            if(!in_array($item[ 'full' ], $video_except)){
                                if(isset($item['id'])){
                                    $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                                    $image_title = get_the_title($item['id']);
                                }else{
                                    $image_alt = false;
                                    $image_title = false;
                                }

                                $items_tpl_str .= sprintf(
                                    '<div class="item"><div class="itembgr"><img %2$s="%1$s" alt="%3$s" %4$s/></div></div>',
                                    ads_get_size_img( $item[ 'full' ], 'ads-large' ),
                                    $src,
                                    $image_alt ? $image_alt : '',
                                    $image_title ? 'title="'.$image_title.'"' : ''
                                );
                            }
                        }
                    }


                    echo $items_tpl_str;

                }
                ?>
            </div>
        </div>

    </div>
    <?php
}
add_action( 'adstm_single_gallery_tiled', 'adstm_single_gallery_tiled', 10, 2 );



function adstm_single_gallery_tiled_adap( $items = [], $video=[]) {

    if ( ! $items || count( $items ) == 0 ) {
        global $post;
        if($post->imageUrl){
            $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $post->imageUrl );
            $items[] = ['full' => $featured_img,'ads-large' => $featured_img];
        }else{
            return null;
        }
    }else{
        if(cz('tp_single_feat_img')){
            global $ADSTM;
            if(!empty($ADSTM['product']['thumb'])){
                $featured_img = preg_replace( '/_\d+x\d+\.jpg$/', '', $ADSTM['product']['thumb'] );
                array_unshift($items, ['full' => $featured_img,'ads-large' => $featured_img]);
            }

        }
    }
    if(!is_array($video)){
        $video=[];
    }
    $last_k = 0;
    $count_items = count($items);

    $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-lazy' : 'src';

    ?>

    <div class="single_slide_cont single_slide_cont_hor tiled_gallery_adap">
        <div class="single_slide">
            <div class="item_slider" data-video="<?php _cz('video_order'); ?>">
                <?php

                $video_except=[];
                $video_tpl=[];
                foreach( $video as $k => $video_item ) {
                    $video_except[] = $video_item[ 'img' ];
                    if(trim($video_item[ 'url' ])){
                        if(isset($video_item[ 'order_number' ]) && $video_item[ 'order_number' ]>0){
                            $num = intval($video_item[ 'order_number' ]) - 1;
                            $video_tpl[$num] = sprintf(
                                '<div class="item"><div class="itembgr itembgr_video" data-poster="%1$s"  data-video="%2$s"><img %4$s="%3$s" alt=""></div></div>',
                                $video_item[ 'img' ],
                                $video_item[ 'url' ],
                                ads_get_size_img( $video_item[ 'img' ], 'ads-small' ),
                                $src
                            );
                        }else{
                            $video_tpl[] = sprintf(
                                '<div class="item"><div class="itembgr itembgr_video" data-poster="%1$s"  data-video="%2$s"><img %4$s="%3$s" alt=""></div></div>',
                                $video_item[ 'img' ],
                                $video_item[ 'url' ],
                                ads_get_size_img( $video_item[ 'img' ], 'ads-small' ),
                                $src
                            );
                        }

                    }
                }



                $first_image='';
                $first_image_zoom='';

                $used_video_count = 0;

                foreach( $items as $k => $item ) {
                    if(!in_array($item[ 'full' ], $video_except)){
                        if(isset($item['id'])){
                            $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                            $image_title = get_the_title($item['id']);
                        }else{
                            $image_alt = false;
                            $image_title = false;
                        }

                        if(isset($video_tpl[($k)])){
                            echo $video_tpl[$k];
                            $used_video_count++;
                        }else{
                            printf(
                                '<div class="item"><div class="itembgr" data-img="%1$s"  data-zoom-image="%3$s"><img %4$s="%2$s" alt="%5$s" %6$s/></div></div>',
                                ads_get_size_img( $items[$k-$used_video_count][ 'full' ], 'ads-large' ),
                                ads_get_size_img( $items[$k-$used_video_count][ 'full' ], 'ads-small' ),
                                $items[$k-$used_video_count][ 'full' ],
                                $src,
                                $image_alt ? $image_alt : '',
                                $image_title ? 'title="'.$image_title.'"' : ''
                            );


                        }
                        $last_k = $k;




                    }
                }
                $last_k = $last_k - $used_video_count;

                if($count_items>$last_k){
                    $items_tpl_str = '';
                    foreach( $items as $k => $item ) {
                        if($k > $last_k){
                            if(!in_array($item[ 'full' ], $video_except)){
                                if(isset($item['id'])){
                                    $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                                    $image_title = get_the_title($item['id']);
                                }else{
                                    $image_alt = false;
                                    $image_title = false;
                                }

                                $items_tpl_str .= sprintf(
                                    '<div class="item"><div class="itembgr" data-img="%1$s"  data-zoom-image="%3$s"><img %4$s="%2$s" alt="%5$s" %6$s/></div></div>',
                                    ads_get_size_img( $item[ 'full' ], 'ads-large' ),
                                    ads_get_size_img( $item[ 'full' ], 'ads-small' ),
                                    $item[ 'full' ],
                                    $src,
                                    $image_alt ? $image_alt : '',
                                    $image_title ? 'title="'.$image_title.'"' : ''
                                );
                            }
                        }
                    }
                    echo $items_tpl_str;
                }









                ?>
            </div>
        </div>
        <div class="single_showroom">
            <?php do_action( 'single_showroom_before_img' ); ?>
            <img style="display:none;" class="makezoom" <?php echo $src; ?>="<?php echo $first_image;?>" data-zoom-image="<?php echo $first_image_zoom;?>" alt=""/>
            <div class="slider-next"></div>
            <div class="slider-prev"></div>
            <div class="play_video_showroom"></div>
        </div>
    </div>
    <?php
}
add_action( 'adstm_single_gallery_tiled_adap', 'adstm_single_gallery_tiled_adap', 10, 2 );