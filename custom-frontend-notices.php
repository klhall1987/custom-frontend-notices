<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Custom Frontend Notices
Description: Allows users to add and manage custom notices for the frontend of their sites.
Version: 0.0.6
Author: Kenny Hall
Author URI: http://kennyinthewild.com
*/


/**
 * Class Custom_Frontend_Notices
 */
class Custom_Frontend_Notices
{
    /**
     * @var string
     */
    public static $url = '';

    /**
     * @var string
     */
    public static $dir = '';

    /**
     * Custom_Frontend_Notices constructor.
     */
    public function __construct()
    {
        include( 'includes/admin/cfn-post-type.php' );
        include( 'includes/cfn-processing.php');

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ), 9001 );

        self::$dir = plugin_dir_path( __FILE__ );
        self::$url = plugin_dir_url( __FILE__ );
    }

    public function enqueueScripts()
    {
        $handle = 'cfn_settings_script';

        $src = Custom_Frontend_Notices::$url . 'includes/js/cfn-settings-script.js';

        $deps = array( 'jquery' );

        wp_register_script( $handle, $src, $deps, false, true );

        wp_enqueue_script( 'cfn_settings_script' );
    }
}

return new Custom_Frontend_Notices();