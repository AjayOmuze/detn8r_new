<?php

/* add stylesheets and javascript to child theme [start] */

add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles() {
	
  
  wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.css');
  wp_enqueue_style('child-main-style', get_stylesheet_directory_uri() . '/css/style.css');
  wp_enqueue_style('custom-responsive-style', get_stylesheet_directory_uri() . '/css/custom.css');
  wp_enqueue_style('font-awesome-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');  
  wp_enqueue_style('animate-style', get_stylesheet_directory_uri() . '/css/animate.css');  
  
  wp_enqueue_style('owl-carousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.css');
  wp_enqueue_style('owl-theme-style', get_stylesheet_directory_uri() . '/css/owl.theme.css');
    

  /* adding js */    
  
	wp_enqueue_script('jquery-js', get_stylesheet_directory_uri() . '/js/jquery.js', array( 'jquery' ) ); 
	wp_enqueue_script('javascript-js', get_stylesheet_directory_uri() . '/js/javascript.js', array( 'jquery' ) ); 
	wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) ); 
	wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ) ); 	
	wp_enqueue_script('wow-js', get_stylesheet_directory_uri() . '/js/wow.min.js', array( 'jquery' ) ); 	
	wp_enqueue_script('retina-js', get_stylesheet_directory_uri() . '/js/retina.js', array( 'jquery' ) ); 	
	//wp_enqueue_script('vue1oix-js', '//use.typekit.net/vue1oix.js', array( 'jquery' ) ); 	
    
}

/* add stylesheets and javascript to child theme [end] */

remove_filter('the_content', 'wpautop');


require "custom-post-type.php";


add_sidebar("Footer Contact Block", "footer_contact_block");
add_sidebar("Contact Popup", "contact_popup");

add_action( 'after_setup_theme', 'setup' );

function setup() {
	add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme
    add_image_size( 'slide_image', 1366, 564, true ); // slider image
    add_image_size( 'game_image', 370, 228, true ); // game image
    add_image_size( 'movie_image', 264, 180, true ); // movie image
    add_image_size( 'show_image', 250, 170, true ); // movie image
    add_image_size( 'single_image', 770, 433, true ); // Single image
}




// remove admin bar for non admin user
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	
	if (!current_user_can('administrator') && !is_admin()) {

	  show_admin_bar(false);

	}
	
}