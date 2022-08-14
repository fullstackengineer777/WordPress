<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sports_Highlight
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

do_action( 'sports_highlight_before_comments' );

?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :

		do_action( 'sports_highlight_before_comments_title' );

		?>
		<h3 class="comments-title">
			<?php
			$sports_highlight_comment_count = get_comments_number();
			if ( '1' === $sports_highlight_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'sports-highlight' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $sports_highlight_comment_count, 'comments title', 'sports-highlight' ) ),
					number_format_i18n( $sports_highlight_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php

		do_action( 'sports_highlight_after_comments_title' );

		the_comments_navigation();

		do_action( 'sports_highlight_before_comment_list' );

		?>

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php

		do_action( 'sports_highlight_after_comment_list' );

		the_comments_navigation();

		do_action( 'sports_highlight_after_comments_navigation' );

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sports-highlight' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(); // Explore this function for before and after required hooks.
	?>

</div><!-- #comments -->

<?php

do_action( 'sports_highlight_after_comments' );
