<?php

// Theme Options Customizer
$wp_customize->add_panel(
	'adore_business_theme_options_panel',
	array(
		'title' => esc_html__( 'Theme Options', 'adore-business' ),
		'priority' => 150,
	)
);

$theme_options_customizer = array('breadcrumb','global-layout','archive-options','single-post','single-page','back-to-top','footer' );

foreach ($theme_options_customizer as $customizer) {
	require get_parent_theme_file_path( '/inc/customizer/theme-options/'.$customizer.'.php' );
}