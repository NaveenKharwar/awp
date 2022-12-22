<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
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
		$header_image   = get_header_image();
		$featured_image = get_the_post_thumbnail_url( get_the_ID() );
		$header_style   = sprintf( "style='background-image: url(%s);'", esc_url( $featured_image ? $featured_image : $header_image ) );
		$header_class   = 'header-image';

		if ( get_theme_mod( 'set_page_header' ) ) {
			?>

		   <div
			<?php
			if ( is_home() ) {
				echo sprintf( "style='background-image: url(%s);'", esc_url( $header_image ) );
			} else {
				echo $header_style;
			}
			?>
		   class="<?php echo esc_attr( $header_class ); ?>">
			 <div class="container">
					<div class="col-lg-10 col-md-12 col-sm-12 mx-auto pl-lg-0">
			  <?php
				if ( is_single() ) {
					do_action( 'meta_view', 'design-two' );
				}
				?>
						 </div>
				 </div>
		   </div>

			<?php

		}
	}
}

 add_action( 'custom_header_hook', array( __NAMESPACE__ . '\CustomHeader', 'display' ) );
