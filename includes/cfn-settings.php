<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CFN_Settings
{
    /**
     * @var array
     *
     * An array of the taxonomies terms.
     */
    public $cfn_terms = array();

    /**
     * @var
     */
    public $content = array();

    /**
     * CFN_Settings constructor.
     */
    public function __construct()
    {
        add_filter( 'init',  array( $this,  'setTerms' ), 9001);
        add_filter( 'init',  array( $this,  'getPostContent' ), 9001);
    }

    public function setTerms()
    {
        $posts_array = get_posts( array( 'post_type' => 'cfn_post_type' ) );

        foreach( $posts_array as $posts ){

            $post_ID = $posts->ID;

            $cfn_terms = wp_get_post_terms( $post_ID, 'notice_type', array( 'fields' => 'names' ) );

            $this->cfn_terms = array_merge( $this->cfn_terms, $cfn_terms );
        }
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

        $post_array = get_posts( $args );

        foreach( $post_array as $post ){

            $post_content = (array) $post->post_content;

            $this->content = array_merge( $this->content, $post_content );
        }
    }
}

return new CFN_Settings();

