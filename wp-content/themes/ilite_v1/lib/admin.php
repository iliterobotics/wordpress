<?php

//Awesome Green Styling
add_action( 'admin_print_styles', 'ilite_add_init' );
function ilite_add_init() {
    if ( is_admin() ) {
        $file_dir=get_bloginfo('template_subtitley');
        wp_enqueue_style("functions", /*$file_dir.*/"/wp-content/themes/ilite/inc/admin.css", false, "1.0", "all");
        //wp_enqueue_script("rm_script", $file_dir."/scripts/fonts.js", false, "1.0");
    }
}
add_action( 'wp_enqueue_scripts', 'ilite_add_init' );

//WordPress Versioning
function change_footer_version() {return 'ILITE WordPress';}
add_filter( 'update_footer', 'change_footer_version', 9999);

//Custom Footer
function remove_footer_admin () {
    ?>Need help? Read the handy-dandy <a href="/docs">documentation!</a> <a href='javascript:(function(){function c(){var e=document.createElement("link");e.setAttribute("type","text/css");e.setAttribute("rel","stylesheet");e.setAttribute("href",f);e.setAttribute("class",l);document.body.appendChild(e)}function h(){var e=document.getElementsByClassName(l);for(var t=0;t<e.length;t++){document.body.removeChild(e[t])}}function p(){var e=document.createElement("div");e.setAttribute("class",a);document.body.appendChild(e);setTimeout(function(){document.body.removeChild(e)},100)}function d(e){return{height:e.offsetHeight,width:e.offsetWidth}}function v(i){var s=d(i);return s.height>e&&s.height<n&&s.width>t&&s.width<r}function m(e){var t=e;var n=0;while(!!t){n+=t.offsetTop;t=t.offsetParent}return n}function g(){var e=document.documentElement;if(!!window.innerWidth){return window.innerHeight}else if(e&&!isNaN(e.clientHeight)){return e.clientHeight}return 0}function y(){if(window.pageYOffset){return window.pageYOffset}return Math.max(document.documentElement.scrollTop,document.body.scrollTop)}function E(e){var t=m(e);return t>=w&&t<=b+w}function S(){var e=document.createElement("audio");e.setAttribute("class",l);e.src=i;e.loop=false;e.addEventListener("canplay",function(){setTimeout(function(){x(k)},500);setTimeout(function(){N();p();for(var e=0;e<O.length;e++){T(O[e])}},15500)},true);e.addEventListener("ended",function(){N();h()},true);e.innerHTML=" <p>If you are reading this, it is because your browser does not support the audio element. We recommend that you get a new browser.</p> <p>";document.body.appendChild(e);e.play()}function x(e){e.className+=" "+s+" "+o}function T(e){e.className+=" "+s+" "+u[Math.floor(Math.random()*u.length)]}function N(){var e=document.getElementsByClassName(s);var t=new RegExp("\\b"+s+"\\b");for(var n=0;n<e.length;){e[n].className=e[n].className.replace(t,"")}}var e=30;var t=30;var n=350;var r=350;var i="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake.mp3";var s="mw-harlem_shake_me";var o="im_first";var u=["im_drunk","im_baked","im_trippin","im_blown"];var a="mw-strobe_light";var f="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake-style.css";var l="mw_added_css";var b=g();var w=y();var C=document.getElementsByTagName("*");var k=null;for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){if(E(A)){k=A;break}}}if(A===null){console.warn("Could not find a node of the right size. Please try a different page.");return}c();S();var O=[];for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){O.push(A)}}})()'>Harlem Shake!</a></p><?php
    }

    add_filter('admin_footer_text', 'remove_footer_admin');

//Page Options
add_action('admin_menu', 'subtitle_hooks');
add_action('save_post', 'save_subtitle');
function subtitle_hooks() {
  add_meta_box('subtitle', 'ILITE Post Settings', 'subtitle_input', 'post', 'normal', 'high');
  add_meta_box('subtitle', 'ILITE Page Settings', 'subtitle_input', 'page', 'normal', 'high');
}
function subtitle_input() {
  global $post;
  echo '<input type="hidden" name="subtitle_noncename" id="subtitle_noncename" value="'.wp_create_nonce('page-subtitle').'" />';
  echo '<b>Subtitle:</b><br><input type="text" name="subtitle" id="subtitle" style="width:100%;padding: 3px 8px;font-size: 1.7em;line-height: 100%;width: 100%;outline: 0;" value="'.get_post_meta($post->ID,'_subtitle',true).'"/>';
}
function save_subtitle($post_id) {
  if (!wp_verify_nonce($_POST['subtitle_noncename'], 'page-subtitle')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $subtitle = $_POST['subtitle'];
  update_post_meta($post_id, '_subtitle', $subtitle);
}

//Rename Pages to News
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add Article';
    $submenu['edit.php'][15][0] = 'Blogs'; // Change name for categories
    $submenu['edit.php'][16][0] = 'Tags'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News';
        $labels->add_new = 'Add Article';
        $labels->add_new_item = 'Add News Article';
        $labels->edit_item = 'Edit News Article';
        $labels->new_item = 'Article';
        $labels->view_item = 'View Article';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'Nothing found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );