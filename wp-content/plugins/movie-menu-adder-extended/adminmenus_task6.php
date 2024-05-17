<?php

namespace Wp_content\Plugins\Movie_menu_adder_extended;


class Adminmenus
{
  public function __construct()
  {

    /**
     * Actions
     */

    //adding the menu
    add_action('admin_menu', array($this, 'addMenu'));

    add_action('admin_init', array($this, 'mmae_display_options'));

    /**
     * Filters
     */


  }

  /**
   *   menu Registration
   * 
   */
  public function addMenu()
  {

    add_menu_page(
      'Movie',
      'Movie',
      'manage_options',
      'admin_movie_menu',
    );

    //Loads submenu to the menu
    $this->addSubMenu();
  }

  /**
   *  Sub menus registration
   */

  public function addSubMenu()
  {

    //Dashboard as Sub Menu
    add_submenu_page(
      'admin_movie_menu',
      'Dashboard',
      'Dashboard',
      'manage_options',
      'admin_movie_submenu_dashboard',
      [$this, 'dashboard_contents_display']
    );

    //Settings as Sub Menu
    add_submenu_page(
      'admin_movie_menu',
      'Settings',
      'Settings',
      'manage_options',
      'admin_movie_submenu_setting',
      [$this, 'settings_submenu_display']
    );

  }

  //display contents of the Dashboard
  public function dashboard_contents_display()
  {

    ?>
    <div class="wrap">
      <div id="icon-options-general" class="icon32"></div>
      <h1>Dashboard contents here : Using dashboard_contents_display function !! </h1>

      <form method="post" action="options.php">
        <?php

        settings_fields("header_section");

        do_settings_sections("admin_movie_submenu_dashboard");

        submit_button();

        ?>

      </form>
    </div>
    <?php
  }

  //displays content of the seettings submenu
  public function settings_submenu_display()
  {


    ?>
    <div>
      <h1>SEttings submenu contents herer !! </h1>
    </div>
    <?php

  }

  public function mmae_display_options()
  {

    // add the section to general settings so we can add our fields to it
    add_settings_section(
      'mmae_settings_section',
      'Example settings sectin in General Setitngs',
      [$this, 'mmae_section_callback_function'],
      'admin_movie_submenu_dashboard'

    );

    //add the field with the names and funcntion to use for out new settings , put it in out new section
    add_settings_field(
      'mmae_settings_name',
      'Example setting Name',
      [$this, 'mmae_settings_callback_function'],
      'admin_movie_submenu_dashboard',
      'mmae_settings_section'
    );

    //adding a input field
    add_settings_field(
      'dashboard_input',
      'Dashboard input test',
      [ $this , 'mmae_movie_dashboard_input'],
      'admin_movie_submenu_dashboard',
      'mmae_settings_section'

    );

    //adding email taking field
    add_settings_field(
      'dashboard_email__input',
      'Email',
      [ $this , 'email_field_callback'],
      'admin_movie_submenu_dashboard',
      'mmae_settings_section'
    );

    register_setting('header_section', 'mmae_settings_name');
    register_setting('header_section' , 'dashboard_input');
    register_setting('header_section' , 'dashboard_email_input' );

  }

  public function email_field_callback(){
    ?>
    <input type="text" />
    <?php
  }
  public function mmae_settings_callback_function()
  {


    ?>
    <input type="text" />

    <?php

  }

  public function mmae_section_callback_function()
  {
    ?>
    <div style="border:1px solid black">
      <h1> This is section function </h1>
    </div>

    <?php
  }

  public function mmae_movie_dashboard_input(){
    ?>
    <input type="text" />
    <?php
  }


}