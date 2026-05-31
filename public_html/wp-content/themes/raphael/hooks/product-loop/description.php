<?php

add_action('adstm_category_description', function (){
	$queried_object = get_queried_object();
	if(isset($queried_object->description) && $queried_object->description ){
		echo $queried_object->description;
	}
});

