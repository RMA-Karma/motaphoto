<?php wp_head(); ?>
<header class="header">
	<div class="logo">
		<img src="wp-content/themes/motaphoto/asset/logo.png" alt="logo du site">
	</div>
	<div>
		<?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
	</div>
</header>