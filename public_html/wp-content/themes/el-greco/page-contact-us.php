<?php get_header() ?>
<div class="container">
    <div class="breadcrumbs">
		<?php adsTmpl::breadcrumbs() ?>
	</div>
    <div class="contactcont">
        <h1 class="superH1"><?php _e( 'Contact us', 'elgreco' ) ?></h1>
        <p <?php _cztxt('tp_contactUs_text') ?>><?php _cz('tp_contactUs_text') ?></p>
        <div class="contact_email">
            <a class="tiny_border dark_tiny" href="mailto:<?php echo cz( 's_mail' ) ?>" <?php _cztxt( 's_mail' ) ?>><?php _cz( 's_mail' ) ?></a>
        </div>
        <div class="socs whitesocs">
            <?php get_template_part( 'template/social-links-simple' ) ?>
        </div>
        <div class="contactform">
            <form class="nicelabel contact_us_form" method="POST">
                <?php if(isset($_POST['error']) && $_POST['error'] == 'g-recaptcha-response'){?>
                    <div class="form-group error-text-color">
                        <?php _e( 'Check reCAPTCHA', 'elgreco' ) ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="text" id="nameClient" class="form-control" name="nameClient" required="required" value="<?php echo isset($_POST['nameClient']) ? esc_attr($_POST['nameClient']) : '';?>">
                    <label for="nameClient">* <?php _e( 'Name', 'elgreco' ); ?></label>
                </div>
                <div class="form-group">
                    <input type="email" id="email" class="form-control" name="email" required="required" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']): '';?>">
                    <label for="email">* <?php _e( 'Email', 'elgreco' ); ?></label>
                </div>
                <div class="form-group">
                    <textarea id="message" rows="5" class="form-control" name="message" required="required"><?php echo isset($_POST['message']) ? esc_attr($_POST['message']) : '';?></textarea>
                    <label for="message">* <?php _e( 'Message', 'elgreco' ); ?></label>
                </div>
                <?php
                $options = new \ads\adsOptions();
                $args    = $options->get('ads_recaptcha_options');
                if( $args[ 'recaptcha_status' ] == 1 ) : ?>
                    <div class="form-group">
                        <div class="wrap-g-recaptcha clearfix">
                            <div class="g-recaptcha" data-sitekey="<?php echo $args[ 'recaptcha_site_key' ] ?>"></div>
                        </div>
                        <input type="hidden" id="recaptcha" name="recaptcha">
                    </div>
                <?php endif; ?>
                <?php if( cz( 'cm_readonly2' ) ) : ?>

                    <div class="form-group conditions-contact">
                        <label class="checkbox" for="terms">
                            <input name="terms" value='0' type='hidden'/>
                            <input class="in-conditions-contact" id="terms" name="terms" type="checkbox" value="1" />
                            <span <?php _cztxt( 'tp_readonly_read_required_text2' ) ?>><?php _cz( 'tp_readonly_read_required_text2' ) ?></span>
                        </label>
                        <div class="conditions-help errorcheck">
                            <span <?php _cztxt( 'cm_readonly_notify2') ?>><?php _cz( 'cm_readonly_notify2') ?></span>
                        </div>
                    </div>

                <?php endif;?>
                <div class="form-group is-not-empty">
                    <button type="submit" class="btn btn-black"  name="contactSender"><?php _e( 'Send Message', 'elgreco' ) ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>