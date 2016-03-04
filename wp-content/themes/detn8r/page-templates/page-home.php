<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!-- Section -->
<section>
 
<?php $args = array('post_type' => 'slider', 'posts_per_page' => 20); ?> 

<?php $slides = get_posts($args); ?>

<?php if(is_array($slides) && count($slides) > 0): ?>

<!-- Slider Sec -->
<div class="slider_sec">
     <div id="demo">

		  <div id="owl-video" class="owl-carousel video">
			
			<?php $i = 0; foreach($slides as $post): setup_postdata($post); ?>
				
				<?php if(trim(get_field('video_url')) == ""): ?>
				
				<div class="item img">
					
					<?php if(has_post_thumbnail()): ?>
						
						<?php the_post_thumbnail('full', array('class' => 'img-responsive', 'height' => '100%')); ?>
						
					<?php endif; ?>
					
				</div>
				
				<?php else: ?>				
					
					<div class="item vid">
						<video width="100%" controls <?php echo ($i == 0)? 'autoplay' : ''; ?>>
						  <source src="<?php echo trim(get_field('video_url')); ?>" type="video/mp4" />
						  Your browser does not support the video tag.
						</video>                    
					</div>					
				
				<?php endif; ?>
				
			<?php $i++; endforeach; ?>
			
		  </div>

    </div>
</div>
<div class="clearfix"></div>

<?php endif; ?>

<?php if(have_posts()) : ?>

	<?php while(have_posts()) :  the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>

<?php endif; ?>



<!-- Top Sec -->
<div class="game_sec">
	<div class="container">
    	<h2 class="wow fadeIn" data-wow-duration="3s">Games</h2>
        <div class="row">
		
		<?php $args = array('post_type' => 'game', 'numberposts' => 3); ?>
		<?php $games = get_posts($args); ?>
		
			<?php $counter=0; foreach($games as $post): setup_postdata($post); ?>
			
        	<div class="col-lg-4 col-sm-4 col-xs-12 wow fadeIn" data-wow-duration="3s">
            	<div class="game_block">
                	<figure>
						
						<?php if(has_post_thumbnail()): ?>
							
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('game_image', array('class' => 'img-responsive')); ?>
							</a>
						<?php endif; ?>
						
					</figure>
                    <div class="detail">
                    	<i class="fa fa-gamepad gmae_icon"></i>                    
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php the_field('short_description'); ?></p>
					</div>
              </div>
            </div>
			
		<?php $counter++; endforeach; wp_reset_query(); ?>
		
            
        </div>
        
        <div class="more_details wow fadeIn" data-wow-duration="3s">
        	<button onclick="location.href='<?php echo site_url(); ?>/games/';">View More</button>
        </div>
    </div>
</div>



<!-- Movie Sec -->
<div class="movie_sec">
	<div class="container">
    	<h2 class="wow fadeIn" data-wow-duration="3s">Movies</h2>
        <div class="row">
		
		<?php $args = array('post_type' => 'movie', 'numberposts' => 4); ?>
		<?php $movies = get_posts($args); ?>
		
		<?php $counter=0; foreach($movies as $post): setup_postdata($post); ?>
		
        	<div class="col-lg-3 col-sm-3 col-xs-6 wow fadeIn" data-wow-duration="3s">
            	<div class="movie_block">
                	<figure>
						<?php if(has_post_thumbnail()): ?>
							
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('movie_image', array('class' => 'img-responsive')); ?>
							</a>
						
						<?php endif; ?>						
					</figure>
					
                    <div class="detail">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php the_field('short_description'); ?></p>
                    </div>
                </div>
            </div>

		<?php $counter++; endforeach; wp_reset_query(); ?>
		
        </div>
        
        <div class="more_details wow fadeIn" data-wow-duration="3s">
        	<button onclick="location.href='<?php echo site_url(); ?>/movies/';">View More</button>
        </div>
        
    </div>
</div>

<!-- TV Show -->
<div class="tv_show">
	<div class="container">
    	<h2 class="wow fadeIn">TV Shows</h2>
        <div class="tv_slider">		
	
		<?php $args = array('post_type' => 'show', 'numberposts' => 5); ?>
		<?php $shows = get_posts($args); ?>
	
        	<div id="owl-demo" class="owl-carousel wow fadeIn" data-wow-duration="3s">
			
			<?php $counter=0; foreach($shows as $post): setup_postdata($post); ?>
			
            	<div class="item">
					<figure>
					
					<?php if(has_post_thumbnail()): ?>					
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('show_image', array('class' => 'img-responsive')); ?>
						</a>
					<?php endif; ?>
					
					</figure>
                </div>
			
			<?php endforeach; ?>
			
			</div>
		</div>
    </div>
</div>

</section>


<?php
//get_sidebar();
get_footer();
