<?php

namespace SSE\App\Controllers;

class Email{

    function sseAddEmailMenu( )
    {
        add_menu_page( 
            'email_Page' ,              //Page Title
            'Email' ,                   //Menu Title
            'manage_options' ,          //Capability
            'email_menu' ,              //Menu Slug
            [$this,'sseMailPageview']   //Callback Function
        ) ;
    }
    function sseMailPageview()
    {
        if ( file_exists ( SSE_PLUGIN_PATH .'/App/Views/Form.php' ) ) 
        {
            include(SSE_PLUGIN_PATH.'/App/Views/Form.php' ) ;
        }
        else
        {
            wp_die( 'Page not Found' );
        }
    }

    
    function sseFormNonce()
    {
        if( isset( $_POST ) && !empty( $_POST ) )
        {
            if( check_admin_referer( 'SSE_email_form' ) ) 
            {
                $mail_toAddress = $_POST['sse_email'];
                $mail_subject = $_POST['sse_subject'];
                $mail_content = $_POST['sse_content'];
            }
            else 
            {
                wp_die( 'Form nonce not found' ) ;
            }

            $this->sseSendMail( $mail_toAddress , $mail_subject , $mail_content ) ;
        }
    }


    //Success message
    function mailedSuccessfully()
    {
        ?>
        <div class="notice notice-success is-dismissible">
            <h3>Email Send Successfully</h3>
        </div>
        <?php
    }

    //faied message
    function mailedUnsuccessfully()
    {
        ?>
        <div class="notice notice-error is-dismissible">
            <h3>Failled to Send</h3>
        </div>
        <?php
    }
    

    function sseSendMail( $mail_toAddress , $mail_subject , $mail_content )
    {

        $api_url = 'https://api.sendgrid.com/v3/mail/send';

        $header = array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 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'
        );

        $data = array(
            'personalization' => array(
                array(
                    'to' => array(
                        array(
                            'email' => $mail_toAddress
                        )
                    )
                )
            ),
            'from' => array(
                'email' => 'nivithann06@gmail.com'
            ),
            'subject' => $mail_subject,
            'content' => array(
                array(
                    'type' => 'text/plain',
                    'value' => $mail_content
                )
            )
        );

        $args = array(
            'body' => wp_json_encode($data),
            'header' => $header
        );

        $response = wp_remote_post( $api_url , $args );


        if( $response[ 'response' ][ 'code' ]===200 )
        {
            add_action( 'admin_notices' , [ $this , 'mailedSuccessfully' ] ) ;
        }
        else
        {
            add_action( 'admin_notices' , [ $this , 'mailedUnsuccessfully' ] ) ;
        }
    }

}
