<?php
/**
 * The main template file
 *
 * @package Adventures in Cyberspace
 * @since 0.1.0
 */

get_header(); ?>

<div class="content-container">
<div class="section group">
<div class="col span_1_of_12">
	<?php show_side_menu(); ?>
</div> <!-- Border -->
<div class="col span_10_of_12 page-body"> <!-- Body of Page-->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ): the_post(); ?>
	<div <?php post_class('post-class-outer'); ?>>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post-class-inner'); ?>>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
		</div>
	</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div> <!-- End Body -->
	<div class="col span_1_of_12"></div> <!-- Border -->
</div>

<?php get_footer();
