<?php

class Magezix_Check_License{

    function __construct (){

        add_action( 'admin_enqueue_scripts', [ __CLASS__, 'script' ] );
        add_action( 'admin_footer', [ __CLASS__, 'footer_html' ] );
    }

    public static function script($hook){

        if ( 'appearance_page_one-click-demo-import' != $hook ) {
            return;
        }    
        wp_enqueue_script( 'tx-demo-admin', plugins_url('asset/script.js', __FILE__));
        wp_enqueue_style( 'tx-demo-admin', plugins_url('asset/style.css', __FILE__));

    }

    public static function footer_html(){

        $hook = get_current_screen();
        if ( 'appearance_page_one-click-demo-import' != $hook->base ) {
            return;
        }      
        echo '
            <div class="tx-notice">
                <span class="tx-close">x</span>
                <div class="tx-wrapper">
                    <h3>Activate license</h3>
                    <p>To import demo, please activate license <a href="'.admin_url( 'admin.php?page=magezix-license', '' ).'">here</a></p>
                </div>
            <div>    
        ';

    }
}
if ( !get_option("MagezixLicense_lic_Key") ){
    new Magezix_Check_License();
}
