<?php
/**
 * Mardi Gras Theme Customizer.
 *
 * @package Mardi Gras
 */

/**
 * Add settings and controls for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mardi_gras_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_textcolor' )->label    = __( 'Site Title color', 'mardi-gras' );
	$wp_customize->get_control( 'header_textcolor' )->priority = 10;

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title',
				'render_callback' => 'mardi_gras_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'mardi_gras_customize_partial_blogdescription',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'mardi_gras_hide_gototop',
			array(
				'selector' => '.go-to-top',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'mardi_gras_hide_credits',
			array(
				'selector' => '.site-info',
			)
		);

	}

	$wp_customize->add_panel(
		'mardi_gras_options_panel',
		array(
			'title'    => __( 'Theme Options', 'mardi-gras' ),
			'priority' => 40,
		)
	);

	/* Colors */
	require get_template_directory() . '/inc/customizer-colors.php';

	/* Header */
	require get_template_directory() . '/inc/customizer-header.php';

	/* Typography */
	require get_template_directory() . '/inc/customizer-typography.php';

	$wp_customize->add_section(
		'mardi_gras_archive',
		array(
			'title' => __( 'Blog, Archive & Search Settings', 'mardi-gras' ),
			'panel' => 'mardi_gras_options_panel',
		)
	);

	$wp_customize->add_section(
		'mardi_gras_posts',
		array(
			'title' => __( 'Post & Page Settings', 'mardi-gras' ),
			'panel' => 'mardi_gras_options_panel',
		)
	);

	$wp_customize->add_section(
		'mardi_gras_footer_options',
		array(
			'title' => __( 'Footer Settings', 'mardi-gras' ),
			'panel' => 'mardi_gras_options_panel',
		)
	);

	$wp_customize->add_section(
		'mardi_gras_typography_options',
		array(
			'title' => __( 'Typography Settings', 'mardi-gras' ),
			'panel' => 'mardi_gras_options_panel',
		)
	);

	/* Blog and archives */
	$wp_customize->add_setting(
		'mardi_gras_grid_size',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_select',
			'default'           => '3',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_grid_size',
		array(
			'type'        => 'radio',
			'label'       => __( 'Grid Layout', 'mardi-gras' ),
			'description' => __( 'By default, posts are listed in a 3 column grid. You can change the number of columns here. The layout is responsive, so the number of columns also vary depending on screen width. To show full width blocks in the blog listing, combine one column with the full content in the settings below.', 'mardi-gras' ),
			'section'     => 'mardi_gras_archive',
			'choices'     => array(
				'1' => __( '1 column', 'mardi-gras' ),
				'2' => __( '2 columns', 'mardi-gras' ),
				'3' => __( '3 columns (Default)', 'mardi-gras' ),
			),
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_blog_visibility',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_select',
			'default'           => '1',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_blog_visibility',
		array(
			'type'        => 'radio',
			'label'       => __( 'Content visibility', 'mardi-gras' ),
			'description' => __( 'By default, posts excerpts are shown on the blog listing, search results and archives. You can select what you want to show below:', 'mardi-gras' ),
			'section'     => 'mardi_gras_archive',
			'choices'     => array(
				'1' => __( 'Excerpts (Default)', 'mardi-gras' ),
				'2' => __( 'Full content (Works best with the 1 column setting)', 'mardi-gras' ),
				'3' => __( 'Title and meta only', 'mardi-gras' ),
			),
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_thumbnail_visibility',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_select',
			'default'           => '1',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_thumbnail_visibility',
		array(
			'type'        => 'radio',
			'label'       => __( 'Featured image settings', 'mardi-gras' ),
			'description' => __( 'By default, the featured image is shown above the post title. You can select how to use the image below:', 'mardi-gras' ),
			'section'     => 'mardi_gras_archive',
			'choices'     => array(
				'1' => __( 'Regular size, above the post title (Default)', 'mardi-gras' ),
				'2' => __( 'Show as a 60x60px miniature above the post title', 'mardi-gras' ),
			),
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_archive_meta_visibility',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_select',
			'default'           => 1,
		)
	);

	$wp_customize->add_control(
		'mardi_gras_archive_meta_visibility',
		array(
			'type'        => 'radio',
			'label'       => __( 'Archive meta information', 'mardi-gras' ),
			'description' => __( 'By default, the blog and archives shows the date, author name, categories and tags. Here you can select what to show:', 'mardi-gras' ),
			'section'     => 'mardi_gras_archive',
			'choices'     => array(
				'1' => __( 'Show all the information (Default)', 'mardi-gras' ),
				'2' => __( 'Hide all the information', 'mardi-gras' ),
				'3' => __( 'Show the date and author name, but not categories and tags', 'mardi-gras' ),
			),
		)
	);

	/** Single posts and pages */

	$wp_customize->add_setting(
		'mardi_gras_post_thumbnail_visibility',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_select',
			'default'           => '1',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_post_thumbnail_visibility',
		array(
			'type'        => 'radio',
			'label'       => __( 'Featured image settings', 'mardi-gras' ),
			'description' => __( 'By default, the featured image is not shown on single posts or pages. You can select how to use the image below:', 'mardi-gras' ),
			'section'     => 'mardi_gras_posts',
			'choices'     => array(
				'1' => __( 'Do not show the image (Default)', 'mardi-gras' ),
				'2' => __( 'Regular size, above the post title', 'mardi-gras' ),
				'3' => __( 'Show as a 60x60px miniature above the post title', 'mardi-gras' ),
			),
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_post_meta_visibility',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_select',
			'default'           => '1',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_post_meta_visibility',
		array(
			'type'        => 'radio',
			'label'       => __( 'Post meta information', 'mardi-gras' ),
			'description' => __( 'By default, single posts shows the date, author name, categories and tags. Here you can select what to show:', 'mardi-gras' ),
			'section'     => 'mardi_gras_posts',
			'choices'     => array(
				'1' => __( 'Show all the information (Default)', 'mardi-gras' ),
				'2' => __( 'Hide all the information', 'mardi-gras' ),
				'3' => __( 'Show the date and author name, but not categories and tags', 'mardi-gras' ),
			),
		)
	);

	/* Footer */
	$wp_customize->add_setting(
		'mardi_gras_hide_credits',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_hide_credits',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to hide the footer credit links. :(', 'mardi-gras' ),
			'section' => 'mardi_gras_footer_options',
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_hide_gototop',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_hide_gototop',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to hide the "go to top" icon and link.', 'mardi-gras' ),
			'section' => 'mardi_gras_footer_options',
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_hide_footer_social_links',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_hide_footer_social_links',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'If you have added a social menu, you can check this box to remove it from the footer.', 'mardi-gras' ),
			'section' => 'mardi_gras_footer_options',
		)
	);

	$wp_customize->add_setting(
		'mardi_gras_menu_site_icon',
		array(
			'sanitize_callback' => 'mardi_gras_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'mardi_gras_menu_site_icon',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Check this box to display the site icon in the navigation bar.', 'mardi-gras' ),
			'section'  => 'title_tagline',
			'priority' => 95,
		)
	);

}

add_action( 'customize_register', 'mardi_gras_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mardi_gras_customize_preview_js() {
	wp_enqueue_script( 'mardi_gras_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_preview_init', 'mardi_gras_customize_preview_js' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mardi_gras_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mardi_gras_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue the list of fonts.
 */
function mardi_gras_customizer_fonts() {
	wp_enqueue_style( 'mardi_gras_customizer_fonts', 'https://fonts.googleapis.com/css?family=Pacifico|Oswald|Raleway|Lobster|Righteous|Luckiest+Guy|Laila|Alegreya|Berkshire+Swash|Griffy|Poiret+One|Grand+Hotel', array(), null );
}
add_action( 'customize_controls_print_styles', 'mardi_gras_customizer_fonts' );
add_action( 'customize_preview_init', 'mardi_gras_customizer_fonts' );

add_action( 'customize_controls_print_styles', 'mardi_gras_customizer_preview_fonts' );
/**
 * Add CSS so that we can preview the fonts.
 */
function mardi_gras_customizer_preview_fonts() {
	?>
	<style>
	<?php
	$arr = array( 'Pacifico', 'Oswald', 'Raleway', 'Lobster', 'Righteous', 'Luckiest Guy', 'Laila', 'Alegreya', 'Berkshire Swash', 'Griffy', 'Poiret One', 'Grand Hotel' );

	foreach ( $arr as $font ) {
		echo '.customize-control select option[value*="' . $font . '"] {font-family: ' . $font . '; font-size: 22px;}';
	}
	?>
	</style>
	<?php
}


/**
 * Checkbox sanitization callback, from https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function mardi_gras_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see sanitize_text_field()               https://developer.wordpress.org/reference/functions/sanitize_text_field/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function mardi_gras_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_text_field( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
