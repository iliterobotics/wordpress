<meta http-equiv="refresh" content="0; url=http://irocoffseason.org/">
<?php
/**
 * Template Name: Redirect - IROC
 * Description: Redirects the user to irocoffseason.org
 *
 */

/* This is the page content. */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

		<br><br><br><br>
		<a href="http://irocoffseason.org/" style="display:block;text-align:center;">Click here to continue to http://irocoffseason.org/.</a>
		<br><br><br><br><br><br>

		<meta http-equiv="refresh" content="0; url=http://irocoffseason.org/">

<!--<?php wp_link_pages(
        array('before' => '<div class="page-links">' . __('Pages:', 'ilite'), 'after' => '</div>')
    ); ?>
    <?php edit_post_link(__('Edit', 'ilite'), '<span class="edit-link">', '</span>'); ?>
    <?php endwhile; // end of the loop. ?>-->
  <!--</div>--><!-- /.span12 -->
  <!--<div class="span4">
  </div>-->
<?php get_footer(); ?>