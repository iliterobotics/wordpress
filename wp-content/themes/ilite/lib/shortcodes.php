<?php
// Enabling Filters
add_filter('widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');
add_filter( 'comment_text', 'do_shortcode' );
// [icon type=""]
function icon_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "type" => 'none',
   ), $atts));
   return '<i class="icon icon-'.$type.'"></i>';
}
add_shortcode('icon', 'icon_function');
// [emo type=""]
function emo_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "type" => 'none',
   ), $atts));
   return '<i class="icon icon-emo-'.$type.'"></i>';
}
add_shortcode('emo', 'emo_function');
// [gist id="ID" file="FILE"]
function gist_shortcode($atts) {
  return sprintf(
    '<script src="https://gist.github.com/%s.js%s"></script>', 
    $atts['id'], 
    $atts['file'] ? '?file=' . $atts['file'] : ''
  );
} add_shortcode('gist','gist_shortcode');
// Autoreplace gist links to shortcodes
function gist_shortcode_filter($content) {
  return preg_replace('/https:\/\/gist.github.com\/([\d]+)[\.js\?]*[\#]*file[=|_]+([\w\.]+)(?![^<]*<\/a>)/i', '[gist id="${1}" file="${2}"]', $content );
} add_filter( 'the_content', 'gist_shortcode_filter', 9);
// Bootstrap Affix
function affix_function($atts, $content = null) {
   return '<div data-spy="affix" data-offset-top="500">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("affix", "affix_function");
// Lead Font Size
function lead_function($atts, $content = null) {
   return '<p class="lead">' . do_shortcode( $content ) . '</p>';
}
add_shortcode("lead", "lead_function");
add_shortcode("flead", "lead_function");
// Featurette
function featurette_function($atts, $content = null) {
   return '<div class="featurette">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("f", "featurette_function");
add_shortcode("featurette", "featurette_function");
// Featurette Heading
function featurette_h2_function($atts, $content = null) {
   return '<h2 class="featurette-heading">' . do_shortcode( $content ) . '</h2>';
}
add_shortcode("fh2", "featurette_h2_function");
add_shortcode("featurette_h2", "featurette_h2_function");
// Muted Text
function muted_function($atts, $content = null) {
   return '<span  class="muted">' . do_shortcode( $content ) . '</span>';
}
add_shortcode("muted", "muted_function");
// Title Box
function titlebox_function($atts, $content = null) {
   return '<div class="hero-unit hero-title">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("titlebox", "titlebox_function");
// Purple Box
function purplebox_function($atts, $content = null) {
   return '<div class="hero-unit hero-purple">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("purplebox", "purplebox_function");
// Black Box
function blackbox_function($atts, $content = null) {
   return '<div class="lightroom">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("blackbox", "blackbox_function");
add_shortcode("lightroom", "blackbox_function");
// Content Box
function contentbox_function($atts, $content = null) {
   return '<div class="content-block content-text block-white">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("content", "contentbox_function");
add_shortcode("contentbox", "contentbox_function");
// Shaded Box
function shadedbox_function($atts, $content = null) {
   return '<div class="content-block content-text block-shaded">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("shadedbox", "shadedbox_function");
// Purple Box 2
function purplebox2_function($atts, $content = null) {
   return '<div class="block block-purple block-fill">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("purplebox2", "purplebox2_function");
// Long Button
function longbutton_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "type" => 'green',
      "size" => 'large',
      "link" => ''
   ), $atts));
return '<a href="'.$link.'" target="_blank" class="btn btn-long-link btn-'.$type.' btn-'.$size.'">' . do_shortcode( $content ) . '</a>';
}
add_shortcode("longbutton", "longbutton_function");
// Section
function section_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "id" => '',
      "style" => ''
   ), $atts));
return '<section id="'.$id.'" style="'.$style.'">' . do_shortcode( $content ) . '</section>';
}
add_shortcode("section", "section_function");
// Sitemap
function wp_sitemap_page(){
    return "<ul>".wp_list_pages('title_li=&echo=0')."</ul>";
}
add_shortcode('sitemap', 'wp_sitemap_page');
// [teaminfo]
function teaminfo_function(){
 return '<div><h3>Team Info</h3>
<b>Team Number:</b> 1885<br>
<b>Team Name:</b> ILITE Robotics<br>
<b>Team Motto:</b> Inspiring Leaders in Technology and Engineering<br>
<b>Rookie Year:</b> 2005<br>
<b>Location:</b> Haymarket, VA<br>
<b>Quick Overview:</b> True personal satisfaction in life is achieved when you give to others.<br>
 </div>';
 }
add_shortcode("teaminfo", "teaminfo_function");
// [quotation]
function quotation_function(){
 return '<div class="quotation">&#10077;</div>';
 }
 add_shortcode("quotation", "quotation_function");
// [br]
function br_function(){
 return '<br/>';
 }
 add_shortcode("br", "br_function");
// [p class="" id=""]content[/p]
function p_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "class" => '',
     "id" => '',
     "style" => '',
  ), $atts));
return '<p class="'.$class.'" id="'.$id.'" style="'.$style.'">' . do_shortcode( $content ) . '</p>';
}
 add_shortcode("p", "p_function");
// [pagehead subtitle=""]content[/pagehead]
function pagehead_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "subtitle" => '',
  ), $atts));
return '<h1 class="page-header">' . do_shortcode( $content ) . ' <small>'.$subtitle.'</small></h1>';
}
 add_shortcode("pagehead", "pagehead_function");
// [div class="" id=""]content[/div]
function div_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "class" => '',
     "id" => '',
  ), $atts));
return '<div class="'.$class.'" id="'.$id.'">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("div", "div_function");
// [a href="" target="" class="" id=""]content[/a]
function alink_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "href" => '',
     "target" => '',
     "class" => '',
     "id" => '',
  ), $atts));
return '<a href="'.$target.'" target="'.$target.'" class="'.$class.'" id="'.$id.'">' . do_shortcode( $content ) . '</a>';
}
add_shortcode("a", "alink_function");
add_shortcode("alink", "alink_function");
// [span class="" id=""]content[/span]
function span_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "class" => '',
     "id" => '',
  ), $atts));
return '<span class="'.$class.'" id="'.$id.'">' . do_shortcode( $content ) . '</span>';
}
add_shortcode("span", "span_function");
// [ul class="" id=""]content[/ul]
function ul_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "class" => '',
     "id" => '',
  ), $atts));
return '<ul class="'.$class.'" id="'.$id.'">' . do_shortcode( $content ) . '</ul>';
}
add_shortcode("ul", "ul_function");
// [ol class="" id=""]content[/ol]
function ol_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "class" => '',
     "id" => '',
  ), $atts));
return '<ol class="'.$class.'" id="'.$id.'">' . do_shortcode( $content ) . '</ol>';
}
add_shortcode("ol", "ol_function");
// [li class="" id=""]content[/li]
function li_function($atts, $content = null) {
  extract(shortcode_atts(array(
     "class" => '',
     "id" => '',
  ), $atts));
return '<li class="'.$class.'" id="'.$id.'">' . do_shortcode( $content ) . '</li>';
}
add_shortcode("li", "li_function");
// [thumbnail]content[/thumbnail]
function thumbnail_function($atts, $content = null) {
   return '<div class="thumbnail">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("thumbnail", "thumbnail_function");
// [fullwidth]content[/fullwidth]
function fullwidth_function($atts, $content = null) {
   return '<div class="fullwidth">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("fullwidth", "fullwidth_function");
add_shortcode("wide", "fullwidth_function");
// [personbox]content[/personbox]
function personbox_function($atts, $content = null) {
   return '<div class="thumbnail">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("personbox", "personbox_function");
// RESPONSIVE LAYOUT
// visible-tablet
function visible_tablet_function($atts, $content = null) {
   return '<div class="visible-tablet">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("visible-tablet", "visible_tablet_function");
add_shortcode("visiblephone", "visible_tablet_function");
// visible-phone
function visible_phone_function($atts, $content = null) {
   return '<div class="visible-phone">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("visible-phone", "visible_phone_function");
add_shortcode("visiblephone", "visible_phone_function");
// visible-desktop
function visible_desktop_function($atts, $content = null) {
   return '<div class="visible-desktop">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("visible-desktop", "visible_desktop_function");
add_shortcode("visibledesktop", "visible_desktop_function");
// hidden-tablet
function hidden_tablet_function($atts, $content = null) {
   return '<div class="hidden-tablet">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("hidden-tablet", "hidden_tablet_function");
add_shortcode("hiddenphone", "hidden_tablet_function");
// hidden-phone
function hidden_phone_function($atts, $content = null) {
   return '<div class="hidden-phone">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("hidden-phone", "hidden_phone_function");
add_shortcode("hiddenphone", "hidden_phone_function");
// hidden-desktop
function hidden_desktop_function($atts, $content = null) {
   return '<div class="hidden-desktop">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("hidden-desktop", "hidden_desktop_function");
add_shortcode("hiddendesktop", "hidden_desktop_function");
// MEMBER PAGE STUFF
// [member image="" name=""][/member]
function member_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "image" => 'http://2012.iliterobotics.org/images/mentors/gdrake.jpg',
      "name" => 'Person'
   ), $atts));
return '<li><div class="thumbnail"><img src="' .$image. '" alt="avatar" class="pull-left img img-polaroid" height="170" width="170" />
<p></p>
<h4>' .$name. '</h4>
' . do_shortcode( $content ) . '</div><br>&nbsp;</li>';
}
add_shortcode("member", "member_function");
// [yearjoined data=""]
function yearjoined_function($atts, $content = null) {
extract(shortcode_atts(array("data" => '2012'), $atts));
return '<i class="icon icon-table"></i> <b>Year Joined:</b> ' .$data. '';}
add_shortcode("yearjoined", "yearjoined_function");
// [teams data=""]
function teams_function($atts, $content = null) {
extract(shortcode_atts(array("data" => 'FRC 1885'), $atts));
return '<i class="icon icon-users"></i> <b>Team(s):</b> ' .$data. '';}
add_shortcode("teams", "teams_function");
add_shortcode("team", "teams_function");
// [company data=""]
function company_function($atts, $content = null) {
extract(shortcode_atts(array("data" => 'Battlefield High School'), $atts));
return '<i class="icon icon-suitcase"></i> <b>Company:</b> ' .$data. '';}
add_shortcode("company", "company_function");
// [funfact data=""]
function funfact_function($atts, $content = null) {
extract(shortcode_atts(array("data" => 'I like pecan pie.'), $atts));
return '<i class="icon icon-angellist"></i> <b>Fun Fact:</b> ' .$data. '';}
add_shortcode("funfact", "funfact_function");
// [memory data=""]
function memory_function($atts, $content = null) {
extract(shortcode_atts(array("data" => 'I was at worlds last year!'), $atts));
return '<i class="icon icon-emo-thumbsup"></i> <b>Favorite Memory:</b> ' .$data. '';}
add_shortcode("memory", "memory_function");
// SOCIAL MEDIA
// [facebook link=""]
function facebook_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-facebook"></i></a> ';}
add_shortcode("facebook", "facebook_function");
// [twitter link=""]
function twitter_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-twitter"></i></a> ';}
add_shortcode("twitter", "twitter_function");
// [gplus link=""]
function gplus_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-gplus-square"></i></a> ';}
add_shortcode("gplus", "gplus_function");
add_shortcode("googleplus", "gplus_function");
// [deviantart link=""]
function deviantart_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-deviantart"></i></a> ';}
add_shortcode("deviantart", "deviantart_function");
add_shortcode("devart", "deviantart_function");
// [youtube link=""]
function yt_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-youtube"></i></a> ';}
add_shortcode("youtube", "yt_function");
// [spotify link=""]
function  otify_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-spotify"></i></a> ';}
add_shortcode("spotify", "spotify_function");
// [soundcloud link=""]
function soundcloud_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-soundcloud"></i></a> ';}
add_shortcode("soundcloud", "soundcloud_function");
// [pintrest link=""]
function pintrest_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-pinterest-square"></i></a> ';}
add_shortcode("pintrest", "pintrest_function");
add_shortcode("pinterest", "pintrest_function");
// [instagram link=""]
function instagram_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-camera-alt"></i></a> ';}
add_shortcode("instagram", "instagram_function");
// [external link=""]
function external_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-external"></i></a> ';}
add_shortcode("external", "external_function");
// [email link=""]
function email_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-gmail"></i></a> ';}
add_shortcode("email", "email_function");
// [homepage link=""]
function homepage_function($atts, $content = null) {
extract(shortcode_atts(array("link" => '//'), $atts));
return '<a href="' .$link. '" target="_blank"><i class="icon icon-hut"></i></a> ';}
add_shortcode("homepage", "homepage_function");
// SMART EMBEDS
// [googlemap width="pram#" height="pram#" src="http://maps.google.com/maps?q..."]
function googlemap_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="'.$src.'&output=embed" ></iframe>';
}
add_shortcode("googlemap", "googlemap_function");
// [youtube]<embed html>[youtube]
function youtube_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<div class="youtube">' . do_shortcode( $content ) . '</div>';
}
add_shortcode("youtube", "youtube_function");
// [chart type="pie" title="Example Pie Chart" data="41.12,32.35,21.52,5.01" labels="First+Label|Second+Label|Third+Label|Fourth+Label" background_color="FFFFFF" colors="D73030,329E4A,415FB4,DFD32F" size="450x180"]
function chart_function( $atts ) {
   extract(shortcode_atts(array(
       'data' => '',
       'chart_type' => 'pie',
       'title' => 'Chart',
       'labels' => '',
       'size' => '640x480',
       'background_color' => 'FFFFFF',
       'colors' => '',
   ), $atts));
   switch ($chart_type) {
      case 'line' :
         $chart_type = 'lc';
         break;
      case 'pie' :
         $chart_type = 'p3';
         break;
      default :
         break;
   }
   $attributes = '';
   $attributes .= '&chd=t:'.$data.'';
   $attributes .= '&chtt='.$title.'';
   $attributes .= '&chl='.$labels.'';
   $attributes .= '&chs='.$size.'';
   $attributes .= '&chf='.$background_color.'';
   $attributes .= '&chco='.$colors.'';
   return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$chart_type.''.$attributes.'" alt="'.$title.'" />';
}
add_shortcode('chart', 'chart_function');
// [pdf width="pram#" height="pram#"]http://...+.pdf[/pdf]
function pdf_function($attr, $url) {
   extract(shortcode_atts(array(
       'width' => '640',
       'height' => '480'
   ), $attr));
   return '<iframe src="http://docs.google.com/viewer?url=' . $url . '&embedded=true" style="width:' .$width. '; height:' .$height. ';">Your browser does not support iframes</iframe>';
}
add_shortcode('pdf', 'pdf_function');
// [viewer width="pram#" height="pram#"]http://...+.xxx[/viewer]
function viewer_function($attr, $url) {
   extract(shortcode_atts(array(
       'width' => '640',
       'height' => '480'
   ), $attr));
   return '<iframe src="http://docs.google.com/viewer?url=' . $url . '&embedded=true" style="width:' .$width. '; height:' .$height. ';">Your browser does not support iframes</iframe>';
}
add_shortcode('viewer', 'viewer_function');
// [recent-posts posts="pram#"]List Header[/recent-posts]
function recent_posts_function($atts, $content = null) {
   extract(shortcode_atts(array(
      'posts' => 1,
   ), $atts));
   $return_string = '<h3>'.$content.'</h3>';
   $return_string .= '<ul>';
   query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
      endwhile;
   endif;
   $return_string .= '</ul>';
   wp_reset_query();
   return $return_string;
}
function register_shortcodes(){
   add_shortcode('recent-posts', 'recent_posts_function');
}
add_action( 'init', 'register_shortcodes');
/*
| -------------------------------------------------------------------
| Editor Functions
| -------------------------------------------------------------------
| */
function register_button( $buttons ) {
   array_push( $buttons, "|", "recentposts" );
   return $buttons;
}
function add_plugin( $plugin_array ) {
   $plugin_array['recentposts'] = get_template_directory_uri() . '/inc/editor.js';
   return $plugin_array;
}
function my_recent_posts_button() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }
   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }
}
add_action('init', 'my_recent_posts_button');
/*
| -------------------------------------------------------------------
| Bootstrap Components
| -------------------------------------------------------------------
| */
class BoostrapShortcodes {
  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) ); 
  }
  /*--------------------------------------------------------------------------------------
    *
    * add_shortcodes
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function add_shortcodes() {
    add_shortcode('button', array( $this, 'bbutton' ));    
    add_shortcode('alert', array( $this, 'balert' ));
    add_shortcode('code', array( $this, 'bcode' ));
    add_shortcode('span', array( $this, 'bspan' ));
    add_shortcode('row', array( $this, 'brow' ));
    add_shortcode('label', array( $this, 'blabel' ));
    add_shortcode('badge', array( $this, 'bbadge' ));
    //add_shortcode('icon', array( $this, 'bicon' ));
    //add_shortcode('icon_white', array( $this, 'bicon_white' ));
    add_shortcode('table', array( $this, 'btable' ));
    add_shortcode('collapsibles', array( $this, 'bcollapsibles' ));
    add_shortcode('collapse', array( $this, 'bcollapse' ));
    add_shortcode('well', array( $this, 'bwell' ));
    add_shortcode('tabs', array( $this, 'btabs' ));
    add_shortcode('tab', array( $this, 'btab' ));
  }
  /*--------------------------------------------------------------------------------------
    *
    * bbutton
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bbutton($atts, $content = null) {
     extract(shortcode_atts(array(
        "type" => '',
        "size" => '',
        "link" => '',
        "target" => ''
     ), $atts));
     return '<a href="' . $link . '" class="btn btn-' . $type . ' btn-' . $size . '"  target="' . $target . '">' . do_shortcode( $content ) . '</a>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * balert
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function balert($atts, $content = null) {
     extract(shortcode_atts(array(
        "type" => '',
        "close" => true
     ), $atts));
     return '<div class="alert alert-' . $type . '">' . do_shortcode( $content ) . '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * bcode
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bcode($atts, $content = null) {
     extract(shortcode_atts(array(
        "type" => '',
        "size" => '',
        "link" => ''
     ), $atts));
     return '<pre><code>' . do_shortcode( $content ) . '</code></pre>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * bspan
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bspan( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "size" => 'size'
    ), $atts));
    return '<div class="span' . $size . '">' . do_shortcode( $content ) . '</div>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * brow
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function brow( $atts, $content = null ) {
    return '<div class="row-fluid">' . do_shortcode( $content ) . '</div>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * blabel
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function blabel( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type'
    ), $atts));
    return '<span class="label label-' . $type . '">' . do_shortcode( $content ) . '</span>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * bbadge
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bbadge( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type'
    ), $atts));
    return '<span class="badge badge-' . $type . '">' . do_shortcode( $content ) . '</span>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * bicon
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bicon( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type'
    ), $atts));
    return '<i class="icon icon-' . $type . '"></i>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * bicon_white
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bicon_white( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type'
    ), $atts));
    return '<i class="icon icon-' . $type . ' icon-white"></i>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * simple_table
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function btable( $atts ) {
      extract( shortcode_atts( array(
          'cols' => 'none',
          'data' => 'none',
          'type' => 'type'
      ), $atts ) );
      $cols = explode(',',$cols);
      $data = explode(',',$data);
      $total = count($cols);
      $output = '';
      $output .= '<table class="table table-'. $type .' table-bordered"><tr>';
      foreach($cols as $col):
          $output .= '<th>'.$col.'</th>';
      endforeach;
      $output .= '</tr><tr>';
      $counter = 1;
      foreach($data as $datum):
          $output .= '<td>'.$datum.'</td>';
          if($counter%$total==0):
              $output .= '</tr>';
          endif;
          $counter++;
      endforeach;
          $output .= '</table>';
      return $output;
  }
  /*--------------------------------------------------------------------------------------
    *
    * bwell
    *
    * 
    *-------------------------------------------------------------------------------------*/
    function bwell( $atts, $content = null ) {
      extract(shortcode_atts(array(
        "size" => 'size'
      ), $atts));
      return '<div class="well well-' . $size . '">' . do_shortcode( $content ) . '</div>';
    }
  /*--------------------------------------------------------------------------------------
    *
    * btabs
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function btabs( $atts, $content = null ) {
    if( isset($GLOBALS['tabcount']) )
      $GLOBALS['tabcount']++;
    else
      $GLOBALS['tabcount'] = 0;
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
    $output = '';
    if( count($tab_titles) ){
      $output .= '<ul class="nav nav-tabs" id="custom-tabs-'. rand(1, 100) .'">';
      $i = 0;
      foreach( $tab_titles as $tab ){
        if($i == 0)
          $output .= '<li class="active">';
        else
          $output .= '<li>';
        $output .= '<a href="#custom-tab-' . $GLOBALS['tabcount'] . '-' . sanitize_title( $tab[0] ) . '"  data-toggle="tab">' . $tab[0] . '</a></li>';
        $i++;
      }
        $output .= '</ul>';
        $output .= '<div class="tab-content">';
        $output .= do_shortcode( $content );
        $output .= '</div>';
    } else {
      $output .= do_shortcode( $content );
    }
    return $output;
  }
  /*--------------------------------------------------------------------------------------
    *
    * btab
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function btab( $atts, $content = null ) {
    if( !isset($GLOBALS['current_tabs']) ) {
      $GLOBALS['current_tabs'] = $GLOBALS['tabcount'];
      $state = 'active';
    } else {
      if( $GLOBALS['current_tabs'] == $GLOBALS['tabcount'] ) {
        $state = ''; 
      } else {
        $GLOBALS['current_tabs'] = $GLOBALS['tabcount'];
        $state = 'active';
      }
    }
    $defaults = array( 'title' => 'Tab');
    extract( shortcode_atts( $defaults, $atts ) );
    return '<div id="custom-tab-' . $GLOBALS['tabcount'] . '-'. sanitize_title( $title ) .'" class="tab-pane ' . $state . '">'. do_shortcode( $content ) .'</div>';
  }
  /*--------------------------------------------------------------------------------------
    *
    * bcollapsibles
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bcollapsibles( $atts, $content = null ) {
    if( isset($GLOBALS['collapsibles_count']) )
      $GLOBALS['collapsibles_count']++;
    else
      $GLOBALS['collapsibles_count'] = 0;
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
    $output = '';
    if( count($tab_titles) ){
      $output .= '<div class="accordion" id="accordion-' . $GLOBALS['collapsibles_count'] . '">';
      $output .= do_shortcode( $content );
      $output .= '</div>';
    } else {
      $output .= do_shortcode( $content );
    }
    return $output;
  }
  /*--------------------------------------------------------------------------------------
    *
    * bcollapse
    *
    * 
    *-------------------------------------------------------------------------------------*/
  function bcollapse( $atts, $content = null ) {
    if( !isset($GLOBALS['current_collapse']) )
      $GLOBALS['current_collapse'] = 0;
    else 
      $GLOBALS['current_collapse']++;
    $defaults = array( 'title' => 'Tab', 'state' => '');
    extract( shortcode_atts( $defaults, $atts ) );
    if (!empty($state)) 
      $state = 'in';
    return '
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">
          ' . $title . ' 
        </a>
      </div>
      <div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="accordion-body collapse ' . $state . '">
        <div class="accordion-inner">
          ' . $content . ' 
        </div>
      </div>
    </div>
    ';
  }
}
new BoostrapShortcodes();
/** 
 *
 * Shortcodes:
 *    button
 *    col
 *    img
 *    hr
 *    quote
 *    is_logged_in
 *    is_guest
 *    map
 *    video
 *    flickr
 *    post_slider
 *    slider
 *    list_posts
 *    box
 *    author-box
 * 
 * Functions:
 *    ilite_shortcodes_js_css
 *    ilite_shortcode
 *    ilite_shortcode_list_posts
 *    ilite_shortcode_flickr
 *    ilite_shortcode_slide
 *    ilite_shortcode_slider
 *    ilite_shortcode_post_slider
 *    ilite_shortcode_author_box
 *    ilite_shortcode_box
 *    ilite_fix_shortcode_empty_paragraph
 *    ilite_change_excerpt_brackets
 * 
 ***************************************************************************/
/**
 * Enqueues JS, CSS and writes inline scripts
 */
//add_action('wp_enqueue_scripts', 'ilite_shortcodes_js_css');
/**
 * Add ilite Shortcodes
 */
add_shortcode('is_logged_in', 'ilite_shortcode');
add_shortcode('is_guest', 'ilite_shortcode');
add_shortcode('tbutton', 'ilite_shortcode');
add_shortcode('tquote', 'ilite_shortcode');
add_shortcode('col', 'ilite_shortcode');
add_shortcode('sub_col', 'ilite_shortcode');
add_shortcode('timg', 'ilite_shortcode');
add_shortcode('hr', 'ilite_shortcode');
add_shortcode('map', 'ilite_shortcode');
add_shortcode('tvideo', 'ilite_shortcode');
add_shortcode('list_posts', 'ilite_shortcode_list_posts');
add_shortcode('flickr', 'ilite_shortcode_flickr');
add_shortcode('box', 'ilite_shortcode_box');
add_shortcode('post_slider', 'ilite_shortcode_post_slider');
add_shortcode('slider', 'ilite_shortcode_slider');
add_shortcode('slide', 'ilite_shortcode_slide');
add_shortcode('author_box', 'ilite_shortcode_author_box');
/**
 * Fix empty auto paragraph in shortcodes
 */
//add_filter('the_content', 'ilite_fix_shortcode_empty_paragraph');
//add_filter('the_excerpt', 'ilite_fix_shortcode_empty_paragraph');
//add_filter('widget_text', 'ilite_fix_shortcode_empty_paragraph');
// and change excerpt brackets to avoid conflict with empty paragraphs
//add_filter('excerpt_more', 'ilite_change_excerpt_brackets');
/**
 * Enable shortcode in excerpt
 */
add_filter('the_excerpt', 'do_shortcode');  
add_filter('the_excerpt', 'shortcode_unautop');
/**
 * Enable shortcode in text widget
 */
add_filter('widget_text', 'do_shortcode');  
add_filter('widget_text', 'shortcode_unautop');
/**
 * Enqueue JavaScript and stylesheets required by shortcodes
 * @since 1.1.2
 */ 
function ilite_shortcodes_js_css(){
  global $version;
  //Use expanded versions for development or minified versions for production
  $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
  //Enqueue general shortcodes style
  wp_enqueue_style( 'ilite-shortcodes', ilite_URI . '/css/shortcodes.css', array(), $version);
  //Enqueue general shortcodes script
  wp_register_script('ilite-shortcodes-js', ilite_URI . "/js/ilite.shortcodes.js", array('jquery'), $version, true );
  //Register carousel script
  wp_register_script('ilite-carousel-js', ilite_URI . "/js/carousel$min.js", '', $version, true);
  //Register map scripts
  wp_register_script('ilite-map-script', 'http://maps.google.com/maps/api/js?sensor=false', array(), $version, true);
  wp_register_script('ilite-map-shortcode', ilite_URI . '/js/ilite.map.js', array(), $version, true);
  //Register video script
  wp_register_script('ilite-video-script', ilite_URI.'/js/flowplayer-3.2.4.min.js', array(), $version, true);
}
/**
 * Creates shortcodes
 * @param Object $atts
 * @param String $content
 * @param String $code
 * @return String
 */
function ilite_shortcode($atts, $content=null, $code=""){
  switch($code){
    case 'is_logged_in':
      if(is_user_logged_in()){
        return do_shortcode($content);
      }
    break;
    case 'is_guest':
      if(!is_user_logged_in()){
        return do_shortcode($content);
      }
    break;
    case 'button':
      extract( shortcode_atts( array( 'color' => "",
                        'size'  => "",
                      'style' => "",
                      'link'  => "#",
                      'target'=> "",
                      'text'  => ""
                      ), $atts ) ); 
      if($color != ''){
        $color = "background: $color;";
      }
      if($text != ''){
        $text = "color: $text;";  
      }
      return '<a href="'.$link.'" class="shortcode button '.$style.' '.$size.'" style="'.$color.$text.'" target="'.$target.'">'.do_shortcode($content).'</a>';
    break;
    case 'quote':
      return '<blockquote class="shortcode quote">'.do_shortcode($content).'</blockquote>';
    break;
    case 'col':
      wp_enqueue_script('ilite-shortcodes-js');
      extract( shortcode_atts( array( 'grid' => ""), $atts));
      return "<div class='shortcode col".$grid."'>".do_shortcode($content)."</div>";
    break;
    case 'sub_col':
      wp_enqueue_script('ilite-shortcodes-js');
      extract( shortcode_atts( array( 'grid' => ""), $atts));
      return "<div class='shortcode col".$grid."'>".do_shortcode($content)."</div>";
    break;
    case 'img':
      extract( shortcode_atts( array( 'class' => "",
                      'src'   => "",
                      'id'  => "",
                      'h'   => "",
                      'w'   => "",
                      'crop'  => true
                      ), $atts ) ); 
      return ilite_get_image("class=$class&src=$src&id=$id&h=$h&w=$w&crop=$crop");
    break;
    case 'hr':
      extract( shortcode_atts( array( 'color' => '',
                      'width' => '',
                      'border_width' => ''
      ), $atts));
      $hr = '<hr class="shortcode hr '.$color.'" ';
      if( '' != $width || '' != $border_width  ){
        $hrstyle = 'style="';
        if( '' != $width  ){
          $hrstyle .= 'width:' . $width . ';';
        }
        if( '' != $border_width  ){
          if( preg_match('/MSIE 7/i', $_SERVER['HTTP_USER_AGENT'] ) ){
            $hrstyle .= 'height:' . $border_width . ';';
          }
          $hrstyle .= 'border-width:' . $border_width . ';';
        }
        $hr .= $hrstyle . '"';
      }
      return $hr . ' />';
    break;
    case 'map':
      wp_enqueue_script('ilite-map-script');
      wp_enqueue_script('ilite-map-shortcode');
      extract( shortcode_atts( array( 'address' => '99 Blue Jays Way, Toronto, Ontario, Canada', 'width' => "500px", 'height' => "300px", 'zoom' => 15), $atts));
      $num = rand(0,10000);
      return '<script type="text/javascript"> 
            jQuery(document).ready(function() {
                initialize("'.$address.'",'.$num.','.$zoom.');
            });
          </script>
          <div class="shortcode map">
            <div id="ilite_map_canvas_'.$num.'" style="display: block;width:'.$width.';height:'.$height.';" class="map-container">&nbsp;</div>
          </div>';
    break;
    case 'video':
      wp_enqueue_script('ilite-video-script');
      extract( shortcode_atts( array( 'width' => "500px", 
                      'height' => "300px", 
                      'src' => "#"), $atts));
      $num = rand(0,10000);
      if( stripos($_SERVER['HTTP_USER_AGENT'], 'iPod') || stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone') ||
        stripos($_SERVER['HTTP_USER_AGENT'], 'iPad') || stripos($_SERVER['HTTP_USER_AGENT'], 'Android') ) {
        return '<div class="shortcode video"><video src="'.$src.'"></video></div>';
      } else {
        return '<div class="shortcode video"><a href="'.$src.'" style="display:block;width:'.$width.';height:'.$height.'" id="ilite_player_'.$num.'"></a></div><script type="text/javascript">jQuery(document).ready(function(){ flowplayer("ilite_player_'.$num.'", "' . ilite_URI . '/js/flowplayer-3.2.5.swf", { clip: { autoPlay:false } }); });</script>';
      }
    break;
  }
}
/**
 * List posts using get_posts
 * @param Object $atts
 * @param String $content
 * @return String
 */
function ilite_shortcode_list_posts($atts, $content = null) {
  wp_enqueue_script('ilite-shortcodes-js');
  extract(shortcode_atts(array(
    'title' => 'yes',
    'category' => '0',
    'limit' => '5',
    'more_text' => __('More...', 'ilite'),
    'excerpt_length' => '',
    'image' => 'no',
    'image_w' => '220',
    'image_h' => '150',
    'display' => 'none',
    'style' => 'list-post',
    'post_date' => 'no',
    'post_meta' => 'no',
    'unlink_title' => 'no',
    'unlink_image' => 'no',
    'image_size' => 'thumbnail',
    'post_type' => 'post',
    'order' => 'DESC',
    'orderby' => 'date'
  ), $atts));
  global $wpdb, $post, $table_prefix;
  $query_args = array(
    'numberposts' => $limit,
    'post_type' => $post_type,
    'order' => $order,
    'orderby' => $orderby,
    'suppress_filters' => false
  );
  if ('0' != $category) {
    $tax_query_terms = explode(',', $category);
    if(preg_match('#[a-z]#', $category)){
      $query_args['tax_query'] = array( array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $tax_query_terms
      ));
    } else {
      $query_args['tax_query'] = array( array(
        'taxonomy' => 'category',
        'field' => 'id',
        'terms' => $tax_query_terms
      ));
    }
  }
  $posts = get_posts($query_args);
  //dumpit($posts);
  if ($posts) {
    $customlistpoststr = '<!-- shortcode list_posts --> <div class="shortcode clearfix list-posts layout ' . $style . ' ">';
    foreach ($posts as $post){
      setup_postdata($post);
      global $more;
      $more = 0;
      $post_class = "";
      if ( ilite_get('external_link') != '')
        $thislink = ilite_get('external_link');
      else
        $thislink = get_permalink($post->ID);
      //Encode permalink for custom post types to avoid situations like 
      //http://localhost/ilite/folo/?post_type=highlights&p=1106
      if( 'post' != $post_type)
        $thislink = urlencode($thislink);
      foreach(get_post_class() as $postclass){
        $post_class .= " ".$postclass;
      }
      $customlistpoststr .= '<div class="post clearfix ' . $post_class . '">';
      if ($image == "yes") {
        if( 'no' == $unlink_image ){
          $customlistpoststr .= ilite_get_image('image_size='.$image_size.'&ignore=true&w='.$image_w.'&h='.$image_h.'&alt='.get_the_title().'&before=<p class="post-image"><a href="' . $thislink . '">&after=</a></p>');
        }
        else{
          $customlistpoststr .= ilite_get_image('image_size='.$image_size.'&ignore=true&w='.$image_w.'&h='.$image_h.'&alt='.get_the_title().'&before=<p class="post-image">&after=</p>');
        }
      } //$image == "yes"
      $customlistpoststr .= '<div class="post-content">';
      if ($post_date == "yes") {
        $customlistpoststr .= '<p class="post-date">' . get_the_date() . '</p>';
      } //$post_date == "yes"
      if($title == "yes") {
        if( 'no' == $unlink_title ){
          $customlistpoststr .= '<h3 class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
        }
        else {
          $customlistpoststr .= '<h3 class="post-title">' . get_the_title() . '</h3>';
        }
      }
      if ($post_meta == "yes") {
        $customlistpoststr .= '<p class="post-meta">
        <span class="post-author">' . get_the_author() . '</span>
        <span class="post-category">' . get_the_category_list(', ') . '</span>';
        $num_comments = get_comments_number();
        if (comments_open()) {
           ob_start();
           comments_popup_link('0', '1', '%', 'comments-link', '');
          $write_comments = ob_get_contents();
          ob_clean(); 
        } //comments_open()
        else {
          $write_comments = '';
        }
        $customlistpoststr .= '<span class="post-comment">' . $write_comments . '</span>';
        if( has_tag() ) {
          $customlistpoststr .= '<span class="post-tag">' . get_the_tag_list('', ', ') . '</span>';
        }
      $customlistpoststr .= '</p>'; 
      } //$post_meta == "yes"
      if ($display == "content") {
        $customlistpoststr .= ilite_get_content($more_text);
      } //$display == "content"
      if ($display == "excerpt") {
        if($excerpt_length) {
          $customlistpoststr .= ilite_excerpt($excerpt_length);
        }
        else {
          $customlistpoststr .= get_the_excerpt();
        }
      } //$display == "excerpt"
      $customlistpoststr .= '</div>
  </div>';
    } //endforeach
    wp_reset_postdata();
    $customlistpoststr .= '</div>
            <!-- /shortcode list_posts -->';
  } //$posts
  return $customlistpoststr;
}
/**
 * Insert Flickr Gallery by user, set or group
 * @param Object $atts
 * @param String $content
 * @return String
 */ 
function ilite_shortcode_flickr($atts, $content = null) {
  extract(shortcode_atts(array(
    'user' => '',
    'set' => '',
    'group' => '',
    'limit' => '8',
    'size' => 's',
    'display' => 'latest'
  ), $atts));
  $flickrstr = "";
  if($user) {
    $flickrstr = '<!-- shortcode Flickr --> <div class="shortcode clearfix flickr"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$limit.'&amp;display='.$display.'&amp;size='.$size.'&amp;layout=x&amp;source=user&amp;user='.$user.'"></script></div>';
  }
  if($set) {
    if($flickrstr == "") {
    $flickrstr = '<div class="shortcode clearfix flickr"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$limit.'&amp;display='.$display.'&amp;size='.$size.'&amp;layout=x&amp;source=user_set&amp;set='.$set.'"></script></div>';
    }
  }
  if($group) {
    if($flickrstr == "") {
      $flickrstr = '<div class="shortcode clearfix flickr"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$limit.'&amp;display='.$display.'&amp;size='.$size.'&amp;layout=x&amp;source=group&amp;group='.$group.'"></script></div> <!-- /shortcode Flickr -->';
    }
  }
  return $flickrstr;
}
/**
 * Creates one slide for the slider shortcode
 * @param Object $atts
 * @param String $content
 * @return String
 */
function ilite_shortcode_slide($atts, $content = null)
{
  extract(shortcode_atts(array(), $atts));
  $output = '<li><div class="slide-wrap">'.do_shortcode($content).'</div></li>';
  return $output;
}
/**
 * Creates a slider using the slide shortcode
 * @param Object $atts
 * @param String $content
 * @return String
 */
function ilite_shortcode_slider($atts, $content = null){
  wp_enqueue_script('ilite-carousel-js');
  extract(shortcode_atts(array(
    'wrap' => 'yes',
    'visible' => '1',
    'scroll' => '1',
    'auto' => '0',
    'speed' => 'normal',
    'slider_nav' => 'yes',
    'pager' => 'yes',
    'class' => ''
  ), $atts));
  $numsldrtemp = rand(0, 10000);
  $content = do_shortcode(shortcode_unautop($content));
  $strsldr = '';
  if( '0' == $auto )
    $play = 'false';
  else
    $play = 'true';
  switch($speed){
    case 'fast':
      $speed = '.5';
    break;
    case 'normal':
      $speed = '1';
    break;
    case 'slow':
      $speed = '4';
    break;
  }
  $wrapvar = 'false';
  if( 'yes' == $wrap ){
    $wrapvar = 'true';
  }
  $strsldr = '<!-- shortcode slider --> <div id="slider-'.$numsldrtemp.'" class="shortcode clearfix slider '.$class.'">
  <ul class="slides">
  '.$content.'
  </ul>';
  $strsldr .= '</div><script type="text/javascript">
    jQuery(window).load(function() {
    jQuery("#slider-'.$numsldrtemp.' .slides").carouFredSel({
      responsive: true,';
    if ( 'yes' == $slider_nav ) {
      $strsldr .= '
        prev: "#slider-'.$numsldrtemp.' .carousel-prev",
        next: "#slider-'.$numsldrtemp.' .carousel-next",';
    }
    if( 'yes' == $pager ){
      $strsldr .= '
        pagination: "#slider-'.$numsldrtemp.' .carousel-pager",';
    }
    $strsldr .= '
      circular: '.$wrapvar.',
      infinite: '.$wrapvar.',
      auto: {
        play : '.$play.',
        pauseDuration: '.$auto.'*1000,
        duration: '.$speed.'*1000
      },
      scroll: {
        items: '.$scroll.',
        duration: '.$speed.'*1000,
        wipe: true
      },
      items: {
        visible: {
          min: 1,
          max: '.$visible.'
        },
        width: 120
      },
      onCreate : function (){
        jQuery(".slider").css( {
          "height": "auto",
          "visibility" : "visible"
        });
      }
    });
  });
  </script> <!-- /shortcode slider -->';
  return $strsldr;
}
/**
 * Create a slider with posts retrieved through get_posts
 * @param Object $atts
 * @param String $content
 * @return String
 */
function ilite_shortcode_post_slider($atts, $content = null){
  wp_enqueue_script('ilite-carousel-js'); 
  extract(shortcode_atts(array(
    'visible' => '1',
    'scroll' => '1',
    'auto' => '0',
    'wrap' => 'yes',
    'excerpt_length' => '20',
    'speed' => 'normal',
    'slider_nav' => 'yes',
    'pager' => 'yes',
    'limit' => '5',
    'category' => '',
    'image' => 'yes',
    'image_w' => '240px',
    'image_h' => '180px',
    'more_text' => __('More...', 'ilite'),
    'title' => 'yes',
    'display' => 'none',
    'post_meta' => 'no',
    'post_date' => 'no',
    'width' => '',
    'height' => '',
    'class' => '',
    'unlink_title' => 'no',
    'unlink_image' => 'no',
    'image_size' => 'thumbnail',
    'post_type' => 'post',
    'order' => 'DESC',
    'orderby' => 'date'
  ), $atts));
  $wrapvar = 'false';
  if( 'yes' == $wrap ){
    $wrapvar = 'true';
  }
  if( '0' == $auto )
    $play = 'false';
  else
    $play = 'true';
  switch($speed){
    case 'fast':
      $speed = '.5';
    break;
    case 'normal':
      $speed = '1';
    break;
    case 'slow':
      $speed = '4';
    break;
  }
  $numsldr = rand(0, 10000);
  $postsliderstr = '';
  global $wpdb, $post, $table_prefix;
  $query_args = array(
    'numberposts' => $limit,
    'post_type' => $post_type,
    'order' => $order,
    'orderby' => $orderby,
    'suppress_filters' => false
  );
  if ('' != $category) {
    $tax_query_terms = explode(',', $category);
    if(preg_match('#[a-z]#', $category)){
      $query_args['tax_query'] = array( array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $tax_query_terms
      ));
    } else {
      $query_args['tax_query'] = array( array(
        'taxonomy' => 'category',
        'field' => 'id',
        'terms' => $tax_query_terms
      ));
    }
  }
  $posts = get_posts($query_args);
  if ($posts) {
    $postsliderstr = '<!-- shortcode post_slider --> <div id="post-slider-' . $numsldr . '" style="width: ' . $width . '; height: ' . $height . ';" class="shortcode clearfix post-slider ' . $class . '">
    <ul class="slides">';
    foreach ($posts as $post):
      setup_postdata($post);
      global $more;
      $more       = 0;
      $post_class = "";
      if ( ilite_get('external_link') != '')
        $thislink = ilite_get('external_link');
      else
        $thislink = get_permalink();
      foreach (get_post_class() as $postclass) {
        $post_class .= " " . $postclass;
      } //get_post_class() as $postclass
      $postsliderstr .= '<li><div  class="slide-wrap ' . $post_class . '">';
      if ($image == "yes") {
        if( 'no' == $unlink_image ){
          $postsliderstr .= ilite_get_image('image_size='.$image_size.'&ignore=true&w=' . $image_w . '&h=' . $image_h . '&alt=' . get_the_title() . '&before=<p class="post-image"><a href="' . $thislink . '">&after=</a></p>');
        }
        else{
          $postsliderstr .= ilite_get_image('image_size='.$image_size.'&ignore=true&w=' . $image_w . '&h=' . $image_h . '&alt=' . get_the_title() . '&before=<p class="post-image">&after=</p>');
        }
      } //$image == "yes"
      if ($title == "yes") {
        if( 'no' == $unlink_title ){
          $postsliderstr .= '<h3 class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
        }
        else{
          $postsliderstr .= '<h3 class="post-title">' . get_the_title() . '</h3>';
        }
      } //$title == "yes"
      if ($post_date == "yes") {
        $postsliderstr .= '<p class="post-date">' . get_the_date() . '</p>';
      } //$post_date == "yes"
      if ($post_meta == "yes") {
        $postsliderstr .= '<p class="post-meta">
          <span class="post-author">' . get_the_author() . '</span>
          <span class="post-category">' . get_the_category_list(', ') . '</span>';
        $num_comments = get_comments_number();
        if (comments_open()) {
          ob_start();
          comments_popup_link('0', '1', '%', 'comments-link', '');
          $write_comments = ob_get_contents();
          ob_clean();
        } //comments_open()
        else {
          $write_comments = '';
        }
        $postsliderstr .= '<span class="post-comment">' . $write_comments . '</span>';
        if( has_tag() ){
          $postsliderstr .= '<span class="post-tag">' . get_the_tag_list('', ', ') . '</span>';
        }
        $postsliderstr .= '</p>';
      } //$post_meta == "yes"
      if ($display == "content") {
        $postsliderstr .= '<div class="post-content">' . ilite_get_content($more_text) . '</div></div></li>
';
      } //$display == "content"
      if ($display == "excerpt") {
        $postsliderstr .= '<div class="post-content">' . ilite_excerpt($excerpt_length) . '</div></div></li>
';
      } //$display == "excerpt"
    endforeach;
    $postsliderstr .= '</ul>';
    if ($slider_nav == "yes") {
      $nextbutton = "<div>&raquo;</div>";
      $prevbutton = "<div>&laquo;</div>";
    } else {
      $nextbutton = "null";
      $prevbutton = "null";       
    } //$slider_nav == "yes"
    $postsliderstr .= '</div><script type="text/javascript">
    jQuery(window).load(function() {
    jQuery("#post-slider-'.$numsldr.' .slides").carouFredSel({
      responsive: true,';
    if ( 'yes' == $slider_nav ) {
      $postsliderstr .= '
        prev: "#post-slider-'.$numsldr.' .carousel-prev",
        next: "#post-slider-'.$numsldr.' .carousel-next",';
    }
    if( 'yes' == $pager ){
      $postsliderstr .= '
        pagination: "#post-slider-'.$numsldr.' .carousel-pager",';
    }
    $postsliderstr .= '
      circular: '.$wrapvar.',
      infinite: '.$wrapvar.',
      auto: {
        play : '.$play.',
        pauseDuration: '.$auto.'*1000,
        duration: '.$speed.'*1000
      },
      scroll: {
        items: '.$scroll.',
        duration: '.$speed.'*1000,
        wipe: true
      },
      items: {
        visible: {
          min: 1,
          max: '.$visible.'
        },
        width: 120
      },
      onCreate : function (){
        jQuery(".post-slider").css( {
          "height": "auto",
          "visibility" : "visible"
        });
      }
    });
  });
  </script> <!-- /shortcode post_slider -->';
    wp_reset_postdata();
  } //$posts
  return $postsliderstr;
}
/**
 * Creates an author box to display your profile
 * @param Object $atts
 * @param String $content
 * @return String
 */
function ilite_shortcode_author_box($atts, $content = null) {
  extract(shortcode_atts(array(
    'avatar' => 'yes',
    'avatar_size' => '48',
    'style' => '',
    'author_link' => 'no'
  ), $atts));
  /** 
   * Filtered name of author
   * @var String */
  $nicename = get_the_author_meta('nicename');
  $authorboxstr = "<!-- shortcode author_box --> <div class=\"shortcode clearfix author-box $style $nicename \">";
  if($avatar == "yes") {
    $authorboxstr .= '<p class="author-avatar">'.get_avatar( get_the_author_meta('user_email'), $avatar_size, '' ).'</p>';
  }
  if(get_the_author_meta('user_url')) {
    $authorboxstr .= '<div class="author-bio">
      <h4 class="author-name"><a href="'.get_the_author_meta('user_url').'">'.get_the_author_meta('first_name').' '.get_the_author_meta('last_name').'</a></h4>
    '.get_the_author_meta('description');
  }
  else {
    $authorboxstr .= '<div class="author-bio">
    <h4 class="author-name">'.get_the_author_meta('first_name').' '.get_the_author_meta('last_name').'</h4>
  '.get_the_author_meta('description');
  }
  if($author_link == "yes") {
    if(get_the_author_meta('user_url')) {
      $authorboxstr .= '<p class="author-link"><a href="'.get_the_author_meta('user_url').'">&rarr; '.get_the_author_meta('user_firstname').' '.get_the_author_meta('user_lastname').' </a></p>';
    }
    else {
      $authorboxstr .= '<p class="author-link">&rarr; '.get_the_author_meta('user_firstname').' '.get_the_author_meta('user_lastname').' </p>';
    }
  }
  $authorboxstr .= '</div>
  </div> <!-- /shortcode author_box -->';
  return $authorboxstr;
}
/**
 * Creates a box to enclose content
 * @param Object $atts
 * @param String $content
 * @return String
 */
function ilite_shortcode_box($atts, $content = null) {
  extract(shortcode_atts(array(
    'style' => ''
  ), $atts));
  $boxstr = '<!-- shortcode box --> <div class="shortcode clearfix box '.$style.'">'.do_shortcode($content).'</div> <!-- /shortcode box -->';
  return $boxstr;
}
/**
 * Fix empty auto paragraph in shortcodes
 * @param String $content
 * @return String
 */
function ilite_fix_shortcode_empty_paragraph($content) {   
   $array = array (
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br />' => ']'
   );
   $content = strtr($content, $array);
   return $content;
}
/**
 * Change square brackets to round brackets so they don't conflict with empty paragraphs
 * @param String $more
 * @return String
 */
function ilite_change_excerpt_brackets($more) {
  return '(...)';
}
?>