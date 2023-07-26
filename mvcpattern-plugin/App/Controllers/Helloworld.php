<?php

namespace MVCP\App\Controllers;

class Helloworld{
    function addHelloWorldMenu(){
        add_menu_page('Hello_World_Menu_Page','Hello World','manage_options','hello_world_menu',array($this,'showMessage'));
    }
    
    function showMessage(){
        echo "<h1>Hello World</h1><br><h3>Menu By MVC pattern plugin</h3>";
    }
}
