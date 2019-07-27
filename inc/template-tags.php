<?php
/**
 * Custom template tags for this theme.
 *
 * @package Mardi Gras
 */

if ( ! function_exists( 'mardi_gras_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function mardi_gras_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = $time_string;

		$byline = sprintf( esc_html_x( 'by %s', 'post author', 'mardi-gras' ), '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>' );
		echo $posted_on . ' ' . $byline; // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'mardi_gras_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mardi_gras_entry_footer() {
		// Hide category and tag text for pages and events.
		// Events already show categories in the content.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( '&#183;' );
			if ( $categories_list ) {
				echo '<span class="entry-meta">' . esc_html__( 'Categories: ', 'mardi-gras' ) . $categories_list . '</span>'; // WPCS: XSS OK.
			}
			$tags_list = get_the_tag_list( '', '&#183;' );
			if ( $tags_list ) {
				echo '<span class="entry-meta">' . esc_html__( 'Tags: ', 'mardi-gras' ) . $tags_list . '</span>'; // WPCS: XSS OK.
			}
		}
	}
}

if ( ! function_exists( 'mardi_gras_post_title' ) ) {
	/**
	 * Add a title to posts that are missing titles.
	 */
	function mardi_gras_post_title( $title ) {
		if ( '' == $title ) {
			return esc_html__( '(Untitled)', 'mardi-gras' );
		} else {
			return $title;
		}
	}
	add_filter( 'the_title', 'mardi_gras_post_title' );
}

if ( ! function_exists( 'mardi_gras_comments_pagination' ) ) {
	/**
	 * Because get_the_comments_pagination() only accepts one type (plain) I had to alter the function slightly to add the list type,
	 * so that the comment pagination could be styled in the same way as the post pagination.
	 * https://developer.wordpress.org/reference/functions/get_the_comments_pagination/
	 * Related ticket: https://core.trac.wordpress.org/ticket/39792
	 **/
	function mardi_gras_comments_pagination( $args = array() ) {
		$navigation = '';
		$args       = wp_parse_args(
			$args,
			array(
				'screen_reader_text' => __( 'Comments navigation', 'mardi-gras' ),
				'prev_text'          => _x( 'Previous', 'previous set of comments', 'mardi-gras' ),
				'next_text'          => _x( 'Next', 'next set of comments', 'mardi-gras' ),
				'type'               => 'list',
			)
		);
		$links      = paginate_comments_links( $args );
		if ( $links ) {
			$navigation = _navigation_markup( $links, 'comments-pagination', $args['screen_reader_text'] );
		}
	}
}

