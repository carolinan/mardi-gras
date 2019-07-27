<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mardi Gras
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mardi-gras' ); ?></a>
<?php
if ( is_front_page() || get_theme_mod( 'mardi_gras_header_visibility' ) ) {
	get_template_part( 'template-parts/site-header' );
}
?>

<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	<?php
	if ( get_theme_mod( 'mardi_gras_menu_site_icon' ) && has_site_icon() ) {
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="menu-site-icon-link">
		<img src="' . esc_url( get_site_icon_url( '32' ) ) . '" class="menu-site-icon" 
		alt="' . esc_attr__( 'Home', 'mardi-gras' ) . '"></a>';
	}
	?>
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
	<?php
	if ( get_theme_mod( 'mardi_gras_menu_button' ) !== 2 && get_theme_mod( 'mardi_gras_menu_button' ) !== 3 ) {
		esc_html_e( 'Menu', 'mardi-gras' );
	} elseif ( get_theme_mod( 'mardi_gras_menu_button' ) == 2 ) {
		echo mardi_gras_get_icon_svg( 'menu' );
		echo '<span class="screen-reader-text">' . esc_html__( 'Menu', 'mardi-gras' ) . '</span>';
	} elseif ( get_theme_mod( 'mardi_gras_menu_button' ) == 3 ) {
		echo mardi_gras_get_icon_svg( 'more' );
		echo '<span class="screen-reader-text">' . esc_html__( 'Menu', 'mardi-gras' ) . '</span>';
	}
	echo '</button>';

	wp_nav_menu(
		array(
			'theme_location' => 'bar',
			'menu_id'        => 'primary-menu',
			'container'      => false,
		)
	);

	echo '<span class="top-bar-right">';

	if ( has_nav_menu( 'social' ) ) {
		?>
		<nav class="social-menu" aria-label="<?php esc_attr_e( 'Social media links', 'mardi-gras' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'fallback_cb'    => false,
					'depth'          => 1,
					'container'      => false,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . mardi_gras_get_icon_svg( 'link' ),
				)
			);
			?>
		</nav>
		<?php
	}

	if ( ! get_theme_mod( 'mardi_gras_hide_search' ) ) {
		echo '<span class="top-bar-search">' . mardi_gras_get_icon_svg( 'search' ) . get_search_form( false ) . '</span>';
	}
	?>
	</span>
</nav>

<?php
if ( is_front_page() && ! is_paged() && is_active_sidebar( 'frontpage-widget-area-1' ) ) {
	?>
	<aside class="widget-area widget-area-1" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'frontpage-widget-area-1' ); ?>
	</aside><!-- #secondary -->
	<?php
}

?>
<div id="content" class="site-content" role="main">

