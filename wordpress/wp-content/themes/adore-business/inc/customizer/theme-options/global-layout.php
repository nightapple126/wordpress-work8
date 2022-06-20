<?php
/**
* Global Layout
*/

// Global Layout
$wp_customize->add_section(
	'adore_business_global_layout',
	array(
		'title' => esc_html__( 'Global Layout Options', 'adore-business' ),
		'panel' => 'adore_business_theme_options_panel',
	)
);

// Global site layout setting
$wp_customize->add_setting(
	'adore_business_site_layout',
	array(
		'default'			=> 'wide',
		'sanitize_callback' => 'adore_business_sanitize_select',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control(
	'adore_business_site_layout',
	array(
		'label'			=> esc_html__( 'Site layout', 'adore-business' ),
		'section'		=> 'adore_business_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'boxed'	=> esc_html__( 'Boxed', 'adore-business' ), 
			'wide'	=> esc_html__( 'Wide', 'adore-business' ), 
			'frame'	=> esc_html__( 'Frame', 'adore-business' ), 
		),
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'adore_business_archive_sidebar',
	array(
		'default'			=> 'right',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_archive_sidebar',
	array(
		'label'			=> esc_html__( 'Archive Sidebar', 'adore-business' ),
		'description'	=> esc_html__( 'This option works on all archive and blog pages.', 'adore-business' ),
		'section'		=> 'adore_business_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'left'	=> esc_html__( 'Left', 'adore-business' ), 
			'right'	=> esc_html__( 'Right', 'adore-business' ), 
			'no'	=> esc_html__( 'No Sidebar', 'adore-business' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'adore_business_global_page_layout',
	array(
		'default'			=> 'right',
		'sanitize_callback'	=> 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_global_page_layout',
	array(
		'label'			=> esc_html__( 'Global page sidebar', 'adore-business' ),
		'description'	=> esc_html__( 'This option works only on single pages.', 'adore-business' ),
		'section'		=> 'adore_business_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'left'	=> esc_html__( 'Left', 'adore-business' ), 
			'right'	=> esc_html__( 'Right', 'adore-business' ), 
			'no'	=> esc_html__( 'No Sidebar', 'adore-business' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'adore_business_global_post_layout',
	array(
		'default'			=> 'right',
		'sanitize_callback'	=> 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_global_post_layout',
	array(
		'label'			=> esc_html__( 'Global post sidebar', 'adore-business' ),
		'description'	=> esc_html__( 'This option works only on single posts', 'adore-business' ),
		'section'		=> 'adore_business_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'left'	=> esc_html__( 'Left', 'adore-business' ), 
			'right'	=> esc_html__( 'Right', 'adore-business' ), 
			'no'	=> esc_html__( 'No Sidebar', 'adore-business' ), 
		),
	)
);