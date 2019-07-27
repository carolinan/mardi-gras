<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mardi Gras
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php
	if ( is_page() && get_theme_mod( 'mardi_gras_post_thumbnail_visibility' ) == 2 ) {
		the_post_thumbnail();
	} elseif ( is_page() && get_theme_mod( 'mardi_gras_post_thumbnail_visibility' ) == 3 ) {
		the_post_thumbnail( array( '60', '60' ), array( 'class' => 'featured-icon' ) );
	}

	if ( is_page() || is_front_page() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}
	?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="entry-meta nextpage">' . esc_html__( 'Pages:', 'mardi-gras' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
