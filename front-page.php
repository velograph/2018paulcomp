<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="front-page-leader">
		<section class="lead-image">

			<?php
				// Outputting an image using Image ID as the Return Value
				$neat_responsive_image_id = get_field('lead_in_image');
				echo wp_get_attachment_image( $neat_responsive_image_id, 'full' );
			?>

		</section>

		<section class="lead-in-copy-container">
			<div class="lead-in-copy">
				<?php the_field('lead_in_copy'); ?>
				<h3><?php the_field('lead_in_title'); ?></h3>
			</div>
		</section>

	</section>

	<?php get_template_part( 'parts/shop-sections' ); ?>

<!-- Begin Story Section -->

	<section class="story-lead-in-container">
		<?php
			// Outputting an image using Image ID as the Return Value
			$neat_responsive_image_id = get_field('story_leading_image');
			echo wp_get_attachment_image( $neat_responsive_image_id, 'full' );
		?>

		<div class="empty-column">&nbsp;</div>

		<div class="story-lead-in page-content">
			<h1><?php the_field('story_title'); ?></h1>

			<div class="lead-in-copy story-content">
				<?php the_field('story_content'); ?>
				<p><a href="/story">Keep Reading ></a></p>
			</div>
		</div>
		<div class="empty-column">&nbsp;</div>

	</section><!-- .story-lead-in -->

<!-- End Story Section -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
