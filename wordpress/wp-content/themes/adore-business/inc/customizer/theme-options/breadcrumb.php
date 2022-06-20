<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'adore_business_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'adore-business' ),
		'panel' => 'adore_business_theme_options_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'adore_business_breadcrumb_enable',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_breadcrumb_enable',
	array(
		'section'	=> 'adore_business_breadcrumb_section',
		'label'		=> esc_html__( 'Enable breadcrumb.', 'adore-business' ),
		'type'		=> 'checkbox',
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'adore_business_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'adore_business_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'adore-business' ),
		'section'         => 'adore_business_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'adore_business_breadcrumb_enable' )->value() );
		},
	)
);