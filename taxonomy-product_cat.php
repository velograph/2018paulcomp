<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php get_template_part('parts/breadcrumbs'); ?>

<section class="shop-categories">

	<?php
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
		$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
		if ($term->parent === 0) { ?>

		<div class="portal-container page-content <?php echo $term->slug; ?>">

   	 		<?php // Components ?>
   	 		<?php
   	 			$prod_categories = get_terms( 'product_cat', array(
   	 				'orderby' => 'name',
   	 				'order' => 'ASC',
   	 				'parent' => $term->term_id,
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

   	 	</div>

		<?php } if(($parent->term_id!="" && sizeof($children)>0)) { ?>
			<?php
				$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$terms = get_terms( 'product_cat', array(
					'hide_empty' => 1,
					'orderby' => 'name',
					'child_of' => $current_term->term_id,
				) );
				?>

				<?php
				// now run a query for each product family
				foreach( $terms as $term ) {

					// Define the query
					$args = array(
						'post_type' => 'product',
						'product_cat' => $term->slug,
						'orderby' => 'menu_order',
						'order' => 'ASC'
					);
					$query = new WP_Query( $args ); ?>

						<?php while ( $query->have_posts() ) : ?>

							<?php $query->the_post(); ?>

							<div class="portal" id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink(); ?>">
									<?php $mobile_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-mobile'); ?>
									<?php $tablet_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-tablet'); ?>
									<?php $desktop_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-desktop'); ?>
									<?php $retina_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-retina'); ?>

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
									<h4>
										<?php the_title(); ?>
									</h4>
									<h6><?php echo $term->name; ?></h6>

								</a>
							</div>

						<?php endwhile; ?>

					<?php wp_reset_postdata(); } ?>

		<?php } elseif(($parent->term_id!="") && (sizeof($children)==0)) { ?>

			<?php if ( have_posts() ) : ?>

				<div class="portal-container page-content">

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="portal" id="post-<?php the_ID(); ?>">
							<a href="<?php the_permalink(); ?>">
								<?php $mobile_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-mobile'); ?>
								<?php $tablet_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-tablet'); ?>
								<?php $desktop_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-desktop'); ?>
								<?php $retina_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-retina'); ?>

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
								<h4>
									<?php the_title(); ?>
								</h4>
								<h6><?php echo $term->name; ?></h6>
							</a>
						</div>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

		<?php } ?>

</section>

<?php get_footer( 'shop' ); ?>
