<?php wp_head(); ?>
<?php wp_body_open(); ?>
<header class="header">
	<div class="logo">
		<img src="wp-content/themes/motaphoto/asset/logo.png" alt="logo du site">
	</div>
	<div>
		<?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
	</div>
</header>