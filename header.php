<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agility_WP
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
		<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light site-navigation py-4" role="navigation">
			<div class="container">
				<div class="site-logo d-flex align-items-center text-dark text-decoration-none">
					<?php if ( has_custom_logo() ) : ?>
						<?php
						$agilitywp_custom_logo_id   = get_theme_mod( 'custom_logo' );
						$agilitywp_custom_logo_data = wp_get_attachment_image_src( $agilitywp_custom_logo_id, 'full' );
						$agilitywp_custom_logo_url  = $agilitywp_custom_logo_data[0];
						?>
						<a href="<?php echo esc_url( home_url( '/', 'https' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $agilitywp_custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
						</a>
					<?php else : ?>
						<a class="navbar-brand" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				</div>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'agilitywp' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'depth'           => 2,
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse justify-content-end',
								'container_id'    => 'navbarToggleExternalContent',
								'menu_class'      => 'navbar-nav nav nav-pills fw-medium text-capitalize',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						);
						?>
			</div>
		</nav>

		<?php

		if ( get_header_image() ) {
			?>
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
		</div>.
		<?php } ?>

	</header><!-- #masthead -->
