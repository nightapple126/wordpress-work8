<?php
/**
* Single posts setting 
*/

// Single setting section 
$wp_customize->add_section(
	'adore_business_single_settings',
	array(
		'title'			=> esc_html__( 'Single Posts Options', 'adore-business' ),
		'description'	=> esc_html__( 'Settings for all single posts.', 'adore-business' ),
		'panel'			=> 'adore_business_theme_options_panel',
	)
);

// Date enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_date',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_date',
	array(
		'label'		=> esc_html__( 'Enable date.', 'adore-business' ),
		'section'	=> 'adore_business_single_settings',
		'type'		=> 'checkbox',
	)
);

// Category enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_cat',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_cat',
	array(
		'label'		=> esc_html__( 'Enable category.', 'adore-business' ),
		'section'	=> 'adore_business_single_settings',
		'type'		=> 'checkbox',
	)
);

// Tag enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_tag',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_tag',
	array(
		'label'		=> esc_html__( 'Enable tags.', 'adore-business' ),
		'section'	=> 'adore_business_single_settings',
		'type'		=> 'checkbox',
	)
);

// Comment enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_comment',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_comment',
	array(
		'label'		=> esc_html__( 'Enable comment.', 'adore-business' ),
		'section'	=> 'adore_business_single_settings',
		'type'		=> 'checkbox',
	)
);


// Author enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_author',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_author',
	array(
		'label'		=> esc_html__( 'Enable author.', 'adore-business' ),
		'section'	=> 'adore_business_single_settings',
		'type'		=> 'checkbox',
	)
);

// Featured image enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_featured_img',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_featured_img',
	array(
		'section'	=> 'adore_business_single_settings',
		'label'		=> esc_html__( 'Enable featured image.', 'adore-business' ),
		'type'		=> 'checkbox',
	)
);

// Pagination enable setting
$wp_customize->add_setting(
	'adore_business_enable_single_pagination',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_single_pagination',
	array(
		'label'		=> esc_html__( 'Enable pagination.', 'adore-business' ),
		'section'	=> 'adore_business_single_settings',
		'type'		=> 'checkbox',
	)
);