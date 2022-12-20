<?php

if ( function_exists('register_sidebar') )
    register_sidebar();

include(dirname(__FILE__).'/themetoolkit.php');

themetoolkit(
	'almostspring',
	array(    
	'sidebar' => 'Sidebar Location {radio|left|Left|right|Right}',
	),
	__FILE__
);
	
function almostspring_sidebar() {
	global $almostspring;
	if ($almostspring->option['sidebar'] == "left") { 
	  echo '#content { float: right; margin: 0 20px 0 0; }
			#sidebar { float: right; }';
	} 
}

if (!$almostspring->is_installed()) { 
	$set_defaults['sidebar'] = 'right'; 
	$result = $almostspring->store_options($set_defaults); 
} 

/*
add_action( 'rest_api_init', function () {
	register_rest_route( 'json_feed', '', array(
		'methods' => 'GET',
		'callback' => 'get_json_posts',
	) );
} );

function get_json_posts( $data ) {
	$posts = get_posts( array(
		'author' => $data['id'],
	) );

	if ( empty( $posts ) ) {
		return null;
	}

	return $posts[0]->post_title;
}

*/
?>
