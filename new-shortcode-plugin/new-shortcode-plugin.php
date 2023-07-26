<?php

/*
 * Plugin Name:       Shortcode Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the Shortcode with this plugin.
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


 function shortcodeFunction(){
    return '<h2>New Shortcode has been created</h1>';
 }

 add_shortcode('follow','shortcodeFunction');

