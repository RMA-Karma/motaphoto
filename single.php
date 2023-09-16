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
			<?php the_title( '<h2 class="entry-title"></h2>' ); ?>
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
						previous_post_link( '%link', $nextThumbnail ); 
					endif; ?>
			</div>
			<div class="fleche-nav">
				<div class="nav-previous">
					<?php previous_post_link( '%link', '<img src="http://localhost:8888/motaphoto/wp-content/themes/motaphoto/asset/fleche_pre.png">' ); ?>
				</div>
				<div class="next-previous">
					<?php next_post_link('%link', '<img src="http://localhost:8888/motaphoto/wp-content/themes/motaphoto/asset/fleche_suiv.png">' ); ?> 
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>
