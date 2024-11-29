<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class OCDI_Demo_Importer {

    public function __construct() {
        add_filter( 'pt-ocdi/import_files', [$this, 'import_files_config'] );
        add_filter( 'pt-ocdi/after_import', [$this, 'ocdi_after_import_setup'] );
        add_filter( 'pt-ocdi/plugin_page_setup', [$this, 'ta_plugin_page_setup'] );
        add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
        add_action( 'init', [$this, 'THEME_COMPANIONrewrite_flush'] );
    }

    public function import_files_config() {
        $import_path = trailingslashit( XRIVER_CORE_DIR ) . 'admin/demo/';

        $home_prevs = [
            'ta_home_1' => [
                'title'        => __( 'Home 1', XRIVER_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home', XRIVER_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-1.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'-wp/',
            ],
            'ta_home_2' => [
                'title'        => __( 'Home 2', XRIVER_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home-02', XRIVER_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-2.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'-wp/home-2',
            ],
            'ta_home_3' => [
                'title'        => __( 'Home 3', XRIVER_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home-3', XRIVER_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-3.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'-wp/home-3',
            ],
            'ta_home_4' => [
                'title'        => __( 'Home 4', XRIVER_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home-4', XRIVER_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-4.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'-wp/home-4',
            ],
            'ta_home_5' => [
                'title'        => __( 'Home 5', XRIVER_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home-5', XRIVER_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-5.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'-wp/home-5',
            ],
        ];

        $config = [];

        foreach ( $home_prevs as $key => $prev ) {

            $contents_demo = $import_path . 'content.xml';
            $widget_settings = $import_path . 'widgets.wie';
            $customizer_data = $import_path . 'customizer.dat';

            $config[] = [
                'import_file_id'               => $key,
                'import_page_name'             => $prev['page'],
                'import_file_name'             => $prev['title'],
                'local_import_file'            => $contents_demo,
                'local_import_widget_file'     => $widget_settings,
                'local_import_customizer_file' => $customizer_data,
                'import_preview_image_url'     => $prev['screenshot'],
                'preview_url'                  => $prev['preview_link'],
                'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'tc-element' ),
            ];
        }

        return $config;
    }

    public function ocdi_after_import_setup( $selected_file ) {

        $this->assign_menu_to_location();
        $this->assign_frontpage_id( $selected_file );
        $this->update_permalinks();
        update_option( 'basa_ocdi_importer_flash', true );
    }

    private function assign_menu_to_location() {

        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', [
            'main-menu' => $main_menu->term_id,
        ] );
    }

    private function assign_frontpage_id( $selected_import ) {

        $front_page = get_page_by_title( $selected_import['import_page_name'] );
        $blog_page = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page->ID );
        update_option( 'page_for_posts', $blog_page->ID );
    }

    //Personalize
    public function ta_plugin_page_setup( $default_settings ) {
        $default_settings['parent_slug'] = 'themes.php';
        $default_settings['page_title'] = esc_html__( 'Demo Importer', 'xriver-companion' );
        $default_settings['menu_title'] = esc_html__( 'Demo Importer', 'xriver-companion' );
        $default_settings['capability'] = 'import';
        $default_settings['menu_slug'] = 'tf-demo-importer';

        return $default_settings;
    }

    private function update_permalinks() {
        update_option( 'permalink_structure', '/%postname%/' );
    }

    public function THEME_COMPANIONrewrite_flush() {

        if ( get_option( 'basa_ocdi_importer_flash' ) == true ) {
            flush_rewrite_rules();
            delete_option( 'basa_ocdi_importer_flash' );
        }
    }
}

new OCDI_Demo_Importer;