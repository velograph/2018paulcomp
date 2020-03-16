<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Paul Component 2018 Update
 */
?>


	<div class="portal" id="post-<?php the_ID(); ?>" style="width: 33%; float: left;">
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
