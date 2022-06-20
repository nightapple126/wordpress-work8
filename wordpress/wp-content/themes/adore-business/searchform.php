<?php
/**
 * Template for displaying search forms
 *
 * @package Adore Themes
 * @subpackage Adore Business
 * @since Adore Business 1.0.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'adore-business' ) ?></span>
		<input type="search" class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'adore-business' ) ?>"
		value="<?php echo get_search_query() ?>" name="s"
		title="<?php echo esc_attr_x( 'Search for:', 'label', 'adore-business' ) ?>" />
	</label>
	<button type="submit" class="search-submit"
	value="<?php echo esc_attr_x( 'Search', 'submit button', 'adore-business' ) ?>"><?php echo adore_business_get_svg( array( 'icon' => 'search' ) );?></button>
</form>