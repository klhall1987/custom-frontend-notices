<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CNF_Settings
{
    public $args = array();

    public function __construct()
    {
        $this->args = array(
            'showposts' => -1,
            'post_type'        => 'cfn_post_type',
            'tax_query' => array(
                array(
                'taxonomy' => 'custom_notice',
                'field'    => 'name',
                'terms'    => 'foo',
                ),
            ),
            'suppress_filters' => false
        );
    }

    public function getPosts()
    {
        $posts_array = get_posts( $this->args );

        foreach( $posts_array as $posts ){
            echo '<pre>';
            var_dump( $posts );
            echo '</pre>';
        }
    }
}

$p = new CNF_Settings();

$p->getPosts();
