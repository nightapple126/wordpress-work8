<?php
/**
* Adore Themes Customizer
*
* @package Adore Business
*
* Recent Works section
*/

$wp_customize->add_section(
	'adore_business_recent_works_section',
	array(
		'title' => esc_html__( 'Recent Works', 'adore-business' ),
		'panel' => 'adore_business_frontpage_panel',
	)
);

// Recent Works enable settings
$wp_customize->add_setting(
	'adore_business_recent_works_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_recent_works_enable',
	array(
		'section'		=> 'adore_business_recent_works_section',
		'label'			=> esc_html__( 'Content type:', 'adore-business' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-business' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-business' ),
			'post'			=> esc_html__( 'Post', 'adore-business' ),
		)
	)
);

// Recent Works subtitle settings
$wp_customize->add_setting(
	'adore_business_recent_works_subtitle',
	array(
		'default'			=>  __('Recent Works', 'adore-business'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_recent_works_subtitle',
	array(
		'label'				=> esc_html__( 'Section Subtitle:', 'adore-business' ),		
		'section'			=> 'adore_business_recent_works_section',
		'active_callback'	=> 'adore_business_if_recent_works_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_recent_works_subtitle', 
	array(
		'selector'				=> '#recent-work-section p.section-subtitle',
		'settings'				=> 'adore_business_recent_works_subtitle',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_recent_works_partial_subtitle',
	) 
);

// Recent Works title settings
$wp_customize->add_setting(
	'adore_business_recent_works_title',
	array(
		'default'			=>  __('What We Do', 'adore-business'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_recent_works_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'adore-business' ),		
		'section'			=> 'adore_business_recent_works_section',
		'active_callback'	=> 'adore_business_if_recent_works_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_recent_works_title', 
	array(
		'selector'				=> '#recent-work-section h2.section-title',
		'settings'				=> 'adore_business_recent_works_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_recent_works_partial_title',
	) 
);

for ($i=1; $i <= 5; $i++) { 
	// Recent Works post setting
	$wp_customize->add_setting(
		'adore_business_recent_works_post_'.$i,
		array(
			'sanitize_callback' => 'adore_business_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_business_recent_works_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-business' ), $i ),
			'section'			=> 'adore_business_recent_works_section',
			'active_callback'	=> 'adore_business_if_recent_works_enabled',
			'type'				=> 'select',
			'choices'			=> adore_business_get_post_choices(),
		)
	);

}

/*========================Active Callback==============================*/
function adore_business_if_recent_works_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_business_recent_works_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_business_recent_works_partial_title() {
	return esc_html( get_theme_mod( 'adore_business_recent_works_title' ) );
}
function adore_business_recent_works_partial_subtitle() {
	return esc_html( get_theme_mod( 'adore_business_recent_works_subtitle' ) );
}