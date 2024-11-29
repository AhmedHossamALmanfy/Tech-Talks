<?php
/*
 * Theme Metabox
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
    $post_metabox = 'glox_pricing_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Pricing Options',
        'post_type' => 'glow_pricing',
    ) );

    //
    // Header Section
    CSF::createSection( $post_metabox, array(
        'fields' => array(
            array(
              'id'      => 'check_oppuler',
              'type'    => 'checkbox',
              'title'   => 'Is Populer?',
              'label'   => 'Yes, This Is Populer Item.',
              'default' => false // or false
            ),
            array(
                'id'    => 'populer_text',
                'type'  => 'text',
                'title'   => esc_html('Populer Text', 'magezix-core'),
                'desc'   => esc_html('Add pricing Populer Badge', 'magezix-core'),
                'dependency' => array( 
                  'check_oppuler', '==', 'true',
              ),
            ),
            array(
                'id'    => 'price',
                'type'  => 'text',
                'title'   => esc_html('Monthly Price', 'magezix-core'),
                'desc'   => esc_html('Add pricing Table Price Here', 'magezix-core'),
            ),
            array(
                'id'    => 'yr_price',
                'type'  => 'text',
                'title'   => esc_html('Yearly Price', 'magezix-core'),
                'desc'   => esc_html('Add pricing Table Price Here', 'magezix-core'),
            ),
            array(
                'id'    => 'period',
                'type'  => 'text',
                'title'   => esc_html('Period', 'magezix-core'),
                'desc'   => esc_html('Add pricing Table Period Here EX:Per Month', 'magezix-core'),
            ),
            array(
                'id'    => 'currency',
                'type'  => 'text',
                'title'   => esc_html('Currency', 'magezix-core'),
                'desc'   => esc_html('Add Pricing Table currency  Here EX:USD', 'magezix-core'),
            ),
            array(
                'id'        => 'pricing_table_list',
                'type'      => 'repeater',
                'title'     => 'Add Pricing List Item Here',
                'fields'    => array(
              
                  array(
                    'id'    => 'list_item',
                    'type'  => 'text',
                    'title'   => esc_html('List Item', 'magezix-core'),
                  ),
              
                ),
                'default'   => array(
                  array(
                    'list_item' => '5 PPC Campaigns',
                  ),
                  array(
                    'list_item' => 'Keep 100% Royalties',
                  ),
                  array(
                    'list_item' => 'App Development',
                  ),
                  array(
                    'list_item' => 'Seo Friendly',
                  ),
                  array(
                    'list_item' => 'UI/UX Designs',
                  ),
                )
              ),
            array(
                'id'    => 'btn_label',
                'type'  => 'text',
                'title'   => esc_html('Button Label', 'magezix-core'),
                'desc'   => esc_html('Add Pricing Button Label Here EX:Purchase Now', 'magezix-core'),
            ),
            array(
                'id'    => 'btn_link',
                'type'  => 'text',
                'title'   => esc_html('Button Link', 'magezix-core'),
                'desc'   => esc_html('Add Pricing Button Link Here', 'magezix-core'),
            ),

        ),
    ) );


} //endif