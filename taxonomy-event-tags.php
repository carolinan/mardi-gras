<?php
/**
 * The template for displaying the Events Mananger Event Tags archive.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mardi Gras
 * @since 1.1
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<header class="page-header">
		<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
		</header><!-- .page-header -->
		<?php
		$args = array(
			'post_type' => 'event',
			'tax_query' => array(
				'taxonomy' => 'event_tags',
			),
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					<?php
					if ( ! is_single() && get_theme_mod( 'mardi_gras_thumbnail_visibility' ) !== '2' ) {
						the_post_thumbnail();
					} elseif ( ! is_single() && get_theme_mod( 'mardi_gras_thumbnail_visibility' ) === '2' ) {
						the_post_thumbnail( array( '60', '60' ), array( 'class' => 'featured-icon' ) );
					}
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
					</header><!-- .entry-header -->
					<?php
					echo '<div class="entry-content">';
					the_content();
					echo '</div><!-- .entry-content -->';
					?>
				</article><!-- #post-## -->
				<?php
			}
		}
		wp_reset_postdata();
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
