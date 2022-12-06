<?php

/**
 * Customizer controller to change header color.
 *
 * Name:    Header Colors
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
function agilitywp_header_color( $wp_customize ) {

	$wp_customize->add_setting(
		'set_header_color',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'set_header_color',
			array(
				'label'       => esc_html__( 'Header Colors', 'agilitywp' ),
				'section'     => 'sec_global_colors',
				'settings'    => 'set_header_color'
			)
		)
	);
}

add_action( 'customize_register', 'agilitywp_header_color' );