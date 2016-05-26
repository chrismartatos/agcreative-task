<?php if( have_posts() ): the_post(); ?>

<div class="container">
	<article class="entry-content">
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>		
	</article>
</div>

<?php else: ?>
<p>Sorry, this page not longer exists.</p>
<?php endif; ?>