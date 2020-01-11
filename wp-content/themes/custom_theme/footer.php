
<footer class="site-footer">

    <div class="footer-widget">

        <?php dynamic_sidebar('Footer'); ?>
    </div>
    <?php $args = array(
        'theme_location' => 'footer'
    ) ?>
    <?php wp_nav_menu($args); ?>
    <p><?php bloginfo('name');?> - &copy <?php echo date('Y')?></p>
</footer>

<?php wp_footer() ?>
</body>
</html>