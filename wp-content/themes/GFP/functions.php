<?php

function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


/*
==============================
ADD GLOBAL CSS TO PAGE
==============================
*/
function enqueue_global_css() {
    wp_enqueue_style('style', get_stylesheet_directory_URI() . '/dist/css/style.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_global_css');


/*
==============================
ADD GLOBAL JS TO PAGE
==============================
*/
function enqueue_global_js() {
    wp_enqueue_script('gfp-scripts', get_stylesheet_directory_URI() . '/dist/js/gfp-scripts.js', array(), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'enqueue_global_js');


/*
==========================================
HIDE ADMIN BAR
==========================================
*/
add_filter('show_admin_bar', '__return_false');


/*
==========================================
REMOVE WP EMOJICONS
==========================================
*/
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


/*
==========================================
CREATING ADMIN NAV MENUS
==========================================
*/
register_nav_menus( array(
  'eyebrow_quick_links' => __( 'Eyebrow Quick Links' ),  
  'shop-by-part' => __( 'Shop By Part' ),
  'shop-by-equipment' => __( 'Shop By Equipment' ),
) );