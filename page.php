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

get_header(); ?>
<section class="hero">
	<?php $loop = new WP_Query( array( 	
			'post_type' => 'photo',
			'tax_query' => array(
				array(
					'taxonomy' => 'format',
					'field'    => 'slug',                 
					'terms'    => 'Paysage',
					   ),),
			'orderby' => 'rand',
			'posts_per_page' => 1)); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php the_content() ; ?>
			<?php endwhile ; ?>
	<h1>PHOTOGRAPHE EVENT</h1>
</section>

<section class="grille-photo">
		<?php $loop = new WP_Query( array( 
			'post_type' => 'photo', 
			'orderby' => array(
				'date' => 'ASC',
			),
			'posts_per_page' => 12)); ?>
	 	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
 		<?php get_template_part('template_part/photo_block');?>
 		<?php endwhile ; ?>
</section>


<?php get_footer(); ?>
