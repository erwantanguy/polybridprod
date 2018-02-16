<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/************ JS et CSS ***************/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 200 );
function theme_enqueue_styles() {
if( !is_admin() ) :
    //wp_deregister_script('popper.min.js','https://cdnjs.cloudflare.com/ajax/libs/');
    //wp_deregister_script('jquery');
    wp_register_script('functions', get_stylesheet_directory_uri().'/bundle.js','',false,true);
    wp_enqueue_script( 'functions' );
    wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/css/style.css', array(), time());
endif;
}
//add_action( 'wp_footer', 'wpse_262301_wp_footer', 11 );
//function wpse_262301_wp_footer() { 
//  wp_dequeue_script( 'popper' );
//}