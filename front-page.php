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
			<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('lead_in_image'), 'portal-mobile'); ?>
			<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('lead_in_image'), 'portal-tablet'); ?>
			<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('lead_in_image'), 'portal-desktop'); ?>
			<?php $retina_page_banner = wp_get_attachment_image_src(get_field('lead_in_image'), 'portal-retina'); ?>

			<picture class="full-width-image">
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile_page_banner[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $tablet_page_banner[0]; ?>"
					media="(max-width: 860px)" />
				<source
					srcset="<?php echo $desktop_page_banner[0]; ?>"
					media="(max-width: 1180px)" />
				<source
					srcset="<?php echo $retina_page_banner[0]; ?>"
					media="(min-width: 1181px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image[0]; ?>">
			</picture>
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
		<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-mobile'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-tablet'); ?>
		<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-desktop'); ?>
		<?php $retina_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-retina'); ?>

		<picture class="full-width-image">
			<!--[if IE 9]><video style="display: none"><![endif]-->
			<source
				srcset="<?php echo $mobile_page_banner[0]; ?>"
				media="(max-width: 500px)" />
			<source
				srcset="<?php echo $tablet_page_banner[0]; ?>"
				media="(max-width: 860px)" />
			<source
				srcset="<?php echo $desktop_page_banner[0]; ?>"
				media="(max-width: 1180px)" />
			<source
				srcset="<?php echo $retina_page_banner[0]; ?>"
				media="(min-width: 1181px)" />
			<!--[if IE 9]></video><![endif]-->
			<img srcset="<?php echo $image[0]; ?>">
		</picture>

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
