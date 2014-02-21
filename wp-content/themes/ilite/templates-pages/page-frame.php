<?php
/**
 * Template Name: Page - iFrame
 * Description: Creates an iFrame based on Subtitle.
 *
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<!-- -->
<iframe src="<?php echo get_post_meta(get_the_ID(), '_subtitle', true); ?>" height="3000" style="width:100%;border:none;margin-top:-20px;" scrolling="yes"></iframe>
<!-- -->
    <!--<header class="page-title">
        <h1><?php the_title();?></h1>
    </header>
  <div class="row content">
    <div class="span12">-->
    <!--<?php wp_link_pages(
        array('before' => '<div class="page-links">' . __('Pages:', 'ilite'), 'after' => '</div>')
    ); ?>
    <?php edit_post_link(__('Edit', 'ilite'), '<span class="edit-link">', '</span>'); ?>-->
    <?php endwhile; // end of the loop. ?>
  <!--</div>--><!-- /.span12 -->
  <!--<div class="span4">
  </div>-->
<!-- ?php get_sidebar(); -->


<!-- Begin Footer -->
<br>
    <div class="row-fluid">
        <div class="span12">
            <?php if (function_exists('ilite_breadcrumbs')) {
            ilite_breadcrumbs();
        } ?>
        </div>
        <!--/.span12 -->
    </div><!--/.row -->
<?php get_footer(); ?>