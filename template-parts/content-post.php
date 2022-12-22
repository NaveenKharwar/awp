<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AgilityWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( !get_theme_mod( 'set_page_header' ) ) {
		echo '<div class="entry-meta">';
		do_action( 'meta_view', 'design-one' );
		echo '</div>';
		if ( has_post_thumbnail()  ) {
			agilitywp_post_thumbnail();
		}
	}
	?>
	<header class="entry-header">
		<?php
		$agilitywp_categories_list = get_the_category_list();
		if ( $agilitywp_categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'agilitywp' ) . '</span>', $agilitywp_categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<div class="entry-content">
		<?php

			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'agilitywp' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);


			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'agilitywp' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
	<footer class="entry-footer d-flex justify-content-between align-items-center border-top border-bottom py-4">
		<?php agilitywp_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
