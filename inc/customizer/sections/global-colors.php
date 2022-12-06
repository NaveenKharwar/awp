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

/**
 * agilitywp_global_color
 *
 * @param  mixed $wp_customize
 * @return void
 */
if ( ! function_exists( 'agilitywp_global_color' ) ) {
	function agilitywp_global_color( $wp_customize ) {
		$wp_customize->add_section(
			'sec_global_colors',
			array(
				'title'       => esc_html__( 'Global Colors', 'agilitywp' ),
				'description' => esc_html__( 'You can control the colors of your website!', 'agilitywp' ),
				'panel'       => 'pan_theme_options',
				'priority'    => '10'
			)
		);
	}

	add_action( 'customize_register', 'agilitywp_global_color' );
}