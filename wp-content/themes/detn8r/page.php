<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

<section>

	<div class="about_sec">

		<div class="container">

			<h2><?php the_title(); ?></h2>
			
			<div class="info"><span><?php the_title(); ?> Coming Soon...</span></div>
				<?php the_content(); ?>
			<div class="clearfix">&nbsp;</div>
			
		</div>

	</div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
