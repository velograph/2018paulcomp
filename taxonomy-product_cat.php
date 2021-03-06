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

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.portal h4').matchHeight();
});

</script>

<?php get_template_part('parts/breadcrumbs'); ?>

<section class="portal-containers">

	<?php
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
		$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
		if ($term->parent === 0) { ?>

		<div class="portal-container <?php echo $term->slug; ?>-portals">

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
						<?php
							// Outputting an image using Image ID as the Return Value
							$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
							echo wp_get_attachment_image( $cat_thumb_id, 'full' );
						?>
   	 					<h4>
   	 						<?php echo $prod_cat->name; ?>
   	 					</h4>
   	 				</a>

   	 			</div>

   	 		<?php endforeach; wp_reset_query(); ?>

   	 	</div>

		<?php } if(($parent->term_id!="" && sizeof($children)>0)) { ?>

			<div class="middle-tier-categories">

				<?php

					$args = array(
						'post_type' => 'product',
						'product_cat' => $term->slug,
						'posts_per_page' => -1,
						'orderby' => 'date',
						'order' => 'ASC'
					);
					$query = new WP_Query($args);

					if($query->have_posts()) : ?>

					<?php while($query->have_posts()) : ?>

						<?php $query->the_post(); ?>

						<div class="portal" id="post-<?php the_ID(); ?>">
							<a href="<?php the_permalink(); ?>">
								<?php
									// Outputting an image using Image ID as the Return Value
									echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' );
								?>

								<h4>
									<?php the_title(); ?>
								</h4>
								<?php if (is_term('brake-parts')) : ?>
								<?php else: ?>
									<h6><?php echo $term->name; ?></h6>
								<?php endif; ?>
							</a>
						</div>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>

		<?php } elseif(($parent->term_id!="") && (sizeof($children)==0)) { ?>

				<div class="middle-tier-categories">

					<?php

					    $args = array(
					        'post_type' => 'product',
					        'product_cat' => $term->slug,
					        'orderby' => 'menu_order',
					        'order' => 'ASC'
					    );
					    $query = new WP_Query($args);

					    if($query->have_posts()) : ?>

					    <?php while($query->have_posts()) : ?>

					        <?php $query->the_post(); ?>

					        <div class="portal" id="post-<?php the_ID(); ?>">
					            <a href="<?php the_permalink(); ?>">
					                <?php
					                    // Outputting an image using Image ID as the Return Value
					                    echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' );
					                ?>

					                <h4>
					                    <?php the_title(); ?>
					                </h4>
					                <?php if (is_term('brake-parts')) : ?>
					                <?php else: ?>
					                    <h6><?php echo $term->name; ?></h6>
					                <?php endif; ?>
					            </a>
					        </div>

					    <?php endwhile; ?>

					<?php endif; ?>

				</div>

	<?php } elseif(($parent->term_id="173")) { ?>

		<div class="components-portals portal-container">

			<h2><a href="/product-category/limited-edition/">Limited Edition</a></h2>
			<?php
			$args = array( 
				'post_type' => 'product',
				'post_status' => 'publish',
				'product_cat' => 'limited-edition',
				'orderby' => 'ASC' );
			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

				<div class="portal" id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>">
						<?php
							// Outputting an image using Image ID as the Return Value
							echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' );
						?>

						<h4>
							<?php the_title(); ?>
						</h4>
						<?php if (is_term('brake-parts')) : ?>
						<?php else: ?>
							<h6><?php echo $term->name; ?></h6>
						<?php endif; ?>
					</a>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

		</div>

		<?php } ?>

</section>

<?php get_footer( 'shop' ); ?>
