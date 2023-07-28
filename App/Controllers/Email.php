<?php

namespace SSE\App\Controllers;

defined('ABSPATH') || exit;

class Email
{
    function addEmailMenu( )
    {
        add_menu_page( 
            'email_Page' ,              //Page Title
            'Email' ,                   //Menu Title
            'manage_options' ,          //Capability
            'email_menu' ,              //Menu Slug
            [$this,'mailViewPage']      //Callback Function
        ) ;
    }
    function mailViewPage()
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

    
    function formNonce()
    {
        if( isset( $_POST ) && !empty( $_POST ) )
        {
            if( check_admin_referer( 'SSE_email_form' ) ) 
            {
                $mail_toAddress = sanitize_email ( $_POST[ 'sse_email' ] ) ;
                $mail_subject = sanitize_text_field ( $_POST[ 'sse_subject' ] ) ;
                $mail_content = sanitize_textarea_field ( $_POST[ 'sse_content' ] ) ;

                if( ! filter_var ( $mail_toAddress , FILTER_VALIDATE_EMAIL ) ) 
                { 
                    add_action( 'admin_notices' , [ $this , 'invalidMail' ] ) ;
                    return ;
                }
          
                if ( empty ( $mail_subject ) ) 
                {
                   add_action( 'admin_notices' , [ $this , 'emptyMailSubject' ] ) ;
                   return ;
                }
          
                if ( empty ( $mail_content ) )
                {
                   add_action( 'admin_notices' , [ $this , 'emptyMailContent' ] ) ;
                   return ;
                }
            }
            else 
            {
                wp_die( 'Form nonce not found' ) ;
            }


            $this->sendMail( $mail_toAddress , $mail_subject , $mail_content ) ;
        }
    }


    //Email error
    function invalidMail () 
    {
        ?>
        <div class="notice notice-error is-dismissible">
            <h3><?php esc_html_e( 'Invalid Email ID' )   ?></h3>
        </div>
        <?php
    }

    //Mail Subject error
    function emptyMailSubject () 
    {
        ?>
        <div class="notice notice-error is-dismissible">
            <h3><?php esc_html_e( 'Add Subject To Mail' )   ?></h3>
        </div>
        <?php
    }

    //Empty Mail Content error
    function emptyMailContent () 
    {
        ?>
        <div class="notice notice-error is-dismissible">
            <h3><?php esc_html_e( 'Add Content To Mail' )   ?></h3>
        </div>
        <?php
    }

    //Success message
    function mailedSuccessfully()
    {
        ?>
        <div class="notice notice-success is-dismissible">
            <h3><?php esc_html_e( 'Email Send Successfully' )   ?></h3>
        </div>
        <?php
    }

    //faied message
    function mailedUnsuccessfully()
    {
        ?>
        <div class="notice notice-error is-dismissible">
            <h3><?php esc_html_e( 'Failed to Send' )   ?></h3>
        </div>
        <?php
    }
    

    function sendMail( $mail_toAddress , $mail_subject , $mail_content )
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
