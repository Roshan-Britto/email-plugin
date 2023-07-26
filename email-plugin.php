<?php
/*
 * Plugin Name:       Sendgrid Send Email 
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics email with this plugin using Sendgrid.
 * Version:           1.10.3
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

use SSE\App\Route;

 defined('ABSPATH') || exit;

 defined('SSE_PLUGIN_FILE') or define('SSE_PLUGIN_FILE',__FILE__);
 defined('SSE_PLUGIN_PATH') or define('SSE_PLUGIN_PATH',plugin_dir_path(__FILE__));

 //autoload files
 if ( file_exists ( SSE_PLUGIN_PATH . '/vendor/autoload.php' ) ) 
 {
    require SSE_PLUGIN_PATH.'/vendor/autoload.php' ;
 }
 else
 {
    wp_die( 'Failed During Autoload' );
 }


if ( class_exists ( '\SSE\App\Route' ) ) 
{
    $route = new Route() ;
    $route->getEmailFunction() ;
}