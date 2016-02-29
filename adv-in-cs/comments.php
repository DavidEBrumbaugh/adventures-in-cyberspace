<?php
/**
 * The template for displaying comments
 *
 * Adapted from the 2015 theme
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

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			-- Comments --
		</h2>

		<?php comment_nav(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 56,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php  comment_nav();  ?>

	<?php endif; // have_comments() ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'adventures-in-cyberspace' ); ?></p>
	<?php endif; ?>

	<div class="outer-form">
	<?php
	$url = get_stylesheet_directory_uri().'/assets/css/backgrounds/shiftkey.png';
	comment_form(array('submit_button'=>'<input name="%1$s" type="image" alt="submit" src="'.$url.'" id="%2$s" class="%3$s" value="%4$s" />'.
	'<label for="%2$s" class="%3$s">%4$s</label>')); ?>
	</div>


</div><!-- .comments-area -->
