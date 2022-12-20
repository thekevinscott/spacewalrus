<?php
/**
 * Template Name: Feed Page
 *
 */

$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'numberposts'	   => -1,
	'category'         => '',
	'category_name'    => '',
	'post_type'        => 'post',
	'post_status'      => 'publish',
);

$posts = get_posts( $args ); 

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

function get_json_post($post) {
  /*return $post;*/
  return array(
    "ID" => $post->ID,
    "guid" => $post->guid,
    "content" => $post->post_content,
    "date" => $post->post_date,
  );
}

echo json_encode(array_map('get_json_post', $posts));
