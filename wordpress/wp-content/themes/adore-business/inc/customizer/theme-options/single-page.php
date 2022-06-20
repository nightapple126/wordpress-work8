<?php
/**
 * Single pages setting 
 */

// Single pages setting section 
$wp_customize->add_section(
	'adore_business_single_page_settings',
	array(
		'title'			=> esc_html__( 'Single Pages Options', 'adore-business' ),
		'description'	=> esc_html__( 'Settings for all single pages.', 'adore-business' ),
		'panel'			=> 'adore_business_theme_options_panel',
	)
);

// Featured image enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_page_featured_img',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_page_featured_img',
	array(
		'section'	=> 'adore_business_single_page_settings',
		'label'		=> esc_html__( 'Enable featured image.', 'adore-business' ),
		'type'		=> 'checkbox',
	)
);