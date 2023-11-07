<?php


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
<div class="filtre">
	<div class="filtre-cat-form">
		<select class="selectpicker" id="selectcat">
			<option class="active">CATEGORIES</option>
			<?php $categories = get_terms('categorie', ''); ?>
  			<?php foreach ($categories as $category) { ?>
      			<option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option><?php } ?>
		</select>
		<select class="selectpicker" id="selectformat">
			<option class="active">FORMATS</option>
			<?php $formats = get_terms('format', '' ); ?>
			<?php foreach ($formats as $form){ ?>
				<option value="<?php echo $form->name; ?>"><?php echo $form->name; ?></option><?php } ?>
		</select>
	</div>
	<div class="filtre-date">
		<select id="selectdate">
			<option class="active">TRIER PAR</option>
      		<option value="recentes">Des plus récentes aux plus anciennes</option>
      		<option value="anciennes">Des plus anciennes aux plus récentes</option>
		</select>
	</div>
</div>
<section class="grille-photo">
		<?php $loop = new WP_Query( array( 
			'post_type' => 'photo', 
			'orderby' => array(
				'date' => 'ASC',
			),
			'posts_per_page' => 12,
			'paged' => 1,)); ?>
	 	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
 		<?php get_template_part('template_part/photo_block');?>
 		<?php endwhile ; ?> 

</section>
<div class="bouton-charger-plus">
				<a href="#!">
				<input class="all-photo" id="load-more" type="submit" value="Charger plus"></a>
</div>


<?php get_footer(); ?>
