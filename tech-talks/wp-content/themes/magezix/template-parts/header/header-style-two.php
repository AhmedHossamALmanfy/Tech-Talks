<?php
$magezix_global_social   = cs_get_option('magezix-social-global');
$top_bar_hid   = cs_get_option('top_bar_hid');
$hd_tw_location   = cs_get_option('hd_tw_location');
$weather_text   = cs_get_option('weather_text');
?>
<!-- header start -->
<header class="header header--2">
    <?php if(false != $top_bar_hid):?>
    <div class="header__top">
        <div class="container mxw_1690">
            <div class="row align-items-center">
                <?php get_template_part( 'template-parts/trending-post' );?>
                <div class="col-xl-6 col-lg-12">
                    <ul class="header__top-info ul_li_right">
                        <li><i class="far fa-calendar-alt"></i>
                        <?php
                            $current_date_format = get_option('date_format');
                            $translated_date_format = translate($current_date_format, 'magezix');
                            $current_date = date_i18n($translated_date_format);
                            echo $current_date;
                        ?>
                        </li>

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
    <?php endif;?>
    <div class="header__middle">
        <div class="container mxw_1690">
            <div class="header__middle-wrap ul_li">
                <div class="header__middle-left ul_li">
                    <div class="header__language header__language--2">
                        <?php magezix_header_language();?>
                    </div>
                    <div class="header__icons">
                        <button id="page-header-notifications-dropdown" class="icon header-notifications pos-rel" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="far fa-bell"></i>
                            <span class="notification"></span>
                        </button>

                        <div class="header-notifications-content dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"  aria-labelledby="page-header-notifications-dropdown">
                            <?php magezix_news_notifications();?>
                        </div>
                    </div>
                </div>
                <div class="header__middle-logo d-none d-lg-block">
                    <?php
                        magezix_v2_logo();
                        magezix_light_logo_v2();
                    ?>
                </div>
                <?php magezix_header_search_box();?>
            </div>
        </div>
    </div>

    <div class="header__main-wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
        <div class="container mxw_1690">
            <div class="header__main pb-10">
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
                            <?php
                                magezix_v2_logo();
                                magezix_light_logo_v2();
                            ?>
                        </div>
                    </div>
                    <nav class="main-menu__nav main-menu__category collapse navbar-collapse">
                        <?php magezix_category_menu();?>
                    </nav>
                </div>
                <div class="header__right ul_li">
                    <?php if($magezix_global_social):?>
                        <ul class="header__social header__social--2 ul_li mr-25">
                            <?php magezix_header_social();?>
                        </ul>
                    <?php endif;?>
                    <?php magezix_header_button();?>
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