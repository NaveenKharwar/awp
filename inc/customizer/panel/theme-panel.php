<?php
/**
 * Managing theme customizaer panel.
 *
 * Name:    Theme Panel
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3
 * @package AgilityWP
 * @return void
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The "agilitywp_theme_panel" fucntion is handling the theme panel customization.
 *
 * @param mixed $wp_customize
 * @return void
 */

if ( ! function_exists( 'agilitywp_theme_options' ) ) {
    function agilitywp_theme_options( $wp_customize ) {
        $wp_customize->add_panel(
            'pan_theme_options',
            array(
                'priority'       => 10,
                'title'       => __( 'Agility Options', 'agilitywp' ),
                'description' => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'agilitywp' ),
                'capability'     => 'edit_theme_options',
                'theme_supports ' => 'custom-background'
            )
        );
    }

    add_action( 'customize_register', 'agilitywp_theme_options' );
}