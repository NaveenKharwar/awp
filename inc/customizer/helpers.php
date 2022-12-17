<?php
/**
 * Helper functions for the Customizer.
 *
 * Name:    Helpers
 * Author:  LucenThemes <info@lucenthemes.com>
 *
 * @version 0.0.3
 * @package AgilityWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Sanitize Checkbox agilitywp_sanitize_checkbox
 *
 * @since 0.0.3
 */
function agilitywp_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitize Range value agilitywp_sanitize_range
 *
 * @since 0.0.3
 */
function agilitywp_sanitize_range( $val ) {
	return is_numeric( $val ) ? $val : '';
}