<!--?php get_header(); -->
<html>
<head>
<title>Oh noes!</title>
  <!-- Styles -->
  <link href="<?php bloginfo('template_directory');?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory');?>/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory');?>/css/style.css" rel="stylesheet">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <style>body{color: white!important;text-shadow: 0 1px 3px rgba(0,0,0,.4), 0 0 30px rgba(0,0,0,.075);
background: #020031;
background: -moz-linear-gradient(45deg, #020031 0%, #6d3353 100%);
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#020031), color-stop(100%,#6d3353));
background: -webkit-linear-gradient(45deg, #020031 0%,#6d3353 100%);
background: -o-linear-gradient(45deg, #020031 0%,#6d3353 100%);
background: -ms-linear-gradient(45deg, #020031 0%,#6d3353 100%);
background: linear-gradient(45deg, #020031 0%,#6d3353 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#020031', endColorstr='#6d3353',GradientType=1 );
-webkit-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
-moz-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);}
.well{background:#383838;}
input.search-query {height: 50px;border-radius: 0;font-size: 40px;}
input.btn-green {height: 50px;font-size: 30px;}
h1, h2 {font-family: "Oswald", Advent Pro, Agency FB, Arial;}
.lead a {padding: 4px;color: #8bed7c;text-decoration: underline;}
</style>
</head>
<body>
<br><br><div class="container">

<h1 style="font-size: 60px;line-height: 65px;">It looks like you're lost.</h1>
<div class="lead">What you're looking for does not exist! <a href="javascript: history.go(-1)">Take me outta here!</a></div>

<div class="well">
<div class="lead">Why not try a trusty search?</div>
<form method="get" class="input-append row-fluid" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" class="search-query span8" size="18" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Search" class="btn btn-green span4" />
</div>
</form>
<hr>
Or try looking at our <a href="/sitemap" class="label label-warning">sitemap</a>?
</div>
<b>HTTP Error 404 - Page Not Found</b>
</div><!-- /container -->
<!--?php get_footer(); -->
<link href="http://fonts.googleapis.com/css?family=Oswald:bold" rel="stylesheet" type="text/css">
</body>
</html>