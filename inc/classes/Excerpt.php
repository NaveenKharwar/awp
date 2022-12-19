<?php
/**
 * Class for customizing the excerpt more text
 */


namespace AgilityWP\Classes;

class Excerpt {
  /**
   * Constructor method to add the filter
   */
  public function __construct() {
    add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );
  }

  /**
   * Customize the excerpt more text
   *
   * @param string $more The default excerpt more text
   * @return string The customized excerpt more text
   */
  public function excerpt_more( $more ) {
    return sprintf(
      '<p class="text-end"><a href="%1$s" class="ead-more_tag">%2$s</a></p>',
      esc_url( get_permalink( get_the_ID() ) ),
      /* translators: %s: arrow icon */
      sprintf( __( 'Continue reading %s', 'agilitywp' ), '<span> &#8594; </span>' )
    );
  }
}

new \AgilityWP\Classes\Excerpt();