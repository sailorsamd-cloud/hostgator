<div class="Review_formcont">
    <h5><span class="write_btn"><?php _e( 'Write a Review', 'elgreco' ) ?></span></h5>
    <div class="wrap_review_list">
        <div class="review-form">
            <div id="addReviewDiv">
                <form class="addReviewForm nicelabel" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="Addreviewname" class="form-control" name="Addreview[name]">
                        <label for="Addreviewname">* <?php _e( 'Name', 'elgreco' ) ?></label>
                    </div>
                    <div class="form-group">
                        <input type="email" id="Addreviewemail" class="form-control" name="Addreview[email]">
                        <label for="Addreviewname">* <?php _e( 'Email', 'elgreco' ) ?></label>
                    </div>
                    <div class="form-group">
                        <div class="form-control-select country_list_select"></div>
                    </div>
                    <div class="form-group">
                        <textarea id="textarea" rows="5" class="form-control" name="Addreview[message]"></textarea>
                        <label for="textarea">* <?php _e( 'Message', 'elgreco' ) ?></label>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="stars_set">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                            </div>
                            <input name="Addreview[rating]" type="hidden" value="">
                        </div>
                    </div>
                    <?php $options = new \ads\adsOptions();
                    $args    = $options->get('ads_recaptcha_options');

                    if( cz( 'cm_readonly' ) ){ ?>
                        <div class="form-group conditions-review">
                            <label class="checkbox" for="terms">
                                <input name="terms" value='0' type='hidden'/>
                                <input class="in-conditions-review" id="terms" name="terms" type="checkbox" value="1" />
                                <span <?php _cztxt( 'tp_readonly_read_required_text' ) ?>><?php _cz( 'tp_readonly_read_required_text' ) ?></span>
                            </label>
                            <div class="conditions-help errorcheck">
                                <span <?php _cztxt( 'cm_readonly_notify') ?>><?php _cz( 'cm_readonly_notify') ?></span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group is-not-empty submit-and-attach">
                        <button type="submit" class="btn">
                            <?php _e( 'Submit a Review', 'elgreco' ) ?>
                        </button>
                        <input hidden="hidden" name="action" value="ads_add_user_review">
                        <input hidden="hidden" name="Addreview[post_id]" value="<?php echo get_the_ID();?>">
                        <span class="btn btn-default fileinput-button" data-toggle="tooltip" data-placement="right" title="<?php _e('Attach file(s)', 'elgreco');?>">
                                                    <u class="attach_files"><i class="icon-attach"></i><input id="review-file-upload" type="file" name="review_files[]" multiple=""><label for="review-file-upload"></label></u>
                                                </span>
                    </div>
                    <div class="list-file"></div>
                </form>
                <?php if (ADS_URL){ ?>
                    <script type="text/javascript">
                        addreview_script=[
                            '<?php echo ADS_URL; ?>/assets/front/js/jqueryFileUpload/jquery.ui.widget.js',
                            '<?php echo ADS_URL; ?>/assets/front/js/jqueryFileUpload/jquery.fileupload.min.js',
                            '<?php echo ADS_URL; ?>/assets/front/js/rating-stars/rating.min.js',
                            '<?php echo ADS_URL; ?>/assets/front/js/addReview.min.js',
                        ]
                    </script>
                <?php } ?>
            </div>
        </div>
    </div>
</div>