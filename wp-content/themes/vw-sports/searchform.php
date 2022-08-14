<?php
/**
 * The template for displaying search forms in vw-sports
 *
 * @package VW Sports
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'vw-sports' ); ?></span>
		<input type="search" class="search-field p-3" placeholder="<?php echo esc_attr_x( 'SEARCH', 'placeholder','vw-sports' ); ?>" value="<?php echo esc_attr( get_search_query()); ?>" name="s">
	</label>
	<input type="submit" class="search-submit p-3" value="<?php echo esc_attr_x( 'SEARCH', 'submit button','vw-sports' ); ?>">
</form>