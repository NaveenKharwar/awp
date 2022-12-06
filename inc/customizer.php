<?php
/**
 * AgilityWP Theme Customizer
 *
 * @package AgilityWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agilitywp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control( 'background_color'  )->section   = 'sec_global_colors';
	$wp_customize->get_section('background_image')->panel = 'pan_theme_options';
	$wp_customize->get_section('header_image')->panel = 'pan_theme_options';
	$wp_customize->get_section('header_image')->title = esc_html__( 'Default Header Image', 'agilitywp' );
	$wp_customize->get_section('background_image')->priority  = 11;
	$wp_customize->get_section( 'custom_css')->title = esc_html__( 'Custom Style', 'agilitywp' );
	$wp_customize->get_panel( 'nav_menus')->title = esc_html__( 'Navigation Menu', 'agilitywp' );
	$wp_customize->get_section( 'static_front_page' )->priority  = 12;
	$wp_customize->get_panel( 'nav_menus' )->priority  = 11;

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'agilitywp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'agilitywp_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'agilitywp_customize_register', 50);

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function agilitywp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function agilitywp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
