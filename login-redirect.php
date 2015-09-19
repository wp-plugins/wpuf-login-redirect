<?php

/*
Plugin Name: WPUF login redirect
Plugin URI: https://wordpress.org/plugins/wpuf-login-redirect
Description: Login redirect for Wp user frontend
Version: 0.2
Author: Nayem
Author URI: https://twitter.com/nayemDevs
License: GPL2
TextDomain : wpuf
*/


// Adding filter from WP User Fronted plugin

add_filter('wpuf_login_redirect' , 'wlr_login_redirect');

function wlr_login_redirect($redirect){
        $redirect = get_permalink(wpuf_get_option( 'page_url', 'wpuf_general' ) );
        return $redirect;
}


// Adding extra option in General settings of WPUF

add_filter( 'wpuf_options_others', 'wlr_menu_option');

function wlr_menu_option( $settings_fields ){
     $pages = wpuf_get_pages();
     $settings_fields[] =  array(
        'name'    => 'page_url',
        'label'   => __( 'Select redirect page ', 'wpuf' ),
        'desc'    => __( 'Select the page to redirect user after login', 'wpuf' ),
        'type'    => 'select',
        'options' => $pages
    );
        return $settings_fields; 
}


?>
