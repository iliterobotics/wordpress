<?php

function green_admin_color_scheme() {
    $plugin_url = get_option('siteurl') . '/wp-content/themes/ilite' ;
    wp_admin_css_color(
        'green',
         __('ILITE Green'),
        $plugin_url . '/inc/admin-green.css',
        array('#204616','#326d22','#43942d','#69219b')
    );
}
add_action('admin_init','green_admin_color_scheme');

function purple_admin_color_scheme() {
    $plugin_url = get_option('siteurl') . '/wp-content/themes/ilite' ;
    wp_admin_css_color(
        'purple',
         __('ILITE Purple'),
        $plugin_url . '/inc/admin-purple.css',
        array('#69219b','#635b79','#bab6c7','#43942d')
    );
}
add_action('admin_init','purple_admin_color_scheme');

// Force Green Color Scheme
//add_filter('get_user_option_admin_color','change_admin_color');
//function change_admin_color($result) {
//    return 'green';
//}
// Change Default Admin Color Scheme
//function change_admin_default_color_scheme() {
//wp_admin_css_color('fresh', __('Blue'), admin_url(&quot;css/colors-classic.css&quot;), array('#073447', '#21759B', '#EAF3FA', '#BBD8E7'));
//wp_admin_css_color('classic', __('Gray'), admin_url(&quot;css/colors-fresh.css&quot;), array('#464646', '#6D6D6D', '#F1F1F1', '#DFDFDF'));
//}
//add_action('admin_init', 'change_admin_default_color_scheme');