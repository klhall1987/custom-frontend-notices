<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CNF_Settings
{
    public $args;

    public $query;

    public function __construct()
    {
        $this->args = array( 'post_type' => 'page' );

        $this->query = new WP_Query( $this->args );
    }

    public function getQuery()
    {
        return $this->query;
    }
}

return new CNF_Settings();



