<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AgilityWP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'agilitywp' ); ?></a>
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="site-navigation" role="navigation">
			<div class="container">
			<div class="site-branding-wrapper">
				<?php
					if ( has_custom_logo() ) :
					$logo_width = get_theme_mod('set_logo_resizer');
				?>
				<div class="site-logo">
				<?php
					$agilitywp_custom_logo_id   = get_theme_mod( 'custom_logo' );
					$agilitywp_custom_logo_data = wp_get_attachment_image_src( $agilitywp_custom_logo_id, 'full' );
					$agilitywp_custom_logo_url  = $agilitywp_custom_logo_data[0];
				?>
				<a href="<?php echo esc_url( home_url( '/', 'https' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( $agilitywp_custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" style="max-width: <?php echo $logo_width; ?>px;"/>
				</a>
				</div>
				<?php else: ?>
				<div class="site-info">
					<p class="site-title">
						<a href="<?php echo home_url(); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</p>
					<?php if ( get_bloginfo( 'description' )  !== '' ) { ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php } ?>
				</div>
				<?php endif; ?>
			</div>
			<button class="agility_hamburger" type="button" role="button" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'agilitywp' ); ?>">
				<div class="hamburger-toggle">
					<span class="burger_line-one"></span>
					<span class="burger_line-two"></span>
					<span class="burger_line-three"></span>
				</div>
			</button>
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'depth'           => 2,
						'menu_id'         => 'agilitywp_nav_menu',
						'container_class' => 'menu-primary-menu-container'
					)
				);
			?>
			</div>
			<div class="container mobile-navigation">
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'depth'           => 2,
						'menu_id'         => 'mobile_agilitywp_nav_menu',
					)
				);
			?>
			</div>
		</nav>
		<?php if ( '1' == get_theme_mod( 'set_page_header' ) ) { ?>
		<?php if ( get_header_image() ) { ?>
	<div class="header-image" style="background-image: url(<?php header_image(); ?>);">
		<div class="container">
			<div class="row">
				<div class="site-branding">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>
		</div>
	</div>
		<?php } else { ?>
	<div class="bg-secondary py-5">
		<div class="container">
			<div class="site-branding d-flex justify-content-start">
				<div class="text-start">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>
		</div>
		</div>
		<?php } ?>
		<?php } ?>
	</header><!-- #masthead -->
