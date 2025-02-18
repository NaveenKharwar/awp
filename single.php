<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AgilityWP
 */

get_header();
?>

<?php do_action('custom_header_hook',); ?>

<div class="container">
	<div class="row mb-5">
<div class="col-lg-10 col-12 mx-auto pl-lg-0">
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'post' );
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle fw-bold">' . esc_html__( 'Previous:', 'agilitywp' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle fw-bold">' . esc_html__( 'Next:', 'agilitywp' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div>
<?php
get_footer();
