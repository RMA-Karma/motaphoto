
<div class="grille-photo2">
 <?php $loop = new WP_Query( array( 'post_type' => 'photo', 'posts_per_page' => 12, 'paged' => $paged) ); ?>

 <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

 <div class="entry-content">
    <?php the_content() ; ?>
        <div class="overlay">
        <?php the_terms( $post->ID, 'categorie', '' ); ?>
        <?php the_field('reference'); ?>
        <img class="oeil" src="wp-content/themes/motaphoto/asset/Icon_eye.png" alt="">
        <a href="single-page-photo.php"><img src="wp-content/themes/motaphoto/asset/Icon_fullscreen.png" alt=""></a>
        
        </div>
 </div>

 <?php endwhile ; ?>
</div>
