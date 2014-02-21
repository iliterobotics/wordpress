<meta http-equiv="refresh" content="0; url=http://fll.iliterobotics.org/">
<?php
/**
 * Template Name: Redirect - FLL
 * Description: Redirects the user to fll.iliterobotics.org
 *
 */

/* This is the page content. */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

		<br><br><br><br>
		<a href="http://fll.iliterobotics.org/" style="display:block;text-align:center;">Click here to continue to http://fll.iliterobotics.org/.</a>
		<br><br><br><br><br><br>

		<meta http-equiv="refresh" content="0; url=http://fll.iliterobotics.org/">

<!--<?php wp_link_pages(
        array('before' => '<div class="page-links">' . __('Pages:', 'ilite'), 'after' => '</div>')
    ); ?>
    <?php edit_post_link(__('Edit', 'ilite'), '<span class="edit-link">', '</span>'); ?>
    <?php endwhile; // end of the loop. ?>-->
  <!--</div>--><!-- /.span12 -->
  <!--<div class="span4">
  </div>-->
<?php get_footer(); ?>