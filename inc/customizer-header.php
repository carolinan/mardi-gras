<?php
/**
 * Mardi Gras Theme Customizer header options.
 *
 * @package Mardi Gras
 */

$wp_customize->add_section(
	'mardi_gras_header_styles',
	array(
		'title' => __( 'Header & Menu Settings', 'mardi-gras' ),
		'panel' => 'mardi_gras_options_panel',
	)
);

$wp_customize->add_setting(
	'mardi_gras_menu_button',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 1,
	)
);

$wp_customize->add_control(
	'mardi_gras_menu_button',
	array(
		'type'        => 'radio',
		'label'       => __( 'Main Menu button style', 'mardi-gras' ),
		'description' => __( 'Select a button or icon to represent the main menu on mobile devices:', 'mardi-gras' ),
		'section'     => 'mardi_gras_header_styles',
		'choices'     => array(
			'1' => __( 'A regular button with the word "Menu" (Default).', 'mardi-gras' ),
			'2' => __( 'Hamburger menu icon (3 lines).', 'mardi-gras' ),
			'3' => __( 'More icon (3 dots).', 'mardi-gras' ),
		),
	)
);

$wp_customize->add_setting(
	'mardi_gras_header_visibility',
	array(
		'sanitize_callback' => 'mardi_gras_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'mardi_gras_header_visibility',
	array(
		'type'        => 'checkbox',
		'label'       => __( 'Header visibility', 'mardi-gras' ),
		'description' => __( 'By default, the header area is only visible on the front page. Check this box to display the header on all posts and pages.', 'mardi-gras' ),
		'section'     => 'mardi_gras_header_styles',
	)
);

$wp_customize->add_setting(
	'mardi_gras_hide_search',
	array(
		'sanitize_callback' => 'mardi_gras_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'mardi_gras_hide_search',
	array(
		'type'        => 'checkbox',
		'label'       => __( 'Search form visibility', 'mardi-gras' ),
		'description' => __( 'Check this box to hide the search form in the menu.', 'mardi-gras' ),
		'section'     => 'mardi_gras_header_styles',
	)
);
