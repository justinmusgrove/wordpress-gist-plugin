<?php
 
/*
Plugin Name: gist embed
Plugin URI: http://tba
Description: gist
Author: Justin Musgrove
Version: 1.0
*/

/**
 * Usage:
 * Paste a gist link into a blog post or page and it will be embedded eg:
 * https://gist.github.com/diije/5805069
 *
 * If a gist has multiple files you can select one using a url in the following format:
 * https://gist.github.com/diije/5805069?file=embed-gist.php
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