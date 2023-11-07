<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
	<?php wp_head(); ?>
</head>
<header class="header">
	<div class="logo">
		<div class="logo-titre">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="logo-titre-lien">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$image = wp_get_attachment_image_src($custom_logo_id , 'full');
				?>
				<img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
			</a>
		</div>
		<div class="logo-menu">
			<span id="open-menu-logo"><img class="toggle-nav" src="<?php echo home_url('wp-content/themes/motaphoto/asset/open-menu.png'); ?>"></span>
			<span id="close-menu-logo"><img class="close-nav" src="<?php echo home_url('wp-content/themes/motaphoto/asset/close-menu.png'); ?>"></span>
		</div>
	</div>
	<nav class="main-menu">
		<?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
	</nav>
</header>