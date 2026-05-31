<?php if ( adsTmpl::product('stock' ) != 0 ) : ?>

<div class="input_quantity">
	<div class="name"><?php _e( 'Quantity', 'rap' ); ?>:</div>
	<div class="value">
		<div class="select_quantity js-select_quantity">
			<button type="button" class="select_quantity__btn js-quantity_remove">-</button>
			<?php do_action('adstm_single_quantity'); ?>

			<button type="button" class="select_quantity__btn js-quantity_add">+</button>
		</div>
	</div>
</div>

<?php endif; ?>