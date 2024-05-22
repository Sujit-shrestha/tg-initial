<?php 

/**
 * Plugin Name: Role registration using AJAX
 * Description: Adds user defined role using AJAX
 * Version: 2024.5.21
 * Author: Sujit Shrestha
 * Author URI: https://linkedin.com/in/mrsujiit
 * License: GPLv2 or Later
 */
defined('ABSPATH') or die( 'Unauthorized to access this file!!' );

include dirname(__FILE__) . '/autoloader.php';

class Role_using_ajax {
  public function __construct(){

   $roleManager =  new Plugins\Role_using_ajax\Manage_user_role_usingAJAx();
    new Plugins\Role_using_ajax\Role_registration_template_shortcode( $roleManager );
    
    error_log(print_r(plugins_url( 'role_using_ajax/js/store.js', 'role_using_ajax' ), true));
    wp_enqueue_script('customjs' , plugins_url( 'role_using_ajax/js/store.js', 'role_using_ajax' ) , ['jquery'] , '1.0.0');
    wp_localize_script('customjs','my_ajax_obj',array(
      'ajax_url' => admin_url('admin-ajax.php'),
      // 'role_using_ajax_nonce' => wp_create_nonce()
    ));


  }
  /**
   * Activation jobs
   */
  
  public function activate (){

    //flush rewrite rules
    flush_rewrite_rules();

  }

  /**
   * Deactivation jobs
   */
  public function deactivate (){

    //flush rewrite rules
    flush_rewrite_rules();


  }


}

if( class_exists( 'Role_using_ajax' ) ) {

  //instantiation
  $role_using_ajax = new Role_using_ajax();
}

register_activation_hook(
  __FILE__,
  array( $role_using_ajax , 'activate' )
);

/**
 * Deactivation registration of plugin
 */

 register_deactivation_hook(
  __FILE__,
  array( $role_using_ajax , 'deactivate' )
 );