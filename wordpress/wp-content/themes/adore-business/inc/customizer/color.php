<?php

//Color Panel

// Site tagline color setting
$wp_customize->add_setting(	
	'adore_business_header_tagline',
	array(
		'default'			=> '#929292',
		'sanitize_callback'	=> 'adore_business_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize,
		'adore_business_header_tagline',
		array(
			'label'		=> esc_html__( 'Site tagline Color', 'adore-business' ),
			'section'	=> 'colors',
		)
	)
);