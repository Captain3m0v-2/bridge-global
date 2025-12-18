</main> <!-- Close main from header.php -->

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Bridge Global</h5>
                <p>Connecting businesses worldwide through supply chain, sourcing, and travel services.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'list-unstyled',
                ));
                ?>
                <p class="mt-3">&copy; <?php echo date('Y'); ?> Bridge Global. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>