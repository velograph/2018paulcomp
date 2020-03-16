<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div id="primary" class="contact">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

			<section class="contact-content">

				<div class="lead-in-title">
					<h1><?php the_title(); ?></h1>
				</div>

				<div class="column column-one">
					<h4>Headquarters</h4>
					<?php the_field('column_one'); ?>
				</div>

				<div class="column column-two">
					<h4>Email</h4>
					<?php the_field('column_two'); ?>
				</div>

			</section>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
