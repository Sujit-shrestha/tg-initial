<?php 

/**
 * @package TestifyPlugin
 */
/**
 * Plugin Name: Testify Plugin
 * PLugin URI: http://fb.com/MrSujiit
 * Description: This is a test plugin
 * Version: 10.0.1
 * Author: MrSujit
 * Author URI: http://fb.com
 * Licesnse: GPLv2 or later
 * Text Domain: testify-plyugin
 */

//  if( ! defined( 'ABSPATH' )) {
//   die;

//  }

 defined ( 'ABSPATH' ) or die ( 'Can\'t access this  file you silly!!' );

 class TestifyPlugin 
 {
  
  function __construct(){
    
    add_action( 'init' , [ $this , 'custom_post_type']);
    
  }

  function register(){
    add_action('admin_enqueue_scripts' , [$this , 'enqueue']);
  }

    function activate(){
      //generate a CPT
      $this->custom_post_type();

      //flush rewrite rules
      flush_rewrite_rules();

    }

    function deactivate(){
      //flush rewrite rulkes
      flush_rewrite_rules();
    }

    function uninstall(){

    }

    function enqueue() {
      //enqueue all our scripts
      wp_enqueue_style( 'mypluginstyle' , plugins_url( '/assets/mystyle.css' , __FILE__ ) );
      wp_enqueue_script( 'mypluginscript' , plugins_url( '/assets/myscript.js' , __FILE__ ) );

    }

    function custom_post_type() {
      register_post_type( 'book' , ['public' => true , 'label' => 'Books'] );
    }
 }
 if ( class_exists( 'TestifyPlugin' ) )
 {
  $testifyPlugin = new TestifyPlugin();
  $testifyPlugin->register();
 }
 
 //activation 
register_activation_hook(__FILE__, [$testifyPlugin , 'activate' ]);

//deactivation
register_deactivation_hook(__FILE__, [$testifyPlugin , 'deactivate' ]);

//uninstall
register_uninstall_hook(__FILE__ , [$testifyPlugin , 'uninstaall']);
