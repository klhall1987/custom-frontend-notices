<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Custom Frontend Notices
Description: Allows users to add and manage custom notices for the frontend of their sites.
Version: 0.0.1
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
        include( 'includes/cfn-settings.php' );
        include( 'includes/cfn-shortcode.php' );

        self::$dir = plugin_dir_path( __FILE__ );

        self::$url = plugin_dir_url( __FILE__ );
    }
}

return new Custom_Frontend_Notices();