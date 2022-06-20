<?php
/**
* Adore Themes Customizer
*
* @package Adore Business
*
* Topbar Section
*/

$wp_customize->add_section(
	'adore_business_top_bar_section',
	array(
		'title' => esc_html__( 'Topbar', 'adore-business' ),
		'panel' => 'adore_business_frontpage_panel',
	)
);

//Topbar section enable settings
$wp_customize->add_setting(
	'adore_business_top_bar_enable',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_top_bar_enable',
	array(
		'label'			=> esc_html__( 'Enable Topbar', 'adore-business' ),
		'section'		=> 'adore_business_top_bar_section',
		'type'			=> 'checkbox',
	)
);

//Topbar contact number settings
$wp_customize->add_setting(
	'adore_business_top_bar_contact_number',
	array(	
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'adore_business_top_bar_contact_number',
	array(
		'label'				=> esc_html__('Contact Number: ', 'adore-business'),  
		'section'			=> 'adore_business_top_bar_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_business_if_top_bar_enable',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_top_bar_contact_number', 
	array(
        'selector'            => '#top-navigation .contact-number a',
        'settings'            => 'adore_business_top_bar_contact_number',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_business_topbar_partial_contact_number',
	) 
);

//Topbar email id settings
$wp_customize->add_setting(
	'adore_business_top_bar_email_id',
	array(	
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'adore_business_top_bar_email_id',
	array(
		'label'				=> esc_html__('Email Id: ', 'adore-business'),  
		'section'			=> 'adore_business_top_bar_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_business_if_top_bar_enable',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_top_bar_email_id', 
	array(
        'selector'            => '#top-navigation .mail-id a',
        'settings'            => 'adore_business_top_bar_email_id',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_business_topbar_partial_email_id',
	) 
);

//Topbar social menu settings
$wp_customize->add_setting(
	'adore_business_top_bar_social_menu',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_business_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_business_top_bar_social_menu',
	array(
		'label'				=> esc_html__( 'Enable Topbar Menu', 'adore-business' ),
		'section'			=> 'adore_business_top_bar_section',
		'type'				=> 'checkbox',
		'active_callback'	=> 'adore_business_if_top_bar_enable',
	)
);

// Topbar color setting
$wp_customize->add_setting(	
	'adore_business_top_bar_color',
	array(
		'default'			=> '#e5e5e5',
		'sanitize_callback'	=> 'adore_business_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize,
		'adore_business_top_bar_color',
		array(
			'label'				=> esc_html__( 'Topbar Background Color', 'adore-business' ),
			'section'			=> 'adore_business_top_bar_section',
			'active_callback'	=> 'adore_business_if_top_bar_enable',
		)
	)
);

/*===================Active Callback=========================*/
function adore_business_if_top_bar_enable( $control ) {
	return $control->manager->get_setting( 'adore_business_top_bar_enable' )->value();
}

/*===================Partial Refresh=========================*/
function adore_business_topbar_partial_contact_number() {
	return esc_html( get_theme_mod( 'adore_business_top_bar_contact_number' ) );
}
function adore_business_topbar_partial_email_id() {
	return esc_html( get_theme_mod( 'adore_business_top_bar_email_id' ) );
}