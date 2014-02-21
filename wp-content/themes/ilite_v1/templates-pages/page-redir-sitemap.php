<meta http-equiv="refresh" content="0; url=/sitemap">
<?php
/**
 * Template Name: Redirect - Sitemap
 * Description: Redirects the user to /sitemap
 *
 */

/* This is the page content. */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

		<br><br><br><br>
		<a href="/sitemap" style="display:block;text-align:center;">Click here to continue to the sitemap.</a>
		<br><br><br><br><br><br>

		<meta http-equiv="refresh" content="0; url=/sitemap">

<!--<?php wp_link_pages(
        array('before' => '<div class="page-links">' . __('Pages:', 'ilite'), 'after' => '</div>')
    ); ?>
    <?php edit_post_link(__('Edit', 'ilite'), '<span class="edit-link">', '</span>'); ?>
    <?php endwhile; // end of the loop. ?>-->
  <!--</div>--><!-- /.span12 -->
  <!--<div class="span4">
  </div>-->
<?php get_footer(); ?>