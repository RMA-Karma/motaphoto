<div class="entry-content">
 	<?php the_content() ; ?>
    <div class="overlay">
        <p class="titre-overlay"><?php the_title( '' ); ?></p>
        <p class="cat-overlay"><?php the_terms( $post->ID, 'categorie', '' ); ?></p>
      	<a href="<?php echo the_permalink(); ?>" class="oeil" ><img src="<?php echo home_url('wp-content/themes/motaphoto/asset/Icon_eye.png'); ?>" alt=""></a>
      	<span class="link-lightbox"><img src="<?php echo home_url('/wp-content/themes/motaphoto/asset/Icon_fullscreen.png'); ?>" alt=""></span>
      	<span class="link-lightbox2"><img src="<?php echo home_url('/wp-content/themes/motaphoto/asset/Icon_fullscreen.png'); ?>" alt=""></span>
    </div>
</div>