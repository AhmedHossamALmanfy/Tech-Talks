<?php
/**
 * Magezix Custom functions and definitions
 *
 * @package Magezix
 */


/**
 * magezix Header Option
 */
function magezix_header_opt(){
    if('header-style-one' === magezix_site_header()){
        get_template_part('template-parts/header/header-style', 'one');
    }elseif('header-style-two' === magezix_site_header()){
        get_template_part('template-parts/header/header-style', 'two');
    }elseif('header-style-three' === magezix_site_header()){
        get_template_part('template-parts/header/header-style', 'three');
    }elseif('header-style-four' === magezix_site_header()){
        get_template_part('template-parts/header/header-style', 'four');
    }else{
        get_template_part('template-parts/header/header-style', 'one');
    }

}

/**
 * Magezix Menu
 */
function magezix_menu_register(){
    echo str_replace(['sub-menu'], ['submenu'], wp_nav_menu( array(
        'echo'           => false,
        'theme_location' => 'primary',
        'menu_id'        =>'magezix-primary-menu',
        'fallback_cb'    => 'Magezix_Bootstrap_Navwalker::fallback',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    )) );
}

/**
 * Magezix Mobile Menu
 */
function magezix_mobile_menu_register(){
    echo str_replace(['menu-item-has-children'], ['dropdown'], wp_nav_menu( array(
        'echo'           => false,
        'theme_location' => 'primary',
        'menu_id'        =>'mobile-menu-active',
        'fallback_cb'    => 'Magezix_Bootstrap_Navwalker::fallback',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    )) );
}

function magezix_category_menu(){
    wp_nav_menu( array(
        'theme_location' => 'category_menu',
        'fallback_cb'    => 'Magezix_Bootstrap_Navwalker::fallback',
    ));
}

/**
 * Magezix Backto Top
 */
function magezix_backto_top(){?>
    <!-- back to top start -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<!-- back to top end -->
<?php
}

/**
 * Magezix Preloader
 */
function magezix_preloader(){
    $preloader_enable = cs_get_option('preloader_enable');
    if($preloader_enable == true):
?>
    <!-- preloader start -->
    <div class="preloader">
        <div class="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
    <?php
    endif;
}

// Header Language
function magezix_header_language(){
    $selected_language_flag   = cs_get_option('selected_language_flag');
    $language_switch   = cs_get_option('language_switch');
    $selected_language_link   = cs_get_option('selected_language_link');
    $default_language_text   = cs_get_option('default_language_text', __('English', 'magezix'));
?>
    <ul>
        <li>
            <?php if(!empty($selected_language_flag['url'])):?>
            <a href="<?php echo esc_url($selected_language_link);?>" class="lang-btn"><img src="<?php echo esc_url($selected_language_flag['url']);?>" alt="<?php echo esc_attr($selected_language_flag['alt']);?>"> <?php echo esc_html($default_language_text); ?> <i class="far fa-chevron-down"></i></a>
            <?php endif;?>
            <?php if(!empty($language_switch)):?>
                <ul class="lang_sub_list">
                    <?php foreach($language_switch as $lang):?>
                    <li><a href="<?php echo esc_url($lang['country_link']);?>"><?php echo esc_html($lang['country_name']);?></a></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </li>
    </ul>
<?php
}

/**
 * magezix Search Popup
 */
function magezix_search_popup(){ ?>
    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="far fa-arrow-up"></span></button>
        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="form-group">
                <input type="search" name="s" id="search" value="<?php the_search_query();?>" placeholder="<?php echo esc_attr__( 'Search Here', 'magezix' );?>">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Header Search -->
<?php }


/**
 * Header Social Link
 */
function magezix_header_social(){
    $magezix_global_social   = cs_get_option('magezix-social-global');
?>
    <?php foreach((array) $magezix_global_social as $item):
        if ( isset( $item['social_icon'] ) )
            $icon = $item['social_icon'] ;

        if ( isset( $item['social_link'] ) )
            $link = $item['social_link'] ;
    ?>
    <li><a href="<?php echo esc_url($link)?>"><i class="<?php echo esc_attr($icon);?>"></i></a></li>
    <?php endforeach;?>
    <?php
}

/**
 * Header Button
 */
function magezix_header_button(){
    $header_btn   = cs_get_option('header-btn-link');
?>
    <?php if(!empty($header_btn)):?>
        <div class="header__btn">
            <a class="thm-btn" href="<?php echo esc_url($header_btn['url']);?>"><?php echo esc_html($header_btn['text']);?></a>
        </div>
    <?php endif;?>
<?php }

/**
 * Header Button
 */
function magezix_header_2_button(){
    $header_btn   = cs_get_option('header-btn-link');
?>
    <?php if(!empty($header_btn)):?>
        <div class="header__btn">
            <a class="thm-btn thm-btn--2" href="<?php echo esc_url($header_btn['url']);?>"><?php echo esc_html($header_btn['text']);?></a>
        </div>
    <?php endif;?>
<?php }

/**
 * Magezix Dark Stiwch
 */
function magezix_dark_switch(){ ?>
    <!-- theme-switch-box -->
        <div class="theme-switch-box-wrap custom">
            <div class="theme-switch-box">
            <span class="theme-switch-box__theme-status"><i class="fas fa-cog"></i></span>
            <label class="theme-switch-box__label" for="themeSwitchCheckbox">
                <input class="theme-switch-box__input" type="checkbox" name="themeSwitchCheckbox"
                    id="themeSwitchCheckbox">
                <span class="theme-switch-box__main"></span>
            </label>
            <span class="theme-switch-box__theme-status"><i class="fas fa-moon"></i></span>
            </div>
        </div>
        <!-- end theme-switch-box -->
    <?php
}

/**
 * Magezix Category Nav
 */
function magezix_header_category_nav(){
        $sidebar_browse_category_menu_switcher = cs_get_option('sidebar_browse_category_menu_switcher');
        $sidebar_browse_category_menu_title = cs_get_option('sidebar_browse_category_menu_title');
        $sidebar_cats = cs_get_option('sidebar_cats');

        if ( true == $sidebar_browse_category_menu_switcher ) :
    ?>
    <div class="header__category">
        <div class="vertical-menu">
            <button>
                <i class="far fa-bars"></i>
                <?php if (!empty($sidebar_browse_category_menu_title)){ echo esc_html__($sidebar_browse_category_menu_title, 'magezix'); }else{ echo esc_html__('Browse Category', 'magezix'); }?>
            </button>

            <ul class="vertical-menu-list">
                <?php
                    foreach((array) $sidebar_cats as $cat)  :
                    $cat_name = get_cat_name( $cat );
                    $cat_link = get_category_link( $cat );

                    // get cat id
                    $cat_id = get_cat_ID( $cat_name );

                    $meta = get_term_meta($cat_id, 'magezix_cate_meta', true);
                    $icon_name = !empty( $meta['icon_name'] )? $meta['icon_name'] : '';


                    if($cat_link || $cat_name) :
                ?>
                <li>
                    <a href="<?php echo esc_url($cat_link); ?>">
                        <i class="fi <?php echo esc_attr($icon_name);?>"></i>
                        <?php echo esc_html($cat_name); ?>
                    </a>
                </li>
                <?php endif; endforeach;?>
            </ul>

        </div>
    </div>
    <?php
    endif;
}


/***
 * Add Manager
 */
function magezix_ads_manage(){
    $show_header_ads   = cs_get_option('show_header_ads');
    $mzx_ads_s_image   = cs_get_option('mzx_ads_s_image');
    $ads_link_   = cs_get_option('ads_link_');
?>
    <?php if(true == $show_header_ads):?>
    <div class="header__middle-add flex-1 text-center d-none d-md-block">
        <a href="<?php echo esc_url($ads_link_);?>"><img src="<?php echo esc_url($mzx_ads_s_image['url']);?>" alt="<?php echo esc_attr($mzx_ads_s_image['alt']);?>"></a>
    </div>
    <?php endif;?>
<?php
}

/***
 * Add Manager Twol
 */
function magezix_ads_manage_v2(){
    $show_header_ads_v2   = cs_get_option('show_header_ads_v2');
    $mzx_ads_v2_s_image   = cs_get_option('mzx_ads_v2_s_image');
    $ads_link_v2   = cs_get_option('ads_link_v2');
?>
    <?php if(true == $show_header_ads_v2):?>
        <div class="header___add flex-1 pr-20">
            <a href="<?php echo esc_url($ads_link_v2);?>"><img src="<?php echo esc_url($mzx_ads_v2_s_image['url']);?>" alt="<?php echo esc_attr($mzx_ads_v2_s_image['alt']);?>"></a>
        </div>
    <?php endif;?>
<?php
}

function magezix_breakingnew_news(){
    $breaking_arg = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1
    );
    $BreakingPost = new WP_Query($breaking_arg);
    ?>
    <div class="header__recent-posts-wrap">
        <div class="header__recent-posts header-post-active owl-carousel">
            <?php
            if ($BreakingPost->have_posts()) {
            while ($BreakingPost->have_posts()):
            $BreakingPost->the_post(); ?>
                <div class="header__recent-post">
                    <h3><a href="<?php the_permalink()?>"><?php echo wp_trim_words( get_the_title(), 4, '...' );?></a></h3>
                </div>
            <?php
            endwhile;
            wp_reset_postdata(); }?>
        </div>
    </div>

<?php
}

/**
 * Magezix Header Search Box
 */
function magezix_header_search_box(){
?>
    <form method="get" class="header__search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s" id="search" value="<?php the_search_query();?>" placeholder="<?php esc_attr_e( 'Search For News', 'magezix' );?>">
        <button><i class="far fa-search"></i></button>
    </form>
<?php
}

/**
 * Global Tag List
 */
function magezix_global_tag_list(){
        $tags = get_tags();
        if(!empty($tags)){
    ?>
    <div class="tags-slide-wrap style-3 ul_li">
        <span><?php esc_html_e( '# Tags', 'magezix' );?></span>
        <div class="tags-slide owl-carousel">
            <?php
                foreach ( $tags as $tag ) :
                $tag_link = get_tag_link( $tag->term_id );
            ?>
            <div class="item">
                <a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
<?php
        }
}

function magezix_footer_option(){
    if('footer-style-one' === magezix_site_footer()){
        get_template_part('template-parts/footer/footer', 'one');
    }elseif('footer-style-two' === magezix_site_footer()){
        get_template_part('template-parts/footer/footer', 'two');
    }elseif('footer-style-three' === magezix_site_footer()){
        get_template_part('template-parts/footer/footer', 'three');
    }else{
        get_template_part('template-parts/footer/footer', 'one');
    }
}

/**
 * Magezix News Notifications
 */
function magezix_news_notifications(){
    $notification_label   = cs_get_option('notification_label');
    $notification_more_link   = cs_get_option('notification_more_link');
    $post_label   = cs_get_option('post_label');
    $noti_post_count   = cs_get_option('noti_post_count');

    $notifications_arg = array(
        'post_type' => 'post',
        'posts_per_page' => $noti_post_count,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1
    );
    $notificationQuery = new WP_Query($notifications_arg);
?>
    <div class="notification-popup">
        <?php if(!empty($notification_label)):?>
        <div class="notification-header">
            <span class="otification-text"><?php echo esc_html($notification_label);?></span>
            <?php if(!empty($notification_more_link['text'])):?>
            <a class="notification-url meta-text" href="<?php echo esc_url($notification_more_link['url']);?>"><?php echo esc_html($notification_more_link['text']);?> <i class="rbi rbi-cright"></i></a>
            <?php endif;?>
        </div>
        <?php endif;?>
        <div class="notification-content">
            <div class="scroll-holder">
                <?php if(!empty($post_label)):?>
                <div class="notification-latest">
                    <span class="notification-content-title"><i class="far fa-clock"></i><?php echo esc_html($post_label);?></span>
                </div>
                <?php endif;?>
                <div class="block-inner">
                <?php
                if ($notificationQuery->have_posts()) {
                    while ($notificationQuery->have_posts()):
                    $notificationQuery->the_post(); ?>
                    <div class="p-wrap ul_li tx-post">
                        <?php if(has_post_thumbnail()):?>
                        <div class="post-thumb mzx-post__item">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'large' );?></a>
                        </div>
                        <?php endif;?>
                        <div class="post-content">
                            <h4 class="post-title border-effect-2"><a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(), 8, '' );?></a></h4>
                            <span class="date"><?php echo wp_kses( get_the_date('M d, Y'), true ); ?></span>
                        </div>
                    </div>
                    <?php
                    endwhile;
	                wp_reset_postdata(); }?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Magezix Breadcrumb
 */
function magezix_breadcrumb(){ ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="magezix-breadcrumb breadcrumbs">
                <?php
                if(function_exists('bcn_display')){
                    bcn_display();
                }else{ ?>
                    <ul class="list-unstyled ul_li">
                        <?php echo magezix_the_breadcrumb();?>
                    </ul>
                <?php }
                ?>

            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <?php
}
/**
 * Magezix Blog Breadcrumb
 */
function magezix_blog_breadcrumb(){ ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="magezix-breadcrumb breadcrumbs">
                <?php
                if(function_exists('bcn_display')){
                    bcn_display();
                }else{ ?>
                    <ul class="list-unstyled ul_li">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'magezix' );?></a></li>
                        <li><?php esc_html_e( 'Blog', 'magezix' );?></li>
                    </ul>
                <?php }
                ?>

            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <?php
}

/***
 * Magezix Sidebar Collapse Function
 */
function magezix_sidebar_collapse(){ ?>

    <!-- slide-bar start -->
    <aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
    </div>
    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
        <div class="header-mobile-search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" name="s" id="search" value="<?php the_search_query();?>"  placeholder="<?php esc_attr_e( 'Search Keywords', 'magezix' );?>">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </div>
        <?php magezix_mobile_menu_register();?>
    </nav>
    <!-- side-mobile-menu end -->
    <?php if(function_exists('magezix_dark_switch')) {
        print magezix_dark_switch();
    } ?>
    </aside>
    <div class="body-overlay"></div>
    <!-- slide-bar end -->
<?php
}

/**
 * Magezix Page Loop
 */
function magezix_page_loop(){
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
}

function magezix_post_loop(){
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
                get_template_part( 'template-parts/post-formats/content', get_post_format() );

        endwhile; ?>
        <div class="pagination_wrap pt-50">
            <?php magezix_pagination();?>
        </div>


   <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}


/**
 * Search Loop
 */
function magezix_search_loop(){
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part( 'template-parts/content', 'search' );

        endwhile; ?>

        <div class="pagination_wrap pt-50">
            <?php magezix_pagination();?>
        </div>

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}

/**
 * Archive Loop
 */
function magezix_archive_loop(){
    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/post-formats/content', get_post_format() );

        endwhile;?>

        <div class="pagination_wrap pt-50">
            <?php magezix_pagination();?>
        </div>

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}

function magezix_error_page(){
    $error_code = cs_get_option('error_code');
    $error_title = cs_get_option('error_title');
    $error_info_title = cs_get_option('error_info_title');
    $error_button = cs_get_option('error_button');
    ?>
    <!-- error page start -->
	<section class="error__page pb-90">
		<div class="container">
			<div class="error__text text-center">
				<h1>
                    <?php
                        if(!empty($error_code)){
                            echo esc_html($error_code);
                        }else{
                            esc_html_e( '404', 'magezix' );
                        }
                    ?>
                </h1>
				<h3>
                    <?php
                        if(!empty($error_title)){
                            echo esc_html($error_title);
                        }else{
                            esc_html_e( 'Oops... It looks like you ‘re lost !', 'magezix' );
                        }
                    ?>
                </h3>
				<p>
                    <?php
                        if(!empty($error_info_title)){
                            echo esc_html($error_info_title);
                        }else{
                            esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'magezix' );
                        }
                    ?>
                </p>
				<div class="go-back-btn mt-50">
					<a class="thm-btn thm-btn__main" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php
                        if(!empty($error_button)){
                            echo esc_html($error_button);
                        }else{
                            esc_html_e( 'Go Back Home', 'magezix' );
                        }
                    ?>
                    <i class="far fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- error page end -->
    <?php
}
