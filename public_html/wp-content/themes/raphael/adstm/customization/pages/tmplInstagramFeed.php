<?php
$tmpl = new ads\adsTemplate();

$user_id       = cz('inwidget_user_id');
$client_id     = cz('inwidget_client_id');
$client_secret = cz('inwidget_client_secret');
$access_token  = cz('inwidget_access_token');

$instagram_dev_link = 'https://www.instagram.com/developer/';
$redirect_uri = get_site_url() . '/wp-admin/admin.php?page=czinstagramfeed';
$link_visibility = 'none';

$user_id_label = __( 'User ID', 'rap' ) . '<br>' . __( 'Please, add in valid redirect URLs list your url -', 'rap' ) . '<br>' . $redirect_uri .'<br>' . __( 'Link', 'rap' ) . ' - <a target="_blank" href="' .$instagram_dev_link. '">' . $instagram_dev_link . '</a>';

$tmpl->addItem( 'text', array( 'label' => __( 'Widget title', 'rap' ), 'name' => 's_in_name_group'));
$tmpl->addItem( 'text', array( 'label' => __( 'Fan page link', 'rap' ), 'name' => 's_link_in'));
$tmpl->addItem( 'text', array( 'label' => __( 'Username', 'rap' ), 'name' => 's_in_name_api'));
// Instagram Api fields
$tmpl->addItem( 'text', array( 'label' => $user_id_label, 'name' => 'inwidget_user_id'));
$tmpl->addItem( 'text', array( 'label' => __( 'Client ID', 'rap' ), 'name' => 'inwidget_client_id'));
$tmpl->addItem( 'text', array( 'label' => __( 'Client secret', 'rap' ), 'name' => 'inwidget_client_secret'));
// END Instagram Api fields
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-social-in',$tmpl->renderItems());

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-social-link',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
                $tmpl->renderPanel( array(
                    'panel_title'   => __('Instagram Feed', 'rap'),
                    'panel_class'   => 'success',
                    'panel_help'    => 'https://alidropship.com/?post_type=codex&amp;p=7479',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-in"></div>'
                ) );
				?>

                <?php if( $user_id && $client_id && $client_secret && (!$access_token) ) :
	                $link_visibility = 'block';
                endif; ?>

                <div class="js-instagram-auth-link-wrap" style="display: <?php echo $link_visibility; ?>;">
					<?php

					$auth_url = "https://api.instagram.com/oauth/authorize/?client_id=".$client_id."&redirect_uri=".$redirect_uri."&response_type=code";

					?>
                    <a style="font-size: 16px;" id="instagram-auth-link" href="<?php echo $auth_url; ?>">
						<?php echo __('Authorization', 'rap'); ?>
                    </a>

                    <br>
                    <br>

                </div>

                <script>

	                <?php

	                $obj                  = [];
	                $obj['user_id']       = $user_id;
	                $obj['client_id']     = $client_id;
	                $obj['client_secret'] = $client_secret;

	                $objJSON = json_encode($obj);

	                ?>

                  jQuery('document').ready(function () {

                    var intagramAuthLink = $('#instagram-auth-link');
                    var domain = location.protocol+'//'+location.hostname;
                    var redirectUri = domain + '/wp-admin/admin.php?page=czinstagramfeed';

                    var fieldsKeys = [
                      'user_id',
                      'client_id',
                      'client_secret'
                    ];

                    var newSettings = {
                      'user_id'       : '',
                      'client_id'     : '',
                      'client_secret' : ''
                    };

                    var oldSettings = <?php echo $objJSON;?>;
                    var $document = $(this);
                    var isBootstrap = true;


                    $document.on("request:done", function (event) {

                      if( isBootstrap ) {
                        isBootstrap = false;
                        return false;
                      }

                      getNewInstaSettings( foo );

                      function foo() {

                        var settingsIsSame = compareTwoObjectsByKeys( oldSettings, newSettings, fieldsKeys );

                        console.log('CZ Done');
                        console.log( event['obj'] );

                        console.log( 'New' )
                        console.log( newSettings )

                        console.log( 'Old' )
                        console.log( oldSettings )

                        console.log( 'settingsIsSame' )
                        console.log( settingsIsSame )

                        if( !settingsIsSame ) {

                          if( newSettings['user_id'] && newSettings['client_id'] && newSettings['client_secret'] ) {

                            var authUrl = "https://api.instagram.com/oauth/authorize/?client_id=" + newSettings['client_id'] + "&redirect_uri=" + redirectUri + "&response_type=code";
                            intagramAuthLink.attr( 'href', authUrl );
                            $('html, body').animate({scrollTop: $(document).height()}, 'slow');
                            $('.js-instagram-auth-link-wrap').css({ 'display' : 'block' });

                          } else {

                            $('.js-instagram-auth-link-wrap').css({ 'display' : 'none' });

                          }

                        }

                      }

                    });

                    function compareTwoObjectsByKeys( objOne, objTwo, keysArr ) {

                      for( var i = 0; i < keysArr.length; i++ ) {

                        var key = keysArr[i];

                        if( objOne[key] !== objTwo[key] ) {
                          return false;
                        }

                      }

                      return true;

                    }

                    function getNewInstaSettings( callBack ) {

                      setTimeout(function () {

                        newSettings['user_id']       = $('input#inwidget_user_id').val();
                        newSettings['client_id']     = $('input#inwidget_client_id').val();
                        newSettings['client_secret'] = $('input#inwidget_client_secret').val();

                        callBack();

                      }, 100);

                    }

                  });


                </script>

			</form>

		</div>
	</div>
</div>