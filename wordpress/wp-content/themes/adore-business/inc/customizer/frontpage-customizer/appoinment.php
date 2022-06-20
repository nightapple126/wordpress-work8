<?php 
/**
* Adore Themes Customizer
*
* @package Adore Business
*
* Appoinment section
*/

// Appoinment section
$wp_customize->add_section(
	'adore_business_appoinment_section',
	array(
		'title'			=> esc_html__( 'Appoinment Section', 'adore-business' ),
		'panel'			=> 'adore_business_frontpage_panel',
	)
);

// Appoinment enable setting
$wp_customize->add_setting(
	'adore_business_appoinment_enable',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_appoinment_enable',
	array(
		'label'			=> esc_html__( 'Enable appoinment.', 'adore-business' ),
		'section'		=> 'adore_business_appoinment_section',
		'type'			=> 'checkbox',
	)
);

// Appoinment text setting
$wp_customize->add_setting(
	'adore_business_appoinment_text',
	array(
		'default'			=> __( 'MAKE AN APPOINMENT NOW WITH OUR ONLINE FORM', 'adore-business' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_appoinment_text',
	array(
		'label'				=> esc_html__( 'Appoinment Text', 'adore-business' ),
		'section'			=> 'adore_business_appoinment_section',
		'active_callback'	=> 'adore_business_if_appoinment_enabled'
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_appoinment_text', 
	array(
		'selector'				=> '#appoinment-section p',
		'settings'				=> 'adore_business_appoinment_text',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_appoinment_partial_text',
	) 
);

// Appoinment button label setting
$wp_customize->add_setting(
	'adore_business_appoinment_btn_label',
	array(
		'default'			=> __( 'MAKE AN APPOINMENT', 'adore-business' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_appoinment_btn_label',
	array(
		'label'				=> esc_html__( 'Button Label', 'adore-business' ),
		'section'			=> 'adore_business_appoinment_section',
		'active_callback'	=> 'adore_business_if_appoinment_enabled'
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_appoinment_btn_label', 
	array(
		'selector'				=> '#appoinment-section .read-more a',
		'settings'				=> 'adore_business_appoinment_btn_label',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_appoinment_partial_button_label',
	) 
);

// Appoinment Section button url
$wp_customize->add_setting(
	'adore_business_appoinment_button_url',
	array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'adore_business_appoinment_button_url',
	array(
		'label'				=> esc_html__( 'Button Url', 'adore-business' ),
		'section'			=> 'adore_business_appoinment_section',
		'type'				=> 'url',
		'active_callback'	=> 'adore_business_if_appoinment_enabled',
	)
);

/*===================Active Callback=========================*/
function adore_business_if_appoinment_enabled( $control ) {
	return $control->manager->get_setting( 'adore_business_appoinment_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_business_appoinment_partial_text() {
	return esc_html( get_theme_mod( 'adore_business_appoinment_text' ) );
}
function adore_business_appoinment_partial_button_label() {
	return esc_html( get_theme_mod( 'adore_business_appoinment_btn_label' ) );
}