<?php
/**
 * Template part for the site header.
 *
 * @package Mardi Gras
 */

?>
<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<?php
	/* Only display the site branding if there is a logo or header text */
	if ( has_custom_logo() || display_header_text() ) {
		?>
		<div class="site-branding">
			<?php
			if ( display_header_text() ) {
				if ( is_home() ) {
					?>
					<h1 id="site-title" class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<?php
				} else {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><p id="site-title" class="site-title"><?php bloginfo( 'name' ); ?></p></a>
					<?php
				}
			}

			if ( has_custom_logo() ) {
				the_custom_logo();
			}

			if ( display_header_text() ) {
				if ( get_bloginfo( 'description' ) ) {
					?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php
				}
			}
			echo '</div>';
	} else {
		/**
		* Make sure that there is an H1 heading for screen readers even if the
		* header text has been hidden.
		*/
		if ( is_home() ) {
			echo '<h1 class="screen-reader-text">' . get_bloginfo( 'name' ) . '</h1>';
		}
	}
	?>
</header>
