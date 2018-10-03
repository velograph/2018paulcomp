<section class="portal-containers">

	<div class="component-portals portal-container">

		<h2><a href="/product-category/components/">Components</a></h2>
		<?php
			$prod_categories = get_terms( 'product_cat', array(
				'orderby' => 'name',
				'order' => 'ASC',
				'parent' => 7,
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

	<div class="shop-border"></div>

	<div class="service-parts-portals portal-container">

		<h2><a href="/product-category/service-parts/">Spare Parts</a></h2>
		<?php
			$prod_categories = get_terms( 'product_cat', array(
				'orderby' => 'name',
				'order' => 'ASC',
				'parent' => 11,
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

	<div class="shop-border"></div>

	<div class="accessories-apparel-portals portal-container">

		<h2><a href="/product-category/accessories-apparel/">Accessories & Apparel</a></h2>

		<?php
			$prod_categories = get_terms( 'product_cat', array(
				'orderby' => 'name',
				'order' => 'ASC',
				'parent' => 9,
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

</section>
