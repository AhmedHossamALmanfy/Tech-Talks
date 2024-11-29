<?php
/*
 * Theme Metabox
 * @package magezix-core
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    $prefix = 'magezix';

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $post_metabox = 'magezix_page_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Page Options',
        'post_type' => 'page',
    ) );

    //
    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'Header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Header Option', 'magezix-core' ),
            ),

            array(
                'id'      => 'page_logo',
                'title'   => esc_html__( 'Page Logo', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Logo Here', 'magezix-core' ),
            ),

            array(
                'id'      => 'header_layout',
                'type'    => 'select',
                'title'   => esc_html__( 'Select Header Navigation Style', 'magezix-core' ),
                'options'     => array(
                    'header-style-one'    => 'Header Style 1',
                    'header-style-two'    => 'Header Style 2',
                    'header-style-three'  => 'Header Style 3',
                    'header-style-four'  => 'Header Style 4',
                ),
                'default' => 'header-style-one',
            ),

        ),
    ) );
    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'Footer',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Footer Option', 'magezix-core' ),
            ),

            array(
                'id'      => 'page_logo',
                'title'   => esc_html__( 'Page Logo', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'default' => get_template_directory_uri() . "/",
                'desc'    => esc_html__( 'Upload Logo Here', 'magezix-core' ),
            ),

            array(
                'id'      => 'footer_layout',
                'type'    => 'select',
                'title'   => esc_html__( 'Select Footer Style', 'magezix-core' ),
                'options'     => array(
                    'footer-style-one'    => 'Footer Style 1',
                    'footer-style-two'    => 'Footer Style 2',
                    'footer-style-three'    => 'Footer Style 3',
                ),
                'default' => 'footer-style-one',
            ),

        ),
    ) );

    /*-------------------------------------
    Post Options
    -------------------------------------*/
    $post_info_metabox = 'magezix_post_meta';

    CSF::createMetabox( $post_info_metabox, array(
        'title'     => 'Post Layout Options',
        'post_type' => 'post',
    ) );

    //
    // Header Section
    CSF::createSection( $post_info_metabox, array(
        'title'  => 'Header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Header Option', 'magezix-core' ),
            ),

            array(
                'id'      => 'post_single_post_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Single Post Layout', 'magezix-core' ),
                'options' => array(
                    'single-one'   => MAGEZIX_PLUGIN_IMG_PATH . '/admin/single_1.jpg',
                    'single-two'   => MAGEZIX_PLUGIN_IMG_PATH . '/admin/single_2.jpg',
                    'single-three' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/single_3.jpg',
                ),
                'default' => 'single-one',
            ),

        ),
    ) );
    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'Footer',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Footer Option', 'magezix-core' ),
            ),

            array(
                'id'      => 'page_logo',
                'title'   => esc_html__( 'Page Logo', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'default' => get_template_directory_uri() . "/",
                'desc'    => esc_html__( 'Upload Logo Here', 'magezix-core' ),
            ),

            array(
                'id'      => 'footer_layout',
                'type'    => 'select',
                'title'   => esc_html__( 'Select Footer Style', 'magezix-core' ),
                'options'     => array(
                    'footer-style-one'    => 'Footer Style 1',
                    'footer-style-two'    => 'Footer Style 2',
                    'footer-style-three'    => 'Footer Style 3',
                ),
                'default' => 'footer-style-one',
            ),

        ),
    ) );

} //endif
