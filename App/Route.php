<?php

namespace SSE\App;

defined('ABSPATH') || exit;

use SSE\App\Controllers\Email;

class Route
{
    function getEmailFunction( )
    {
        $email = new Email() ;
        add_action( 'admin_menu' , [ $email , 'addEmailMenu' ] ) ;
        add_action( 'admin_init' ,[ $email, 'formNonce' ] ) ;
    }
}