<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<?php if(have_posts()): ?>

<section>

	<div class="game_sec">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				
				<?php while(have_posts()): the_post(); ?>
					
					<?php if(has_post_thumbnail()) : ?>
					
						<?php the_post_thumbnail('full' ,array('class' => 'img-responsive')); ?>
					
					<?php else: ?>
					
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image.jpg" class="img-responsive" />
						
					<?php endif; ?>					
					
					<div class="infobar">						
							<div class="pull-left"><i class="fa fa-calendar"></i>&nbsp;<?php echo get_the_date('M d, Y'); ?></div>
							<div class="pull-right"><i class="fa fa-user"></i>&nbsp;<?php echo ucfirst(get_the_author()); ?></div>						
					</div>
					<p></p>
					
					<h3><?php the_title(); ?></h3>
					
					<div class="info">
						<?php the_content(); ?>
					</div>
					
					
				<?php endwhile; ?>
									<div class="clearfix">&nbsp;</div>
				
				<?php comments_template(); ?>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-8 rightbelt">
							
					<div class="top_search">
						
						<form action="<?php echo site_url(); ?>">
							<input type="text" class="" name="s">
							<button><i class="glyphicon glyphicon-search"></i> </button>
						</form>
						
					</div>
					
					<div class="clearfix">&nbsp;</div>
			
					<div class="social">
						<ul>
							<li><a href="<?php echo kc_get_option("social","social-media-settings","facebook"); ?>"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo kc_get_option("social","social-media-settings","twitter"); ?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo kc_get_option("social","social-media-settings","gplus"); ?>"><i class="fa fa-google"></i></a></li>
							<li><a href="<?php echo kc_get_option("social","social-media-settings","linkedin"); ?>"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="<?php echo kc_get_option("social","social-media-settings","pinterest"); ?>"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
			
					<div class="recent_post_wrapper">
					
					<?php $args = array("post_type" => "movie", "numberposts" => 3); ?>
					<?php $postlist = get_posts($args); ?>
					<?php foreach($postlist as $post) : setup_postdata($post); ?>
						
						<div class="clearfix">						
							
							<figure>
							
							<?php if(has_post_thumbnail()) : ?>
					
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail("single_image", array("class" => "img-responsive")); ?> 
								</a>
								
							<?php endif; ?>
							
							</figure>							
							
							<div class="recent_post">
								<div class="date pull-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								<div class="atuthor pull-right"><i class="fa fa-calendar"></i>&nbsp;<?php echo get_the_date('M d, Y'); ?></div>						
							</div>						
							
						</div>						
					<div class="clearfix">&nbsp;</div>	
					<?php endforeach; ?>
					
					</div>
			
				</div>
				
			</div>
		</div>
	</div>

</section>
<?php endif; ?>
<?php get_footer(); ?>