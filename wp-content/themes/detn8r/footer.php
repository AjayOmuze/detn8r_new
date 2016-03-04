<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<!-- Footer -->
<footer>
<!-- Footer Detail -->
<div class="footer_detail">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-3 col-sm-3 col-xs-12 wow fadeIn" data-wow-duration="3s">
            	<h3>Navigation</h3>
                <ul class="footer_link">
				<?php $menu = 'Footer Menu';            
					$args = array(                
						'order' => 'ASC',                
						'orderby' => 'menu_order',                
						'post_type' => 'nav_menu_item',                
						'post_status' => 'publish',                
						'output' => ARRAY_A,                
						'output_key' => 'menu_order',                
						'nopaging' => true,                
						'update_post_term_cache' => false);            
					$items = wp_get_nav_menu_items($menu, $args);          
					
					foreach ($items as $item): ?>
						<li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
					<?php endforeach ?>
					
                </ul>
				
            </div>
            
            <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeIn" data-wow-duration="3s">
            	<h3>Usefull Links</h3>
                <ul class="footer_link">
                	<?php $menu = 'Usefull Links';            
					$args = array(                
						'order' => 'ASC',                
						'orderby' => 'menu_order',                
						'post_type' => 'nav_menu_item',                
						'post_status' => 'publish',                
						'output' => ARRAY_A,                
						'output_key' => 'menu_order',                
						'nopaging' => true,                
						'update_post_term_cache' => false);            
					$items = wp_get_nav_menu_items($menu, $args);          
					
					foreach ($items as $item): ?>
						<li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
					<?php endforeach ?>
					
					<?php /* Login Code Starts */ ?>
						
						<?php if ( is_user_logged_in() ): ?>
						
							<li><a href="<?php echo site_url(); ?>/profile">Profile</a></li>
							<li><a href="<?php echo wp_logout_url(site_url()); ?>">Logout</a></li>
							
						<?php else : ?>
						
							<li><a href="<?php echo site_url(); ?>/login">Login</a></li>
							<li><a href="<?php echo site_url(); ?>/signup">Sign Up</a></li>
						
						<?php endif; ?>
						
                </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeIn" data-wow-duration="3s">
            	<h3>Social Hub</h3>
                <ul class="f_social">
                	<li><a href="<?php echo kc_get_option("social", "social-media-settings", "facebook"); ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php echo kc_get_option("social", "social-media-settings", "twitter"); ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php echo kc_get_option("social", "social-media-settings", "gplus"); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?php echo kc_get_option("social", "social-media-settings", "linkedin"); ?>"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeIn" data-wow-duration="3s">
            	<h3>Contact Us</h3>
                <div class="easy_contact">
                	<?php dynamic_sidebar('footer_contact_block'); ?>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Copyright -->
<div class="copyright">
	<div class="container">
    	<?php echo kc_get_option("copyright", "copyright", "copyright"); ?>
    </div>
</div>
</footer>


<?php wp_footer(); ?>

<script>

  jQuery(document).ready(function () {
	  
	new WOW().init();

	<?php if(is_front_page()): ?>
		
		jQuery('.display_logo1').on('click', function(){
			jQuery('.display_logo1').fadeOut('slow');
		});
		
	<?php endif; ?>
	  
	jQuery('p:empty').remove();
	  
	jQuery(".dropdown").hover(
		function(){ $(this).addClass('open') },
		function(){ $(this).removeClass('open') }
    );
	  
	var owl = $('#owl-demo');
      owl.owlCarousel({
        margin:20,
        loop: true,
		dots:true,
		nav:true,
		items:6,
        responsive: {
          0: {
            items: 1
          },
          480: {
            items: 2
          },
		  767: {
            items: 3
          },
		  992: {
            items: 3
          },
          1000: {
            items:4,
          }
        }
      });
	  
	    var owl_video = $("#owl-video")
        owl_video.owlCarousel({
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true,
          video: true,
          items: 1,
          nav: true,
          loop: true,
          navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
          ]


        });


        function next_slide() {
          owl_video.trigger('next.owl.carousel');
        }
		
        var myVar = setInterval(next_slide, 5000);

        owl_video.on('changed.owl.carousel', function (event) {

          if ($('#owl-video').find('.item:eq(' + event.item.index + ')').hasClass('vid')) {
            clearInterval(myVar);

            $('#owl-video').find('.item:eq(' + event.item.index + ')').find('video').get(0).play();
          }else{
            $('#owl-video').find('.vid').each(function(){
              $(this).find('video').get(0).pause();
            });
			clearInterval(myVar);
            myVar = setInterval(next_slide, 5000);
          }
        });
        
        $('video').on('ended', function(){
          owl_video.trigger('next.owl.carousel');
        })

	
	if(jQuery('.search_result_block').size() > 0){
		
		equalHeight(jQuery('.search_result_block'));
		
	}
	
	// equal height
	
	function equalHeight(group) {
	  tallest = 0;
	  group.each(function () {
		thisHeight = $(this).height();
		if (thisHeight > tallest) {
		  tallest = thisHeight;
		}
	  });
	  group.height(tallest);
	}
	
  });
  
</script>

</body>
</html>
