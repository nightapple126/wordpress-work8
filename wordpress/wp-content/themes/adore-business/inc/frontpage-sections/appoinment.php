<?php
/**
* Template part for displaying front page imtroduction.
*
* @package Adore Business
*/

// Get the content type.
$appoinment			= get_theme_mod( 'adore_business_appoinment_enable', false );
$appoinment_text 	= get_theme_mod( 'adore_business_appoinment_text', __( 'MAKE AN APPOINMENT NOW WITH OUR ONLINE FORM', 'adore-business' ) );
$button_label		= get_theme_mod( 'adore_business_appoinment_btn_label', __( 'MAKE AN APPOINMENT', 'adore-business' ) );
$button_url			= get_theme_mod( 'adore_business_appoinment_button_url', '#' );

if ( false === $appoinment ) {
	return;
}
?>

<div id="appoinment-section" class="paddingt-b">
	<div class="wrapper">
		<div class="entry-container">
			<div class="entry-content">
				<p><?php echo esc_html( $appoinment_text ); ?></p>
			</div>
			<?php if ( !empty( $button_label ) ) { ?>
				<div class="read-more">
					<a href="<?php echo esc_url( $button_url ); ?>" class="btn"><?php echo esc_html( $button_label ); ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>