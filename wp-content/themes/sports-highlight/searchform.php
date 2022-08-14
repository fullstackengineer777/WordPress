<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Sports_Highlight
 */

?>

<form
	role="search"
	method="get"
	action="<?php echo esc_url( home_url( '/' ) ); ?>"
	class="search-form"
>
	<input
		type="text"
		class="search-field"
		placeholder="<?php esc_attr_e( 'Search&hellip;', 'sports-highlight' ); ?>"
		value="<?php echo get_search_query(); ?>"
		name="s"
	>
	<button class="search-button" type="submit">
		<i class="fa fa-search" aria-hidden="true"></i>
	</button>
</form>
