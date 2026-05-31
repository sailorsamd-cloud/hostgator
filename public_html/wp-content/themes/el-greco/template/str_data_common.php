<?php

$str_data = [
    '@context' => "https://schema.org/",
    "@type" => "Organization",
    "name"=> $_SERVER['SERVER_NAME'],
    "url"=> $_SERVER['SERVER_NAME'],
    "logo"=> '"'.cz( 'tp_logo_img' ).'"',
    "contactPoint"=> [
        "@type"=> "ContactPoint",
        "contactType"=> "customer support",
        "email"=> "".cz( 'tp_header_email' ),
        "url"=> $_SERVER['SERVER_NAME'],
    ],
    "sameAs"=> [],
 ];

if (cz('s_link_fb_page')){
    $str_data["sameAs"][] = cz('s_link_fb_page');
}
if (cz('s_link_in_page')){
    $str_data["sameAs"][] = cz('s_link_in_page');
}
if (cz('s_link_tw')){
    $str_data["sameAs"][] = cz('s_link_tw');
}
if (cz('s_link_pt')){
    $str_data["sameAs"][] = cz('s_link_pt');
}
if (cz('s_link_yt')){
    $str_data["sameAs"][] = cz('s_link_yt');
}





$str_search = [
    '@context' => "https://schema.org/",
    "@type" => "WebSite",
    "url"=> $_SERVER['SERVER_NAME'],
    "potentialAction"=> [
        "@type"=> "SearchAction",
        "target"=> $_SERVER['SERVER_NAME']."/?s={s}",
        "query-input"=> 'required name=s',
    ],
];






?>


<script type="application/ld+json">
    <?php echo json_encode($str_data); ?>
</script>

<script type="application/ld+json">
    <?php echo json_encode($str_search); ?>
</script>
