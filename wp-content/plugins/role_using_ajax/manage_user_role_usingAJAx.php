<?php

namespace Plugins\Role_using_ajax;

defined('ABSPATH') || exit;
/**
 * Addes Template for the ajax request  , handles the form input , adds role using the data from form
 */
class Manage_user_role_usingAJAx
{
  /**
   * Constructor
   */
  public function __construct()
  {
    //initiates all hooks
    $this->initHooks();
  }

  /**
   * Initiates hooks
   *
   * @return void
   */
  private function initHooks()
  {

    //actions
    add_action('wp_ajax_custom_action', array($this, 'role_form_handler'));
    add_action('wp_ajax_nopriv_custom_action', array($this, 'role_form_handler'));
    add_action('roleusingajax_add_user_role', array($this, 'role_adder'));

    //adding js
    add_action('wp_enqueue_scripts', array($this, 'myEnqueue'));

    // add_action('wp_ajax_contact_us' , array( $this , 'ajax_contact_us_form_handler' ));

  }

  /**
   * Template definition for taking input fron user on new Role 
   *
   * @return string
   */
  public function role_form_template()
  {

    $o = '
    <h1> Provide new user role </h1>
    <form class="wordpress-ajax-form" id="wordpress_ajax_form"';

    $o .= '>
    
    <label name="user_role" for="user_role">User Role </label>
    <input type="text" name="user_role" placeholder="Input user role here ... ">

    <label name="user_role_capabilities" for="user_role_capabilities"> Capabilities </label></br>
    
    <input type="checkbox" id="read" name="usercap_read" value="true">
    <label for="usercap_read">Read</label><br>
    
    <input type="checkbox" id="edit_post" name="usercap_edit_post" value="true">
    <label for="edit_post">Edit post</label><br>

    <input type="checkbox" id="upload_files" name="usercap_upload_files" value="true">
    <label for="upload_files">Upload Files</label><br><br>
 
    <input type="submit" id="wordpress_ajax_form_btn">Send</button>
    </form>

    
    ';

    return $o;

  }

  /**
   * Handles user role data sent by the user using form
   *
   * @return void
   */
  public function role_form_handler()
  {
    //parsing the serialized string
    parse_str($_POST["data"], $formData);


    //check if the nonce is valid
    if (!wp_verify_nonce($_POST['nonce'], 'rua_security_noncea')) {

      wp_send_json_error( array( "message" => __("Nonce not verified. Please reload !") ) );

    }

    $userdata = [];
    //sanitizaiton task
    $userRole = sanitize_text_field($formData["user_role"]);
    $temp = [];
    $userdata["user_role"] = $userRole;
    // $user capabilities
    foreach ($formData as $key => $value) {
      if (str_starts_with($key, 'usercap_')) {
        $temp[explode('usercap_', $key)[1]] = sanitize_text_field($value);
      }
      continue;
    }
    $userdata["capabilities"] = $temp;


    //leaving a hook to add the role to the user roles

    do_action('roleusingajax_add_user_role', $userdata);

    wp_send_json_success(array("message" => __("Data received successfully!!"), 'data' => $userdata));

    wp_send_json_error(array("message" => __("Error while processing data !!"), 'data' => []));

  }


  /**
   * Adds new role with capabilities
   */
  public function role_adder($role_data)
  {
    add_role(
      $role_data["user_role"],
      ucfirst($role_data["user_role"]),
      $role_data["capabilities"],

    );

  }

  /**
   * Enqueing required scripts
   *
   * @return void
   */
  public function myEnqueue()
  {

    //including the js file 
    wp_enqueue_script('customjs', plugins_url('role_using_ajax/js/store.js', 'role_using_ajax'), ['jquery'], '1.0.0');

    //Localization for ajax requests requirements
    wp_localize_script('customjs', 'my_ajax_obj', array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'current_user_id' => get_current_user_id(),
      'rua_nonce' => wp_create_nonce('rua_security_nonce')
    )
    );
  }
}