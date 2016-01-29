<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CFN_Settings
{
    /**
     * @var array
     */
    public $args = array();

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

    public $strContent = '';

    /**
     * CFN_Settings constructor.
     */
    public function __construct()
    {
        add_action( 'init', array( $this,  'setTerms' ), 9001);
        add_action( 'init', array( $this, 'createArgs' ), 9001 );
        add_action( 'wp_footer', array( $this, 'output' ), 9001);
    }

    public function setTerms()
    {
        $posts_array = get_posts( array( 'post_type' => 'cfn_post_type' ) );

        foreach( $posts_array as $posts ){

            $post_ID = $posts->ID;

            $cfn_terms = wp_get_post_terms( $post_ID, 'notice_type', array( 'fields' => 'names' ) );

            $this->cfn_terms = array_merge( (array)$this->cfn_terms, (array)$cfn_terms );
        }
    }

    public function createArgs()
    {
        $tax_query = array(
            'taxonomy' => 'notice_type',
            'field'    => 'slug',
            'terms'    => $this->cfn_terms,
        );

        $this->args = array(
            'showposts' => -1,
            'post_type' => 'cfn_post_type',
            'tax_query' => array( $tax_query ),
        );
        return $this->args;
    }

    public function output()
    {

        
        $content = array();

        $posts = get_posts( $this->args );

        foreach( $posts as $post ){

            $post_content = (array) $post->post_content;

            $this->content = array_merge( $content, $post_content );

            $this->strContent = implode( '' , $this->content );

            if( has_term( 'Site', 'notice_type', $post ) ) {

                include( Custom_Frontend_Notices::$dir . 'includes/cfn-display.html.php' );

            }
        }
    }
}

return new CFN_Settings();

