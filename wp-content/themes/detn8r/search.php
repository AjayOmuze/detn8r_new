<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<section>

	<div class="game_sec">
		<div class="container">
			<div class="row">
			
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>


			
        	<div class="col-lg-4 col-sm-4 col-xs-12 search_result_block">
            	<div class="game_block">
                	
					<figure>							
						<?php if(has_post_thumbnail()) : ?>
				
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail("game_image", array("class" => "img-responsive")); ?> 
							</a>
							
						<?php else: ?>
						
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image-small.jpg" class="img-responsive" />
						
						<?php endif; ?>
												
					</figure>
							
                    <div class="detail">
                    	<i class="fa fa-gamepad gmae_icon"></i>                    
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php the_field('short_description'); ?></p>
					</div>
              </div>
            </div>
			
				<?php endwhile; ?>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="pagination_sec">
			<?php

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'PREV', 'twentyfifteen' ),
				'next_text'          => __( 'NEXT', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) ); ?>
			</div>
		<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

</div>
</div>
</div>
</section>
<?php get_footer(); ?>
