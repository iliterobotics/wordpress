<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <header class="post-title">
        <h1><?php the_title();?></h1>
    </header>
  <div class="row content">
    <div class="span8">
     <p class="meta"><?php echo ilite_posted_on();?></p>
    <?php the_content(); ?>
    <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
    <?php endwhile; // end of the loop. ?>
    

<?php comments_template(); ?>
<?php ilite_content_nav('nav-below'); ?>

 </div><!-- /.span8 -->
    <div class="span4"><div class="well">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar')) :
    endif; ?></div></div><!-- /.span4 -->

</div><!-- /.row -->

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
