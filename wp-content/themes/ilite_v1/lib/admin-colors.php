<?php
//wp_admin_css_color( $key, $name, $url, $colors );

/*function debug_admin_color_scheme() {
    $plugin_url = get_option('siteurl') . '/wp-content/themes/ilite' ;
    wp_admin_css_color(
        'zen',
         __('Simple Zen'),
        $plugin_url . '/inc/admin-zen.css',
        array('#000','#fff','#000','#fff')
    );
}
add_action('admin_init','debug_admin_color_scheme');

function bootstrap_admin_color_scheme() {
    $plugin_url = get_option('siteurl') . '/wp-content/themes/ilite' ;
    wp_admin_css_color(
        'bootstrap',
         __('Bootstrap (BETA)'),
        $plugin_url . '/inc/bootstrap/css/admin.css',
        array('#b94a48','#3a87ad','#c09853','#468847')
    );
 wp_enqueue_script('bs_main',get_bloginfo('wpurl').'/wp-content/themes/ilite/inc/bootstrap/js/bootstrap.min.js',false);

 */
//wp_enqueue_script('bs_application',get_bloginfo('wpurl').'/wp-content/themes/ilite/inc/bootstrap/js/script.js',false);
/*
}
add_action('admin_init','bootstrap_admin_color_scheme');
*/
//wp_enqueue_script('bs_icons',get_bloginfo('wpurl').'/wp-content/themes/ilite/inc/bootstrap/assets/js/icon32.js',false);
//wp_enqueue_style('bs_fontawesome',get_bloginfo('wpurl').'/wp-content/themes/ilite/inc/bootstrap/font/font-awesome.css',false);
//wp_enqueue_style('bs_style',get_bloginfo('wpurl').'/wp-content/themes/ilite/inc/bootstrap/css/admin.css',false);

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