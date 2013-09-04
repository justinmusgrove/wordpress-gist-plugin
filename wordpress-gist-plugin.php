<?php
 
/*
Plugin Name: Wordpress Gist Plugin
Plugin URI: https://github.com/justinmusgrove/wordpress-gist-plugin
Description: Embed gist into wordpress
Author: Justin Musgrove
Version: 1.0
*/

wp_embed_register_handler( 'gist', '/https?:\/\/gist\.github\.com\/([a-z]+)\/([0-9]+)(\?file=.*)?/i', 'wp_embed_handler_gist' );
 
function wp_embed_handler_gist( $matches, $attr, $url, $rawattr ) {
 
	$embed = sprintf(
			'<script src="https://gist.github.com/%1$s/%2$s.js%3$s"></script>',
			esc_attr($matches[1]),
			esc_attr($matches[2]),
			esc_attr($matches[3])
			);
 
	return apply_filters( 'embed_gist', $embed, $matches, $attr, $url, $rawattr );
}
 
?>