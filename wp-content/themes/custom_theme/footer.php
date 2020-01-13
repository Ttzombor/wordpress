
<footer class="site-footer">
    <?php if( get_theme_mod('custom_footer_to_display_callout') == 'Yes'){ ?>
    <div class="additional-footer-section">
            <div class="additional-footer-section-image">
               <a href="<?php echo get_permalink((get_theme_mod('custom_footer_link_callout'))); ?>"><img src ="<?php echo wp_get_attachment_url(get_theme_mod('custom_footer_image_callout')); ?>"></a>
            </div>
        <div class="additional-footer-section-text">
            <h2>
                <?php echo get_theme_mod('custom_footer_header_callout'); ?>
            </h2>

            <?php echo wpautop(get_theme_mod('custom_footer_text_callout')); ?>
            <a href="<?php echo get_permalink(get_theme_mod('custom_footer_link_callout')) ?>"><p>Show more &raquo</p></a>
        </div>

    </div>
    <?php } ?>

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