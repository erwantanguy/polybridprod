<footer class="container">
    <?php wp_nav_menu(array(
                'theme_location' => 'footer',
                'walker' => new b4st_walker_nav_menu(),
                'menu_class' => ''
        ) );
        ?>
</footer>
<?php wp_footer(); ?>        
</body>
</html>