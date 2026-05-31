<div class="blog-search">

    <form role="search" method="GET" class="blog-search__form" action="<?php echo home_url( '/' ); ?>">

        <input type="text" name="s" class="blog-search__input js-blog-search-input" value="<?php echo get_search_query() ?>" placeholder="<?php _e( 'Search posts', 'rap' ) ?>" />
        <button class="blog-search__btn" type="submit"><i class="fa fa-search"></i></button>
        <span class="clear"></span>
        <input type="hidden" name="target" value="post" />
        <input type="hidden" name="post_type" value="post" />
    </form>

</div>