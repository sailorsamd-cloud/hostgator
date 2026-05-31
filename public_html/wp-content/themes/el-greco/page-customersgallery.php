<?php

/**
 * Description of confirmation
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> Dec 15, 2016 4:09:15 PM
 */
?>

<?php get_header();?>

<div class="page-content">
    <div class="container">
        <div class="text-center" style="padding-top: 20px;">
            <?php do_action('adsgal_clientgallery_title');?>
        </div>
        <div class="row page-confirmation">
            <?php do_action('adsgal_clientgallery');?>
        </div>
    </div>
</div>

<?php get_footer();?>