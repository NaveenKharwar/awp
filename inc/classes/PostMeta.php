<?php
/**
 * Custom hook to show the post type meta.
 *
 * @package AgilityWP
 */

namespace AgilityWP\PostMeta;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if accessed directly.
}

class PostMeta {
	public function displayMeta( $meta_slayout ) {
		$author_id = get_post_field( 'post_author', get_the_ID() );
		$author_url = esc_url( get_author_posts_url( $author_id ) );
		$author_name = get_the_author_meta( 'display_name', $author_id );
		$avatar_url = esc_url( get_avatar_url( $author_id ) );
		$page_class = esc_attr( is_page() ) ? ' postmeta__is-page' : '';
	  ?>
		<div class="entry-info <?php echo esc_attr( $meta_slayout ) . $page_class;  ?>">
		<?php if ( get_theme_mod( 'set_page_header' )) { ?>
		<div class="title">
			<h1><?php the_title( ); ?></h1>
		</div>
		<?php } ?>
		  <div class="author">
			<img src="<?php echo $avatar_url;?>" alt="<?php echo $author_name; ?>" title="<?php echo $author_name; ?>" />
			<div class="author-name">
			  <span> <a href="<?php echo $author_url ?>" title="<?php echo $author_name; ?>"><?php echo $author_name; ?></a></span>
			</div>
		  </div>
		  <?php if ( !is_page() ) { ?>
		  <div class="publish-date">
			<p><?php echo get_the_date(); ?></p>
		  </div>
		  <?php } ?>
		  <?php if( comments_open() ) { ?>
		  <div class="redirect-comment">
			<p>
			<a href="<?php the_permalink(); ?>#commentform"><?php
			$agilitywp_comment_count = get_comments_number();
			if ( '1' === $agilitywp_comment_count ) {
			  printf(
				/* translators: 1: title. */
				esc_html__( 'One comment', 'agilitywp' )
			  );
			} else {
			  printf(
				/* translators: 1: comment count number, 2: title. */
				esc_html(
				  _nx(
					'%1$s comment',
					'%1$s comments',
					$agilitywp_comment_count,
					'comments title',
					'agilitywp'
				  )
				),
				number_format_i18n( $agilitywp_comment_count ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			  );
			}
			?></a>
			</p>
		  </div>
		  <?php } ?>
		</div><!-- .entry-meta -->
	  <?php
	}
  }

  $postMeta = new PostMeta();
  add_action( 'meta_view', array( $postMeta, 'displayMeta' ) );