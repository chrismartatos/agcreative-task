<?php get_header(); ?>

<div id="content" class="page-<?php print $post->post_name; ?>">
	<?php if( have_posts() ): the_post(); ?>
				
	<article class="entry-content">
		<?php the_content(); ?>		
	</article>
	
	<?php else: ?>
		<p>Sorry, this page not longer exists.</p>
	<?php endif; ?>
	
</div><!--END #content -->

<?php get_footer(); ?>
