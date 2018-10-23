<?php
/**
 * Template Name: Videos
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div id="primary" class="video-portals content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="portal-container page-content">

				<?php if( have_rows('videos') ) : ?>

					<h2>Components</h2>

					<div class="portal-row">

					    <?php while ( have_rows('videos') ) : ?>

					        <?php the_row(); ?>

							<?php $value = get_sub_field('category'); ?>

								<?php if(in_array('Components', $value)) : ?>
									<div class="portal">

										<div class="embed-container">
								        	<?php the_sub_field('video'); ?>
										</div>

										<?php

										$product_link = get_sub_field('product_link');
										$product_category = get_sub_field('product_category');

										if( $product_link ) :

											$post = $product_link;
											setup_postdata( $post );

											?>
										    	<p>Featuring: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
										    <?php wp_reset_postdata();

										elseif( $product_category ) : ?>

									    	<p>Featuring: <a href="<?php echo get_term_link( $product_category ); ?>"><?php echo $product_category->name; ?></a></p>

										<?php endif; ?>
									</div>
								<?php endif; ?>

					    <?php endwhile; ?>

					</div>

				<?php endif; ?>

				<?php if( have_rows('videos') ) : ?>

					<h2>Bikes</h2>

					<div class="portal-row">

					    <?php while ( have_rows('videos') ) : ?>

					        <?php the_row(); ?>

							<?php $value = get_sub_field('category'); ?>

								<?php if(in_array('Bikes', $value)) : ?>
									<div class="portal">
										<div class="embed-container">
								        	<?php the_sub_field('video'); ?>
										</div>
									</div>
								<?php endif; ?>

					    <?php endwhile; ?>

					</div>

				<?php endif; ?>

				<?php if( have_rows('videos') ) : ?>

					<h2>Misc</h2>

					<div class="portal-row">

					    <?php while ( have_rows('videos') ) : ?>

					        <?php the_row(); ?>

							<?php $value = get_sub_field('category'); ?>

								<?php if(in_array('Misc', $value)) : ?>
									<div class="portal">
										<div class="embed-container">
								        	<?php the_sub_field('video'); ?>
										</div>
									</div>
								<?php endif; ?>

					    <?php endwhile; ?>

					</div>

				<?php endif; ?>

			</div>

		<?php endwhile; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
