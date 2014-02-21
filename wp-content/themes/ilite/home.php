<?php 
/* This is the homepage. */
get_header(); ?>

<!-- Courasel -->
<div class="row-fluid"><div class="span12">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Video')) :
endif; ?>
<div id="homeCarousel" class="carousel carousel-homepage slide" style="margin-top: -20px;">

  <!-- Carousel nav -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Carousel items -->
  <div class="carousel-inner">
  <!-- Base Item -->
  <div id="post-01" class="item active" style="height:310px!important;">
      <div class="carousel-slide-bg" style="background:url(/wp-content/themes/ilite/img/home-placeholder-stl2013.jpg);width:100%;height:516px;background-size:cover;background-position:bottom;"></div>
      <!--<img width="1024" height="516" src="/wp-content/themes/ilite/img/home-lead-image.jpg" class="attachment-large wp-post-image" style="width:100%;height:310px!important;" alt="cheers">-->
      <div class="overlay-unit">
        We are <b>team 1885, ILITE Robotics from Haymarket, Virginia.</b> Made up of students from high schools across Prince William County, Virginia, we are <b><a href="/about/mission-vision" style="color:#65E144">Inspiring Leaders in Technology and Engineering</a></b>, while competing in FIRST Robotics. We have served as a stand out team with the primary goal of instilling young persons with the skills and passion to pursue careers in science, technology, engineering, and math…
       <br/><br/><a href="about/mission-vision" class="shortcode button green">Read More &rarr;</a></div>
  </div>
    <?php
    $slideshow = array( 'post_type' => 'slideshow', );
    $loop = new WP_Query( $slideshow );
    function add_stylesheet(){
         wp_enqueue_style('my_styles','http://fonts.googleapis.com/css?family=Open+Sans:300');
    }
    add_action('wp_print_styles', 'add_stylesheet');
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <!-- Item -->
    <div id="post-<?php the_ID(); ?>" class="item" style="height:310px!important;">
          <script>$('#homeCarousel').carousel()</script>
      <?php $large = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
      echo ''.get_the_post_thumbnail($post->ID, 'large');'' ?>
      <div class="overlay-unit">
                <strong><?php the_title(); ?></strong><br />
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
<?php $posts_query = new WP_Query('posts_per_page=4');
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