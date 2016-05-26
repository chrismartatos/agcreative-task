<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri (); ?>/admin/admin.css">

<section class="admin-doc cf">
<h1>Documentation</h1>

<nav class="admin-doc-nav cf">
	<ul>
		<li><a href="#general">General</a></li>
		<li><span class="divider">|</span></li>
		<li><a href="#menus">Menus</a></li>
		<li><span class="divider">|</span></li>
		<li><a href="#plugins">Plugins</a></li>
		<li><span class="divider">|</span></li>
		<li><a href="#layout">Projects Shortcode</a></li>
		<li><span class="divider">|</span></li>
		<li><a href="#cpt">Custom Fields</a></li>
	</ul>
</nav>

<section class="admin-doc-section" id="general">
<h2>General</h2>

<div class="wrap cf">
	<h3>Page Templates</h3>
	<p>There is only one template for this Theme. You should be using the "Template - Home" for Home Page. Go to Settings -> Reading and set up your static page.</p>
</div>
</section>

<section class="admin-doc-section" id="general">
<h2>Menu</h2>

<div class="wrap cf">
	<h3>Create Header and Footer Menu</h3>
	<p>The theme is coming with two register menus: Footer Nav & Header Nav. See functions.php for more. Go to Appearance -> Menus and create your own.</p>
</div>
</section>

<section class="admin-doc-section" id="plugins">
<h2>Plugins</h2>
<div class="wrap cf">
<p>I'm not using any plugin for this Theme. Neither custom fields or custom post types.</p>
</div>

</section>


<section class="admin-doc-section" id="layout">
<h2>Layout Shortcodes</h2>

<div class="wrap cf">
<p>Make sure you add first a few articles and apply taxonomies. Then go to page-home.php and edit shortcode.</p>
<div class="code">
<pre>
[projects limit="" location="" category=""]
</pre>
</div>

</div>
</section>

<section class="admin-doc-section" id="cpt">
<h2>Custom Fields</h2>
<div class="wrap cf">
<h3>Awards</h3>
<p>Make sure to add custom field "Awards" with capital "A" in order to see it in the front-end. I haven't use any plugin.</p>
<p><img src="<?php echo get_template_directory_uri (); ?>/admin/images/screenshot-1.jpg" alt="image"></p>
</div>

</section>

</section>