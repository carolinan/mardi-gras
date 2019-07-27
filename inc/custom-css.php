<?php
/**
 * Mardi Gras Custom CSS
 *
 * @package Mardi Gras
 */

/**
 * Overrides styles for various elements depending on settings.
 */
function mardi_gras_custom_colors() {
	echo '<style type="text/css">';
	if ( get_theme_mod( 'mardi_gras_textcolor' ) ) {
		echo 'body,button,input,select,textarea,.site-footer,h1,h2,h3,h4,h5,h6,a,
		a:visited,a:hover,a:focus,a:active,th,table caption,table,.main-navigation,.main-navigation a,
			.menu-item-description,.nav-next,.nav-previous,ul.page-numbers li,.social-menu a,
			.social-menu a:hover,.social-menu a:focus,.widget a:hover,.widget a:focus,
			.widget-title:hover,.comment-reply-title,.comments-title,.no-comments,.widgettitle,.widget-title,
			.page-title,.entry-title,.entry-meta a,.entry-meta,#wp-calendar caption, body.attachment .type-attachment,body.page .type-page,.single .post,.entry-content .entry-meta,
			.entry-footer .entry-meta,.entry-footer .entry-meta a,.comments-area, figcaption, .wp-block-image figcaption, .wp-block-embed figcaption, 
			.wp-block-latest-comments__comment-date, .wp-block-latest-posts__post-date, .wp-block-quote cite, .wp-block-quote footer, .wp-block-quote__citation, cite{
				color:' . esc_attr( get_theme_mod( 'mardi_gras_textcolor' ) ) . ';}
			.go-to-top a{background-color:' . esc_attr( get_theme_mod( 'mardi_gras_textcolor' ) ) . ';
				color:' . esc_attr( get_theme_mod( 'mardi_gras_textcolor' ) ) . ';}
			a#cancel-comment-reply-link,.must-log-in a,.logged-in-as a,.comment-content a,.entry-content a,
			.wp-caption-text a{border-bottom:2px solid ' . esc_attr( get_theme_mod( 'mardi_gras_textcolor' ) ) . ';}
			a#cancel-comment-reply-link{border:2px solid ' . esc_attr( get_theme_mod( 'mardi_gras_textcolor' ) ) . ';}
			.social-menu .svg-icon,.social-menu li a:focus .svg-icon,.top-bar-search .svg-icon, .fleur{fill:' . esc_attr( get_theme_mod( 'mardi_gras_textcolor' ) ) . ';}';
	}

	if ( get_theme_mod( 'mardi_gras_footer_bgcolor' ) && '#ffffff' !== get_theme_mod( 'mardi_gras_footer_bgcolor' ) ) {
		echo '.site-footer{background:' . esc_attr( get_theme_mod( 'mardi_gras_footer_bgcolor' ) ) . ';}';
	}

	echo '.site-title, .site-title a{color:#' . esc_attr( get_theme_mod( 'header_textcolor', 'fdd023' ) ) . ';}';
	echo '.site-description{color:' . esc_attr( get_theme_mod( 'mardi_gras_description_textcolor', '#ffffff' ) ) . ';}';

	/* Header image */
	echo '.site-header{background-image:url(' . esc_url( get_header_image() ) . ');}';
	/* Header overlay colors */
	echo '.site-header:before{background-image:linear-gradient(' .
		esc_attr( get_theme_mod( 'mardi_gras_overlay', '#461D7C' ) ) . ', ' .
		esc_attr( get_theme_mod( 'mardi_gras_overlay_two', '#621875' ) ) . ');
		opacity:' . esc_attr( get_theme_mod( 'mardi_gras_opacity', 1 ) ) . ';}';

	echo '.widget-area-1{background:' . esc_attr( get_theme_mod( 'mardi_gras_widget1_bgcolor', '#0cd931' ) ) . ';}';

	if ( get_theme_mod( 'mardi_gras_body_bgcolor' ) ) {
		echo '.site-content{background:' . esc_attr( get_theme_mod( 'mardi_gras_body_bgcolor' ) ) . ';}';
	}

	echo '.widget-area-2{background:' . esc_attr( get_theme_mod( 'mardi_gras_widget2_bgcolor', '#ffeb24' ) ) . ';}';

	if ( get_theme_mod( 'mardi_gras_info_bgcolor' ) ) {
		echo '.site-info{background:' . esc_attr( get_theme_mod( 'mardi_gras_info_bgcolor' ) ) . ';}';
	}
	if ( '2' === get_theme_mod( 'mardi_gras_grid_size' ) ) {
		echo '.site-main{grid-gap:2.5em 2em;grid-template-columns:repeat(2, 1fr);}';
	} elseif ( '1' === get_theme_mod( 'mardi_gras_grid_size' ) ) {
		echo '.site-main{display:block;}.search .page-header,.archive .page-header{max-width:720px;margin-left:auto;margin-right:auto;margin-bottom:3em;min-height:initial;}';
		echo '.entry-title{text-align:center;}';
		echo '.entry-header .entry-meta,.entry-footer{max-width: 720px; margin: 0 auto 2em auto; display: block;}';
		echo '.attachment-post-thumbnail{ display:block; margin: 0 auto 1.5em auto;}';
	}
	if ( get_theme_mod( 'mardi_gras_menu_button' ) == 2 || get_theme_mod( 'mardi_gras_menu_button' ) == 3 ) {
		echo '.menu-toggle{background:none;border:1px solid transparent;box-shadow:none;padding:0;margin-top:-6px;}';
	}
	if ( get_theme_mod( 'mardi_gras_topbar_bgcolor' ) && '#ffffff' !== get_theme_mod( 'mardi_gras_topbar_bgcolor' ) ) {
		echo '.main-navigation,.main-navigation ul ul li,.main-navigation ul ul li:hover, .main-navigation.toggled .menu-item-has-children{background:' . esc_attr( get_theme_mod( 'mardi_gras_topbar_bgcolor' ) ) . ';}';
		echo '@media screen and (max-width: 782px) {.main-navigation ul li,.main-navigation.toggled li,#site-navigation.toggled nav.social-menu,
			.main-navigation.toggled ul li:hover, .main-navigation.toggled .top-bar-search{background:' . esc_attr( get_theme_mod( 'mardi_gras_topbar_bgcolor' ) ) . ';}}';
		echo '.main-navigation, .main-navigation ul ul ul, .main-navigation ul ul li, .main-navigation.toggled .top-bar-search, .main-navigation.toggled .menu-item-has-children{border:none;}';
		echo '.menu-toggle:hover{box-shadow:none;}';
	}

	if ( get_theme_mod( 'mardi_gras_grid_size' ) == '1' ) {
		echo '.entry-summary{ max-width: 720px;	margin: 0 auto;	display: block;}';
	}

	if ( get_theme_mod( 'mardi_gras_title_font' ) !== 'system' ) {
		echo '.site-title{font-family: ' . esc_attr( get_theme_mod( 'mardi_gras_title_font', 'Grand Hotel' ) ) . ';
			text-shadow: 2px 2px 2px #000;}';
	}

	if ( get_theme_mod( 'mardi_gras_description_font' ) !== 'system' ) {
		echo '.site-description{font-family: ' . esc_attr( get_theme_mod( 'mardi_gras_description_font', 'Pacifico' ) ) . ';
			text-shadow: 1px 1px 1px #000;}';
	}

	if ( get_theme_mod( 'mardi_gras_post_title_font' ) !== 'system' ) {
		echo '.page-title,.entry-title,.comments-title,.comment-reply-title,.no-comments{font-family: ' . esc_attr( get_theme_mod( 'mardi_gras_post_title_font', 'Pacifico' ) ) . ';}';
	}

	if ( get_theme_mod( 'mardi_gras_widget_title_font' ) !== 'system' ) {
		echo '.widget-title{font-family: ' . esc_attr( get_theme_mod( 'mardi_gras_widget_title_font', 'Pacifico' ) ) . ';}';
	}

	echo '}';
	echo '</style>';
}
add_action( 'wp_head', 'mardi_gras_custom_colors' );
