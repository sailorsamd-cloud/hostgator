<!-- COUNTDOWN -->
<?php if(cz('tp_countdown')): ?>
	<div class="content-countdown hidden-xs">
			<div class="top-plate clearfix">
				<div class="text">
					<?php _e(cz('tp_countdown_text'), 'rap');?>
				</div>
				<div id="clock" data-time="<?php adstm_clock_time(); ?>"></div>
				<div id="clock-template" style="display: none;">
					<div class="clock">
						<div class="item">%D<span><?php _e('D', 'rap');?></span></div>
						<div class="item">%H<span><?php _e('H', 'rap');?></span></div>
						<div class="item">%M<span><?php _e('M', 'rap');?></span></div>
						<div class="item">%S<span><?php _e('S', 'rap');?></span></div>
					</div>
				</div>
			</div>
		</div>
<?php endif; ?>