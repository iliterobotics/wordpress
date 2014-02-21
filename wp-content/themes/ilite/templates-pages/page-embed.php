<?php
/**
 * Template Name: Embed - Advanced
 * Description: A page with absolutely nothing. Embeds only!
 *
 */
 ?>
 <?php while (have_posts()) : the_post(); ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title><?php the_title(); ?></title>
 </head>
 <body>
 	<?php the_content(); ?>
 </body>
 </html>
 <?php endwhile; ?>
