<?php

/**
 * Customizer setting for page header.
 *
 * Name:    Page Header Options
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3'
 * @package AgilityWP
 */

namespace AgilityWP\Customizer\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'header_options' ) ) {

	/**
	 * header_options
	 *
	 * @param  mixed $wp_customize
	 * @return void
	 */
	function header_options( $wp_customize ) {

		$wp_customize->add_section(
			'sec_page_header',
			array(
				'title'       => __( 'Header Image Options', 'agilitywp' ),
				'description' => __( 'Check this to enable the header', 'agilitywp' ),
				'panel'       => 'pan_header',
			)
		);

		$wp_customize->add_setting(
			'set_page_header',
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'agilitywp_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'set_page_header',
			array(
				'label'    => __( 'Enable Page Header', 'agilitywp' ),
				'section'  => 'sec_page_header',
				'settings' => 'set_page_header',
				'type'     => 'checkbox',
			)
		);

	}

	add_action( 'customize_register', __NAMESPACE__ . '\header_options' );
}
