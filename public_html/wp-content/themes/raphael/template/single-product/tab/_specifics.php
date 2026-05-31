<?php $product = adsTmpl::product(); ?>
<?php if ( $product['attrib'] ) : ?>
	<h2 class="hidden-xs colored"><?php _e( 'Item Specifics', 'rap' ) ?></h2>
	<div class="wrap-attrib">
		<?php
		foreach ( $product['attrib'] as $k => $attr ) {
			printf(
				'<div class="attrib">
                    <div class="name">%1$s:</div>
                    <div class="value">&nbsp;%2$s</div></div>',
				$attr[ 'name' ],
				$attr[ 'value' ]
			);
		}
		?>
	</div>
<?php endif; ?>