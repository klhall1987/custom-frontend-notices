<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CFN_Settings
{
    public $cfn_terms;

    /**
     * CFN_Settings constructor.
     */
    public function __construct()
    {
        add_filter( 'init',  array( $this,  'getTerms' ), 10);
        add_filter( 'init',  array( $this,  'getPostContent' ), 10);


    }

    public function getTerms()
    {
        $posts_array = get_posts( array( 'post_type' => 'cfn_post_type' ) );

        foreach( $posts_array as $posts ){
            $post_ID = $posts->ID;

            $this->cfn_terms = wp_get_post_terms( $post_ID, 'notice_type', array( 'fields' => 'names' ) );
        }

        return $this->cfn_terms;

    }

    public function getPostContent()
    {
        $args = array(
            'showposts' => -1,
            'post_type' => 'cfn_post_type',
            'tax_query' => array(
                array(
                    'taxonomy' => 'notice_type',
                    'field' => 'slug',
                    'terms' => $this->cfn_terms,
                ),
            ),
        );

        $posts_array = get_posts( $args );

        foreach( $posts_array as $posts ) {
            echo '<pre>';
            var_dump( $posts->post_content );
            echo '</pre>';
        }
    }
}

return new CFN_Settings();
