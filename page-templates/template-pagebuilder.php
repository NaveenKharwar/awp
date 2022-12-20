<?php
/**
 * Template Name: Page Builder - Full Width
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
		get_template_part( 'template-parts/content', 'pagebuilder' );
	}
}
get_footer();
