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

<!-- Begin Shop Sections -->

	<section class="portal-container">

		<div class="shop-portals">

			<h2>Components</h2>
			<?php
				$prod_categories = get_terms( 'product_cat', array(
					'orderby' => 'name',
					'order' => 'ASC',
					'parent' => 103,
					'hide_empty' => 1
				));
				foreach( $prod_categories as $prod_cat ) :
					$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
					$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
					$term_link = get_term_link( $prod_cat, 'product_cat' );
				?>

				<div class="portal">

					<a href="<?php echo $term_link; ?>">
						<img src="<?php echo $cat_thumb_url; ?>" />
						<h4>
							<?php echo $prod_cat->name; ?>
						</h4>
					</a>

				</div>

			<?php endforeach; wp_reset_query(); ?>

		</div><!-- .shop-portals -->

		<div class="shop-portals">

			<h2>Spare Parts</h2>
			<?php
				$prod_categories = get_terms( 'product_cat', array(
					'orderby' => 'name',
					'order' => 'ASC',
					'parent' => 112,
					'hide_empty' => 1
				));
				foreach( $prod_categories as $prod_cat ) :
					$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
					$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
					$term_link = get_term_link( $prod_cat, 'product_cat' );
				?>

				<div class="portal">

					<a href="<?php echo $term_link; ?>">
						<img src="<?php echo $cat_thumb_url; ?>" />
						<h4>
							<?php echo $prod_cat->name; ?>
						</h4>
					</a>

				</div>

			<?php endforeach; wp_reset_query(); ?>

		</div><!-- .shop-portals -->

		<div class="shop-portals">

			<h2>Apparel</h2>
			<?php
				$prod_categories = get_terms( 'product_cat', array(
					'orderby' => 'name',
					'order' => 'ASC',
					'parent' => 100,
					'hide_empty' => 1
				));
				foreach( $prod_categories as $prod_cat ) :
					$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
					$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
					$term_link = get_term_link( $prod_cat, 'product_cat' );
				?>

				<div class="portal">

					<a href="<?php echo $term_link; ?>">
						<img src="<?php echo $cat_thumb_url; ?>" />
						<h4>
							<?php echo $prod_cat->name; ?>
						</h4>
					</a>

				</div>

			<?php endforeach; wp_reset_query(); ?>


		</div><!-- .shop-portals -->

	</section>

<!-- End Shop Sections -->

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

		<div class="story-lead-in page-content">
			<h1><?php the_field('story_title'); ?></h1>
			<h4><?php the_field('story_tagline'); ?></h4>

			<div class="story-image">
				<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-tablet'); ?>
				<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-desktop'); ?>
				<?php $retina_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-retina'); ?>

				<picture>
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
			</div>

			<div class="lead-in-copy story-content">
				<?php the_field('story_content'); ?>
				<p><a href="/story">Keep Reading ></a></p>
			</div>
		</div>

	</section><!-- .story-lead-in -->

<!-- End Story Section -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
