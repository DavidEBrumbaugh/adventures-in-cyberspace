<?php
/**
 * The template for displaying the header.
 *
 * @package Adventures in Cyberspace
 * @since 0.1.0
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- Start the responsive grid system -->
	<div class="section group">
		<div class="col span_1_of_12">
			<div class="section group">
				<div class="col span_12_of_12">
				</div>
			</div>
		</div> <!-- Border -->
		<div class="col span_10_of_12"> <?php // This div closed in the footer /> ?>
			<div class="blog-header">
	<h1 class="main-title"><?php bloginfo('title'); ?></h1>
	<h2 class="sub-title"><?php bloginfo('description'); ?></h2>
			</div>


