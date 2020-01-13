<?php

function import_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'import_resources');



function get_top_ancestor_id(){

    global $post;

    if($post->post_parent){
        $ancestors = get_post_ancestors($post->ID);
        return $ancestors[0];
    }

    return $post->ID;
}

function index_setup(){
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
    ));

    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnails', 300, 260);
    add_image_size('banner-thumbnails', 1000, 260);

    add_theme_support('post-formats', array('aside', 'video', 'chat', 'link', 'gallery'));
}

function get_the_custom_excerpt(){
    return 25;
}

function Widget_Init(){
    register_sidebar( array(
        'name' => __('Sidebar'),
        'id' => 'Sidebar 1',
        'before_widget' => '<div class = "widget-item">',
        'after_widget' => '</div>'
    ));
    register_sidebar( array(
        'name' => 'Footer',
        'id' => 'Footer 1',
        'before_widget' => '<div class = "widget-item">',
        'after_widget' => '</div>'
    ));
}

add_action('widgets_init', 'Widget_Init');

//add_filter('excerpt_length', get_the_custom_excerpt());
add_action('after_setup_theme', 'index_setup');

function custom_theme_customize_register($wp_customize){

    $wp_customize->add_setting('custom_link_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh'
    ));

    $wp_customize->add_section('custom_standard_color', array(
        'title' => __('Standard Colors' ),
		'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'custom_link_color', array(
        'label' => __('Link Color'),
        'section' => 'custom_standard_color',
        'settings' => 'custom_link_color'
    )));
}

add_action('customize_register', 'custom_theme_customize_register');

function custom_theme_customize_css(){
    ?>
        <style type="text/css">
            .site-nav ul li a:link,
            a:link,
            a:visited {
                color: <?php echo get_theme_mod('custom_link_color')?>;
            }
        </style>
<?php
}

add_action('wp_head', 'custom_theme_customize_css');

function custom_footer_theme_register($wp_customize){
    $wp_customize->add_section('custom_footer_section', array(
            'title' => __('Custom Footer')
    ));

    $wp_customize->add_setting('custom_footer_to_display_callout', array(
        'default' => 'No'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_footer_to_display_control', array(
        'label' => 'Show on Page',
        'section' => 'custom_footer_section',
        'settings' => 'custom_footer_to_display_callout',
        'type' => 'select',
        'choices' => array('No' => 'No', 'Yes' => 'Yes')
    )));

    $wp_customize->add_setting('custom_footer_header_callout', array(
            'default' => 'Custom Header'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_footer_header_control', array(
            'label' => 'Headline',
            'section' => 'custom_footer_section',
            'settings' => 'custom_footer_header_callout'
    )));

    $wp_customize->add_setting('custom_footer_text_callout', array(
        'default' => 'Custom Text bla bla bla...'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_footer_text_control', array(
        'label' => 'Text',
        'section' => 'custom_footer_section',
        'settings' => 'custom_footer_text_callout',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('custom_footer_link_callout');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_footer_link_control', array(
        'label' => 'Link to page',
        'section' => 'custom_footer_section',
        'settings' => 'custom_footer_link_callout',
        'type' => 'dropdown-pages'
    )));

    $wp_customize->add_setting('custom_footer_image_callout');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'custom_footer_image_control', array(
        'label' => 'Crop Image',
        'section' => 'custom_footer_section',
        'settings' => 'custom_footer_image_callout',
        'width' => 750,
        'height' => 500
    )));
}

add_action('customize_register', 'custom_footer_theme_register');