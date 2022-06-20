<?php
/**
* Adore Themes Customizer
*
* @package Adore Business
*
* Most Read Section
*/

$wp_customize->add_section(
	'adore_business_most_read_section',
	array(
		'title' => esc_html__( 'Most Read Section', 'adore-business' ),
		'panel' => 'adore_business_frontpage_panel',
	)
);

// Most Read Section enable settings
$wp_customize->add_setting(
	'adore_business_most_read_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_most_read_enable',
	array(
		'section'		=> 'adore_business_most_read_section',
		'label'			=> esc_html__( 'Content type:', 'adore-business' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-business' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-business' ),
			'post'			=> esc_html__( 'Post', 'adore-business' ),
			'category'		=> esc_html__( 'Category', 'adore-business' ),
		)
	)
);

// Most Read Section subtitle settings
$wp_customize->add_setting(
	'adore_business_most_read_subtitle',
	array(
		'default'			=>  __('Incredibly', 'adore-business'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_most_read_subtitle',
	array(
		'label'				=> esc_html__( 'Section Subtitle:', 'adore-business' ),		
		'section'			=> 'adore_business_most_read_section',
		'active_callback'	=> 'adore_business_if_most_read_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_most_read_subtitle', 
	array(
		'selector'				=> '#most-read-section p.section-subtitle',
		'settings'				=> 'adore_business_most_read_subtitle',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_most_read_partial_subtitle',
	) 
);

// Most Read Section title settings
$wp_customize->add_setting(
	'adore_business_most_read_title',
	array(
		'default'			=>  __('Most Read Posts', 'adore-business'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_most_read_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'adore-business' ),		
		'section'			=> 'adore_business_most_read_section',
		'active_callback'	=> 'adore_business_if_most_read_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_most_read_title', 
	array(
		'selector'				=> '#most-read-section h2.section-title',
		'settings'				=> 'adore_business_most_read_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_most_read_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 
// Most Read Section post setting
	$wp_customize->add_setting(
		'adore_business_most_read_post_'.$i,
		array(
			'sanitize_callback' => 'adore_business_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_business_most_read_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-business' ), $i ),
			'section'			=> 'adore_business_most_read_section',
			'active_callback'	=> 'adore_business_if_most_read_post',
			'type'				=> 'select',
			'choices'			=> adore_business_get_post_choices(),
		)
	);
}

// Most Read Section category setting
$wp_customize->add_setting(
	'adore_business_most_read_category',
	array(
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_most_read_category',
	array(
		'label'				=> esc_html__( 'Category', 'adore-business' ),
		'section'			=> 'adore_business_most_read_section',
		'type'				=> 'select',
		'choices'			=> adore_business_get_post_cat_choices(),
		'active_callback'	=> 'adore_business_if_most_read_category',
	)
);

/*========================Active Callback==============================*/
function adore_business_if_most_read_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_business_most_read_enable' )->value();
}
function adore_business_if_most_read_category( $control ) {
	return 'category' === $control->manager->get_setting( 'adore_business_most_read_enable' )->value();
}
function adore_business_if_most_read_post( $control ) {
	return 'post' === $control->manager->get_setting( 'adore_business_most_read_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_business_most_read_partial_title() {
	return esc_html( get_theme_mod( 'adore_business_most_read_title' ) );
}
function adore_business_most_read_partial_subtitle() {
	return esc_html( get_theme_mod( 'adore_business_most_read_subtitle' ) );
}