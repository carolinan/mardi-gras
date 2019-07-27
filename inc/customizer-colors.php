<?php
/**
 * Mardi Gras Theme Customizer color options.
 *
 * @package Mardi Gras
 */

$wp_customize->add_setting(
	'mardi_gras_description_textcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#ffffff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_description_textcolor',
		array(
			'label'    => __( 'Tagline Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_description_textcolor',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_overlay',
	array(
		'default'           => '#461D7C',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_overlay',
		array(
			'label'    => __( 'Header overlay gradient color one:', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_overlay',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_overlay_two',
	array(
		'default'           => '#621875',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_overlay_two',
		array(
			'label'    => __( 'Header overlay gradient color two:', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_overlay_two',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_opacity',
	array(
		'default'           => 1,
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'mardi_gras_opacity',
	array(
		'type'        => 'range',
		'label'       => __( 'Overlay opacity:', 'mardi-gras' ),
		'input_attrs' => array(
			'min'  => 0.0,
			'max'  => 1,
			'step' => 0.01,
		),
		'section'     => 'colors',
	)
);

$wp_customize->add_setting(
	'mardi_gras_body_bgcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#fff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_body_bgcolor',
		array(
			'label'    => __( 'Body Background Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_body_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'mardi_gras_textcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => null,
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_textcolor',
		array(
			'label'    => __( 'Body Text Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_textcolor',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_topbar_bgcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#ffffff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_topbar_bgcolor',
		array(
			'label'    => __( 'Navigation Bar Background Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_topbar_bgcolor',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_widget1_bgcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#0cd931',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_widget1_bgcolor',
		array(
			'label'    => __( 'Frontpage Widget Area 1 Background Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_widget1_bgcolor',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_widget2_bgcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#ffeb24',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_widget2_bgcolor',
		array(
			'label'    => __( 'Frontpage Widget Area 2 Background Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_widget2_bgcolor',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_footer_bgcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#fff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_footer_bgcolor',
		array(
			'label'    => __( 'Footer Background Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_footer_bgcolor',
		)
	)
);

$wp_customize->add_setting(
	'mardi_gras_info_bgcolor',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#eee',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mardi_gras_info_bgcolor',
		array(
			'label'    => __( 'Footer Site Info Background Color', 'mardi-gras' ),
			'section'  => 'colors',
			'settings' => 'mardi_gras_info_bgcolor',
		)
	)
);
