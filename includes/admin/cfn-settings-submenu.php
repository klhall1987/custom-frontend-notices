<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CFN_Settings
{
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'registerSubmenu' ), 9001 );
    }

    public function registerSubmenu()
    {
        add_submenu_page(
            'edit.php?post_type=cfn_post_type',
            'Settings', /*page title*/
            'Settings', /*menu title*/
            'manage_options',
            'cfn-settings',
            array( $this, 'output' )
        );
    }

    public function output()
    {
        $cfn_stylesheet = Custom_Frontend_Notices::$url . 'css/cfn-stylesheet.css';

        include( Custom_Frontend_Notices::$dir . 'includes/display/cfn_admin_settings.html.php' );
    }
}

return new CFN_Settings();