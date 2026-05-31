<?php

/**
 * User: sunfun
 * Date: 03.09.16
 * Time: 22:44
 */
class adstm_instagram
{

    private $userName;

    public $size = 'thumbnail';

    const ID_WIDGET = 'ADS_WIDGET_INSTAGRAM';
    const TIME_WIDGET = 'ADS_WIDGET_INSTAGRAM_TIME';

    public function __construct($userName)
    {
        if (!empty($userName))
            $this->userName = $userName;
    }


    /**
     * @return array|bool
     */
    public function params()
    {
        $foo = $this->data();

        /* Disable formatting for new instagram widget html */
        if(empty($foo['images'])){
            return $foo;
        }
        foreach ($foo['images'] as $k=>$v){
            $foo['images'][$k] = $this->formatImage($v);
        }

        return $foo;
    }

    private function formatImage($url)
    {
        return \wp_get_attachment_image_url($url['id'], $this->size);
    }

    public function setData($json){

        $NewParams = $this->paramsInst($json);

        $NewParams = $this->loadsImages($NewParams);

        if ($NewParams) {
            $this->setCache($NewParams);
        }

        return $NewParams;
    }

    private function data()
    {
        $params = $this->getCache();
        return $params ? $params : [];

    }

    private function getParams()
    {
        $html = $this->loadIframe();

        return $this->parseParams($html);
    }

    private function getCache()
    {
        return get_option(self::ID_WIDGET);
    }

    private function setCache($params)
    {
        update_option(self::ID_WIDGET, $params, true);
        return set_transient(self::TIME_WIDGET, 1, 12 * HOUR_IN_SECONDS);
    }

    static public function clearCache()
    {
        delete_transient(self::TIME_WIDGET);
        delete_option(self::ID_WIDGET);
    }

    private function paramsInst($json){

        $json['images'] = array_map(function ($i) {
            return sanitize_text_field($i);
        }, $json['images']);

        return [
            'images' => $json['images'],
            'photos' => intval($json['photos']),
            'followers' => intval($json['followers']),
        ];

    }

    private function parseParams($html)
    {



        if (preg_match('/window\._sharedData\s*=\s*(.*)<\/script>/Uiu', $html, $match)) {

            $data = trim(trim($match[1]), ';');

            $json = json_decode($data, true);

            return $this->paramsInst($json);
        }

        return false;
    }

    private function loadIframe()
    {

        $response = wp_remote_get('https://www.instagram.com/'.$this->userName.'/');

        if (is_array($response) && !is_wp_error($response)) {
            return $response['body'];
        }

        return false;
    }

    private function loadsImages(array $NewParams)
    {

        $media = new \ads\adsMedia();
        foreach ($NewParams['images'] as $k=>$v){
            $img= $media->attachmentImage(0, $v);
            $NewParams['images'][$k] = $img;
        }

        return $NewParams;
    }
}

function adstm_instagram_html(){
    $in =  new adstm_instagram('');
    $params = isset($_POST['params']) ? $_POST['params'] : [];
    $NewParams =  $in->setData($params);

    echo json_encode( ['text' => __('Your Instagram images have been updated', 'ami3'), 'NewParams' => $NewParams]);die;
}
add_action( 'wp_ajax_adstm_instagram_html', 'adstm_instagram_html');


/*function replace_unicode_escape_sequence($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}
function unicode_decode($str) {
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $str);
}*/
