<?php
$in = new adstm_instagram(cz('s_in_name_api'));
$in->size = 'low';
$params = $in->params();
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
if($params['images'])foreach ($params['images'] as $image) {
    printf('<div class="">
    <a target="_blank" href="%2$s">
        <div class="medias-box">
            <div class="thumb-box">
                <div class="thumb-wrap">
                    <img %3$s="%1$s" alt="">
                </div> 
            </div>
        </div>
    </a>
</div>',
        $image,
        'https://www.instagram.com/'.cz('s_in_name_api'),
        $src
    );
}