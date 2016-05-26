<footer id="footer">
	<div class="container">
		<div class="row inner-top">
			<div class="one-third column"><a href="<?php bloginfo('wpurl'); ?>" title="<?php bloginfo('name'); ?>" class="ag-logo"></a></div>
			<!-- The following content should come from a custom field(ACF pro) - for example Theme Settings => Footer | But I don't want to use a plugin for this task. ;) -->
			<div class="one-third column"><p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum </p></div>
			<div class="one-third column"><p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum </p></div>
		</div>
		<div class="row inner-bottom">
			<div class="wrap-menu">
				<nav id="footer-nav" class="site-nav">
					<?php 
						wp_nav_menu( array(
							'menu' => 'Footer Menu',
							'container'=> ''
						));
					?>
				</nav>
			</div>
			<div class="wrap-address"><address>tel +1 604 559 1411    2129 - 4710 Kingsway, Burnaby, BC, V5H 4M2</address></div>
		</div>
	</div>
</footer>

</div><!--END #page-->
<?php wp_footer(); ?>

<noscript><div class="no-js-msg">You have to enable javascript in your browser settings if you want to view this site</div></noscript>
</body>
</html>