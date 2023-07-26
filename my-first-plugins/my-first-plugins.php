<?php
/*
 * Plugin Name:       My First PLugin
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


 defined( 'ABSPATH' ) || exit ;

function mfpAddHelloWorldMenu( ) 
{
    add_menu_page (  
        'Hello_World_Menu_Page',    // Page title
        'Hello World',              // Menu title
        'manage_options',           // Capability
        'hello_world_menu',         // Menu Slug
        'mfpShowMessage'            // Callback function
    ) ;
}

function mfpShowMessage ( ) 
{
    echo " <h1> Hello World </h1> " ;
}

add_action( 'admin_menu' , 'mfpAddHelloWorldMenu' ) ;