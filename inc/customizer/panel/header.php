<?php
/**
 * Managing theme customizaer panel.
 *
 * Name:    Header Panel
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3
 * @package AgilityWP
 * @return void
 */

namespace AgilityWP\Customizer\Panels;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'header_panel' ) ) {

    /**
     * header_panel
     *
     * @param  mixed $wp_customize
     * @return void
     */
    function header_panel( $wp_customize ) {
        $wp_customize->add_panel(
            'pan_header',
            array(
                'priority'       => 10,
                'title'       => __( 'Header', 'agilitywp' ),
                'description' => __( 'Header Modifications like image and colors', 'agilitywp' ),
                'capability'     => 'edit_theme_options',
            )
        );
    }

    add_action( 'customize_register', __NAMESPACE__.  '\header_panel' );
}