<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CNF_Settings
{
    public $posts_array;

    public $args = array();

    public function __construct()
    {
        $this->args = array(
            'posts_per_page' => 1,
            'offset' => 0,
            'category' => 'Custom Notice',
            'category_name' => 'Custom Notices',
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'cfn_post_type',
            'post_mime_type' => '',
            'post_parent' => '',
            'author' => '',
            'post_status' => 'publish',
            'suppress_filters' => true
        );

        $this->posts_array = get_posts( $this->args );
    }

}

return new CNF_Settings();


