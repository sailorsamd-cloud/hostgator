<?php if ( cz('s_in_name_api') ):

    $in = new adstm_instagram(cz('s_in_name_api'));
    $in->size = 'standard';
    $params = $in->params();
    $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
    ?>
    <div class="insta_block">
        <h2 class="big_link"><a target="_blank" href="https://www.instagram.com/<?php echo cz('s_in_name_api'); ?>" <?php _cztxt('s_in_name_group'); ?>><?php echo cz('s_in_name_group'); ?></a></h2>
        <a target="_blank" href="https://www.instagram.com/<?php echo cz('s_in_name_api'); ?>">@<span <?php _cztxt('s_in_name_api'); ?>><?php echo cz('s_in_name_api'); ?></span></a>
        <div class="instas">
            <?php
            $i = 0;
            if( $params[ 'images' ] ) foreach( $params[ 'images' ] as $image ) {

                if( $i < 6 )
                    printf('<a target="_blank" href="%2$s"><span><img %3$s="%1$s" alt=""></span></a>',
                        $image,
                        'https://www.instagram.com/'.cz('s_in_name_api'),
                        $src
                    );
                $i++;
            }

            ?>
        </div>
    </div>

<?php endif; ?>



