<?php 

function sujittheme_script_enqueue() {

  wp_enqueue_style('customstyle' , get_template_directory_uri() . '/css/sujittheme.css' , [] , '1.0' , 'all');

  wp_enqueue_script('customjs' , 'js/sujittheme.js' , [] , '1.0' , true);

}

add_action('wp_enqueue_scripts' , 'sujittheme_script_enqueue' );

function sujittheme_theme_setup(){
  add_theme_support('menus');
  

  register_nav_menu('primary' , 'Primary header Navigation');
  register_nav_menu('secondary' , 'footer Navigation');

}

add_action('init' , 'sujittheme_theme_setup');
/**
 * =================================================================
 *  Theme support area
 * =================================================================
 */


add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-formats' , ['aside' , 'image' , 'video']);

/**
 * =================================================================
 * Sidebar function
 * ================================================================= 
 */

 function sujittheme_widget_setup(){

  register_sidebar( [
    'name' => 'Sidebar' ,
    'id' => 'sidebar-1',
    'class' => 'custom',
    'description' => 'Standard sideabr',
    'beofre_widget' => '<aside id="%1$s class="widget %2$s',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>'
    ] );

 }

 add_action('widgets_init' , 'sujittheme_widget_setup');