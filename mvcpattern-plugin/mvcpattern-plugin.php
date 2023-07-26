<?php

/*
 * Plugin Name:       MVC Pattern Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the MVC with this plugin.
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

 defined('ABSPATH') || exit;

 defined('MVCP_PLUGIN_FILE') or define('MVCP_PLUGIN_FILE',__FILE__);
 defined('MVCP_PLUGIN_PATH') or define('MVCP_PLUGIN_PATH',plugin_dir_path(__FILE__));

 //autoload files
 if(file_exists(MVCP_PLUGIN_PATH .'/vendor/autoload.php')){
     // die("autoload");
    require MVCP_PLUGIN_PATH . '/vendor/autoload.php';
 }else{
     wp_die('Error During Autoload');
 }

if(class_exists('MVCP\App\Route')){
    $route = new MVCP\App\Route();
    $route->startUp();
}
