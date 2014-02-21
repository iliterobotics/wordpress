<?php
/**
 * Template Name: Page - Blog Template
 * Description: Displays blog posts with pagination and featured image.
 *
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

    <header class="subhead" id="overview">
        <h1><?php the_title();?></h1>
    </header>

  <div class="row content">
    <div class="span8">
      <?php the_content();
endwhile;
// end of the loop
wp_reset_query();
// resetting the loop
?>
    <hr/>

<?php
// Blog post query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 0));
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>

        <p class="meta"><?php echo ilite_posted_on();?></p>

        <div class="row">
            <div class="span2">

                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php echo ilite_autoset_featured_img(); ?></a>

            </div>
            <!-- /.span2 -->
            <div class="span6">
                <?php the_excerpt();?>
            </div>
            <!-- /.span6 -->
        </div>
        <!-- /.row -->
        <hr/>
    </div><!-- /.post_class -->
    <?php endwhile; endif; ?>
        

   </div><!-- /.span8 -->
   <div class="span4">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar')) :
    endif; ?>
    </div>
<?php get_footer(); ?>