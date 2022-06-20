<?php
/**
* Blog/Archive section 
*/

// Blog/Archive section 
$wp_customize->add_section(
	'adore_business_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog Options', 'adore-business' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'adore-business' ),
		'panel' => 'adore_business_theme_options_panel',
	)
);

//Archive Column layout
$wp_customize->add_setting(
	'adore_business_archive_column_layout',
	array(
		'default'			=> 'col-2',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_archive_column_layout',
	array(
		'section'			=> 'adore_business_archive_settings',
		'label'				=> esc_html__( 'Archive Layout', 'adore-business' ),
		'type'				=> 'select',
		'choices'	=> array(
			'col-2'		=> esc_html__( 'Column Two', 'adore-business' ),
			'col-3'		=> esc_html__( 'Column Three', 'adore-business' ),
			'col-4'		=> esc_html__( 'Column Four', 'adore-business' ),
		),
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'adore_business_archive_excerpt_length',
	array(
		'default'			=> 20,
		'sanitize_callback' => 'adore_business_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'adore_business_archive_excerpt_length',
	array(
		'label'			=> esc_html__( 'Excerpt more length:', 'adore-business' ),
		'section'		=> 'adore_business_archive_settings',
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Date enable setting
$wp_customize->add_setting(
	'adore_business_enable_archive_date',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_archive_date',
	array(
		'label'		=> esc_html__( 'Enable date.', 'adore-business' ),
		'section'	=> 'adore_business_archive_settings',
		'type'		=> 'checkbox',
	)
);

// Category enable setting
$wp_customize->add_setting(
	'adore_business_enable_archive_cat',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_archive_cat',
	array(
		'label'		=> esc_html__( 'Enable category.', 'adore-business' ),
		'section'	=> 'adore_business_archive_settings',
		'type'		=> 'checkbox',
	)
);

// archive image enable setting
$wp_customize->add_setting(
	'adore_business_enable_archive_featured_img',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_enable_archive_featured_img',
	array(
		'label'		=> esc_html__( 'Enable featured image.', 'adore-business' ),
		'section'	=> 'adore_business_archive_settings',
		'type'		=> 'checkbox',
	)
);

// Content type setting
$wp_customize->add_setting(
	'adore_business_enable_archive_content_type',
	array(
		'default'			=> 'excerpt',
		'sanitize_callback'	=> 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_enable_archive_content_type',
	array(
		'label'		=> esc_html__( 'Content type:', 'adore-business' ),
		'section'	=> 'adore_business_archive_settings',
		'type'		=> 'radio',
		'choices'	=> array(
			'full-content'	=> esc_html__( 'Full content', 'adore-business' ), 
			'excerpt'		=> esc_html__( 'Excerpt', 'adore-business' ), 
		),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'adore_business_archive_pagination_type',
	array(
		'default'			=> 'numeric',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_archive_pagination_type',
	array(
		'label'		=> esc_html__( 'Pagination type:', 'adore-business' ),
		'section'	=> 'adore_business_archive_settings',
		'type'		=> 'select',
		'choices'	=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-business' ),
			'numeric'		=> esc_html__( 'Numeric', 'adore-business' ),
			'older_newer'	=> esc_html__( 'Older / Newer', 'adore-business' ),
		)
	)
);