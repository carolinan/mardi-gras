<?php
/**
 * Mardi Gras extra functionality.
 *
 * @package Mardi Gras
 */

if ( ! function_exists( 'mardi_gras_classes' ) ) {
	/**
	 * Adds extra classes to the body tag depending on feature.
	 */
	function mardi_gras_classes( $classes ) {
		if ( get_theme_mod( 'mardi_gras_blog_visibility' ) == 2 ) {
			$classes[] = 'blog-full-content';
		}
		if ( get_theme_mod( 'mardi_gras_header_visibility' ) ) {
			$classes[] = 'show-header';
		}
		if ( get_theme_mod( 'mardi_gras_grid_size' ) == 1 ) {
			$classes[] = 'grid-column-1';
		}

		return $classes;
	}
	add_filter( 'body_class', 'mardi_gras_classes' );
}

if ( ! function_exists( 'mardi_gras_menu_description' ) ) {
	/**
	 * Support for menu descriptions for the menu.
	 */
	function mardi_gras_menu_description( $item_output, $item, $depth, $args ) {
		if ( 'bar' == $args->theme_location && $item->description ) {
			$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
		}
		return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'mardi_gras_menu_description', 10, 4 );
}

if ( ! function_exists( 'mardi_gras_search_form_modify' ) && ! get_theme_mod( 'mardi_gras_hide_search' ) ) {
	/**
	 * If the option for the search form in the admin bar is active, add a new class to help us hide the submit button.
	 */
	function mardi_gras_search_form_modify( $html ) {
		return str_replace( 'class="search-submit"', 'class="search-submit search-screen-reader-text"', $html );
	}
	add_filter( 'get_search_form', 'mardi_gras_search_form_modify' );
}

if ( ! function_exists( 'mardi_gras_excerpt_length' ) ) {
	/**
	 * Updates the length of the excerpt.
	 */
	function mardi_gras_excerpt_length( $length ) {
		if ( ! is_admin() ) {
			return 35;
		} else {
			return $length;
		}
	}
	add_filter( 'excerpt_length', 'mardi_gras_excerpt_length', 999 );
}

if ( ! function_exists( 'mardi_gras_excerpt_more' ) ) {
	/**
	 * Updates the excerpt_more text and includes a link to the post.
	 */
	function mardi_gras_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			global $post;
			return '&hellip; <br><br><a class="more-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">' .
			/* translators: %s: post title */
			sprintf( esc_html__( 'Continue Reading %s', 'mardi-gras' ), get_the_title( $post->ID ) ) . '</a>';
		} else {
			return $more;
		}
	}
	add_filter( 'excerpt_more', 'mardi_gras_excerpt_more' );
}
