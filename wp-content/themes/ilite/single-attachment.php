<?php get_header(); ?>

    <header class="post-title">
        <h1><?php the_title();?></h1>
    </header>
<div class="row content">
    <div class="span8">

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
$photographer = get_post_meta($post->ID, 'be_photographer_name', true);
$photographerurl = get_post_meta($post->ID, 'be_photographer_url', true);
?>
<h1><?php the_title(); ?></h1>
<div class="photometa"><span class="photographername"><?php echo $photographer; ?></span> // <a href="<?php echo $photographerurl ?>" target="_blank" class="photographerurl"><?php echo $photographerurl ?></a></div>
     <div class="entry-attachment">
<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
     <p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
     </p>
<?php else : ?>
     <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
<?php endif; ?>
     </div>
<?php endwhile; ?>
<?php endif; ?>

   

<?php comments_template(); ?>
<?php ilite_content_nav('nav-below'); ?>

 </div><!-- /.span8 -->
    <div class="span4"><div class="well">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar')) :
    endif; ?></div></div><!-- /.span4 -->

</div><!-- /.row -->
<?php get_footer(); ?>
