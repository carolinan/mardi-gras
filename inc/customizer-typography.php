<?php
/**
 * Mardi Gras Theme Customizer Typography Options.
 *
 * @package Mardi Gras
 */

$wp_customize->add_setting(
	'mardi_gras_title_font',
	array(
		'default'           => 'Grand Hotel',
		'sanitize_callback' => 'mardi_gras_sanitize_select',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mardi_gras_title_font',
		array(
			'label'   => __( 'Choose a font for the Site title', 'mardi-gras' ),
			'section' => 'mardi_gras_typography_options',
			'type'    => 'select',
			'choices' => array(
				'Grand Hotel'     => __( 'Grand Hotel (Default)', 'mardi-gras' ),
				'system'          => __( 'System fonts', 'mardi-gras' ),
				'Oswald'          => __( 'Oswald', 'mardi-gras' ),
				'Raleway'         => __( 'Raleway', 'mardi-gras' ),
				'Pacifico'        => __( 'Pacifico', 'mardi-gras' ),
				'Lobster'         => __( 'Lobster', 'mardi-gras' ),
				'Righteous'       => __( 'Righteous', 'mardi-gras' ),
				'Luckiest Guy'    => __( 'Luckiest Guy', 'mardi-gras' ),
				'Laila'           => __( 'Laila', 'mardi-gras' ),
				'Alegreya'        => __( 'Alegreya', 'mardi-gras' ),
				'Berkshire Swash' => __( 'Berkshire Swash', 'mardi-gras' ),
				'Griffy'          => __( 'Griffy', 'mardi-gras' ),
				'Poiret One'      => __( 'Poiret One', 'mardi-gras' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_circletype_radius',
	array(
		'default'           => 900,
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'mardi_gras_circletype_radius',
	array(
		'type'        => 'range',
		'label'       => __( 'Site Title curve', 'mardi-gras' ),
		'description' => __( 'Adjust the curve of the site title to better match your title length and font.', 'mardi-gras' ),
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1800,
			'step' => 10,
		),
		'section'     => 'mardi_gras_typography_options',
	)
);

$wp_customize->add_setting(
	'mardi_gras_description_font',
	array(
		'default'           => 'Pacifico',
		'sanitize_callback' => 'mardi_gras_sanitize_select',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mardi_gras_description_font',
		array(
			'label'   => __( 'Choose a font for the Site tagline', 'mardi-gras' ),
			'section' => 'mardi_gras_typography_options',
			'type'    => 'select',
			'choices' => array(
				'Pacifico'        => __( 'Pacifico (Default)', 'mardi-gras' ),
				'system'          => __( 'System fonts', 'mardi-gras' ),
				'Oswald'          => __( 'Oswald', 'mardi-gras' ),
				'Raleway'         => __( 'Raleway', 'mardi-gras' ),
				'Lobster'         => __( 'Lobster', 'mardi-gras' ),
				'Righteous'       => __( 'Righteous', 'mardi-gras' ),
				'Luckiest Guy'    => __( 'Luckiest Guy', 'mardi-gras' ),
				'Laila'           => __( 'Laila', 'mardi-gras' ),
				'Alegreya'        => __( 'Alegreya', 'mardi-gras' ),
				'Berkshire Swash' => __( 'Berkshire Swash', 'mardi-gras' ),
				'Griffy'          => __( 'Griffy', 'mardi-gras' ),
				'Poiret One'      => __( 'Poiret One', 'mardi-gras' ),
				'Grand Hotel'     => __( 'Grand Hotel', 'mardi-gras' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_post_title_font',
	array(
		'default'           => 'Pacifico',
		'sanitize_callback' => 'mardi_gras_sanitize_select',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mardi_gras_post_title_font',
		array(
			'label'   => __( 'Choose a font for the post and page titles', 'mardi-gras' ),
			'section' => 'mardi_gras_typography_options',
			'type'    => 'select',
			'choices' => array(
				'Pacifico'        => __( 'Pacifico (Default)', 'mardi-gras' ),
				'system'          => __( 'System fonts', 'mardi-gras' ),
				'Oswald'          => __( 'Oswald', 'mardi-gras' ),
				'Raleway'         => __( 'Raleway', 'mardi-gras' ),
				'Lobster'         => __( 'Lobster', 'mardi-gras' ),
				'Righteous'       => __( 'Righteous', 'mardi-gras' ),
				'Luckiest Guy'    => __( 'Luckiest Guy', 'mardi-gras' ),
				'Laila'           => __( 'Laila', 'mardi-gras' ),
				'Alegreya'        => __( 'Alegreya', 'mardi-gras' ),
				'Berkshire Swash' => __( 'Berkshire Swash', 'mardi-gras' ),
				'Griffy'          => __( 'Griffy', 'mardi-gras' ),
				'Poiret One'      => __( 'Poiret One', 'mardi-gras' ),
				'Grand Hotel'     => __( 'Grand Hotel', 'mardi-gras' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_widget_title_font',
	array(
		'default'           => 'Pacifico',
		'sanitize_callback' => 'mardi_gras_sanitize_select',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mardi_gras_widget_title_font',
		array(
			'label'   => __( 'Choose a font for the widget titles', 'mardi-gras' ),
			'section' => 'mardi_gras_typography_options',
			'type'    => 'select',
			'choices' => array(
				'Pacifico'        => __( 'Pacifico (Default)', 'mardi-gras' ),
				'system'          => __( 'System fonts', 'mardi-gras' ),
				'Oswald'          => __( 'Oswald', 'mardi-gras' ),
				'Raleway'         => __( 'Raleway', 'mardi-gras' ),
				'Lobster'         => __( 'Lobster', 'mardi-gras' ),
				'Righteous'       => __( 'Righteous', 'mardi-gras' ),
				'Luckiest Guy'    => __( 'Luckiest Guy', 'mardi-gras' ),
				'Laila'           => __( 'Laila', 'mardi-gras' ),
				'Alegreya'        => __( 'Alegreya', 'mardi-gras' ),
				'Berkshire Swash' => __( 'Berkshire Swash', 'mardi-gras' ),
				'Griffy'          => __( 'Griffy', 'mardi-gras' ),
				'Poiret One'      => __( 'Poiret One', 'mardi-gras' ),
				'Grand Hotel'     => __( 'Grand Hotel', 'mardi-gras' ),
			),
		)
	)
);
