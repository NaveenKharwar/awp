<?php

/**
 * Customizer setting to resize the header logo.
 *
 * Name:    Logo Resizer
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3'
 * @package AgilityWP
 */

namespace AgilityWP\Customizer\Options;

if ( ! function_exists( 'logo_resizer' ) ) {

	/**
	 * logo_resizer
	 *
	 * @param  mixed $wp_customize
	 * @return void
	 */
	function logo_resizer( $wp_customize ) {

		$wp_customize->add_setting(
			'set_logo_resizer',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'agilitywp_sanitize_range',
			)
		);

		$wp_customize->add_control(
			new \Range_Custom_control(
				$wp_customize,
				'set_logo_resizer',
				array(
					'label'       => __( 'Max Width (px)', 'agilitywp' ),
					'section'     => 'title_tagline',
					'priority'    => '9',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 30,
						'max'  => 300,
						'step' => 5,
					),
				)
			)
		);
	}

	add_action( 'customize_register', __NAMESPACE__ . '\logo_resizer' );
}
