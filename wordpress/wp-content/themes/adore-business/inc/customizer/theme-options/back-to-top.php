<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'adore_business_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'adore-business' ),
		'panel' => 'adore_business_theme_options_panel',
	)
);

// Backtop enable setting
$wp_customize->add_setting(
	'adore_business_back_to_top_enable',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_back_to_top_enable',
	array(
		'section'	=> 'adore_business_back_to_top_section',
		'label'		=> esc_html__( 'Enable Scroll up ( Back to top ).', 'adore-business' ),
		'type'		=> 'checkbox',
	)
);