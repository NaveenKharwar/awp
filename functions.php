<?php
/**
 * AgilityWP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgilityWP
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------------------------
   DEFINE CONSTANTS
   --------------------------------------------------------------------------------------------- */
define('AGILITYWP_VERSION', '0.0.3');
define('AGILITYWP_THEME_DIR', trailingslashit(get_template_directory_uri()) . 'assets/');
define('THEME_DIR', get_template_directory());

/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'AGILITYWP_VERSION' ) ) :
	function agilitywp_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'agilitywp', THEME_DIR . '/languages' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support(
			'custom-logo',
			[
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);
		add_theme_support(
			'custom-background',
			apply_filters(
				'agilitywp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support(
			'custom-header',
			array(
				'flex-width'             => true,
				// 'width'                  => 1680,
				'flex-height'            => true,
				// 'height'                 => 500,
			)
		);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'agilitywp' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'agilitywp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agilitywp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agilitywp_content_width', 640 );
}
add_action( 'after_setup_theme', 'agilitywp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agilitywp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'agilitywp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'agilitywp' ),
			'before_widget' => '<section id="%1$s" class="sidebar-block widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget', 'agilitywp' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'agilitywp' ),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-6 col-12  widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title"><span>',
			'after_title'   => '</span></h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Bottom Widget', 'agilitywp' ),
			'id'            => 'footer_bottom_widget',
			'description'   => esc_html__( 'Add widgets here.', 'agilitywp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title"><span>',
			'after_title'   => '</span></h6>',
		)
	);
}
add_action( 'widgets_init', 'agilitywp_widgets_init' );

/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES FOR EDITOR.
   --------------------------------------------------------------------------------------------- */
function agilitywp_block_editor_styles() {
	wp_enqueue_style( 'agilitywp-editor-styles', get_theme_file_uri( 'assets/css/style-editor.css' ), false, AGILITYWP_VERSION, 'all' );
}
add_action( 'enqueue_block_editor_assets', 'agilitywp_block_editor_styles' );

/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */
function agilitywp_styles() {
	wp_enqueue_style( 'agilitywp-style', get_stylesheet_uri(), array(), AGILITYWP_VERSION );
	wp_style_add_data( 'agilitywp-style', 'rtl', 'replace' );
	wp_enqueue_style( 'agilitywp-theme', AGILITYWP_THEME_DIR . 'css/theme.css', array(), AGILITYWP_VERSION );
	wp_enqueue_style( 'agilitywp-theme-boxicons', AGILITYWP_THEME_DIR . 'boxicons/css/boxicons.min.css', array(), AGILITYWP_VERSION );
	wp_enqueue_style( 'agilitywp-google-fonts', AGILITYWP_THEME_DIR . 'css/fonts.css', array(), AGILITYWP_VERSION );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'agilitywp_styles' );

/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */
function agilitywp_scripts() {
	wp_enqueue_script( 'agilitywp--script', AGILITYWP_THEME_DIR . 'js/script.min.js', array(), AGILITYWP_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'agilitywp_scripts' );

/* ---------------------------------------------------------------------------------------------
   BINDS JS HANDLERS TO MAKE THEME CUSTOMIZER PREVIEW RELOAD CHANGES ASYNCHRONOUSLY.
   --------------------------------------------------------------------------------------------- */
function agilitywp_customize_preview_js() {
	wp_enqueue_script( 'agilitywp-customizer', AGILITYWP_THEME_DIR . 'js/customizer.min.js', array( 'customize-preview' ), AGILITYWP_VERSION, true );
}
add_action( 'customize_preview_init', 'agilitywp_customize_preview_js' );

/* ---------------------------------------------------------------------------------------------
   LOAD JETPACK COMPATIBILITY FILE.
   --------------------------------------------------------------------------------------------- */
if ( defined( 'JETPACK__VERSION' ) ) {
	require THEME_DIR . '/inc/jetpack.php';
}

/* ---------------------------------------------------------------------------------------------
   LOAD WOOCOMMERCE COMPATIBILITY FILE..
   --------------------------------------------------------------------------------------------- */
if ( class_exists( 'WooCommerce' ) ) {
	require THEME_DIR . '/inc/woocommerce.php';
}

/**
 * Replaces the excerpt "Read More" text by a link.
 *
 * @param string $more for blog page.
 * @return Post Link
 */
function agilitywp_excerpt_more( $more ) {
	return sprintf(
		'<p class="text-end"><a href="%1$s" class="ead-more_tag">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: arrow icon */
		sprintf( __( 'Continue reading %s', 'agilitywp' ), '<span> &#8594; </span>' )
	);
}
add_filter( 'excerpt_more', 'agilitywp_excerpt_more' );

/* ---------------------------------------------------------------------------------------------
   REQUIRED FILES
   --------------------------------------------------------------------------------------------- */
require THEME_DIR . '/inc/customizer/helpers.php';
require THEME_DIR . '/inc/template-tags.php';
require THEME_DIR . '/inc/template-functions.php';
require THEME_DIR . '/inc/classes/Excerpt.php';
require THEME_DIR . '/inc/customizer.php';
require THEME_DIR . '/inc/custom-header.php';
require THEME_DIR . '/inc/customizer/panel/theme-panel.php';
require THEME_DIR . '/inc/customizer/panel/header.php';
require THEME_DIR . '/inc/customizer/options/header-color.php';
require THEME_DIR . '/inc/customizer/sections/colors.php';
require THEME_DIR . '/inc/customizer/customizer-custom-controls/inc/range-control.php';
require THEME_DIR . '/inc/customizer/customizer-custom-controls/inc/toggle-control.php';
require THEME_DIR . '/inc/customizer/options/page-header.php';
require THEME_DIR . '/inc/customizer/options/header-image.php';
require THEME_DIR . '/inc/customizer/options/logo-resizer.php';
require THEME_DIR . '/inc/compatibility/page_builders.php';
require THEME_DIR . '/inc/compatibility/elementor.php';
