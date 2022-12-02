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
 * Add custom section and setting to the Admin Customizer
 * */
function agilitywp_page_header_customize_register( $wp_customize ) {
	$main_section_id = 'sec_page_header';
	$main_setting_id = 'set_page_header';

	$wp_customize->add_section(
		$main_section_id,
		array(
			'title'       => esc_html__( 'Page Header Section', 'agilitywp' ),
			'description' => esc_html__( 'Check this to enable the header', 'agilitywp' ),
		)
	);

	$wp_customize->add_setting(
		$main_setting_id,
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		$main_setting_id,
		array(
			'title'       => esc_html__( 'Page Header', 'agilitywp' ),
			'section'     => $main_section_id,
			'type'        => 'checkbox',
		)
	);
}

add_action( 'customize_register', 'agilitywp_page_header_customize_register' );
