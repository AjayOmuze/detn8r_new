<?php
/**
 * Template Name: Movie List
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section>
	<div class="game_sec">
		<div class="container">
			<h2><strong><?php the_title(); ?></strong></h2>
			<div class="row">
					
				<?php if ( have_posts() ) : ?>

					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
					<?php $args = array('post_type' => 'movie', 'posts_per_page' => 9, 'paged' => $paged); ?>
					<?php query_posts($args); ?>
					<?php $counter = 1; while ( have_posts() ) : the_post(); ?>
					
							<div class="col-lg-4 col-sm-4 col-xs-12">
								<div class="game_block">
								
									<?php if(has_post_thumbnail()): ?>
									
										<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('game_image', array('class' => 'img-responsive')); ?></a></figure>
										
									<?php else : ?>
									
										<figure><a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image-small.jpg" class="img-responsive" /></a></figure>
									
									<?php endif ?>
									
									<div class="detail">
										<i class="fa fa-video-camera gmae_icon"></i>                    
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<p><?php the_field('short_description'); ?></p>
									</div>
							  </div>
							</div>
							
					<?php if($counter %3 ==0){ ?></div><div class="row"><?php } ?>
					<?php $counter++; endwhile; ?>
					
					<div class="clearfix">&nbsp;</div>
					<div class="clearfix">&nbsp;</div>
					
					<div class="pagination_sec">
						<?php the_posts_pagination( array(
							'prev_text'          => __( 'PREV', 'twentyfifteen' ),
							'next_text'          => __( 'NEXT', 'twentyfifteen' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
						) ); ?>
					</div>
					
				<?php else : get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</div>
		</div>
	</div>
	
</section>


<?php
get_footer();
