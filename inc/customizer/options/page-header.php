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

		$wp_customize->add_setting(
			'set_page_header',
			array(
				'type'              => 'theme_mod',
				'default'           => 'hide',
				'sanitize_callback' => 'agilitywp_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new \Toggle_Control (
				$wp_customize,
				'set_page_header',
				array(
					'label'    => __( 'Enable Page Header', 'agilitywp' ),
					'section'  => 'header_image',
					'settings' => 'set_page_header',
					'type'     => 'toggle',
					'priority' => 1
				)
			)
		);
	}

	add_action( 'customize_register', __NAMESPACE__ . '\header_options' );
}
