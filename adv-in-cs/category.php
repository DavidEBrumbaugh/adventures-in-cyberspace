<?php
/**
 * The main category file
 *
 * @package Adventures in Cyberspace
 * @since 0.1.0
 */

get_header(); ?>

	<div class="content-container category-container">
	<div class="col span_1_of_12"><?php show_side_menu(); ?></div> <!-- Border -->
	<div class="col span_10_of_12 category-header"> <!-- Body of Page-->
		<h2 ><strong><?php single_cat_title(); ?></strong></h2>
		<div class="category-description">
			<?php echo category_description(); ?>
		</div>
	</div> <!-- End Body -->
	<div class="col span_1_of_12"></div> <!-- Border -->

			<?php if ( have_posts() ) : $row_count = 1; ?>
				<?php while ( have_posts() ): the_post(); ?>
	<div class="section group category-row<?php echo (bool) ($row_count % 2) ? '' :  '-even'; ?>">
		<div class="col span_1_of_12"></div> <!-- Border -->
		<div class="col span_10_of_12 page-body category-row"> <!-- Body of Page-->
					<div <?php post_class('post-class-outer'); ?>>
						<div id="post-<?php the_ID(); ?>" <?php post_class('post-class-inner'); ?>>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-info">
								<?php  the_date();  show_tags(); ?>
							</div>
							<?php the_excerpt(); ?>
						</div>
					</div>
		</div> <!-- End Body -->
	</div>
				<?php ++$row_count; endwhile; ?>
			<?php endif; ?>



<?php get_footer();
