<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package AgilityWP
 */

 namespace AgilityWP\CustomHeader;

 if ( ! defined( 'ABSPATH' ) ) {
	 exit; // Exit if accessed directly.
 }

 class CustomHeader {
	 /**
	  * Display the custom header.
	  */
	 public static function display() {
		$header_image = get_header_image();
		$header_style = sprintf( "style='background-image: url(%s);'", esc_url( $header_image ) );
		$header_class = 'header-image';

		 if ( get_theme_mod( 'set_page_header' ) && $header_image ) {
			 ?>

		   <div <?php echo $header_style; ?> class="<?php echo esc_attr( $header_class ); ?>">
			 <div class="container">
			   <div class="site-branding d-flex justify-content-start">
				 <div class="text-start">
				   <h1 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
				   <p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
				 </div>
			   </div>
			 </div>
		   </div>

		 <?php

		 }
	   }
 }

 add_action( 'custom_header_hook', array( __NAMESPACE__ . '\CustomHeader', 'display' ) );
