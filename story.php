<?php
/**
 * Template Name: Story
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

		<section class="story-sections">

			<!-- Flexible Content -->
			<?php if( have_rows('story_sections_2018') ) : ?>

			    <?php while ( have_rows('story_sections_2018') ) : ?>

			        <?php the_row(); ?>

					<?php if( get_row_layout() == 'full_banner_image' ) : ?>

						<div class="full-banner-image">

							<?php echo wp_get_attachment_image( get_sub_field('banner_image'), 'full' ); ?>

							<?php if( get_sub_field('caption_toggle') ) : ?>
								<div class="caption">
									<small><?php the_sub_field('caption'); ?></small>
								</div>
							<?php endif; ?>

						</div>

			        <?php endif; ?>

					<?php if( get_row_layout() == 'full_body_copy' ) : ?>

						<div class="body-copy">

							<?php the_sub_field('title'); ?>

							<?php if( get_sub_field('large_content') ) : ?>
								<div class="large-content">
									<?php the_sub_field('large_content'); ?>
								</div>
							<?php elseif( get_sub_field('content') ) :?>
								<div class="content">
									<?php the_sub_field('content'); ?>
								</div>
							<?php endif;?>

						</div>

					<?php endif; ?>

					<?php if( get_row_layout() == 'two_small_photos' ) : ?>

						<div class="two-small-photos">

							<div class="column-one">

								<?php echo wp_get_attachment_image( get_sub_field('column_one_photo'), 'full' ); ?>
								<?php if( get_sub_field('column_one_caption') ) : ?>
									<div class="caption">
										<small><?php the_sub_field('column_one_caption'); ?></small>
									</div>
								<?php endif; ?>

							</div>

							<div class="column-two">

								<?php echo wp_get_attachment_image( get_sub_field('column_two_photo'), 'full' ); ?>
								<?php if( get_sub_field('column_two_caption') ) : ?>
									<div class="caption">
										<small><?php the_sub_field('column_two_caption'); ?></small>
									</div>
								<?php endif; ?>

							</div>

						</div>

					<?php endif; ?>

					<?php if( get_row_layout() == 'one_photo_one_text' ) : ?>

						<div class="one-photo-one-text">

							<div class="image-column">

								<?php echo wp_get_attachment_image( get_sub_field('image'), 'full' ); ?>

							</div>

							<div class="text-column">

								<?php if(get_sub_field('title') ) : ?>
									<?php the_sub_field('title'); ?>
								<?php endif; ?>
								<?php the_sub_field('text'); ?>

							</div>

						</div>

					<?php endif; ?>

					<?php if( get_row_layout() == 'call_to_action' ) : ?>

						<div class="call-to-action">

							<div class="call-to-action-content">
								<?php the_sub_field('title'); ?>

								<a href="<?php the_sub_field('button_link'); ?>" class="button">
									<?php the_sub_field('button_text'); ?>
								</a>
							</div>

							<?php echo wp_get_attachment_image( get_sub_field('image'), 'full' ); ?>

						</div>

					<?php endif; ?>

		    	<?php endwhile; ?>

			<?php endif; ?>

		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>
