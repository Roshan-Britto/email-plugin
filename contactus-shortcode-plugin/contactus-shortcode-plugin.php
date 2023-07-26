<?php

/*
 * Plugin Name:       Contact Us Shortcode PLugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the Contact Us form with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2   
 * Requires PHP:      7.2
 * Author:            Roshan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/license   s/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */



function contactUsForm(){

    return " <form>
             <label>Name : <input type='text' placeholder='Enter your Name' required></label><br>
             <label>Email ID : <input type='email' placeholder='Enter your Email' required></label><br> 
             <label>Comment box: </label><br><textarea rows='5' cols='20' placeholder='Leave here your comments' required></textarea><br><br>    
             <input type='submit' value='Submit'>
            </form>";

}


add_shortcode('contact_us','contactUsForm');

