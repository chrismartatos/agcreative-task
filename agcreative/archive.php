<?php get_header(); ?>
<?php $cat = get_the_category(); ?>

	<div class="content" id="<?php print $cat[0]->slug; ?>">
		<?php if( have_posts() ): while( have_posts() ): the_post(); ?>			
			<div class="entry">
				<?php the_post_thumbnail(); ?>
				<div class="info">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; else: ?>
			<p>Sorry, there are no posts to display.</p>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
