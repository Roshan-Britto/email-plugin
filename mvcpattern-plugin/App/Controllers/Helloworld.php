<?php

namespace MVCP\App\Controllers;

class Helloworld{
    public static function mvcpAddHelloWorldMenu()
    {
        add_menu_page(
            'Hello_World_Menu_Page' ,                       // Page Title
            'Hello World' ,                                 // Menu Title
            'manage_options' ,                              // Capability
            'hello_world_menu' ,                            // Menu Slug
            array( __CLASS__ , 'mvcpShowMessage')           // Callback function
        ); 
    }
    
    public static function mvcpShowMessage( )
    {
        echo "<h1>Hello World</h1><br><h3>Menu By MVC pattern plugin</h3>" ;
    }
}
