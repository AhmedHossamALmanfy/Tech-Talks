<?php 
    $magezix_global_social   = cs_get_option('magezix-social-global');
    $top_bar_hid   = cs_get_option('top_bar_hid');
    $hd_tw_location   = cs_get_option('hd_tw_location');
    $weather_text   = cs_get_option('weather_text');
?>
<!-- header start -->
<header class="header header--4">
    <div class="container mxw_1680">
        <div class="header__top">
            <div class="row align-items-center">
                <div class="col-xl-6 d-none d-xl-block">
                    <?php get_template_part( 'template-parts/trending-post', 'v2' );?>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <ul class="header__top-info ul_li_right">
                        <?php if(!empty($weather_text)):?>
                            <li><i class="far fa-clouds"></i><?php echo esc_html($weather_text);?></li>
                        <?php endif;?>

                        <?php if(!empty($hd_tw_location)):?>
                            <li><i class="far fa-city"></i><?php echo esc_html($hd_tw_location);?></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header__middle">
        <div class="container mxw_1680">
            <div class="header__middle-wrap ul_li">
                <div class="header__logo d-none d-lg-block pr-50">
                    <?php magezix_v4_logo(); magezix_light_logo_v4();?>
                </div>
                <?php magezix_ads_manage_v2();?>                
                <?php magezix_header_search_box();?>
            </div>
        </div>
    </div>

    <div class="header__main-wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
        <div class="container mxw_1680">
            <div class="header__main">
                <div class="main-menu header-category ul_li navbar navbar-expand-lg">
                    <div class="header__left-nav mr-30">
                        <div class="hamburger_menu d-none d-lg-block">
                            <a href="javascript:void(0);" class="active">
                                <div class="icon bar">
                                    <span><i class="fal fa-bars"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="header__logo d-lg-none">
                            <?php magezix_v4_logo(); magezix_light_logo_v4();?>
                        </div>
                    </div>
                    <nav class="main-menu__nav main-menu__category style-3 collapse navbar-collapse">
                        <?php magezix_category_menu();?>
                    </nav>
                </div>
                <div class="header__right ul_li">
                    <div class="header__icons">
                        <button id="page-header-notifications-dropdown" class="icon header-notifications pos-rel" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="far fa-bell"></i>
                            <span class="notification"></span>
                        </button>

                        <div class="header-notifications-content dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"  aria-labelledby="page-header-notifications-dropdown">
                            <?php magezix_news_notifications();?>
                        </div>
                    </div>
                    <div class="header__btn ml-30">
                        <a class="thm-btn thm-btn--3" href="#!">Login / Sign Up</a>
                    </div>
                    <div class="hamburger_menu d-lg-none">
                        <a href="javascript:void(0);" class="active">
                            <div class="icon bar">
                                <span><i class="fal fa-bars"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<?php magezix_sidebar_collapse(); ?>