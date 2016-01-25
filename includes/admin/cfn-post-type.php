<?php if ( ! defined( 'ABSPATH' ) ) exit;

class CFN_Post_Type
{

    public function __construct()
    {
        add_action( 'init', array( $this, 'cfn_register_post_type' ), 0 );

        add_action( 'init', array( $this, 'cfn_register_taxonomy' ), 10 );
    }

    public function cfn_register_post_type()
    {

        $labels = array(
            'name' => _x('CFN Post Types', 'Post Type General Name', 'text_domain'),
            'singular_name' => _x('CFN Post Type', 'Post Type Singular Name', 'text_domain'),
            'menu_name' => __('Custom Notices', 'text_domain'),
            'name_admin_bar' => __('Custom Notices', 'text_domain'),
            'archives' => __('Item Archives', 'text_domain'),
            'parent_item_colon' => __('Parent Item:', 'text_domain'),
            'all_items' => __('All Items', 'text_domain'),
            'add_new_item' => __('Add New Item', 'text_domain'),
            'add_new' => __('Add New', 'text_domain'),
            'new_item' => __('New Item', 'text_domain'),
            'edit_item' => __('Edit Item', 'text_domain'),
            'update_item' => __('Update Item', 'text_domain'),
            'view_item' => __('View Item', 'text_domain'),
            'search_items' => __('Search Item', 'text_domain'),
            'not_found' => __('Not found', 'text_domain'),
            'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
            'featured_image' => __('Featured Image', 'text_domain'),
            'set_featured_image' => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image' => __('Use as featured image', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list' => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list' => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label' => __('Custom Frontend Notices', 'text_domain'),
            'description' => __('Custom frontend notices post type', 'text_domain'),
            'labels' => $labels,
            'supports' => array(),
            'taxonomies' => array( 'custom_notice' ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );

        register_post_type('cfn_post_type', $args);

    }

    public function cfn_register_taxonomy()
    {
        $labels = array(
            'name'                       => _x( 'Custom Notices', 'Custom Notices', 'text_domain' ),
            'singular_name'              => _x( 'Custom Notice', 'Custom Notice', 'text_domain' ),
            'menu_name'                  => __( 'Custom Notices', 'text_domain' ),
            'all_items'                  => __( 'All Custom Notices', 'text_domain' ),
            'parent_item'                => __( 'Parent Custom Notices', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Custom Notices:', 'text_domain' ),
            'new_item_name'              => __( 'New Custom Notice', 'text_domain' ),
            'add_new_item'               => __( 'Add New Custom Notice', 'text_domain' ),
            'edit_item'                  => __( 'Edit Custom Notice', 'text_domain' ),
            'update_item'                => __( 'Update Custom Notice', 'text_domain' ),
            'view_item'                  => __( 'View Custom Notice', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
            'popular_items'              => __( 'Popular Custom Notices', 'text_domain' ),
            'search_items'               => __( 'Search Custom Notices', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        register_taxonomy( 'custom_notice', 'cfn_post_type', $args );

    }
}

return new CFN_Post_Type();