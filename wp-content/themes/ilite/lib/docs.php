<?php
//  http://wp.tutsplus.com/tutorials/theme-development/create-a-settings-page-for-your-wordpress-theme/
function setup_theme_admin_menus() {  
    add_menu_page('Documentation Pages', 'Documentation', 'manage_options',   
        'tut_theme_settings', 'theme_docs_page');  
    add_submenu_page('tut_theme_settings',   
        'Getting Started', 'Getting Started', 'manage_options',   
        'welcome', 'theme_docs_welcome');  
    add_submenu_page('tut_theme_settings',   
        'Icon Guide', 'Icon Guide', 'manage_options',   
        'icons', 'theme_docs_icons');    
    add_submenu_page('tut_theme_settings',   
        'CSS-Based Shortcodes', 'Shortcodes', 'manage_options',   
        'css', 'theme_docs_css');     
}  
// We also need to add the handler function for the top level menu  
function theme_docs_page() {  
// wp_enqueue_style('bootstrap',get_bloginfo('wpurl').'/wp-content/themes/ilite/css/bootstrap/bootstrap.min.css',true);
?>
<h1 class="page_header"><?php screen_icon('themes'); ?> Documentation</h2>
<font size="3">
<ul>
    <li><a href="?page=welcome">Getting Started</a></li>
    <li><a href="?page=icons">Icon Guide</a></li>
    <li><a href="?page=css">Shortcodes</a></li>
</ul>
</font>
<?php
}  
function theme_front_page_settings() {  
    echo "Front page";  
}  
function theme_docs_welcome() {?>
<meta http-equiv="REFRESH" content="0;url=https://docs.google.com/document/d/1h9CFtyYowrU9iU3H30XW9rShcHoM-SH0eBajB2PJxhk/edit?usp=sharing">
Go to <a href="https://docs.google.com/document/d/1h9CFtyYowrU9iU3H30XW9rShcHoM-SH0eBajB2PJxhk/edit?usp=sharing">https://docs.google.com/document/d/1h9CFtyYowrU9iU3H30XW9rShcHoM-SH0eBajB2PJxhk/edit?usp=sharing</a>
<?php }
function theme_docs_icons() {?>
<meta http-equiv="REFRESH" content="0;url=http://iliterobotics.org/wp-content/themes/ilite/fonts/fontello.html">
Go to <a href="/wp-content/themes/ilite/fonts/fontello.html">http://iliterobotics.org/wp-content/themes/ilite/fonts/fontello.html</a>
<?php }
function theme_docs_css() {?>
<meta http-equiv="REFRESH" content="0;url=https://docs.google.com/document/d/1h9CFtyYowrU9iU3H30XW9rShcHoM-SH0eBajB2PJxhk/edit?usp=sharing">
Go to <a href="https://docs.google.com/document/d/1h9CFtyYowrU9iU3H30XW9rShcHoM-SH0eBajB2PJxhk/edit?usp=sharing">https://docs.google.com/document/d/1h9CFtyYowrU9iU3H30XW9rShcHoM-SH0eBajB2PJxhk/edit?usp=sharing</a>
<?php }
add_action("admin_menu", "setup_theme_admin_menus");  
/*if (!current_user_can('manage_options')) {  
    wp_die('You do not have sufficient permissions to access this page. Go away.');  
}*/