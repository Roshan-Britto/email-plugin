<?php

namespace MVCP\App;
use MVCP\App\Controllers\Helloworld;

class Route{
    function startUp(){
        $helloworld = new Helloworld();
        add_action('admin_menu',[$helloworld,'addHelloWorldMenu']);
    }
}
