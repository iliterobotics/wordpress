<?php
/*
 * Homepage Slideshow
 */

add_action( 'init', 'create_slideshow' );
function create_slideshow() {
    register_post_type( 'slideshow',
        array(
            'labels' => array(
                'name' => 'Slideshow',
                'singular_name' => 'Slide',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Slide',
                'edit' => 'Edit',
                'edit_item' => 'Edit Slide',
                'new_item' => 'New Slide',
                'view' => 'View',
                'view_item' => 'View Slide',
                'search_items' => 'Search Slices',
                'not_found' => 'No Slides found',
                'not_found_in_trash' => 'No Slides found in Trash',
                'parent' => 'Stacked Slide (Slideshow Inside A Slideshow!)'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', /*'comments',*/ 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
}
add_action( 'admin_init', 'my_admin' );
function my_admin() {
    add_meta_box( 'slideshow_meta_box',
        'Slide Details',
        'display_slideshow_meta_box',
        'slideshow', 'normal', 'high'
    );
}
function display_slideshow_meta_box( $slideshow ) {
    // Retrieve current name of the Director and slideshow Rating based on review ID
    $slideshow_director = esc_html( get_post_meta( $slidweshow->ID, 'slideshow_director', true ) );
    $slideshow_rating = intval( get_post_meta( $slideshow->ID, 'slideshow_rating', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Button Text</td>
            <td><input type="text" size="80" name="slideshow_btn_text" value="<?php echo $slideshow_btn_text; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Button Link</td>
            <td><input type="text" size="80" name="slideshow_btn_link" value="<?php echo $slideshow_btn_link; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Button Color</td>
            <td>
                <select style="width: 100px" name="slideshow_btn_color">
                <option value="5">green</option><option value="4">orange</option><option value="3">blue</option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}
?><?php
add_action( 'save_post', 'add_slideshow_fields', 10, 2 );
function add_slideshow_fields( $slideshow_id, $slideshow ) {
    // Check post type for slideshow reviews
    if ( $slideshow->post_type == 'slideshows' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['slideshow_btn_text'] ) && $_POST['slideshow_btn_text'] != '' ) {
            update_post_meta( $slideshow_id, 'Button Text', $_POST['slideshow_btn_text'] );
        }
        if ( isset( $_POST['slideshow_btn_link'] ) && $_POST['slideshow_btn_link'] != '' ) {
            update_post_meta( $slideshow_id, 'Buttion Link', $_POST['slideshow_btn_link'] );
        }
        if ( isset( $_POST['slideshow_btn_color'] ) && $_POST['slideshow_btn_color'] != '' ) {
            update_post_meta( $slideshow_id, 'mButton Color', $_POST['slideshow_btn_color'] );
        }
    }
}
//add_filter( 'template_include', 'include_template_function', 1 );