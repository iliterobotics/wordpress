<?php
/**
 * Template Name: Page - API
 * Description: A page with no header block
 *
 */

/* This is the page content. */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?><!-- --><?php the_content(); ?>
<!--<?php wp_link_pages(
        array('before' => '<div class="page-links">' . __('Pages:', 'ilite'), 'after' => '</div>')
    ); ?>
    <?php edit_post_link(__('Edit', 'ilite'), '<span class="edit-link">', '</span>'); ?>
    <?php endwhile; // end of the loop. ?>-->
  <!--</div>--><!-- /.span12 -->
  <!--<div class="span4">
  </div>-->
<?php get_footer(); ?>