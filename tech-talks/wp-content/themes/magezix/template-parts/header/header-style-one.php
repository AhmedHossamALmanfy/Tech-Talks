<?php
$magezix_global_social   = cs_get_option('magezix-social-global');
$top_bar_hid   = cs_get_option('top_bar_hid');
?>
<!-- header start -->
<header class="header">
    <?php if(false != $top_bar_hid):?>
    <div class="header__top">
        <div class="container">
            <div class="row align-items-center">
                <?php get_template_part( 'template-parts/trending-post' );?>
                <div class="col-xl-6 col-lg-5">
                    <div class="header__top-right ul_li_right tx-customButton">
                        <?php if(function_exists('magezix_dark_switch')) {
                            print magezix_dark_switch();
                        } ?>
                        <span class="header__top-date"><i class="far fa-calendar-alt"></i>
                            <?php
                                $current_date_format = get_option('date_format');
                                $translated_date_format = translate($current_date_format, 'magezix');
                                $current_date = date_i18n($translated_date_format);
                                echo $current_date;
                            ?>
                        </span>
                        <?php if($magezix_global_social):?>
                        <ul class="header__social ul_li">
                            <?php magezix_header_social();?>
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="header__main-wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
        <div class="container">
            <div class="header__main">
                <div class="main-menu ul_li navbar navbar-expand-lg">
                    <div class="header__logo mr-40">
                        <?php magezix_logo(); magezix_light_logo();?>
                    </div>
                    <nav class="main-menu__nav collapse navbar-collapse">
                        <?php magezix_menu_register();?>
                    </nav>
                </div>
                <div class="header__right ul_li">
                    <div class="header__language">
                        <?php magezix_header_language();?>
                    </div>
                    <?php echo magezix_header_button();?>
                    <div class="hamburger_menu d-lg-none">
                        <a href="javascript:void(0);" class="active">
                            <div class="icon bar">
                                <span><i class="fal fa-bars"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="header__icons ml-15">
                        <button id="page-header-notifications-dropdown" class="icon header-notifications pos-rel" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="far fa-bell"></i>
                            <span class="notification"></span>
                        </button>

                        <div class="header-notifications-content dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"  aria-labelledby="page-header-notifications-dropdown">

                            <?php magezix_news_notifications();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom-wrap">
        <div class="container">
            <div class="header__bottom">
                <div class="header__bottom-left ul_li">
                    <?php
                        magezix_header_category_nav();
                        magezix_breakingnew_news();
                    ?>
                </div>

                <div class="header__bottom-right ul_li">
                    <?php magezix_global_tag_list();?>
                    <div class="search-box-outer">
                        <div class="search-box-btn"><span class="far fa-search"></span></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</header>
<!-- header end -->
<?php magezix_search_popup(); magezix_sidebar_collapse(); ?>