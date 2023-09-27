<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
if ( !function_exists('get_field')) return;

get_header(); ?>

<section class="page-photo">
	<div class="info-photo">
		<div class="zone-texte">
			<h2 class="entry-title"><?php the_title( '' ); ?></h2>
			<p> RÉFÉRENCE : <span class="ref-photo"><?php the_field('reference'); ?></span></p>
			<p> CATÉGORIE : <?php the_terms( $post->ID, 'categorie', '' ); ?></p>
			<p> FORMAT : <?php the_terms( $post->ID, 'format', '' ); ?></p>
			<p> TYPE : <?php the_field('type'); ?></p>
			<p> ANNÉE : <?php $post_date = get_the_date( 'Y' ); echo $post_date; ?></p>
		</div>
		<div class="single-photo">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="contact-nav">
		<div class="single-contact">
			<p>Cette photo vous intéresse ?</p>
			<input class="wpcf7-submit bouton-contact-ref" type="submit" value="Contact">
		</div>
		<div class="nav-photo">
			<div class="photo-prev-next">
				<div class="photo-previous">
					<?php 
						$prevPost = get_previous_post();
						$prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
						previous_post_link( '%link', $prevThumbnail ); ?>
				</div>
				<div class="photo-next">
					<?php 
						$nextPost = get_next_post();
						if ( is_a( $nextPost , 'WP_Post' ) ) : 
							$nextThumbnail = get_the_post_thumbnail( $nextPost->ID );
							next_post_link( '%link', $nextThumbnail ); 
						endif; ?>
				</div>
			</div>
			<div class="fleche-nav">
				<div class="nav-previous">
					<?php previous_post_link( '%link', '<img src="http://localhost:8888/motaphoto/wp-content/themes/motaphoto/asset/fleche_pre.png">' ); ?>
				</div>
				<div class="nav-next">
					<?php next_post_link('%link', '<img src="http://localhost:8888/motaphoto/wp-content/themes/motaphoto/asset/fleche_suiv.png">' ); ?> 
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="other">
			<p>VOUS AIMEREZ AUSSI</p>
		</div>
		<div>
		<div class="grille-photo">
 			<?php $terms = wp_get_post_terms( $post->ID, 'categorie');
			$currentID = get_the_ID();
			$loop = new WP_Query( array( 
				'post_type' => 'photo', 
				'tax_query' => array(
					array(
						'taxonomy' => 'categorie',
						'field'    => 'slug',                 
						'terms'    => array($terms[0]->slug),
				   ),),
				'post__not_in' => array(
					$currentID),
				'orderby' => 'rand',
				'posts_per_page' => 2)); ?>

			 <?php
			 while ( $loop->have_posts() ) : $loop->the_post();?>

 			<div class="entry-content">
 				<?php the_content() ; ?>
     			<div class="overlay">
      				<a href="<?php echo the_permalink(); ?>" class="oeil" ><img src="<?php echo home_url('wp-content/themes/motaphoto/asset/Icon_eye.png'); ?>" alt=""></a>
      				<a href="single-page-photo.php" class="link-lightbox"><img src="<?php echo home_url('/wp-content/themes/motaphoto/asset/Icon_fullscreen.png'); ?>" alt=""></a>
        		</div>
 			</div>
 			<?php endwhile ; ?>
		</div>
	<div class="bouton-all">
		<a href="<?php echo home_url(); ?>">
			<input class="all-photo" type="submit" value="Toutes les photos"> 
		</a>
	</div>


<?php get_footer(); ?>
