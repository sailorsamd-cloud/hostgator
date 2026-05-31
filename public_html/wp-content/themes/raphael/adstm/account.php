<?php

/**
 * adstm_account_page
 *
 */
function adstm_account_page()
{
    $form = '';
    $menu = '';
    $menus = models\account\Menu::getItems(
        false,
        array(
            models\account\Menu::ORDERS,
            models\account\Menu::LOGOUT
        )
    );

    if (!class_exists('\models\account\User')) {
        return false;
    }

    if (!class_exists('\models\account\RenderForm')) {
        return false;
    }

    $user = new \models\account\User();
    $accountData = $user->find();
    $menu = \models\account\RenderForm::showNavigation($menus);
    $form = \models\account\RenderForm::showForm($accountData);

    echo $menu . $form;
}

/**
 * adstm_orders_page
 *
 */
function adstm_orders_page($page, $limit)
{
    $orders = '';
    $menu = '';
    $menus = models\account\Menu::getItems(
        models\account\Menu::ORDERS,
        array(
            models\account\Menu::ACCOUNT,
            models\account\Menu::LOGOUT
        )
    );

    if (class_exists('\models\account\RenderForm')) {
        $ordersModel = new \models\account\Orders();
        $ordersData = $ordersModel->find($limit, $page);
        $countOrders = $ordersModel->count();
        $menu = \models\account\RenderForm::showNavigation($menus);
        $orders = \models\account\RenderForm::showOrders(
            $ordersData,
            $countOrders,
            $limit,
            $page
        );
    }

    echo $menu . $orders;
}

/**
 * adstm_login_button
 *
 * @return type
 */
function adstm_login_button()
{
    $loginButton = '';
    if (class_exists('\models\account\RenderForm')) {
        $loginButton = \models\account\RenderForm::showLoginButton();
    }

    return $loginButton;
}

/**
 * adstm_register_form
 *
 * @return string
 */
function adstm_register_form()
{
    $registerForm = '';
    if (class_exists('\models\account\RenderForm')) {
        $registerForm = \models\account\RenderForm::showRegisterForm();
    }

    return $registerForm;
}

/**
 * adstm_login_form
 *
 * @return string
 */
function adstm_login_form()
{
    $loginForm = '';
    if (class_exists('\models\account\RenderForm')) {
        $loginForm = \models\account\RenderForm::showLoginForm();
    }

    return $loginForm;
}

/**
 * adstm_confirmation
 *
 * @return string
 */
function adstm_confirmation()
{
    $confirmation = '';
    if (class_exists('\models\account\RenderForm')) {
        $confirmation = \models\account\RenderForm::confirmBlock();
    }
    return $confirmation;
}

/**
 * my_front_end_login_fail
 *
 * @param type $username
 */
function my_front_end_login_fail($username)
{
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if ( $referrer && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
        wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
        exit;
    }
}

/**
 * failed login
 *
 */
add_action('wp_login_failed', 'my_front_end_login_fail');

/**
 * verify_username_password
 *
 * @param type $user
 * @param type $username
 * @param type $password
 */
function verify_username_password($user, $username, $password)
{
    $result = false;
    $error = new WP_Error();
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;

    if ($referrer) {
        $referrer = esc_url(remove_query_arg('login', $referrer));
        $referrer = esc_url(remove_query_arg('password', $referrer));
        $referrer = esc_url(remove_query_arg('loggedout', $referrer));
        $referrer = esc_url(remove_query_arg('activate', $referrer));
    }

    if ($username == "" && $referrer) {
        $referrer .= "?login=empty";
        $error->add('empty_username', __('<strong>ERROR</strong>: The username field is empty.'));
        $result = true;
    }

    if (!empty($username) && adstm_check_username($username)) {
        $message = 'not_found_username';
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $message = 'not_found_email';
        }
        $referrer .= "?login=" . $message;
        $result = true;
        $error->add(
            'invalid_username',
            __( '<strong>ERROR</strong>: Invalid username.' ) .
			' <a href="' . wp_lostpassword_url() . '">' .
			__( 'Lost your password?' ) .
			'</a>'
        );
    }

    if ($password == "" && $referrer) {
        if ($result) {
            $referrer .= "&password=empty";
        } else {
            $referrer .= "?password=empty";
        }
        $error->add('empty_password', __('<strong>ERROR</strong>: The password field is empty.'));
        $result = true;
    } else {
        if (username_exists($username) || email_exists($username)) {
            $_SESSION['username'] = $username;
            $user = adstm_get_user($username);
            if (!wp_check_password($password, $user->data->user_pass, $user->ID)) {
                $referrer .= "?password=invalid";
                $result = true;
                $error->add(
                    'incorrect_passsword',
                    sprintf(
                        /* translators: %s: user name */
                        __( '<strong>ERROR</strong>: The password you entered for the username %s is incorrect.' ),
                        '<strong>' . $username . '</strong>'
                    ) .
                    ' <a href="' . wp_lostpassword_url() . '">' .
                    __( 'Lost your password?' ) .
                    '</a>'
                );
            }

            if (!empty($user->data->activationKey)) {
                $error->add(
                    'invalid_username',
                    __('<strong>ERROR</strong>: Account is not activated.')
                );
                $referrer .= "?login=notactivate";
                $result = true;
            }
        }
    }

    if ($result) {
        if (strstr($referrer,'wp-login') || strstr($referrer,'wp-admin')) {
            return $error;
        } else {
            $_SESSION['username'] = $username;
            wp_redirect($referrer);
            exit();
        }
    }

    return $user;
}

add_filter('authenticate', 'verify_username_password', 30, 3);

/**
 * adstm_get_user
 *
 * @param string $username
 * @return object
 */
function adstm_get_user($username)
{
    $searchField = 'login';
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $searchField = 'email';
    }

    $user = get_user_by($searchField, $username);
    $user->data->activationKey = get_user_meta($user->data->ID, 'activationKey', true);
    return $user;
}

/**
 * adstm_check_username
 *
 * @param string $username
 * @return boolean
 */
function adstm_check_username($username)
{
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        return !email_exists($username);
    }

    return !username_exists($username);
}

/**
 * add_login_errors
 *
 * @param type $error
 * @return string
 */
function add_login_errors($error)
{
    if (!isset($_GET['login'])) {
        return $error;
    }

    $errors = array(
        'empty'              => __('Invalid username', 'rap'),
        'not_found_username' => __('Username not found', 'rap'),
        'not_found_email'    => __('Email not found', 'rap'),
        'notactivate'        => __('Your account is not activated', 'rap')
    );

    if (!isset($errors[$_GET['login']])) {
        return '';
    }

    return '<span class="help-block">' . $errors[$_GET['login']] . '</span>';
}

add_filter('login_errors', 'add_login_errors');

/**
 * add_password_errors
 *
 * @param type $error
 * @return string
 */
function add_password_errors($error)
{
    if (!isset($_GET['password'])) {
        return $error;
    }

    $errors = array(
        'empty'   => __('Invalid password', 'rap'),
        'invalid' => __('Wrong password', 'rap')
    );

    if (!isset($errors[$_GET['password']])) {
        return '';
    }

    return '<span class="help-block">' . $errors[$_GET['password']] . '</span>';
}

add_filter('password_errors', 'add_password_errors');