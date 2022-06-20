<?php
/**
* Footer copyright
*/

// Footer copyright
$wp_customize->add_section(
	'adore_business_footer_section',
	array(
		'title' => esc_html__( 'Footer Options', 'adore-business' ),
		'panel' => 'adore_business_theme_options_panel',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'adore_business_copyright_txt',
	array(
		'default'			=> $default['adore_business_copyright_txt'],
		'sanitize_callback' => 'adore_business_sanitize_html',
	)
);

$wp_customize->add_control(
	'adore_business_copyright_txt',
	array(
		'label'				=> esc_html__( 'Copyright text:', 'adore-business' ),
		'section'			=> 'adore_business_footer_section',
		'type'				=> 'textarea',
	)
);