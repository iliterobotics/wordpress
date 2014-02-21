<?php
/*
Plugin Name: Apple Color Emoji (BETA)
Plugin URI: http://victorlourng.com
Description: Enables color emoticons found in Apple Devices!
Version: 0.0.1
Author: LabLayers
Author URI: http://victorlourng.com
License: GPLv2
*/

// [emoji type="" size=""]
function emoji_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "type" => 'smile',
     "size" => '18',
  ), $atts));
return '<img src="'.plugins_url( 'emojis/' , __FILE__ ).''.$type.'.png" width="'.$size.'" height="'.$size.'"/>';
}
add_shortcode("emoji", "emoji_function");

/* settings link in plugin management screen */
function emoji_settings_link($actions, $file) {
if(false !== strpos($file, 'apple-color-emoji'))
 $actions['settings'] = '<a href="'.plugins_url( 'codes.html' , __FILE__ ).'">Cheat Sheet</a>';
return $actions; 
}
add_filter('plugin_action_links', 'emoji_settings_link', 2, 2);