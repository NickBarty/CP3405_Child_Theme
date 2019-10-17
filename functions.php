<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 10/17/2019
 * Time: 1:10 PM
 */


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}