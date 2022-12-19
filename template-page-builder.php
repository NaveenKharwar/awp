<?php
/**
 * Template Name: Page Builder
 *
 * This is the template used for the pages and posts that are build with Page Builders
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AgilityWP
 */

 get_header();
 if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_content();
	}
}
get_footer();
