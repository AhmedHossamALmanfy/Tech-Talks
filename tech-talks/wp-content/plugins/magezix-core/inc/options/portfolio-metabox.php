<?php
/*
 * Theme Portfolio Metabox
 * @package glox-extension
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    $prefix = 'glox';

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $post_metabox = 'glox_portfolio_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Portfolio Options',
        'post_type' => 'glow_portfolio',
    ) );

    //
    // Header Section
    CSF::createSection( $post_metabox, array(
        'fields' => array(
            array(
                'id'      => 'port_scond_img',
                'type'    => 'media',
                'title'   => esc_html('Portfolio Secondry Image', 'magezix-core'),
                'desc'    => esc_html('If you want to use default Feature Image then remove this scondry image', 'magezix-core'),
            ),
            array(
                'id'      => 'port_info_title',
                'type'    => 'text',
                'title'   => esc_html('Information Title', 'magezix-core'),
                'default' => esc_html('Project Information', 'magezix-core'),
            ),
            array(
              'id'        => 'portfolio_info',
              'type'      => 'repeater',
              'title'     => 'Add Portfolio Info List',                
              'fields'    => array(
            
                array(
                  'id'    => 'info_heading',
                  'type'  => 'text',
                  'title'   => esc_html('Heading', 'magezix-core'),
                ),
                array(
                  'id'    => 'info_value',
                  'type'  => 'text',
                  'title'   => esc_html('Info Value', 'magezix-core'),
                ),
            
              ),
              'default'   => array(
                array(
                  'info_heading' => 'Project Category:',
                  'info_value' => 'Business Development',
                ),
                array(
                  'info_heading' => 'Project Duration:',
                  'info_value' => 'February 28, 2022',
                ),
                array(
                  'info_heading' => 'Website Link:',
                  'info_value' => 'www.themexriver.com',
                ),
              )
            ),
            array(
              'id'    => 'port_social_title',
              'type'  => 'text',
              'title'   => esc_html('Social Title', 'magezix-core'),
              'default'   => esc_html('Social Account', 'magezix-core'),
            ),
            array(
                'id'        => 'prot_social_icon',
                'type'      => 'repeater',
                'title'     => 'Add Social Icons',                
                'fields'    => array(
              
                  array(
                    'id'    => 'social_icon',
                    'type'  => 'icon',
                    'title'   => esc_html('Icon', 'magezix-core'),
                  ),
                  array(
                    'id'    => 'social_link',
                    'type'  => 'text',
                    'title'   => esc_html('SOcial Profile Link', 'magezix-core'),
                  ),
              
                ),
                'default'   => array(
                  array(
                    'social_icon' => 'fa fa-facebook-f',
                    'social_link' => '#',
                  ),
                  array(
                    'social_icon' => 'fab fa-twitter',
                    'social_link' => '#',
                  ),
                  array(
                    'social_icon' => 'fab fa-youtube',
                    'social_link' => '#',
                  ),
                )
              ),
              array(
                'id'    => 'desc_title',
                'type'  => 'text',
                'title'   => esc_html('Description Title', 'magezix-core'),
                'default'   => esc_html('Description', 'magezix-core'),
              ),
              
              array(
                'id'    => 'desc_detasils',
                'type'  => 'wp_editor',
                'title'   => esc_html('Description Content', 'magezix-core'),
              ),
              array(
                'id'    => 'authore_avater',
                'type'  => 'media',
                'title'   => esc_html('Upload Authore Image Content', 'magezix-core'),
              ),
              array(
                'id'    => 'authore_title',
                'type'  => 'text',
                'title'   => esc_html('Type Authore Title', 'magezix-core'),
              ),
              array(
                'id'    => 'authore_name',
                'type'  => 'text',
                'title'   => esc_html('Type Authore Name', 'magezix-core'),
              ),
        ),
    ) );


} //endif