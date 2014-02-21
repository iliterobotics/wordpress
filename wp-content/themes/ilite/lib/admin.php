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
function change_footer_version() {return 'ILITE WordPress 3.8-pBeta-26';}
add_filter( 'update_footer', 'change_footer_version', 9999);

//Custom Footer
function remove_footer_admin () {
    ?>Need help? Read the handy-dandy <a href="/wp-admin/admin.php?page=tut_theme_settings">documentation!</a><?php
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