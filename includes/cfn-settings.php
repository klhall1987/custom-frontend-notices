<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CNF_Settings
{
    public $args = array();

    public function __construct()
    {
        $this->args = array(
            'posts_per_page'   => 5,
            'post_type'        => 'cfn_post_type',
            'tax_query' => array(
                array(
                'taxonomy' => 'custom_notice',
                'field'    => 'slug',
                'terms'    => 'foo',
                ),
            )
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
