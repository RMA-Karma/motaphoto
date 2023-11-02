<?php

function register_my_menu() {
    register_nav_menu( 'main-menu', 'Menu principal' );
	register_nav_menu( 'menu-footer', 'Menu footer');
}
add_action( 'after_setup_theme', 'register_my_menu' );


function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'motaphoto-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function theme_scripts() {
    wp_enqueue_script('script-jquery2', get_template_directory_uri() .'/js/lightbox.js', array('jquery'), null, true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js',);
    wp_enqueue_script('script-jquery', get_template_directory_uri() .'/js/filter-load.js', array('jquery'), null, true);
    wp_localize_script('script-jquery','frontendajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'imagebanner' => home_url('wp-content/themes/motaphoto/asset/Contact_header.png')
    ));
  
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function add_defer_attribute($tag, $handle) {
    if ( 'script' !== $handle )
      return $tag;
    return str_replace( ' src', ' defer="defer" src', $tag );
  }
  
  add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

  function wpc_theme_support() {
	add_theme_support('custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	));
}
add_action('after_setup_theme','wpc_theme_support');



function load_more_pictures() {

  $recent = new WP_Query( array( 
    'post_type' => 'photo', 
    'orderby' => array(
      'date' => 'ASC',
    ),
    'posts_per_page' => 12,
    'paged' => 1,));

  $ajaxposts = new WP_Query([
    'post_type' => 'photo',
    'orderby' => 'date',
    'order' => 'ASC',
    'paged' => $_POST['paged'],
    'post__not_in' => array(80,81),
  ]);

  $response = '';

  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part('template_part/photo_block');
    endwhile;
  } else {
    $response = '';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_load_more_pictures', 'load_more_pictures');
add_action('wp_ajax_nopriv_load_more_pictures', 'load_more_pictures');


function filter_photos() {
  $taxonomy = 'categorie';
  $selectedCategory = $_POST['taxonomy'];
  $args = array(
      'post_type' => 'photo',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'ASC',
      'tax_query' => array(
          array(
              'taxonomy' => $taxonomy,
              'field'    => 'slug',
              'terms'    => $selectedCategory,
          ),
      ),
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template_part/photo_block');
      }
      wp_reset_postdata();
  } else {
      echo 'Aucune photo trouvée.';
  }

  die();
}

add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');

function filter_photos_format() {
  $taxonomy = 'format';
  $selectedFormat = $_POST['taxonomy2'];
  $args = array(
      'post_type' => 'photo',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'ASC',
      'tax_query' => array(
          array(
              'taxonomy' => $taxonomy,
              'field'    => 'slug',
              'terms'    => $selectedFormat,
          ),
      ),
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template_part/photo_block');
      }
      wp_reset_postdata();
  } else {
      echo 'Aucune photo trouvée.';
  }

  die();
}

add_action('wp_ajax_filter_photos_format', 'filter_photos_format');
add_action('wp_ajax_nopriv_filter_photos_format', 'filter_photos_format');

function filter_photos_date_ASC() {
  $args = array(
      'post_type' => 'photo',
      'orderby' => 'date',
      'order' => 'ASC',
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template_part/photo_block');
      }
      wp_reset_postdata();
  } else {
      echo 'Aucune photo trouvée.';
  }

  die();
}

add_action('wp_ajax_filter_photos_date_ASC', 'filter_photos_date_ASC');
add_action('wp_ajax_nopriv_filter_photos_date_ASC', 'filter_photos_date_ASC');


function filter_photos_date_DESC() {
  $args = array(
      'post_type' => 'photo',
      'orderby' => 'date',
      'order' => 'DESC',
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template_part/photo_block');
      }
      wp_reset_postdata();
  } else {
      echo 'Aucune photo trouvée.';
  }

  die();
}

add_action('wp_ajax_filter_photos_date_DESC', 'filter_photos_date_DESC');
add_action('wp_ajax_nopriv_filter_photos_date_DESC', 'filter_photos_date_DESC');
