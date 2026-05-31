<?php

$features = cz( 'features' );
if ( cz('features_enable') ): ?>
    <!-- FEATURES -->
<div class="wrap-features hidden-xs">
    <div class="container">
        <div class="row features">
            <div class="col-xs-15">
                <div class="text-feat">
                    <div class="features-main-text">
				        <?php echo $features['item'][0]['head']; ?>
                    </div>
                    <p><?php echo $features['item'][0]['text']; ?></p>
                </div>
            </div>
            <div class="col-xs-15">
                <div class="text-feat">
                    <div class="features-main-text">
				        <?php echo $features['item'][1]['head']; ?>
                    </div>
                    <p><?php echo $features['item'][1]['text']; ?></p>
                </div>
            </div>
            <div class="col-xs-15">
                <div class="text-feat">
                    <div class="features-main-text">
				        <?php echo $features['item'][2]['head']; ?>
                    </div>
                    <p><?php echo $features['item'][2]['text']; ?></p>
                </div>
            </div>
            <div class="col-xs-15">
                <div class="text-feat end">
                    <div class="features-main-text">
				        <?php echo $features['item'][3]['head']; ?>
                    </div>
                    <p><?php echo $features['item'][3]['text']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>