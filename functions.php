<?php
/*
* My Theme Function
*/

// Theme Title
add_theme_support('title-tag');

//Theme CSS and JQuery File calling
function super_css_js_file_calling()
{
    wp_enqueue_style('super-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.2.3', 'all');
    wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');

    //jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.2.3', 'true');
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true');
}
add_action('wp_enqueue_scripts', 'super_css_js_file_calling');


// Theme Function
function super_customizer_register($wp_customize)
{
    $wp_customize->add_section('super_header_area', array(
        'title' => __('Header Area', 'atikworkspace'),
        'description' => 'If you interested to update your header area, you can do it here.',
    ));

    $wp_customize->add_setting('super_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'super_logo', array(
        'label' => 'Logo Upload',
        'setting' => 'super-logo',
        'section' => 'super_header_area',
    ) ));
}
add_action('customize_register', 'super_customizer_register');