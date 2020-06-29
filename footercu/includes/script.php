<?php
//Add Scripts
function fc_add_scripts(){
    //Add css
wp_enqueue_style('fc-main-style',plugins_url().' /footercu/css/style.css');
//Add js
wp_enqueue_script('fc-main-script',plugins_url().' /footercu/js/main.js');
}

add_action('wp_enqueue_scripts','fc_add_scripts');
