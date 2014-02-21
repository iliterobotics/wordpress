<?php 
/* This is the page content. */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<!-- -->

<div class="hero-unit hero-title" style="background-image: url(<?php if (has_post_thumbnail( $post->ID ) ): ?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?><?php echo $image[0]; ?><?php endif; ?>);">
<h1><?php the_title(); ?></h1><br>
<p><?php echo get_post_meta(get_the_ID(), '_subtitle', true); ?></p></div>
<!-- -->
    <!--<header class="page-title">
        <h1><?php the_title();?></h1>
    </header>
  <div class="row content">
    <div class="span12">-->
<?php the_content(); ?>
    <!--<?php wp_link_pages(
        array('before' => '<div class="page-links">' . __('Pages:', 'ilite'), 'after' => '</div>')
    ); ?>
    <?php edit_post_link(__('Edit', 'ilite'), '<span class="edit-link">', '</span>'); ?>
    <?php endwhile; // end of the loop. ?>-->
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