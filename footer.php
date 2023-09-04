<footer>
    <?php wp_nav_menu(['theme_location' => 'menu-footer']); ?>
    <div class="modal">
        <?php include 'template_part/contact.php'; ?>
    </div>
</footer>
<?php wp_footer(); ?>