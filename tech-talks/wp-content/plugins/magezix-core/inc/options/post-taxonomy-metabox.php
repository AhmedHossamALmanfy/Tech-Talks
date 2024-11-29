<?php
/*
 * Theme Metabox
 * @package magezix-extension
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    $prefix = 'magezix';

    /*-------------------------------------
    Post Format Options
    -------------------------------------*/
    $post_format_metabox = 'magezix_post_format_meta';

    CSF::createMetabox( $post_format_metabox, [
        'title'        => 'Post Video',
        'post_type'    => 'post',
        'post_formats' => 'video',
        'data_type'    => 'serialize',
        'context'      => 'advanced',
        'priority'     => 'default',
    ] );

    // Video Link
    CSF::createSection( $post_format_metabox, [
        'title'  => 'Post Settings Settings',
        'fields' => [
            [
                'id'    => 'video_link',
                'type'  => 'text',
                'title' => esc_html__( 'Video Link', 'magezix-core' ),
                'desc'  => esc_html__( 'Enter Video Link Here', 'magezix-core' ),
            ],

        ],
    ] );
    /**
     * Post Sponsor
     */
    $post_sponsor_metabox = 'magezix_post_sponsor_meta';
    CSF::createMetabox( $post_sponsor_metabox, [
        'title'     => 'Post Sponsor',
        'post_type' => 'post',
        'context'   => 'advanced',
        'priority'  => 'default',
    ] );
    // Sponsor Logo Link
    CSF::createSection( $post_sponsor_metabox, [
        'title'  => 'Sponsor Logo Settings',
        'fields' => [
            [
                'id'    => 'sponsor_logo',
                'type'  => 'media',
                'title' => esc_html__( 'Upload Sponcor Logo', 'magezix-core' ),
                'desc'  => esc_html__( 'Upload your Sponsor Logo Here', 'magezix-core' ),
            ],

        ],
    ] );

    /**
     * Post Gallery Format
     */
    $post_format_gall_metabox = 'magezix_post_gall_meta';

    CSF::createMetabox( $post_format_gall_metabox, [
        'title'        => 'Post Gallery',
        'post_type'    => 'post',
        'post_formats' => 'gallery',
        'data_type'    => 'serialize',
        'context'      => 'advanced',
        'priority'     => 'default',
    ] );

    // Video Link

    CSF::createSection( $post_format_gall_metabox, [
        'title'  => 'Post Gallery Settings',
        'fields' => [
            [
                'id'          => 'post-gall-item',
                'type'        => 'gallery',
                'title'       => 'Gallery',
                'add_title'   => 'Add Images',
                'edit_title'  => 'Edit Images',
                'clear_title' => 'Remove Images',
            ],

        ],
    ] );

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $cate_metabox = 'magezix_cate_meta';

    CSF::createTaxonomyOptions( $cate_metabox, [
        'taxonomy'  => 'category',
        'data_type' => 'serialize',
    ] );

    // Header Section
    CSF::createSection( $cate_metabox, [
        'title'  => 'Header',
        'fields' => [
            [
                'id'    => 'cate_img_upload',
                'type'  => 'media',
                'title' => 'Media',
            ],
            [
                'id'    => 'custom_cate_name',
                'type'  => 'text',
                'title' => 'Type Custom Category Name',
            ],
            [
                'id'          => 'icon_name',
                'type'        => 'select',
                'title'       => 'Select Icon',
                'chosen'      => true,
                'placeholder' => 'Select an option',
                'options'     => [
                    'flaticon-digital-marketing' => 'Digital marketing',
                    'flaticon-political-science' => 'Political science',
                    'flaticon-handshake'         => 'Handshake',
                    'flaticon-handshake-1'       => 'Handshake 2',
                    'flaticon-technology'        => 'Technology',
                    'flaticon-news'              => 'News',
                    'flaticon-news-1'            => 'News 2',
                    'flaticon-ball'              => 'Ball',
                    'flaticon-paw'               => 'Paw',
                    'flaticon-bear'              => 'Bear',
                    'flaticon-thunder'           => 'Thunder',
                    'flaticon-bookmark'          => 'Bookmark',
                ],
                'default'     => 'flaticon-digital-marketing',
            ],

            [
                'id'      => 'cate-color',
                'type'    => 'color',
                'title'   => 'Color',
                'default' => '#ff184e',
            ],

            [
                'id'      => 'mzx_cat_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Choose Category Layout', 'magezix-core' ),
                'options' => [
                    'cat-layout-one' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/cate-1.jpg',
                    'cat-layout-two' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/cate-2.jpg',
                ],
                'default' => 'cat-layout-one',
            ],

        ],
    ] );

} //endif
