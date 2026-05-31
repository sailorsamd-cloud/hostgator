<?php
$s_link_fb_page = cz('s_link_fb_page');
$s_link_in_page = cz('s_link_in_page');
$s_link_tw = cz('s_link_tw');
$s_link_pt = cz('s_link_pt');
$s_link_yt = cz('s_link_yt');

$res_liks_count=0;
$res_liks = '';
if($s_link_fb_page){
    $res_liks.= '<div><a href="'.$s_link_fb_page.'" target="_blank" rel="nofollow"><i class="icon-facebook"></i></a></div>';
    $res_liks_count++;
}
if($s_link_in_page){
    $res_liks.= '<div><a href="'.$s_link_in_page.'" target="_blank" rel="nofollow"><i class="icon-instagram"></i></a></div>';
    $res_liks_count++;
}
if($s_link_tw){
    $res_liks.= '<div><a href="'.$s_link_tw.'" target="_blank" rel="nofollow"><i class="icon-the-x"></i></a></div>';
    $res_liks_count++;
}
if($s_link_pt){
    $res_liks.= '<div><a href="'.$s_link_pt.'" target="_blank" rel="nofollow"><i class="icon-pinterest"></i></a></div>';
    $res_liks_count++;
}
if($s_link_yt){
    $res_liks.= '<div><a href="'.$s_link_yt.'" target="_blank" rel="nofollow"><i class="icon-youtube"></i></a></div>';
    $res_liks_count++;
}

?>


<div class="fonecont socs <?php if($res_liks_count==1){echo 'socs_solo';} ?>">
    <?php echo $res_liks; ?>
</div>


