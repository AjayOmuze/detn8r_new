<?php session_start();
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(is_front_page() && !isset($_SESSION['home_popup'])): ?>

<?php $_SESSION['home_popup'] = 'First Time...'; ?>

<!-------------welcome logo---------------------------->
<div class="display_logo1">	
    <div class="container">
        <div class="row">
			<?php dynamic_sidebar('contact_popup'); ?>
        </div>
    </div>
</div>

<?php endif; ?>

<!-------------welcome logo---------------------------->

<!-- Header -->
<header>
<!-- Top Part -->
<div class="top_part" id="header">
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.jpg" alt=""></a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<?php
				  $defaults = array(
					  'theme_location' => 'primary',
					  'container' => false,
					  'menu_class' => 'menu',
					  'menu_id' => 'menu-header',
					  'echo' => true,
					  'fallback_cb' => 'wp_page_menu',
					  'items_wrap' => '<ul class="nav navbar-nav" id="%1$s">%3$s</ul>',
					  'depth' => 2,
				  );
				  wp_nav_menu($defaults);
				?>
			
			</div>
		</nav>
    </div>
</div>    
</header>
