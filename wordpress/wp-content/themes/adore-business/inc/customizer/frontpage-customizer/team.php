<?php
/**
* Adore Theme Customizer
*
* @package Adore Business Theme
*
* Team section
*/

$wp_customize->add_section(
	'adore_business_team_section',
	array(
		'title' => esc_html__( 'Team Section', 'adore-business' ),
		'panel' => 'adore_business_frontpage_panel',
	)
);

// team enable settings
$wp_customize->add_setting(
	'adore_business_team_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_business_team_enable',
	array(
		'label'			=> esc_html__( 'Content type:', 'adore-business' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-business' ),
		'section'		=> 'adore_business_team_section',
		'type'			=> 'select',		
		'choices'		=> array( 
			'disable'	=> esc_html__( '--Disable--', 'adore-business' ),
			'page'		=> esc_html__( 'Page', 'adore-business' ),
		)
	)
);

// team subtitle settings
$wp_customize->add_setting(
	'adore_business_team_sub_title',
	array(
		'default'			=>  __('Our Members', 'adore-business'),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_business_team_sub_title',
	array(
		'label'				=> esc_html__( 'Sub Title:', 'adore-business' ),
		'section'			=> 'adore_business_team_section',
		'active_callback'	=> 'adore_business_if_team_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_team_sub_title', 
	array(
		'selector'				=> '#team-section p.section-subtitle',
		'settings'				=> 'adore_business_team_sub_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_team_partial_subtitle',
	) 
);

// team title settings
$wp_customize->add_setting(
	'adore_business_team_title',
	array(
		'default'			=>  __('Here is Our Awesome Team', 'adore-business'),
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control(
	'adore_business_team_title',
	array(
		'label'				=> esc_html__( 'Title:', 'adore-business' ),		
		'section'			=> 'adore_business_team_section',
		'active_callback'	=> 'adore_business_if_team_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_business_team_title', 
	array(
		'selector'				=> '#team-section h2.section-title',
		'settings'				=> 'adore_business_team_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_business_team_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 

	// team select page setting
	$wp_customize->add_setting(
		'adore_business_team_page_'.$i,
		array(
			'default'			=> 0,
			'sanitize_callback'	=> 'adore_business_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_business_team_page_'.$i,
		array(
			'label'				=> esc_html__( 'Page ', 'adore-business' ).$i,
			'section'			=> 'adore_business_team_section',
			'type'				=> 'dropdown-pages',
			'active_callback'	=> 'adore_business_if_team_enabled'
		)
	);

	// team position setting
	$wp_customize->add_setting(
		'adore_business_team_position_'.$i,
		array(
			'sanitize_callback'	=> 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'adore_business_team_position_'.$i,
		array(
			'label'				=> esc_html__( 'Members Position:', 'adore-business' ). $i,
			'section'			=> 'adore_business_team_section',
			'active_callback'	=> 'adore_business_if_team_enabled',

		)
	);

	// team social links setting
	$wp_customize->add_setting(
		'adore_business_team_social_link_'.$i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new Adore_Business_Multi_Input_Custom_Control( $wp_customize,
		'adore_business_team_social_link_'.$i,
		array(
			'label'				=> esc_html__( 'Social Link', 'adore-business' ),
			'button_text'		=> esc_html__( 'Add Social Link', 'adore-business' ),
			'section'			=> 'adore_business_team_section',
			'active_callback'	=> 'adore_business_if_team_enabled',
			'type'				=> 'multi-input',
		) )
);

}

/*========================Active Callback==============================*/
function adore_business_if_team_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_business_team_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_business_team_partial_subtitle() {
	return esc_html( get_theme_mod( 'adore_business_team_sub_title' ) );
}
function adore_business_team_partial_title() {
	return esc_html( get_theme_mod( 'adore_business_team_title' ) );
}