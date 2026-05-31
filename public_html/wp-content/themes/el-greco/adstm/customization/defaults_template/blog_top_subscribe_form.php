<form class="blog-subscribe" method="post" accept-charset="UTF-8">

    <div class="blog-subscribe__input-wrap">
        <label for="blog-subscribe-email" class="blog-subscribe__input-wrap-inner">
            <input id="blog-subscribe-email" type="email" name="email" value=""
                   required="required" class="blog-subscribe__input" placeholder="<?php _e( 'Email Address', 'elgreco' ); ?>">
        </label>
    </div>

    <div class="blog-subscribe__btn-wrap">
        <button class="blog-subscribe__btn" name="submit" type="submit" value="Submit">
            <?php _e( 'Subscribe', 'elgreco' ); ?>
        </button>
    </div>

</form>