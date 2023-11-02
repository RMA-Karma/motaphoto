<footer>
    <?php wp_nav_menu(['theme_location' => 'menu-footer']); ?>
    <div class="modal">
        <?php include 'template_part/contact.php'; ?>
    </div>
    <div class="custom-lightbox" style="display:none;">
        <span class="close-lightbox">&times;</span>
        <span class="bouton-prev"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="12" viewBox="0 0 27 16" fill="none">
  <path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292893 7.29289ZM26 9C26.5523 9 27 8.55228 27 8C27 7.44772 26.5523 7 26 7V9ZM1 9H26V7H1V9Z" fill="white"/>
</svg>Précédent</span>
        <div class="image-info-lightbox"></div>
        <span class="bouton-next">Suivant&rarr;</span>
</footer>
<?php wp_footer(); ?>
