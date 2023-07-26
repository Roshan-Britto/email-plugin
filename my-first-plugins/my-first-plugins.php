<?php

/*
 * Plugin Name:       Sample Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       My First Plugin File
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Roshan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 defined('ABSPATH') or die('The Plugin is Stopped') ;

//  class NewPlugins {

//     function activate(){

//         echo "Plugin Activated";

//     }
//     function deactivate(){

//         echo "Plugin Deactivated";

//     }

//  }


//  if( class_exists( 'NewPlugins' ) ){
//     $newPlugin = new NewPlugins();
//  };

// // activation
// register_activation_hook( __FILE__, array($newPlugin , 'activate'));

// // deactivation
// register_deactivation_hook( __FILE__, array($newPlugin , 'deactivate'));

// menu 

function addHelloWorldMenu(){
    add_menu_page('Hello_World_Menu_Page','Hello World','manage_options','hello_world_menu','showMessage');
}

function showMessage(){
    echo "<h1>Hello World</h1>";
}

add_action('admin_menu' , 'addHelloWorldMenu');