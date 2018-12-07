<?php
/**
 * The template for displaying single products
 *
 * @package Paul Component 2018 Update
 * @version     1.6.4
 */

get_header(); ?>

<script>

	jQuery(document).ready(function(){

		jQuery('.product-image').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  asNavFor: '.product-thumbs'
		});
		jQuery('.product-thumbs').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  arrows: false,
		  asNavFor: '.product-image',
		  dots: false,
		  focusOnSelect: true
		});

		jQuery('.supporting-video-container').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  dots: true,
		  arrows: false,
		});

		jQuery(".accordion").hide();
		jQuery('.value').each(function() {
			var $dropdown = jQuery(this);

			jQuery(".accordion-hook", $dropdown).click(function(e) {
			  e.preventDefault();
			  $div = jQuery(".accordion", $dropdown);
			  $div.toggle('blind');
			  jQuery(".accordion").not($div).hide('blind');
			  return false;
			});

		});

		jQuery('html').click(function(){
			jQuery(".accordion").hide('blind');
		});

	});
</script>

<?php do_action( 'woocommerce_before_single_product' ); ?>

<?php get_template_part('parts/breadcrumbs'); ?>

<section class="product-container">

	<?php if ( wp_is_mobile() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="product-top">

				<div class="product-gallery-container product-section">

					<div class="product-image">

						<?php if( get_field('gallery') ) : ?>

							<?php

							$images = get_field('gallery');
							$neat_images = get_field('gallery');

							if( $neat_images ): ?>
								<?php foreach( $neat_images as $neat_image ): ?>

									<div class="portal-image">
										<?php
											echo wp_get_attachment_image( $neat_image['id'], 'full' );
										?>
									</div>

								<?php endforeach; ?>
							<?php endif; ?>

						<?php else: ?>

							<?php
								// Outputting an image using Image ID as the Return Value
								echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' );
							?>

						<?php endif; ?>

					</div>

					<div class="product-thumbs">

						<?php

						$images = get_field('gallery');

						if( $images ): ?>
							<?php foreach( $images as $image ): ?>

								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endforeach; ?>
						<?php endif; ?>

					</div>

				</div>

				<div class="product-add-to-cart product-section">

					<h3><?php the_title(); ?></h3>

					<div class="lead-in-copy">
						<?php the_excerpt(); ?>
					</div>

					<?php if( $product->is_type( 'simple' ) ) : ?>

						<div class="simple-product">
							<?php if ( $price_html = $product->get_price_html() ) : ?>
								<h3><span class="price"><?php echo $price_html; ?></span></h3>
							<?php endif; ?>

					<?php endif; ?>
						<?php
							/**
							* woocommerce_single_product_summary hook
							*
							* @hooked woocommerce_template_single_title - 5
							* @hooked woocommerce_template_single_rating - 10
							* @hooked woocommerce_template_single_price - 10
							* @hooked woocommerce_template_single_excerpt - 20
							* @hooked woocommerce_template_single_add_to_cart - 30
							* @hooked woocommerce_template_single_meta - 40
							* @hooked woocommerce_template_single_sharing - 50
							*/
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
							do_action( 'woocommerce_single_product_summary' );
						?>
					<?php if( $product->is_type( 'simple' ) ) : ?>
						</div>
					<?php endif; ?>

				</div>

			</section>

			<section class="product-middle">

				<div class="tech-specs product-section">

					<!-- Tech Specifications Content -->
					<?php if( have_rows('technical_specification_rows') ) : ?>

						<h3>Technical Information</h3>
						<ul>
							<?php while ( have_rows('technical_specification_rows') ) : ?>

								<?php the_row(); ?>

								<?php if( get_row_layout() == 'spec' ) : ?>

									<li>
										<div class="key"><small><?php the_sub_field('key'); ?></small></div>

										<div class="value">
											<small>
												<?php if(get_sub_field('answer') == "Text") : ?>

													<?php the_sub_field('value'); ?>

												<?php elseif(get_sub_field('answer') == "File Download") : ?>

													<a href="<?php the_sub_field('file_download'); ?>">Download</a>

												<?php elseif(get_sub_field('answer') == "Inline Answer") : ?>

													<span class="accordion-hook"><?php the_sub_field('inline_title'); ?>&darr;</span>
													<div class="accordion">
														<?php the_sub_field('inline_answer'); ?>
													</div>

												<?php endif; ?>
											</small>
										</div>
									</li>

								<?php endif; ?>

							<?php endwhile; ?>
						</ul>

					<?php endif; ?>

				</div>

				<?php if( have_rows('video_repeater') ) : ?>
					<h3 class="supporting-video-title">Product Videos</h3>
				<?php endif; ?>

				<?php if( have_rows('video_repeater') ) : ?>

					<script>

						jQuery(document).ready(function(){

							var video_width = jQuery('.supporting-video-container').width();
							var iframe_height = ( video_width * ('.' + 5) );
							jQuery('.supporting-video-container').css('height', iframe_height);
							jQuery('.supporting-video iframe').css('height', iframe_height);
						});
					</script>


					<div class="supporting-video-container product-section">
						<?php while ( have_rows('video_repeater') ) : ?>

							<?php the_row(); ?>

							<div class="supporting-video">
								<?php the_sub_field('video'); ?>
							</div>

						<?php endwhile; ?>
					</div>

				<?php elseif( the_content() ) : ?>
					<div class="product-story product-section">
						<?php
							if($post->content=="")
							{ ?>
							<?php } else {
						?>
						<?php } ?>

						<h3>Product Story</h3>
						<?php the_content(); ?>
					</div>
				<?php endif; ?>

			</section>

			<?php if( have_rows('video_repeater') ) : ?>

				<section class="product-bottom">

					<div class="product-story product-section">
						<h3>Product Story</h3>
						<?php the_content(); ?>
					</div>

					<div class="related-products product-section">
						<h3>Related Products</h3>
						<?php
							remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
							remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
							do_action( 'woocommerce_after_single_product_summary' );
						?>
					</div>

				</section>

			<?php else: ?>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

	<?php else:  // The following is tablet up styling ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="column-one">

				<div class="product-gallery-container product-section">

					<div class="product-image">

						<?php if( get_field('gallery') ) : ?>

							<?php

							$images = get_field('gallery');
							$neat_images = get_field('gallery');

							if( $neat_images ): ?>
								<?php foreach( $neat_images as $neat_image ): ?>

									<div class="portal-image">
										<?php
											echo wp_get_attachment_image( $neat_image['id'], 'full' );
										?>
									</div>

								<?php endforeach; ?>
							<?php endif; ?>

						<?php else: ?>

							<?php
								// Outputting an image using Image ID as the Return Value
								echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' );
							?>

						<?php endif; ?>

					</div>

					<div class="product-thumbs">

						<?php

						$images = get_field('gallery');

						if( $images ): ?>
							<?php foreach( $images as $image ): ?>

								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endforeach; ?>
						<?php endif; ?>

					</div>

				</div>

				<?php if( have_rows('video_repeater') ) : ?>
					<h3 class="supporting-video-title">Product Videos</h3>
				<?php endif; ?>

				<?php if( have_rows('video_repeater') ) : ?>

					<div class="supporting-video-container product-section">
						<?php while ( have_rows('video_repeater') ) : ?>

							<?php the_row(); ?>

							<div class="supporting-video">
								<?php the_sub_field('video'); ?>
							</div>

						<?php endwhile; ?>
					</div>

				<?php endif; ?>

				<div class="related-products product-section">
					<h3>Related Products</h3>
					<?php
						remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
						remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
						do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>

			</section>

			<section class="column-two">

				<div class="product-add-to-cart product-section">

					<h3><?php the_title(); ?></h3>

					<div class="lead-in-copy">
						<?php the_excerpt(); ?>
					</div>

					<?php if( $product->is_type( 'simple' ) ) : ?>

						<div class="simple-product">
							<?php if ( $price_html = $product->get_price_html() ) : ?>
								<h3><span class="price"><?php echo $price_html; ?></span></h3>
							<?php endif; ?>

					<?php endif; ?>
						<?php
							/**
							* woocommerce_single_product_summary hook
							*
							* @hooked woocommerce_template_single_title - 5
							* @hooked woocommerce_template_single_rating - 10
							* @hooked woocommerce_template_single_price - 10
							* @hooked woocommerce_template_single_excerpt - 20
							* @hooked woocommerce_template_single_add_to_cart - 30
							* @hooked woocommerce_template_single_meta - 40
							* @hooked woocommerce_template_single_sharing - 50
							*/
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
							do_action( 'woocommerce_single_product_summary' );
						?>
					<?php if( $product->is_type( 'simple' ) ) : ?>
						</div>
					<?php endif; ?>

				</div>

				<div class="tech-specs product-section">

					<!-- Tech Specifications Content -->
					<?php if( have_rows('technical_specification_rows') ) : ?>

						<h3>Technical Information</h3>
						<ul>
							<?php while ( have_rows('technical_specification_rows') ) : ?>

								<?php the_row(); ?>

								<?php if( get_row_layout() == 'spec' ) : ?>

									<li>
										<div class="key"><small><?php the_sub_field('key'); ?></small></div>

										<div class="value">
											<small>
												<?php if(get_sub_field('answer') == "Text") : ?>

													<?php the_sub_field('value'); ?>

												<?php elseif(get_sub_field('answer') == "File Download") : ?>

													<a href="<?php the_sub_field('file_download'); ?>">Download</a>

												<?php elseif(get_sub_field('answer') == "Inline Answer") : ?>

													<span class="accordion-hook"><?php the_sub_field('inline_title'); ?>&nbsp;&darr;</span>
													<div class="accordion">
														<?php the_sub_field('inline_answer'); ?>
													</div>

												<?php endif; ?>
											</small>
										</div>
									</li>

								<?php endif; ?>

							<?php endwhile; ?>
						</ul>

					<?php endif; ?>

				</div>

				<div class="product-story product-section">
					<h3>Product Story</h3>
					<?php the_content(); ?>
				</div>

			</section>

		<?php endwhile; // end of the loop. ?>

	<?php endif; ?>

</section>

<?php get_footer(); ?>
