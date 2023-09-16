<?php wp_head(); ?>
<header class="header">
	<div class="logo">
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
			<?php
			$custom_logo_id = get_theme_mod('custom_logo');
			$image = wp_get_attachment_image_src($custom_logo_id , 'full');
			?>
			<img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
		</a>
	</div>
	<div>
		<?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
	</div>
</header>