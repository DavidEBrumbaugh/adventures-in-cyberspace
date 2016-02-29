<?php
/**
 * A single post
 *
 * @package Adventures in Cyberspace
 * @since 0.1.0
 */

get_header(); ?>

	<div class="content-container ">

<?php if ( have_posts() ) : the_post(); ?>

		<div class="section group ">
			<div class="col span_1_of_12"><?php show_side_menu(); ?></div> <!-- Border -->
			<div class="col span_10_of_12 page-body post-body"> <!-- Body of Page-->
				<div <?php post_class('post-class-outer'); ?>>
					<div id="post-<?php the_ID(); ?>" <?php post_class('post-class-inner'); ?>>
						<div class="post-info">
						Reported by:	<?php the_author(); ?><br/>
							<?php  the_date(); show_tags(); ?>
							<br/> - - -
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						</div>
						<?php the_post_thumbnail(); ?>

						<?php the_content();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					</div>
				</div>
			</div> <!-- End Body -->
		</div>

<?php endif; ?>
</div>


<?php get_footer();
