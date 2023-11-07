<footer>
    <?php wp_nav_menu(['theme_location' => 'menu-footer']); ?>
    <div class="modal">
        <?php include 'template_part/contact.php'; ?>
    </div>
    <div class="custom-lightbox" style="display:none;">
        <span class="close-lightbox">&times;</span>
        <span class="bouton-prev"><img src="<?php echo home_url('/wp-content/themes/motaphoto/asset/arrow-left.png'); ?>">Précédent</span>
        <div class="image-info-lightbox"></div>
        <span class="bouton-next">Suivant<img src="<?php echo home_url('/wp-content/themes/motaphoto/asset/arrow-right.png'); ?>"></span>
</footer>
<?php wp_footer(); ?>
