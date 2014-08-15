<?php 
/* This is the homepage. */
get_header(); ?>

<!-- Courasel -->
<div class="row-fluid"><div class="span12">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Video')) :
endif; ?>
<div id="homeCarousel" class="carousel carousel-homepage slide" style="margin-top: -20px;">

  <?php
    $slideshow = array( 'post_type' => 'slideshow', );
    $loop = new WP_Query( $slideshow );
    $dotCount = 0;
    $slideCount = 0;
   ?>

  <!-- Carousel nav -->
  <ol class="carousel-indicators">
   	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <li data-target="#myCarousel" data-slide-to="<?php print $dotCount; ?>" class="<?php if ($dotCount == 0) { ?>active<?php } $dotCount++; ?>"></li>
    <?php endwhile; ?>
  </ol>

  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
     <?php $slidebg = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
    <!-- Item -->
    <div id="post-<?php the_ID(); ?>" class="<?php if ($slideCount == 0) { ?>active <?php } $slideCount++; ?>item" style="background-image: url(<?php print $slidebg; ?>);">
           <div class="overlay-unit">
                <strong class="entry-title"><?php the_title(); ?></strong><br />
                <div class="entry-content"><?php the_content(); ?></div>
                <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'slideshow_button_text', true ) ); ?>" class="<?php echo esc_html( get_post_meta( get_the_ID(), 'slideshow_button_color', true ) ); ?>">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'slideshow_button_url', true ) ); ?></a>
                <br />
      </div>
      </div>
    <?php endwhile; ?>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#homeCarousel" data-slide="prev" style="z-index:999">&lsaquo;</a>
  <a class="carousel-control right" href="#homeCarousel" data-slide="next" style="z-index:999">&rsaquo;</a>
  </div>
  <!-- Carousel scripts -->
  <script>
  </script>

</div>
</div>

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Content')) :
endif; ?>



<!-- Content -->
<div class="row-fluid">
<div class="span3">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Left')) :
endif; ?>
</div>

<div class="span6 headlines"><div style="text-align:center"><h2>NEWS &amp; UPDATES:</h2></div>   
<?php $posts_query = new WP_Query('posts_per_page=5');
        while ($posts_query->have_posts()) : $posts_query->the_post();
    ?>
    <span class="headlines-date"><?php the_time('Y/m/d') ?></span> <span class="headlines-title"><?php the_title(); ?></span><br/>
    <div class="headlines-content"><?php the_excerpt(20); ?> <a href="<?php the_permalink(); ?>" class="headlines-link">Read More</a></div><br/>
<?php endwhile; wp_reset_query(); ?>
</div>

<div class="span3">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Right')) :
endif; ?>
</div>

</div><!-- /row --><br/>

<?php //get_sidebar('homepage'); ?>
<?php get_footer(); ?>