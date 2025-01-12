<?php get_header(); ?>

	<div class="container my-8 mx-auto">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<span class="sm:grid-cols-1 sm:grid-cols-2 sm:grid-cols-3 -top-12"></span>
			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php
get_footer();
