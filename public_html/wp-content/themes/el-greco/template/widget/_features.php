<?php

$features = cz( 'features' );

$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';

if ( cz('features_enable') ): ?>
    <!-- FEATURES -->
    <div class="wrap-features">
        <div class="container">
            <div class="features">
                <?php
                foreach ($features['item'] as $key => $val){
                    if($val['img'] || $val['head'] || $val['text']){ ?>
                        <div>
                            <?php if(isset($val['img']) && $val['img']){ ?>
                                <div class="img-feat">
                                    <img <?php _czsrc('features_item_img_key'.$key); ?> <?php echo $src; ?>="<?php echo $val['img']; ?>" alt="">
                                </div>
                            <?php } ?>
                            <div class="text-feat">
                                <div class="features-main-text" <?php _cztxt('features[item]['.$key.'][head]'); ?>>
                                    <?php echo $val['head']; ?>
                                </div>
                                <p <?php _cztxt('features[item]['.$key.'][text]'); ?>><?php echo $val['text']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
<?php endif; ?>