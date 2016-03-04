<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

<section>

		<?php the_content(); ?>
	
</section>

<?php endif; ?>

<?php
get_footer();
