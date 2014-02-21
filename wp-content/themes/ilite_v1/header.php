<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <title><?php wp_title( '-', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ILITE Robotics">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- Functions -->
  <?php wp_head(); ?>

  <!-- Styles -->
  <link href="<?php bloginfo('template_directory');?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory');?>/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory');?>/css/print.css" rel="stylesheet" media="print">
  <link href="<?php bloginfo('template_directory');?>/css/style.css" rel="stylesheet">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <script src="<?php bloginfo('template_directory');?>/js/respond.min.js"></script>
  <![endif]-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
  <link href="http://fonts.googleapis.com/css?family=Advent+Pro:bold" rel="stylesheet" type="text/css">
  <link href="<?php bloginfo('template_directory');?>/fonts/css/icons.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory');?>/fonts/css/animation.css" rel="stylesheet">
  <!--[if lt IE 8]>
   <link href="<?php bloginfo('template_directory');?>/fonts/css/icons-ie7.css" rel="stylesheet">
  <![endif]-->

  <!-- Google Analytics For Statistical Purposes -->
  <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39147674-1']);
  _gaq.push(['_setDomainName', 'iliterobotics.org']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
  <!-- Fav and Icons -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-60-precomposed.png">
</head>

<body <?php body_class(); ?>><div class="bgwrap">

<!-- Mobile navbar -->
    <div class="navbar navbar-mobile navbar-inverse navbar-fixed-top visible-phone">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">ILITE Robotics</a>
          <div class="nav-collapse collapse">
        <?php
          if (has_nav_menu('mobile')) :
            wp_nav_menu(array('theme_location' => 'mobile', 'menu_class' => 'nav'));
          endif;
        ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<!-- Top navbar -->
<div class="container container-navbar-static-top">
<div class="navbar navbar-inverse navbar-static-top hidden-phone">
      <div class="navbar-inner">
        <div class="container">
        <ul class="nav"><li><a></a></li></ul>
        <div class="pull-right"><?php
          if (has_nav_menu('top')) :
            wp_nav_menu(array('theme_location' => 'top', 'menu_class' => 'nav'));
          endif;
        ?>
          </div><!--/.pull-right -->
        </div>
      </div>
</div><!--/.navbar -->
</div>

<!-- Variable Background Image -->
<div class="header-img" style="height:110px!important;">
<!--[if lt IE 8]> <div align='center' style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
</div>
<!-- Main navbar -->
<div class="container container-content">
<div class="navbar navbar-inverse navbar-header hidden-phone">
      <div class="navbar-inner">
        <nav class="container">
          <ul class="nav alt">
            <li><a title="home" href="/"><i class="icon icon-warehouse"></i> <span class="visible-phone">HOME</span></a></li>
          </ul>
        <?php
          if (has_nav_menu('header')) :
            wp_nav_menu(array('theme_location' => 'header', 'menu_class' => 'nav'));
          endif;
        ?>
            <ul class="nav pull-right hidden-tablet">
                <li class="social"><a href="http://gplus.to/ilite" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/social/google-plus.png" alt="Google+"/></a></li>
                <li class="social"><a href="http://www.facebook.com/pages/First-Team-1885/191876367489335" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/social/facebook.png" alt="Facebook"/></a></li>
                <li class="social"><a href="http://twitter.com/Team1885FRC" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/social/twitter-2.png" alt="Twitter"/></a></li>
                <li class="social"><a href="http://www.youtube.com/user/FIRSTTeam1885/videos" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/social/youtube.png" alt="YouTube"/></a></li>
            </ul>
        </nav>
      </div>
</div><!--/.navbar -->
