<?php
/**
 * Customizer setting for gloabl colors.
 *
 * Name:    Global Coolors
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3'
 * @package AgilityWP
 */

namespace AgilityWP\Customizer\Sections;

if ( ! function_exists( 'colors' ) ) {
	/**
	 * colors
	 *
	 * @param  mixed $wp_customize
	 * @return void
	 */
	function colors( $wp_customize ) {
		$wp_customize->add_section(
			'sec_colors',
			array(
				'title'       => esc_html__( 'Colors', 'agilitywp' ),
				'description' => esc_html__( 'You can control the colors of your website!', 'agilitywp' ),
				'panel'       => 'pan_theme_options',
				'priority'    => '10'
			)
		);
	}

	add_action( 'customize_register', __NAMESPACE__ . '\colors' );
}