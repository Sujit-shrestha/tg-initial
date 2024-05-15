<?php 
namespace Wp_content\Plugins\Metabox_learn;
class EmailContentChanger {

  public function __construct(){

    ?>
   <script> alert("here");</script>
    <?php
    //action
    add_action('custom_email_sent' , array( $this , 'metabox_learn_save_email_data' ) );

    //filters
    add_filter('custom_email_sent' , array( $this , 'metabox_learn_changeEmailContent' ));

  }
  /**
   * Changing the email content
   *
   * @param [type] $email_content
   * @return void
   */
  public function metabox_learn_changeEmailContent( $email_data ){

    echo '<pre>';
    print_r($email_data);
    exit;

  }

  /**
   * Saving email data by modification  - > saving in database
   */

   public function metabox_learn_save_email_data( $email_data ){

    wp_insert_post(
      array(
        'post_content'  => $email_data["email_content"],
        'post_title'    => $email_data["email_subject"],
        'post_status'   => $email_data['publish'],
        'post_type'     => 'ss_sent_mail'
      )
    );

   }


}