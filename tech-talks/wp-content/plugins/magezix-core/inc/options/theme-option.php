<?php
/*
 * Theme Options
 * @package magezix
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {


    //
    // Set a unique slug-like ID
    $prefix = 'magezix';

    //
    // Create options
    CSF::createOptions( $prefix . '_theme_options', array(
        'menu_title'         => 'Magezix Option',
        'menu_slug'          => 'magezix-theme-option',
        'menu_type'          => 'menu',
        'enqueue_webfont'    => true,
        'show_in_customizer' => true,
        'menu_icon' => 'dashicons-category',
        'menu_position' => 50,
        'theme'                   => 'dark',
        'framework_title'    => wp_kses_post( 'Magezix Options <small>by Raziul <br/> Version: 1.0</small> ' ),
    ) );

    // Create a top-tab
    CSF::createSection( $prefix . '_theme_options', array(
        'id'    => 'header_opts', // Set a unique slug-like ID
        'title' => 'Header',
    ) );


    /*-------------------------------------------------------
     ** Logo Settings  Options
    --------------------------------------------------------*/

    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Logo Settings', 'magezix-core' ),
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Site Logo', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'      => 'theme_logo',
                'title'   => esc_html__( 'Main Logo', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Logo Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_light_logo',
                'title'   => esc_html__( 'Light Logo', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Light Logo Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_v2_logo',
                'title'   => esc_html__( 'Logo Version Two', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Logo Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_light_v2_logo',
                'title'   => esc_html__( 'Light Logo Version Two', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Light Logo Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_v3_logo',
                'title'   => esc_html__( 'Logo Version Three', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Logo Style Three Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_light_v3_logo',
                'title'   => esc_html__( 'Light Logo Version Three', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Light Logo Version Three Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_v4_logo',
                'title'   => esc_html__( 'Logo Version Four', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Logo Style Four Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'theme_light_v4_logo',
                'title'   => esc_html__( 'Light Logo Version Four', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Light Logo Version Four Here', 'magezix-core' ),
            ),

        ),
    ) );

    /*-------------------------------------------------------
     ** Header  Options
    --------------------------------------------------------*/

    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Header', 'magezix-core' ),
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Layout', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'      => 'theme_header_sticky',
                'title'   => esc_html__( 'Sticky Header', 'magezix-core' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Sticky Header', 'magezix-core' ),
                'default' => true,
            ),

            array(
                'id'          => 'header_glob_style',
                'type'        => 'select',
                'title'       => 'Choose Header',
                'chosen'      => true,
                'placeholder' => 'Header Global Style',
                'options'     => array(
                  'header-style-one'    => 'Header Style 1',
                  'header-style-two'    => 'Header Style 2',
                  'header-style-three'  => 'Header Style 3',
                  'header-style-four'  => 'Header Style 4',
                ),
                'default'     => 'header-style-one'
            ),
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Global Option', 'magezix-core' ) . '</h3>',
            ),
            array(
                'id'      => 'top_bar_hid',
                'type'    => 'switcher',
                'title'   => 'Switcher',
                'label'    => esc_html__( 'Do you Disable Header Top Bar', 'magezix-core' ),
                'default' => true
             ),
            array(
                'id'    => 'header-btn-link',
                'type'  => 'link',
                'title' => 'Button Link',
            ),
            array(
                'id'          => 'selected_language_flag',
                'type'        => 'media',
                'title'       => esc_html__( 'Selected Country Flag Upload', 'magezix-core' ),
            ),

            array(
                'id'    => 'selected_language_link',
                'type'  => 'text',
                'title' => 'Selected Language Link',
              ),

            // default language text
            array(
                'id'    => 'default_language_text',
                'type'  => 'text',
                'title' => 'Default Language Text',
                'default' => 'English',
              ),
            array(
                'id'        => 'language_switch',
                'type'      => 'repeater',
                'title'     => 'Add Language Switch',
                'subtitle'      => 'Add Header Language Swicth Text Here',
                'fields'    => array(

                  array(
                    'id'    => 'country_name',
                    'type'  => 'text',
                    'title' => 'Country Name',
                  ),
                  array(
                    'id'    => 'country_link',
                    'type'  => 'text',
                    'title' => 'Language URL',
                  ),

                ),
                'default'   => array(
                  array(
                    'country_name' => 'English',
                    'country_link' => '#',
                  ),
                  array(
                    'country_name' => 'Arabic',
                    'country_link' => '#',
                  ),
                  array(
                    'country_name' => 'Spanish',
                    'country_link' => '#',
                  ),
                ),
            ),

            array(
                'id'    => 'weather_text',
                'type'  => 'text',
                'title' => esc_html__( 'Weather', 'magezix-core' ),
                'default' => esc_html__( '30 Degree', 'magezix-core' ),
            ),
            array(
                'id'    => 'hd_tw_location',
                'type'  => 'text',
                'title' => esc_html__( 'Location Type', 'magezix-core' ),
                'default' => esc_html__( 'New Yourk', 'magezix-core' ),
            ),

            array(
	            'id'      => 'sidebar_browse_category_menu_switcher',
	            'type'    => 'switcher',
	            'title'   => 'Sidebar Browse Category Switcher',
	            'label'    => esc_html__( 'Browse Category Menu Enable/Disable', 'magezix-core' ),
	            'default' => true
            ),
            array(
	            'id'    => 'sidebar_browse_category_menu_title',
	            'type'  => 'text',
	            'title' => esc_html__( 'Browse Category Title', 'magezix-core' ),
	            'default' => esc_html__( 'Browse Category', 'magezix-core' ),
            ),

            // select category
            array(
                'id'          => 'sidebar_cats',
                'type'        => 'select',
                'title'       => 'Choose Category',
                'chosen'      => true,
                'placeholder' => 'Select Category',
                'options'     => 'categories',
                'default'     => 'category',
                'multiple'    => true,
            ),
        ),
    ) );

    // Preloader section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Site Preloader',
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-wrench',
        'fields' => array(

            array(
                'id'      => 'preloader_enable',
                'title'   => esc_html__( 'Enable Preloader', 'magezix-core' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable or Disable Preloader', 'magezix-core' ),
                'default' => true,
            ),

            array(
                'id'          => 'preloader-custom-img',
                'type'        => 'media',
                'title'       => esc_html__( 'Preloader Custom Image Upload', 'magezix-core' ),
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ),

            array(
                'id' => 'loader_width',
                'type' => 'slider',
                'title' => 'Custom Preloader Loader Width',
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'unit' => 'px',
                'output' => '#preloader .gl-custom-pre',
                'output_mode' => 'max-width',
                'desc' => esc_html__('Set Loader Spinign Width 200px.', 'magezix-core') ,
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ) ,
            array(
                'id'          => 'preloader-background',
                'type'        => 'color',
                'title'       => esc_html__( 'Preloader background', 'magezix-core' ),
                'output'      => '#preloader',
                'output_mode' => 'background-color',
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ),


        ),
    ) );

    /*-------------------------------------
     ** Typography Options
    -------------------------------------*/
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Typography', 'magezix-core' ),
        'id'     => 'typography_options',
        'icon'   => 'fa fa-font',
        'fields' => array(

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Body', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'     => 'body-typography',
                'type'   => 'typography',
                'output' => 'body',

            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Heading', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'     => 'heading-gl-typo',
                'type'   => 'typography',
                'output' => 'h1, h2, h3, h4, h5, h6',
            ),

        ),
    ) );

    /*-------------------------------------------------------
     ** Pages and Template
    --------------------------------------------------------*/

    // blog optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Post Trending Option', 'magezix-core' ),
        'id'     => 'post_trending_page',
        'icon'   => 'fa fa-bolt',
        'fields' => array(
            array(
                'id'      => 'post_label_',
                'type'    => 'text',
                'default' => 5,
                'title'   => esc_html__('Trending Label', 'magezix-core'),
                'desc'    => esc_html__('Trending', 'magezix-core'),
            ),
            array(
                'id'      => 'trend_post_count',
                'type'    => 'text',
                'default' => 5,
                'title'   => esc_html__('Post Count', 'magezix-core'),
                'desc'    => esc_html__('How Many Post Display Here', 'magezix-core'),
            ),
            array(
                'id'          => 'select-tags-trend',
                'type'        => 'select',
                'title'       => 'Selec Tag',
                'placeholder' => 'Select a category',
                'options'     => 'tags',
            ),


        ),
    ) );
    /*-------------------------------------------------------
     ** Pages and Template
    --------------------------------------------------------*/

    // blog optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Post Notification Option', 'magezix-core' ),
        'id'     => 'post_notification_page',
        'icon'   => 'fa fa-bell',
        'fields' => array(
            array(
                'id'      => 'notification_label',
                'type'    => 'text',
                'title'   => esc_html__('Notification Label', 'magezix-core'),
                'default'    => esc_html__('Notification', 'magezix-core'),
            ),
            array(
                'id'      => 'notification_more_link',
                'type'    => 'link',
                'title'   => esc_html__('Notification More Link', 'magezix-core'),
            ),
            array(
                'id'      => 'post_label',
                'type'    => 'text',
                'title'   => esc_html__('Post Label Label', 'magezix-core'),
                'default'    => esc_html__('Latest News', 'magezix-core'),
            ),
            array(
                'id'      => 'noti_post_count',
                'type'    => 'text',
                'default' => 4,
                'title'   => esc_html__('Post Count', 'magezix-core'),
                'desc'    => esc_html__('How Many Post Display Here', 'magezix-core'),
            ),

        ),
    ) );

    // blog optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Blog', 'magezix-core' ),
        'id'     => 'blog_page',
        'icon'   => 'fa fa-bookmark',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Blog Layout', 'magezix-core' ) . '</h3>',
            ),
            array(
                'id'      => 'magezix_news_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Blog Layout', 'magezix-core' ),
                'options' => array(
                    '1' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/left-sidebar.jpg',
                    '2' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/no-sidebar.jpg',
                    '3' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/right-sidebar.jpg',
                ),
                'default' => '3',
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Blog Options', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'          => 'page-spacing-blog',
                'type'        => 'spacing',
                'title'       => 'Blog Page Spacing',
                'output'      => '.gl-blog-list-section.inner-page-padding',
                'output_mode' => 'padding', // or margin, relative
            ),
            array(
                'id'      => 'is_active_breadcrumb',
                'type'    => 'switcher',
                'title'   => 'Switcher',
                'label'    => esc_html__( 'Do you want activate Breadcrumb ?', 'magezix-core' ),
                'default' => true
              ),
            array(
            'id'      => 'br_custom_title',
            'type'    => 'text',
            'title'   => esc_html__('Custom Title', 'magezix-core'),
            'desc'    => esc_html__('If you Do not Show Page Title thene type Custom Title Here', 'magezix-core'),
            'dependency' => array( 'is_active_breadcrumb', '==', 'true' )
            ),
              array(
                'id'      => 'breadcrumb_image',
                'title'   => esc_html__( 'Breadcrumb Image', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'default' => get_template_directory_uri() . "/assets/img/bg/bread.png",
                'desc'    => esc_html__( 'Upload Breadcrumb Image Here', 'magezix-core' ),
                'dependency' => array( 'is_active_breadcrumb', '==', 'true' )
            ),
            array(
                'id'      => 'blog_btn_text',
                'type'    => 'text',
                'title'   => esc_html__( 'Blog Read More Button', 'magezix-core' ),
                'default' => esc_html__( 'Explore More', 'magezix-core' ),
                'desc'    => esc_html__( 'Type Blog Read More Button Text Here', 'magezix-core' ),
            ),

            array(
                'id'      => 'blog_one_date_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog One Date Switcher',
                'label'    => esc_html__( 'Blog One Date Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_category_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Category Switcher',
                'label'    => esc_html__( 'Blog Category Style One Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_admin_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Admin Switcher',
                'label'    => esc_html__( 'Blog Admin Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_comment_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Comment Switcher',
                'label'    => esc_html__( 'Blog Comment Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_reading_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Reading Switcher',
                'label'    => esc_html__( 'Blog Reading Enable/Disable ( Style One And Category Style Two )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_share_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Share Switcher',
                'label'    => esc_html__( 'Blog Share Enable/Disable ( Category Style One )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_tag_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Tag Switcher',
                'label'    => esc_html__( 'Blog Tag Enable/Disable ( Blog And Category Style Two )', 'magezix-core' ),
                'default' => true
            ),

        ),
    ) );

    // blog single optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Ads Settings', 'magezix-core' ),
        'id'     => 'mzx_ads_seetins',
        'icon'   => 'fa fa-pencil-square-o',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Add Options', 'magezix-core' ) . '</h3>',
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Ads Option Home Three & Header Three Option', 'magezix-core' ) . '</h3>',
            ),
            array(
                'id' => 'show_header_ads',
                'title' => esc_html__('Enable Header Ads Banner', 'magezix-core') ,
                'type' => 'switcher',
                'desc' => esc_html__('Activate Header Ads', 'magezix-core') ,
                'default' => true,
            ) ,
            array(
                'id'      => 'mzx_ads_s_image',
                'title'   => esc_html__( 'Add Image', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Header Ads Image Here', 'magezix-core' ),
                'dependency' => array( 'show_header_ads', '==', 'true' )
            ),
            array(
                'id'      => 'ads_link_',
                'type'    => 'text',
                'title'   => esc_html__('Ads Link Title', 'magezix-core'),
                'desc'    => esc_html__('Type Ads Linke Here', 'magezix-core'),
                'dependency' => array( 'show_header_ads', '==', 'true' )
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Ads Option Home Four & Header Four Option', 'magezix-core' ) . '</h3>',
            ),
            array(
                'id' => 'show_header_ads_v2',
                'title' => esc_html__('Enable Header Ads Banner', 'magezix-core') ,
                'type' => 'switcher',
                'desc' => esc_html__('Activate Header Ads', 'magezix-core') ,
                'default' => true,
            ) ,
            array(
                'id'      => 'mzx_ads_v2_s_image',
                'title'   => esc_html__( 'Add Image', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Header Ads Image Here', 'magezix-core' ),
                'dependency' => array( 'show_header_ads', '==', 'true' )
            ),
            array(
                'id'      => 'ads_link_v2',
                'type'    => 'text',
                'title'   => esc_html__('Ads Link Title', 'magezix-core'),
                'desc'    => esc_html__('Type Ads Linke Here', 'magezix-core'),
                'dependency' => array( 'show_header_ads', '==', 'true' )
            ),

        ),
    ) );

    // blog single optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Single', 'magezix-core' ),
        'id'     => 'single_page',
        'icon'   => 'fa fa-pencil-square-o',
        'fields' => array(
            array(
                'id'      => 'enable_reading_progress',
                'title'   => esc_html__( 'Enable/Disable Reading Progress', 'magezix-core' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Reading Progress Bar', 'magezix-core' ),
                'default' => true,
            ),
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Single Post Layout', 'magezix-core' ) . '</h3>',
            ),
            array(
                'id'      => 'magezix_single_post_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Single Post Global Layout', 'magezix-core' ),
                'options' => array(
                    'single-one'   => MAGEZIX_PLUGIN_IMG_PATH . '/admin/single_1.jpg',
                    'single-two'   => MAGEZIX_PLUGIN_IMG_PATH . '/admin/single_2.jpg',
                    'single-three' => MAGEZIX_PLUGIN_IMG_PATH . '/admin/single_3.jpg',
                ),
                'default' => 'single-one',
            ),

            array(
                'id'      => 'blog_single_date_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Date Switcher',
                'label'    => esc_html__( 'Blog Single Date Enable/Disable ( Blog Single Style Two )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_category_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Category Switcher',
                'label'    => esc_html__( 'Blog Single Category Enable/Disable ( Style One )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_admin_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Admin Switcher',
                'label'    => esc_html__( 'Blog Single Admin Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_comment_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Comment Switcher',
                'label'    => esc_html__( 'Blog Single Comment Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_read_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Read Switcher',
                'label'    => esc_html__( 'Blog Single Read Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_top_social_icon_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Top Social Icon Switcher',
                'label'    => esc_html__( 'Blog Single Top Social Enable/Disable ( Style One )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_bottom_tag_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Bottom Tag Switcher',
                'label'    => esc_html__( 'Blog Single Bottom Tag Enable/Disable ( Style One And Two )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_bottom_social_icon_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Bottom Social Icon Switcher',
                'label'    => esc_html__( 'Blog Single Bottom Social Enable/Disable ( Style One And Two )', 'magezix-core' ),
                'default' => true
            ),
            array(
                'id'      => 'blog_single_next_prev_post_switcher',
                'type'    => 'switcher',
                'title'   => 'Blog Single Next Prev Post Switcher',
                'label'    => esc_html__( 'Blog Single Next Prev Post Enable/Disable', 'magezix-core' ),
                'default' => true
            ),
        ),
    ) );

   // Magezix Color Setting
   CSF::createSection( $prefix . '_theme_options', array(
    'title'  => 'Magezix Theme Control',
    'id'     => 'mazx_color_control',
    'icon'   => 'fa fa-paint-brush',
    'fields' => array(


        array(  //nav bar one start
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Magezix Primery Color', 'magezix-core' ) . '</h3>',
        ),

        array (
	        'id'      => 'mazc-primery-color',
	        'type'    => 'color',
	        'title'   => 'Change Theme Primary Color',
	        'desc'    => 'Change Your Theme Primery Color Here',
	        'default' => '#ff184e',
        ),
        array (
	        'id'      => 'mazc-primery-2-color',
	        'type'    => 'color',
	        'title'   => 'Change Theme 2 Primary Color',
	        'desc'    => 'Change Your Theme Primery Two Color Here',
	        'default' => '#2962FF',
        ),
        array (
	        'id'      => 'mazc-color-primary-3',
	        'type'    => 'color',
	        'title'   => 'Change Theme 3 Primary Color',
	        'desc'    => 'Change Your Theme Primary Three Color Here',
	        'default' => '#F10505',
        ),
        array (
	        'id'      => 'mazc-color-white',
	        'type'    => 'color',
	        'title'   => 'White Color',
	        'desc'    => 'Change Your Theme White Color Here',
	        'default' => '#ffffff',
        ),
        array (
	        'id'      => 'mazc-color-black',
	        'type'    => 'color',
	        'title'   => 'Black Color',
	        'desc'    => 'Change Your Theme Black Color Here',
	        'default' => '#000000',
        ),
        array (
	        'id'      => 'mazc-color-default',
	        'type'    => 'color',
	        'title'   => 'Default Color',
	        'desc'    => 'Change Your Theme Default Color Here',
	        'default' => '#5D6273',
        ),
        array (
	        'id'      => 'mazc-color-gray',
	        'type'    => 'color',
	        'title'   => 'Gray Color',
	        'desc'    => 'Change Your Theme Gray Color Here',
	        'default' => '#F8F8F8',
        ),
        array (
	        'id'      => 'mazc-color-border',
	        'type'    => 'color',
	        'title'   => 'Border Color',
	        'desc'    => 'Change Your Theme Border Color Here',
	        'default' => '#E1E0E0',
        ),
        array (
	        'id'      => 'mazc-color-border-2',
	        'type'    => 'color',
	        'title'   => 'Border Color 2',
	        'desc'    => 'Change Your Theme Border Color 2 Here',
	        'default' => '#F2F1F1',
        ),
        array (
	        'id'      => 'mazc-color-border-3',
	        'type'    => 'color',
	        'title'   => 'Border Color 3',
	        'desc'    => 'Change Your Theme Border Color 3 Here',
	        'default' => '#f7f7f7',
        ),
        array (
	        'id'      => 'mazc-color-dark',
	        'type'    => 'color',
	        'title'   => 'Dark Color',
	        'desc'    => 'Change Your Theme Dark Color Here',
	        'default' => '#111111',
        ),
        array (
	        'id'      => 'mazc-color-dark-2',
	        'type'    => 'color',
	        'title'   => 'Dark Color 2',
	        'desc'    => 'Change Your Theme Dark Color 2 Here',
	        'default' => '#080B17',
        ),
    ),
) );

    // Create a section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Magezix Social Icon',
        'id'     => 'magezix_social_icons',
        'icon'   => 'fa fa-share-square-o',
        'fields' => array(


            array(  //nav bar one start
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Social Icon Options', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'        => 'magezix-social-global',
                'type'      => 'repeater',
                'title'     => 'Magezix Global Social',
                'subtitle'      => 'Add Social Icon And Icon Link Here',
                'fields'    => array(

                  array(
                    'id'    => 'social_icon',
                    'type'  => 'icon',
                    'title' => 'Choose Social Icon Here',
                  ),

                  array(
                    'id'    => 'social_name',
                    'type'  => 'text',
                    'title' => 'Social Profile Name Here',
                  ),
                  array(
                    'id'    => 'social_link',
                    'type'  => 'text',
                    'title' => 'Social Profile Link Here',
                  ),
                  array(
                    'id'    => 'follow_btn',
                    'type'  => 'text',
                    'title' => 'Type Follow Button Here',
                  ),

                ),
                'default'   => array(
                  array(
                    'social_icon' => 'fab fa-facebook-f',
                    'social_link' => '#',
                  ),
                  array(
                    'social_icon' => 'fab fa-twitter',
                    'social_link' => '#',
                  ),
                  array(
                    'social_icon' => 'fab fa-instagram',
                    'social_link' => '#',
                  ),
                  array(
                    'social_icon' => 'fab fa-youtube',
                    'social_link' => '#',
                  ),
                  array(
                    'social_icon' => 'fab fa-pinterest',
                    'social_link' => '#',
                  ),
                ),
            ),

        ),
    ) );

    // Category optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Category', 'magezix-core' ),
        'id'     => 'category_opt',
        'icon'   => 'fa fa-tags',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Category Layout', 'magezix-core' ) . '</h3>',
            ),
            array(
                'id' => 'mgx_cat_global_layout',
                'type' => 'image_select',
                'title' => esc_html__('Choose Category Layout','magezix-core'),
                'options' => array(
                    'cat-layout-one'   => MAGEZIX_PLUGIN_IMG_PATH . '/admin/cate-1.jpg',
                    'cat-layout-two'   => MAGEZIX_PLUGIN_IMG_PATH . '/admin/cate-2.jpg',
                ),
                'default' => 'cat-layout-one'
            ),


        ),
    ) );

    // Create a section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Error Page',
        'id'     => 'error_page',
        'icon'   => 'fa fa-exclamation',
        'fields' => array(


            array(  //nav bar one start
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( '404 Page Options', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'      => 'error_code',
                'type'    => 'text',
                'title'   => esc_html__( 'Error Code', 'magezix-core' ),
                'default' => esc_html__( '404', 'magezix-core' ),
            ),
            array(
                'id'      => 'error_title',
                'type'    => 'text',
                'title'   => esc_html__( '404 Title', 'magezix-core' ),
                'default' => esc_html__( 'Oops... It looks like you ‘re lost !', 'magezix-core' ),
            ),
            array(
                'id'      => 'error_info_title',
                'type'    => 'textarea',
                'title'   => esc_html__( '404 Text', 'magezix-core' ),
                'default' => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'magezix-core' ),
            ),
            array(
                'id'      => 'error_button',
                'type'    => 'text',
                'title'   => esc_html__( '404 Button', 'magezix-core' ),
                'default' => esc_html__( 'Go Back Home', 'magezix-core' ),
            ),

            array(
                'id'          => 'page-spacing-error',
                'type'        => 'spacing',
                'title'       => 'Page Spacing',
                'output'      => '.error__page',
                'output_mode' => 'padding', // or margin, relative
            ),
        ),
    ) );

    /*-------------------------------------------------------
     ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Footer', 'magezix-core' ),
        'id'     => 'footer_options',
        'icon'   => 'fa fa-copyright',
        'fields' => array(
            array(
                'id'          => 'footer_glob_style',
                'type'        => 'select',
                'title'       => 'Choose Footer',
                'chosen'      => true,
                'placeholder' => 'Footer Global Style',
                'options'     => array(
                    'footer-style-one'    => 'Footer Style 1',
                    'footer-style-two'    => 'Footer Style 2',
                ),
                'default' => 'footer-style-one',
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Footer Copyright Area Options', 'magezix-core' ) . '</h3>',
            ),

            array(
                'id'      => 'footer_logo',
                'title'   => esc_html__( 'Footer Logo', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Footer Logo Here', 'magezix-core' ),
            ),

            array(
                'id'      => 'footer_v2_logo',
                'title'   => esc_html__( 'Footer Logo V2', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Footer Logo Version Two Here', 'magezix-core' ),
            ),
            array(
                'id'      => 'footer_v3_logo',
                'title'   => esc_html__( 'Footer Logo V3', 'magezix-core' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Main Footer Logo Version Three Here', 'magezix-core' ),
            ),

            array(
                'id'    => 'magezix_copywrite_text',
                'title' => esc_html__( 'Copyright Area Text', 'magezix-core' ),
                'type'  => 'wp_editor',
                'desc'  => esc_html__( 'Footer Copyright Text', 'magezix-core' ),
            ),


            array(
                'id'     => 'add_appstore_here_link',
                'type'   => 'repeater',
                'title'  => esc_html__('App Store Option', 'magezix-core'),
                'fields' => array(
                    array(
                        'id'      => 'app_logo',
                        'title'   => esc_html__( 'App Logo', 'magezix-core' ),
                        'type'    => 'media',
                        'library' => 'image',
                        'desc'    => esc_html__( 'Upload App Store Logo Here', 'magezix-core' ),
                    ),
                    array(
                        'id'    => 'app_Store_link',
                        'type'  => 'text',
                        'title' => esc_html__('App Sotre Link', 'magezix-core'),
                    ),

                ),
            ),
            array(
                'id'     => 'footer_social_link',
                'type'   => 'repeater',
                'title'  => esc_html__('Footer Social Link', 'magezix-core'),
                'fields' => array(
                    array(
                        'id'    => 'f_icon',
                        'type'  => 'icon',
                        'title' => esc_html__('Footer Social Icon', 'magezix-core'),
                    ),
                    array(
                        'id'    => 'social_link',
                        'type'  => 'text',
                        'title' => esc_html__('Social Link', 'magezix-core'),
                    ),

                ),
            ),

            array(
                'id'    => 'footer_link1',
                'type'  => 'link',
                'title' => esc_html__('Footer Link 1', 'magezix-core'),
            ),
            array(
                'id'    => 'footer_link2',
                'type'  => 'link',
                'title' => esc_html__('Footer Link 2', 'magezix-core'),
            ),

        ),
    ) );

    // Backup section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Backup', 'magezix-core' ),
        'id'     => 'backup_options',
        'icon'   => 'fa fa-window-restore',
        'fields' => array(
            array(
                'type' => 'backup',
            ),
        ),
    ) );

}