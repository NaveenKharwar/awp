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

namespace AgilityWP\Customizer\Options;

if ( ! function_exists( 'header_image' ) ) {

	/**
	 * header_image
	 *
	 * @param  mixed $wp_customize
	 * @return void
	 */
	function header_image( $wp_customize ) {

		$wp_customize->add_setting(
			'set_header_image',
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'set_header_image',
				array(
					'label'    => esc_html__( 'Header Colors', 'agilitywp' ),
					'section'  => 'sec_colors',
					'settings' => 'set_header_image',
				)
			)
		);
	}
	add_action( 'customize_register', __NAMESPACE__ . '\header_image' );
}
