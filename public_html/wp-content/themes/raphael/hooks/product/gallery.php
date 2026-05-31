<?php
function adstm_single_gallery( $items = array(), $video=[]) {

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
    <div class="slider-box-tt hidden-xs">
        <div class="single_showroom">
            <?php do_action('single_showroom_before_img'); ?>
            <div class="item_slider">
                <?php

                $video_except='';
                foreach( $video as $k => $video_item ) {
                    $video_except=$video_item[ 'img' ];
                    if($video_item[ 'url' ]){
                        ?>
                        <div class="item item_video">
                            <video disablePictureInPicture width="100%" height="100%" poster="<?php
                            echo ads_get_size_img($video_item['img'], 'ads-big'); ?>"
                                   controlslist="nodownload nofullscreen" src="<?php
                            echo $video_item['url'] ?>"></video>
                            <div class="play_video_showroom"></div>
                        </div>
                        <?php
                    }
                }

                foreach ( $items as $k => $item ) {
                    if(isset($item['id'])){
                        $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                        $image_title = get_the_title($item['id']);
                    }else{
                        $image_alt = false;
                        $image_title = false;
                    }
                    if($item[ 'full' ]!=$video_except) {
                        printf(
                            '<div><div class="item_sqr"><a data-lity href="%3$s" ><img %5$s="%1$s?1000" class="img-responsive" alt="%2$s" %4$s></a></div></div>',
                            ads_get_size_img( $item[ 'full' ], 'ads-large' ),
                            $image_alt ? $image_alt : '',
                            $item['full'],
                            $image_title ? 'title="' . $image_title . '"' : '',
                            $src
                        );
                    }
                }
                ?>
            </div>
        </div>

        <div class="item_slider_minis">
            <?php

            $video_except='';
            foreach( $video as $k => $video_item ) {
                $video_except=$video_item[ 'img' ];
                if($video_item[ 'url' ]){
                    printf(
                        '<div class="item"><div class="itembgr_video"><img %4$s="%3$s" alt=""></div></div>',
                        $video_item[ 'img' ],
                        $video_item[ 'url' ],
                        ads_get_size_img( $video_item[ 'img' ], 'ads-medium' ),
                        $src
                    );
                }

            }

            foreach ( $items as $k => $item ) {
                if(isset($item['id'])){
                    $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                    $image_title = get_the_title($item['id']);
                }else{
                    $image_alt = false;
                    $image_title = false;
                }
                if($item[ 'full' ]!=$video_except) {
                    printf(
                        '<div class="item"><div class="item_sqr"><img %5$s="%1$s?1000" class="img-responsive" alt="%2$s" %4$s></div></div>',
                        $item['ads-medium'],
                        $image_alt ? $image_alt : '',
                        $item['full'],
                        $image_title ? 'title="' . $image_title . '"' : '',
                        $src
                    );
                }
            }
            ?>
        </div>
    </div>
    <div class="itemadapslider">
        <?php do_action('single_showroom_before_img'); ?>
        <div class="itemadapslider_gallery">

                <?php
                $video_except='';
                foreach( $video as $k => $video_item ) {
                    $video_except=$video_item[ 'img' ];
                    if($video_item[ 'url' ]){
                        ?>
                        <div class="item">
                            <div class="itembgr itembgr_video_adap">
                                <video disablePictureInPicture width="100%" height="100%" poster="<?php
                                echo ads_get_size_img($video_item['img'], 'ads-big'); ?>"
                                       controlslist="nodownload nofullscreen" src="<?php
                                echo $video_item['url'] ?>"></video>
                                <div class="play_video_showroom"></div>
                            </div>
                        </div>
                        <?php
                    }

                }

                foreach( $items as $k => $item ) {
                    if(isset($item['id'])){
                        $image_alt = get_post_meta($item['id'], '_wp_attachment_image_alt', TRUE);
                        $image_title = get_the_title($item['id']);
                    }else{
                        $image_alt = false;
                        $image_title = false;
                    }
                    if($item[ 'full' ]!=$video_except) {
                        printf(
                            '<div class="item"><div class="item_sqr"><img %4$s="%1$s?1000" class="img-responsive" alt="%2$s" %3$s /></div></div>',
                            ads_get_size_img( $item[ 'full' ], 'ads-large' ),
                            $image_alt ? $image_alt : '',
                            $image_title ? 'title="' . $image_title . '"' : '',
                            $src
                        );
                    }
                }
                ?>
        </div>
    </div>
	<?php
}


add_action('adstm_single_gallery', 'adstm_single_gallery', 10 ,2);
