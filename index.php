<?php
/**
 * The main template file.
 *
 * @package pgb
 */

get_header(); ?>

	<div id="content" class="main-content-inner col-sm-12 col-md-8 col-lg-9">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php tha_entry_before(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>

					<?php tha_entry_top(); ?>

					<?php get_template_part( 'posts', 'header' ); ?>

					<div class="col-md-12">

						<div class="row">

							<?php get_template_part( 'content', get_post_format() ); ?>

						</div>

					</div>

					<?php get_template_part( 'posts', 'footer' ); ?>

					<?php tha_entry_bottom(); ?>

				</article><!-- #post-## -->

				<?php tha_entry_after(); ?>

			<?php endwhile; ?>

			<?php pgb_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>