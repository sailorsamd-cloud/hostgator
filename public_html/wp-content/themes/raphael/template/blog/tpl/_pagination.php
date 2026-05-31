<div class="blog-pagination js-blog-pagination">

    <div class="blog-pagination__prev-btn js-blog-pagination__prev-btn">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <?php _e( 'Previous', 'rap' ) ?>
    </div>

    <div class="blog-pagination__links js-blog-pagination__links">
        <?php  do_action('adstm_paging_nav'); ?>
    </div>

    <div class="blog-pagination__next-btn js-blog-pagination__next-btn">
        <?php _e( 'Next', 'rap' ) ?>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </div>

</div>