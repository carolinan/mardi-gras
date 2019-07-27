<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mardi Gras
 */

?>
</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Footer Content', 'mardi-gras' ); ?></h2>
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			?>
			<aside class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside>
			<?php
		}
		if ( has_nav_menu( 'social' ) && ! get_theme_mod( 'mardi_gras_hide_footer_social_links' ) ) {
			?>
			<nav class="social-menu" aria-label="<?php esc_attr_e( 'Social Media Links', 'mardi-gras' ); ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . mardi_gras_get_icon_svg( 'link' ),
					'container'      => false,
				)
			);
			?>
			</nav><!-- #social-menu -->
			<?php
		};

		if ( ! get_theme_mod( 'mardi_gras_hide_gototop' ) ) {
			?>
			<div class="go-to-top">
				<a href="#page"><?php echo mardi_gras_get_icon_svg( 'gototop' ); ?>
				<span class="screen-reader-text"><?php esc_html_e( 'Go to the top', 'mardi-gras' ); ?></span></a>
			</div>
			<?php
		}

		if ( get_post_status( get_option( 'wp_page_for_privacy_policy' ) ) == 'publish' || ! get_theme_mod( 'mardi_gras_hide_credits' ) || is_active_sidebar( 'sidebar-2' ) ) {
			?>
			<div class="site-info">
			<?php
			if ( is_active_sidebar( 'sidebar-2' ) ) {
				?>
				<aside class="widget-area footer-copyright" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</aside>
				<?php
			}

			if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link();
					echo '<br>';
			}

			if ( ! get_theme_mod( 'mardi_gras_hide_credits' ) ) {
				?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mardi-gras' ) ); ?>" class="credit"><?php esc_html_e( 'Proudly powered by WordPress', 'mardi-gras' ); ?></a>
				<span class="sep credit">
					<svg class="fleur" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74 102"><path d="M37 0.7c-2.7 3-5.1 5.9-7 9 -5.3 8.8-7.1 18.3-4.1 26C31.8 51.9 34 56 34 69h-4.2c-0.3-14.3-5.6-23.8-13.6-26.7C12.7 41 8.2 41.7 4 46c-5.2 5.3-6.7 20 8.5 22.8 -1.6-2.4-1.5-7.6 1.7-9.5 2.5-1.2 5.2-0.8 6.5 0.3 2.1 1.3 4.1 5.3 4.1 9.4l-7.2 0V77l15 0c-0.2 4.1-2.5 7.5-6.7 9.3 0.5 1.7 3.1 5.3 6.5 5.1 0.7 3.8 1.3 5.9 4.5 9.3 3.1-3.4 3.8-5.5 4.5-9.3 3.5 0.2 6-3.3 6.5-5.1 -4.2-1.8-6.5-5.2-6.7-9.3l15 0V69l-7.2 0c0-4.1 2-8.1 4.1-9.4 1.3-1.1 4.1-1.5 6.5-0.3 3.2 1.8 3.3 7.1 1.8 9.5C76.6 65.9 75.1 51.3 70 46c-4.2-4.3-8.7-5-12.3-3.6 -8 2.9-13.4 12.4-13.6 26.7h-4.2c0-13 2.3-17.1 8.1-33.3 3-7.7 1.2-17.2-4.1-26C42.1 6.5 39.7 3.7 37 0.7z"/></svg>
				</span>
				<a href="<?php echo esc_url( 'https://theme.tips' ); ?>" rel="nofollow" class="theme-credit"><?php esc_html_e( 'Theme: Mardi Gras by Carolina', 'mardi-gras' ); ?></a>
				<?php
			}
			?>
			</div><!-- .site-info -->
			<?php
		}
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
