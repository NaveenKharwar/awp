<?php

/**
 * Customizer setting for page header.
 *
 * Name:    Page Header
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3'
 * @package AgilityWP
 */

/**
 * agilitywp_page_header_customize_register
 *
 * @param  mixed $wp_customize
 * @return void
 */
function agilitywp_page_header_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'sec_page_header',
		array(
			'title'       => __( 'Page Header Section', 'agilitywp' ),
			'description' => __( 'Check this to enable the header', 'agilitywp' ),
			'panel'       => 'pan_theme_options'
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
			'label'       => __( 'Enable Page Header', 'agilitywp' ),
			'section'     => 'sec_page_header',
			'settings'     => 'set_page_header',
			'type'        => 'checkbox',
		)
	);
}

add_action( 'customize_register', 'agilitywp_page_header_customize_register' );
