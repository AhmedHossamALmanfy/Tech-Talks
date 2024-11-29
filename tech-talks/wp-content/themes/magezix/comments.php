<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mt-50">
	<div class="row">
		<div class="col-xl-10">
			<?php
				// You can start editing here -- including this comment!
				if ( have_comments() ) :
					?>
					<h2 class="comments-title title mb-25">
						<?php
						$magezix_comment_count = get_comments_number();
						if ( '1' === $magezix_comment_count ) {
							printf(
								/* translators: 1: title. */
								esc_html__( '1 Comment', 'magezix' ),
								'<span>' . wp_kses_post( get_the_title() ) . '</span>'
							);
						} else {
							printf( 
								/* translators: 1: comment count number, 2: title. */
								esc_html( _nx( '%1$s Comment', '%1$s Comments', $magezix_comment_count, 'comments title', 'magezix' ) ),
								number_format_i18n( $magezix_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'<span>' . wp_kses_post( get_the_title() ) . '</span>'
							);
						}
						?>
					</h2><!-- .comments-title -->

					<?php the_comments_navigation(); ?>

					<div class="latest__comments">
						<ol class="comment-list list-unstyled mb-0">
							<?php
							wp_list_comments(
								array(
									'callback'      => 'magezix_comments',
								)
							);
							?>
						</ol><!-- .comment-list -->
					</div><!-- .comment-list -->

					<?php
					the_comments_navigation();

					// If comments are closed and there are comments, let's leave a little note, shall we?
					if ( ! comments_open() ) :
						?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'magezix' ); ?></p>
						<?php
					endif;

				endif; // Check for have_comments().

				comment_form();
				?>
		</div>
	</div>
</div><!-- #comments -->
