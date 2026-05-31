<?php

global $ADSTM;

$product = $ADSTM[ 'product' ];
$review  = $ADSTM[ 'review' ];
$info    = $ADSTM[ 'info' ];

$terms = wp_get_post_terms( $post->ID, 'product_cat' );
$itemmeta = [];
$itemmeta['name'] = get_the_title();

$this_url = get_permalink();

$itemmeta['image'] = '';
if(isset($product[ 'gallery' ][0]['full'])){
    $itemmeta['image'] = $product[ 'gallery' ][0]['full'];
}

//$itemmeta['description'] = get_the_excerpt();

$seo_desc = $info->getSeo();
$itemmeta['description'] = $seo_desc['seo_description'];

$itemmeta['mpn'] = $product['post_id'];

$itemmeta['category'] = '';
if(isset($terms[0])){
    $itemmeta['category'] = $terms[0]->name;
}

$itemmeta['sku'] = '1';
if(isset($product['skuAttr']) && is_array($product['skuAttr'])){
    $itemmeta['sku'] = isset($_REQUEST['sku']) ? $_REQUEST['sku'] : current(array_keys($product['skuAttr']));
}

$str_data = [];
$str_data['@context'] = "https://schema.org/";
$str_data['@type'] = "Product";
$str_data['name'] = $itemmeta['name'];
$str_data['image'] = $itemmeta['image'];
$str_data['description'] = $itemmeta['description'];
$str_data['sku'] = $itemmeta['sku'];
$str_data['category'] = $itemmeta['category'];
$str_data['mpn'] = $itemmeta['mpn'];
$str_data['brand'] = [
    "@type" => "Organization",
    "name" => $_SERVER['SERVER_NAME']
];

if(is_array($review->comments) && !empty($review->comments)) {
    $str_data['review'] = [];

    foreach( $review->comments as $k => $attr ){
        if($attr->star>0){
            $str_data['review'][] = [
                "@type" => "Review",
                "reviewRating" => [
                    "@type" => "Rating",
                    "ratingValue" => $attr->star,
                    "bestRating" => "5"
                ],
                "author" => [
                    "@type" => "Person",
                    "name" => $attr->comment_author
                ],
                "reviewBody" => $attr->comment_content,
            ];
        }
    }

    $averStar = $review->averageStar();
    $countfeed = $review->countFeedback();
    if($averStar && $countfeed){
        $str_data['aggregateRating'] = [
            "@type" => "AggregateRating",
            "ratingValue" => $averStar,
            "reviewCount" => $countfeed
        ];
    }
}

if(is_array($product['skuAttr'])) {
    $str_data['offers'] = [];
    foreach ($product['skuAttr'] as $k => $attr) {

        $str_data['offers'][] = [
            "@type" => "Offer",
            "url" => $this_url . '?sku=' . $k,
            "priceCurrency" => $product['currency'],
            "price" => $attr['_salePrice_nc'],
            "priceValidUntil" => date('Y-m-d',
                strToTime('today + 30 days')
            ),
            "name" => $itemmeta['name'],
            "availability" => $attr['isActivity'] ? "https://schema.org/InStock" : "https://schema.org/OutOfStock",
            "itemCondition" => "https://schema.org/NewCondition"
        ];
    }
}else{
    $str_data['offers'] = [
        "@type" => "Offer",
        "url" => $this_url,
        "priceCurrency" => $product['currency'],
        "price" => $product['_salePrice_nc'],
        "priceValidUntil" => date('Y-m-d',
            strToTime('today + 30 days')
        ),
        "name" => $itemmeta['name'],
        "availability" => $product['stock']>0 ? "https://schema.org/InStock" : "https://schema.org/OutOfStock",
        "itemCondition" => "https://schema.org/NewCondition"
    ];
}


$str_keywords = [
    '@context' => "https://schema.org/",
    "@type" => "CreativeWork",
    "keywords"=> $seo_desc['seo_keywords'],
];
?>

<script type="application/ld+json">
    <?php echo json_encode($str_data); ?>
</script>

<script type="application/ld+json">
    <?php echo json_encode($str_keywords); ?>
</script>
