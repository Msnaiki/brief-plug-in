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