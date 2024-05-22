<?php

namespace Plugins\Role_using_ajax;

class Manage_user_role_usingAJAx
{
  public function __construct()
  {

    //uses 


    //actions
    add_action('wp_ajax_custom_action', array($this, 'role_form_handler') );
    add_action('wp_ajax_nopriv_custom_action', array($this, 'role_form_handler') );
    add_action('roleusingajax_add_user_role' , array( $this , 'role_adder' ));
//adding js
    add_action( 'admin_enqueue_scripts', array( $this , 'my_enqueue' ) );

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
    // $o .= admin_url('admin-ajax.php');
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

  function my_enqueue( $hook ) {
    
    
    // wp_enqueue_script('customjs' , 'js/sujittheme.js' , [] , '1.0' , true);

  }

/**
 * Handles user role data sent by the user using form
 *
 * @return void
 */
  public function role_form_handler(  )
  {
    //parsing the serialized string
    parse_str( $_POST["data"] , $test );
  
    $userdata = [];
    //sanitizaiton task
    $userRole = sanitize_text_field($test["user_role"]);
    $temp = [];
    $userdata["user_role"] = $userRole;
    // $user capabilities
    foreach( $test as $key => $value ){
      if(str_starts_with( $key , 'usercap_' )){
        $temp[explode('usercap_' , $key)[1]] = sanitize_text_field($value) ;
      }
      continue;
    }
    $userdata["capabilities"] = $temp;
    

    // if (
    //   !isset($_POST['name_of_nonce_field'])
    //   || !wp_verify_nonce($_POST['name_of_nonce_field'], 'custom_action_nonce')
    // ) {

    //   exit(
    //     json_encode(
    //       array(
    //         'status' => false,
    //         'message' => 'The form is not valid'
    //       )
    //     )
    //   );

    // }

    //default response
    $response = array(
      'error' => false,
    );

    


    //leaving a hook to add the role to the user roles

    do_action('roleusingajax_add_user_role' , $userdata );


    // Don't forget to exit at the end of processing
    $response = [
      'status' => true,
      'message' => 'Data received successfully !!',
      'data' => $userdata
    ];
    exit(json_encode($response, JSON_PRETTY_PRINT));
  }


  /**
   * Adds new role with capabilities
   */
  public function role_adder($role_data)
  {
    add_role(
      $role_data["user_role"],
      ucfirst($role_data["user_role"]),
       $role_data["capabilities"] ,

    );


  }
}