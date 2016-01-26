<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CFN_Settings
{
    /**
     * @var array
     */
    public $args = array();

    public function __construct()
    {
        $this->args = array(
            'showposts' => -1,
            'post_type' => 'cfn_post_type',
            'tax_query' => array(
                array(
                'taxonomy' => 'notice_type',
                'field'    => 'slug',
                'terms'    => 'holiday',
                ),
            ),
            'suppress_filters' => false
        );

        add_action( 'init',  array( $this,  'getPosts' ), 10);
    }

    public function getPosts()
    {
        $posts_array = get_posts( $this->args );

        foreach( $posts_array as $posts ){

            echo $posts->post_content;
        }
    }
}

return new CFN_Settings();


