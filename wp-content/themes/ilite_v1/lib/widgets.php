<?php

function ilite_widgets_init() {
  // Register widgetized areas
  register_sidebar(array(
    'name'          => __('Primary Sidebar', 'ilite'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Sponsors Widget Area', 'ilite'),
    'id'            => 'sidebar-sponsors',
    'before_widget' => '<div style="text-align:center">',
    'after_widget'  => '</div>',
    'before_title'  => '<div style="display:none">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Text', 'ilite'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Homepage Video', 'ilite'),
    'id'            => 'sidebar-stream',
    'before_widget' => '<section id="%1$s" class="widget %2$s" style="text-align:center!important;margin-top:-20px!important;">',
    'after_widget'  => '</section>',
    'before_title'  => '<span style="display:none">',
    'after_title'   => '</span>',
  ));

  register_sidebar(array(
    'name'          => __('Homepage Content', 'ilite'),
    'id'            => 'sidebar-home-content',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<b>',
    'after_title'   => '</b>',
  ));

  register_sidebar(array(
    'name'          => __('Homepage Left', 'ilite'),
    'id'            => 'sidebar-home-left',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<b>',
    'after_title'   => '</b>',
  ));

  register_sidebar(array(
    'name'          => __('Homepage Right', 'ilite'),
    'id'            => 'sidebar-home-right',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<b>',
    'after_title'   => '</b>',
  ));

  register_sidebar(array(
    'name'          => __('Featured Slide', 'ilite'),
    'id'            => 'sidebar-slide',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<div style="display:none">',
    'after_title'   => '</div>',
  ));

  // Register widgets
  register_widget('ilite_Vcard_Widget');
}
add_action('widgets_init', 'ilite_widgets_init');

// Example vCard widget
class ilite_Vcard_Widget extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'locality'       => 'City/Locality',
    'region'         => 'State/Region',
    'postal_code'    => 'Zipcode/Postal Code',
    'tel'            => 'Telephone',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_ilite_vcard', 'description' => __('Use this widget to add a vCard', 'ilite'));

    $this->WP_Widget('widget_ilite_vcard', __('ilite: vCard', 'ilite'), $widget_ops);
    $this->alt_option_name = 'widget_ilite_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_ilite_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'ilite') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <p class="vcard">
      <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
      <span class="adr">
        <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
        <span class="locality"><?php echo $instance['locality']; ?></span>,
        <span class="region"><?php echo $instance['region']; ?></span>
        <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
      </span>
      <span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
      <a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
    </p>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_ilite_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_ilite_vcard'])) {
      delete_option('widget_ilite_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_ilite_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'ilite'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}
