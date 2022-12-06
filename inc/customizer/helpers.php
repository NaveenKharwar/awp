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
 * Sanitize Checkbox tabut_customizer_sanitize_checkbox
 *
 * @param  mixed $checked
 * @return void
 */
function agilitywp_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}