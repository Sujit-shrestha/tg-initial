<?php

/**
 * Plugin Name: Metadata and metabox
 * Description: Adds a Movie Menu in the admin dashboard
 * Version: 2024.5.20
 * Author: Sujit Shrestha
 * Author URI: https://linkedin.com/in/mrsujiit
 * License: GPLv2 or Later
 */

 defined('ABSPATH') or die( 'Unauthorized to access this file!!' );

 
 class MetadataMetabox{

  public function __construct(){

   


  }


  /**
   * Activation
   */
  public function activate (){

    //flush rewrite rules
    flush_rewrite_rules();

  }

  /**
   * Deactivation
   */
  public function deactivate (){

    //flush rewrite rules
    flush_rewrite_rules();


  }



 }

 //class object instantiation
 if(class_exists( 'MetadataMetabox' )){
  //initialize
    $meta = new MetadataMetabox();
 }

 /**
  * Activation registration of plugin
  */
register_activation_hook(
  __FILE__,
  array( $meta , 'activate' )
);

/**
 * Deactivation registration of plugin
 */

 register_deactivation_hook(
  __FILE__,
  array( $meta , 'deactivate' )
 );