<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mardi Gras
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">
<?php
if ( ! is_single() && get_theme_mod( 'mardi_gras_thumbnail_visibility' ) !== '2' ) {
	the_post_thumbnail();
} elseif ( ! is_single() && get_theme_mod( 'mardi_gras_thumbnail_visibility' ) === '2' ) {
	the_post_thumbnail( array( '60', '60' ), array( 'class' => 'featured-icon' ) );
} elseif ( is_single() && get_theme_mod( 'mardi_gras_post_thumbnail_visibility' ) == 2 ) {
	the_post_thumbnail();
} elseif ( is_single() && get_theme_mod( 'mardi_gras_post_thumbnail_visibility' ) == 3 ) {
	the_post_thumbnail( array( '60', '60' ), array( 'class' => 'featured-icon' ) );
}

if ( is_single() ) {
	the_title( '<h1 class="entry-title">', '</h1>' );
} else {
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
}

if ( 'post' === get_post_type() ) {

	if ( is_single() && get_theme_mod( 'mardi_gras_post_meta_visibility' ) !== '2'
	|| ! is_single() && get_theme_mod( 'mardi_gras_archive_meta_visibility' ) !== '2' ) {
		?>
		<div class="entry-meta">
		<svg class="fleur" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74 102"><path d="M37 0.7c-2.7 3-5.1 5.9-7 9 -5.3 8.8-7.1 18.3-4.1 26C31.8 51.9 34 56 34 69h-4.2c-0.3-14.3-5.6-23.8-13.6-26.7C12.7 41 8.2 41.7 4 46c-5.2 5.3-6.7 20 8.5 22.8 -1.6-2.4-1.5-7.6 1.7-9.5 2.5-1.2 5.2-0.8 6.5 0.3 2.1 1.3 4.1 5.3 4.1 9.4l-7.2 0V77l15 0c-0.2 4.1-2.5 7.5-6.7 9.3 0.5 1.7 3.1 5.3 6.5 5.1 0.7 3.8 1.3 5.9 4.5 9.3 3.1-3.4 3.8-5.5 4.5-9.3 3.5 0.2 6-3.3 6.5-5.1 -4.2-1.8-6.5-5.2-6.7-9.3l15 0V69l-7.2 0c0-4.1 2-8.1 4.1-9.4 1.3-1.1 4.1-1.5 6.5-0.3 3.2 1.8 3.3 7.1 1.8 9.5C76.6 65.9 75.1 51.3 70 46c-4.2-4.3-8.7-5-12.3-3.6 -8 2.9-13.4 12.4-13.6 26.7h-4.2c0-13 2.3-17.1 8.1-33.3 3-7.7 1.2-17.2-4.1-26C42.1 6.5 39.7 3.7 37 0.7z"/></svg>
			<?php mardi_gras_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
	}
}
?>
</header><!-- .entry-header -->
<?php
if ( ! is_single() ) {
	/**
	 * 1 = excerpts
	 * 2 = full content
	 * 3 = title only -don't show any content, only the header and footer.
	 */
	if ( get_theme_mod( 'mardi_gras_blog_visibility', 1 ) == 1 ) {
		echo '<div class="entry-summary">';
		the_excerpt();
		echo '</div>';
	} elseif ( get_theme_mod( 'mardi_gras_blog_visibility', 2 ) == 2 ) {
		echo '<div class="entry-content">';
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="entry-meta nextpage">' . esc_html__( 'Pages:', 'mardi-gras' ),
				'after'  => '</div>',
			)
		);
		echo '</div><!-- .entry-content -->';
	}

	if ( get_post_type() === 'post' && get_theme_mod( 'mardi_gras_archive_meta_visibility', '1' ) === '1' ) {
		?>
		<footer class="entry-footer">
			<?php mardi_gras_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<?php
	}
} else {
	echo '<div class="entry-content">';
	the_content();
	wp_link_pages(
		array(
			'before' => '<div class="entry-meta nextpage">' . esc_html__( 'Pages:', 'mardi-gras' ),
			'after'  => '</div>',
		)
	);
	?>
	</div><!-- .entry-content -->
	<?php
	if ( get_theme_mod( 'mardi_gras_post_meta_visibility', '1' ) === '1' ) {
		?>
		<footer class="entry-footer">
			<?php mardi_gras_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<?php
	}
	the_post_navigation(
		array(
			'prev_text' => __( 'Previous', 'mardi-gras' ),
			'next_text' => __( 'Next', 'mardi-gras' ),
		)
	);
} // End if().
?>
</article><!-- #post-## -->
