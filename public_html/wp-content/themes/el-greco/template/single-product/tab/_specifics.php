<?php
$product = adsTmpl::product();

if( $product[ 'attrib' ] ) : ?>
    <div class="itemspecscont">
        <?php foreach( $product[ 'attrib' ] as $k => $attr )
        printf(
            '<div class="itemspecs">
                <div class="specL">%s:</div>
                <div class="specR">%s</div>
            </div>',
            $attr[ 'name' ],
            $attr[ 'value' ]
        ); ?>
	</div>
<?php endif; ?>