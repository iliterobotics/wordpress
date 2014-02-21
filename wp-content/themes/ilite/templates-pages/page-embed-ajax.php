<?php
/**
 * Template Name: Embed - AJAX
 * Description: A page with no HTML basics. Embeds only!
 *
 */
 ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
