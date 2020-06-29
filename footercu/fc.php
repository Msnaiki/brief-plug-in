<?php
/*
Plugin Name: fc customize
Plugin URI: https://youtube.com
Description: customize footer
Version: 1.0.0
Author: The mehdi snaiki
Author URI: https://youtube.com
*/

if (!defined ('ABSPATH')){
    exit;
}
add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
	//parameters details
	 //add_management_page( $page_title, $menu_title, $capability,$menu_slug, $function );
	 //add a new setting page udner setting menu
  //add_management_page('Footer Text', 'Footer Text', 'manage_options', __FILE__, //'footer_text_admin_page');
  //add new menu and its sub menu 
  add_menu_page('Footer Text title', 'Footer customize', 'manage_options','footer_setting_page', 'footer_text_admin_page','dashicons-translation');
add_submenu_page( 'footer_setting_page', 'Page title', 'Sub-menu title','manage_options', 'child-submenu-handle', 'my_magic_function');
}

function footer_text_admin_page () {
  echo 'this is where we will edit the variable';
}

// mt_settings_page() displays the page content for the Test Settings submenu
function mt_settings_page() {
    echo "<h2>" . __( 'Footer Settings Configurations', 'menu-test' ) . "</h2>";
	include_once('footer_settings_page.php');
}
//load script
require_once(plugin_dir_path(__FILE__).'/includes/script.php');
//load class
require_once(plugin_dir_path(__FILE__).'/includes/footercu-class.php');
//register the widget
function register_footercu(){
    register_widget('footer_cu_Widget');
}
//hook
add_action('widgets_init','register_footercu');