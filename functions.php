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

/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'AGILITYWP_VERSION' ) ) :
	function agilitywp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AgilityWP, use a find and replace
		 * to change 'agilitywp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'agilitywp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'agilitywp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add Theme Support for Editor Style.
		add_theme_support( 'editor-styles' );

		// Add Theme Support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add Theme Support for Wide and FFull alignment.
		add_theme_support( 'align-wide' );

		// Add Support for responsive embed.
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
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
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
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
	wp_enqueue_style( 'agilitywp-theme', AGILITYWP_THEME_DIR . 'css/theme.min.css', array(), AGILITYWP_VERSION );
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
	wp_enqueue_script( 'agilitywp-bootstrap-js', AGILITYWP_THEME_DIR . 'js/bootstrap.min.js', array(), AGILITYWP_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'agilitywp_scripts' );

/**
 * Custom Header for this theme.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'agilitywp' ) );
} else {
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
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
