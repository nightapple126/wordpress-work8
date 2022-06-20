<?php
/**
* Adore Themes Customizer
*
* @package Adore Business
*
* Services Section
*/

$wp_customize->add_section(
	'adore_business_services_section',
	array(
		'title' => esc_html__( 'Services Section', 'adore-business' ),
		'panel' => 'adore_business_frontpage_panel',
	)
);

// Services Section enable settings
$wp_customize->add_setting(
	'adore_business_services_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_services_enable',
	array(
		'section'		=> 'adore_business_services_section',
		'label'			=> esc_html__( 'Content type:', 'adore-business' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-business' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-business' ),
			'post'			=> esc_html__( 'Post', 'adore-business' ),
		)
	)
);

// Services Section title settings
$wp_customize->add_setting(
	'adore_business_services_title',
	array(
		'default'			=>  __('What We Provide', 'adore-business'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_services_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'adore-business' ),		
		'section'			=> 'adore_business_services_section',
		'active_callback'	=> 'adore_business_if_services_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_services_title', 
	array(
		'selector'				=> '#services-section h2.section-title',
		'settings'				=> 'adore_business_services_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_services_partial_title',
	) 
);

// Services Section subtitle settings
$wp_customize->add_setting(
	'adore_business_services_subtitle',
	array(
		'default'			=>  __('Our Services', 'adore-business'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_services_subtitle',
	array(
		'label'				=> esc_html__( 'Section Subtitle:', 'adore-business' ),		
		'section'			=> 'adore_business_services_section',
		'active_callback'	=> 'adore_business_if_services_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_services_subtitle', 
	array(
		'selector'				=> '#services-section p.section-subtitle',
		'settings'				=> 'adore_business_services_subtitle',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_services_partial_subtitle',
	) 
);

for ($i=1; $i <= 3 ; $i++) { 

	// Services Section select icon
	$wp_customize->add_setting(
		'adore_business_service_icon_' . $i,
		array(	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'adore_business_service_icon_' . $i,
		array(
		'label'				=> sprintf( esc_html__('Icon %d', 'adore-business'), $i ),
		'description'		=> sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'adore-business'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'			=> 'adore_business_services_section',   	
		'type'				=> 'text',		
		'active_callback'	=> 'adore_business_if_services_enabled',
		)
	);

	// Services Section post setting
	$wp_customize->add_setting(
		'adore_business_services_post_'.$i,
		array(
			'sanitize_callback' => 'adore_business_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_business_services_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-business' ), $i ),
			'section'			=> 'adore_business_services_section',
			'active_callback'	=> 'adore_business_if_services_enabled',
			'type'				=> 'select',
			'choices'			=> adore_business_get_post_choices(),
		)
	);

}

/*========================Active Callback==============================*/
function adore_business_if_services_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_business_services_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_business_services_partial_title() {
	return esc_html( get_theme_mod( 'adore_business_services_title' ) );
}
function adore_business_services_partial_subtitle() {
	return esc_html( get_theme_mod( 'adore_business_services_subtitle' ) );
}