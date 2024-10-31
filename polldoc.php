<?php
/**
 * @package Polldoc
 * @version 1.0
 */
/*
Plugin Name: Polldoc
Plugin URI:
Description:
Author: Djane Rey Mabelin
Version: 1.0
Author URI: http://djaney.com/
*/


add_action('add_meta_boxes','polldoc_meta_boxes');
add_action('init','polldoc_init');

function polldoc_meta_boxes(){
	add_meta_box( 'polldocbox', 'Polldoc', 'polldoc_box', 'post' );
	add_meta_box( 'polldocbox_page', 'Polldoc', 'polldoc_box', 'page' );
}


function polldoc_box(){
echo '<iframe style="border:none;width:100%;height:1000px;" src="http://www.polldoc.com/wordpress" frameborder="0" scrolling="yes" align="top"></iframe>';
}

function polldoc_shortcode( $atts ){
	
	$html = '<iframe style="border: none;width:'.$atts['width'].'px;height:'.$atts['height'].'px;" src="http://www.polldoc.com/widget/'.$atts['type'].'/'.$atts['id'].'?body='.$atts['body'].'&name='.$atts['name'].'&vote='.$atts['vote'].'&bar='.$atts['bar'].'" frameborder="0" scrolling="no" align="top"></iframe>';

	return $html;
}
function polldoc_init(){
	add_shortcode( 'polldoc', 'polldoc_shortcode' );
}