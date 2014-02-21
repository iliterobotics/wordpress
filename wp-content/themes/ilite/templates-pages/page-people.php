<?php
/**
 * Template Name: Page - List Of People Config
 * Description: Displays list of people with pagination and featured image.
 *
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <script>
    document.documentElement.setAttribute("data-spy", "scroll");
    document.documentElement.setAttribute("data-offset", "28");
    document.documentElement.setAttribute("data-target", ".subnav");
    $('body').attr( 'data-spy', 'scroll' );
    $('body').attr( 'data-offset', '28' );
    $('body').attr( 'data-target', '.subnav' );
    </script>
<div><!-- scrollspy -->
<div class="hero-unit hero-title" style="background-image: url(<?php if (has_post_thumbnail( $post->ID ) ): ?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?><?php echo $image[0]; ?><?php endif; ?>);">
<h1><?php the_title(); ?></h1><br>
<p><?php echo get_post_meta(get_the_ID(), '_subtitle', true); ?></p></div>
  <div class="subnav">
    <ul class="nav nav-pills people-nav">
      <li class="active"><a href="#coach">Coach</a></li>
      <li><a href="#mentors">Mentors</a></li>
      <li><a href="#business">Business</a></li>
      <li><a href="#build">Build</a></li>
      <li><a href="#electronics">Electronics</a></li>
      <li><a href="#programming">Programming</a></li>
      <li><a href="#ilitejr">ILITE, Jr.</a></li>
    <li class="pull-right">
      <div class="label label-info"><span id="count" class="people-count"></span></div>
      <input type="text" name="q" class="people-search" value="" placeholder="Search!" autofocus="1">
    </li>
    </ul>
  </div>
    <p id="none" class="alert alert-error people-error" style="display:none"><i class="icon icon-attention-circle"></i><b>Error</b> There were no names to match your search!</p>

<?php the_content(); ?>
</div><!-- /scrollspy -->
<?php endwhile; // end of the loop.
get_footer();