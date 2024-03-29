<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mardi Gras
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();
			if ( is_single() ) {
				get_template_part( 'content', get_post_format() );
			} else {
				get_template_part( 'content', 'page' );
			}
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		} // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( is_front_page() && is_active_sidebar( 'sidebar-3' ) ) {
	?>
	<aside class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</aside><!-- #secondary -->
	<?php
}
get_footer();
