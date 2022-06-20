<?php

// Home Page Customizer panel
$wp_customize->add_panel(
	'adore_business_frontpage_panel',
	array(
		'title' => esc_html__( 'Frontpage Sections', 'adore-business' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'top-bar','slider','appoinment','about','services','recent-works','team','most-read','subscription' );

foreach ($customizer_settings as $customizer ) {
	require get_parent_theme_file_path( '/inc/customizer/frontpage-customizer/'.$customizer.'.php' );
}