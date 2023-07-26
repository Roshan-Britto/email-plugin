<?php

namespace SSE\App;

use SSE\App\Controllers\Email;

class Route
{
    function getEmailFunction( )
    {
        $email = new Email() ;
        add_action( 'admin_menu' , [ $email , 'sseAddEmailMenu' ] ) ;
        add_action( 'admin_init' ,[ $email, 'sseFormNonce' ] ) ;
    }
}