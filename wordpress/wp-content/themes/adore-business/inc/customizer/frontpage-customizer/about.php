<?php
/**
* Adore Themes Customizer
*
* @package Adore Business
*
* About Us Section
*/
$wp_customize->add_section(
	'adore_business_about_section',
	array(
		'title' => esc_html__( 'About Us', 'adore-business' ),
		'panel' => 'adore_business_frontpage_panel',
	)
);

// about us section enable settings
$wp_customize->add_setting(
	'adore_business_about_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);
$wp_customize->add_control(
	'adore_business_about_enable',
	array(
		'section'		=> 'adore_business_about_section',
		'label'			=> esc_html__( 'Content type:', 'adore-business' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-business' ),
		'type'			=> 'select',
		'choices'		=> array(
			'disable' 	=> esc_html__( '--Disable--', 'adore-business' ),
			'page' 		=> esc_html__( 'Page', 'adore-business' ),
		)
	)
);

//about us subtitle setting 
$wp_customize->add_setting(
	'adore_business_about_sub_title',
	array(
		'default'			=> __( 'About Us', 'adore-business' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_about_sub_title',
	array(
		'label'				=> esc_html__( 'Sub Title:', 'adore-business' ),
		'section'			=> 'adore_business_about_section',
		'type'				=> 'text',
		'active_callback'	=> 'adore_business_if_about_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_about_sub_title', 
	array(
		'selector'            => '#about-us-section .section-subtitle',
		'settings'            => 'adore_business_about_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_business_about_partial_subtitle',
	) 
);

// about us page setting
$wp_customize->add_setting(
	'adore_business_about_page',
	array(
		'default'			=> 0,
		'sanitize_callback' => 'adore_business_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control(
	'adore_business_about_page',
	array(
		'label'				=> esc_html__( 'Page', 'adore-business' ),
		'section'			=> 'adore_business_about_section',
		'type'				=> 'dropdown-pages',
		'choices'			=> adore_business_get_page_choices(),
		'active_callback'	=> 'adore_business_if_about_enabled'
	)
);

//about us button label setting 
$wp_customize->add_setting(
	'adore_business_about_button_label',
	array(
		'default'			=> __( 'Explore More', 'adore-business' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_about_button_label',
	array(
		'label'				=> esc_html__( 'Button Label', 'adore-business' ),
		'section'			=> 'adore_business_about_section',
		'type'				=> 'text',
		'active_callback'	=> 'adore_business_if_about_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_about_button_label', 
	array(
		'selector'            => '#about-us-section .read-more a',
		'settings'            => 'adore_business_about_button_label',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_business_about_partial_button',
	) 
);

/*========================Active Callback==============================*/
function adore_business_if_about_enabled( $control ) {
return 'disable' != $control->manager->get_setting( 'adore_business_about_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_business_about_partial_subtitle() {
	return esc_html( get_theme_mod( 'adore_business_about_sub_title' ) );
}
function adore_business_about_partial_button() {
	return esc_html( get_theme_mod( 'adore_business_about_button_label' ) );
}