</div> <!-- /.container -->
<div class="container container-footer">

<!-- Blank Bottom Navbar -->
<div class="container" style="padding-left: 2px;padding-right: 2px;">
<div class="navbar navbar-inverse navbar-header navbar-blank">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div><!--/.navbar -->
</div>

<!-- Footer -->
<div class="visible-phone footer-row mobile-footer" style="text-align:center">
<a href="#" class="btn btn-large btn-block" style="font-size:18px;border-radius:0;"><i class="icon icon-up-hand"></i> Back To Top <i class="icon icon-up-hand"></i></a>
<br/>
<?php
  if (has_nav_menu('footer-mobile')) :
    wp_nav_menu(array('theme_location' => 'footer-mobile', 'menu_class' => 'nav'));
  endif;
?>
</div>

<div class="row-fluid footer-row hidden-phone" style="text-align:center">
<?php
  if (has_nav_menu('footer-links')) :
    wp_nav_menu(array('theme_location' => 'footer-links', 'menu_class' => 'nav'));
  endif;
?>
</div>

<hr class="divider-footer"/>
<div style="text-align:center" class="footer-copy"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Text')) :
endif; ?></div>

</div> <!-- /.container -->
 <!-- javascript & webfonts -->
 <!-- Placed at the end of the document so the pages load faster -->
 <!--[if IE 8]><script>var imgs, i, w;var imgs = document.getElementsByTagName( 'img' );for( i = 0; i < imgs.length; i++ ) {w = imgs[i].getAttribute( 'width' );if ( 615 < w ) {imgs[i].removeAttribute( 'width' );imgs[i].removeAttribute( 'height' );}}</script><![endif]-->
 <script src="<?php bloginfo('template_directory');?>/js/jquery.min.js"></script>
 <script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
 <script src="<?php bloginfo('template_directory');?>/js/functions.js"></script>
 <?php wp_footer(); ?>
</div><!-- /.bgwrap --></body>
</html>