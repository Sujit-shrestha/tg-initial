<?php 

namespace Wp_content\Plugins\Movie_menu_adder_extended;


class Settings_learn{

  public function __construct(){
    add_action ( 'admin_init', array( $this , 'mmae_settings_api_init' ) );

  }
  public function mmae_settings_api_init(){
      
    // add the section to general settings so we can add our fields to it
    add_settings_section(
      'mmae_settings_section',
      'Example settings sectin in General Setitngs',
      'mmae_section_callback_function',
      'general'

    );

    //add the field with the names and funcntion to use for out new settings , put it in out new section
    add_settings_field(
      'mmae_settings_name',
      'Example setting Name',
      'mmae_settings_callback_funciton',
      'general',
      'mmae_settings_seciton'
    );

    register_setting( 'general' , 'mmae_settings_name' );

    }

}

