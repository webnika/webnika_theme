<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Be_The_Change
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- FAVICON -->
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<!-- JQUERY -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script>

<!-- Smoothscroll -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/smooth-scroll/jquery.smooth-scroll.js"></script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">

<!-- Swiper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>

<!-- GOOGLE MAP -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO0MicGLloGVIL7-6Q36MZCtfdVBKq0Q4"></script>

<?php wp_head(); ?>

<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|Archivo+Black|Rammetto+One&subset=latin,latin-ext" rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site no-sidebar">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'webnika_theme' ); ?></a>

	<!-- Header-->
	<header id="masthead" class="site-header" role="banner">
		<!-- Dulezite upozorneni -->
		<?php 
		/* -----------------------------------------------------------------------------
				 Odkomentovat v pripade potreby a zmenit text
		 ------------------------------------------------------------------------------
		<div class="info-panel">
			<p>
				Z důvodu výpadku telekomunikačních služeb nás kontaktujte na těchto telefonních číslech: 
				<strong>777 221 839</strong> nebo <strong>602 271 675</strong>
			</p>
		</div>
		-------------------------------------------------------------------------------*/
		?>
		<div class="header-content">
			<div class="row">
				<div class="col-sm-2">
					<?php webnika_theme_the_custom_logo(); ?>
					<?php get_template_part( 'components/header/site', 'branding' ); ?>
				</div>
				<div class="col">
					<?php get_template_part( 'components/navigation/navigation', 'top' ); ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
    
	<div id="content" class="site-content">
