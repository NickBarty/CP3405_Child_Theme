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
function change_role_name() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    //You can list all currently available roles like this...
    //$roles = $wp_roles->get_names();
    //print_r($roles);

    //You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
    $wp_roles->roles['administrator']['name'] = 'Admin';
    $wp_roles->role_names['administrator'] = 'Admin';
    $wp_roles->roles['subscriber']['name'] = 'Student';
    $wp_roles->role_names['subscriber'] = 'Student';
    $wp_roles->roles['contributor']['name'] = 'Lecturer';
    $wp_roles->role_names['contributor'] = 'Lecturer';
    $wp_roles->roles['author']['name'] = 'Company';
    $wp_roles->role_names['author'] = 'Company';
}
add_action('init', 'change_role_name');
add_action('admin_bar_menu', 'add_toolbar_items', 100);
