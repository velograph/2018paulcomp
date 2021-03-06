<?php
/**
 * The template for displaying search results pages.
 *
 * @package Paul Component 2018 Update
 */

get_header(); ?>

	<section id="primary" class="content-area search-area">
			<section class="components-portals portal-containers">


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Paul Component 2018 Update' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div class="portal-container">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
					?>

				<?php endwhile; ?>

				<?php //basis_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			</div>
			
			<?php endif; ?>

			</section>
	</section><!-- #primary -->

<?php get_footer(); ?>
