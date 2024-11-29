<?php 
$app_stors = cs_get_option('add_appstore_here_link');
$magezix_copywrite = cs_get_option('magezix_copywrite_text');
$footer_social_link = cs_get_option('footer_social_link');
$footer_link1 = cs_get_option('footer_link1');
$footer_link2 = cs_get_option('footer_link2');
?>
<!-- footer start -->
<footer class="footer footer--3  footer-bg <?php if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )){echo esc_attr('pt-110');}?>">
    <div class="container">
        <?php if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )):?>
        <div class="footer__main pb-100">
            <div class="row mt-none-40">
                
                <?php if(is_active_sidebar( 'footer-1' )){ ?>
                <div class="footer__widget col-lg-3 col-md-6 mt-40">
                    <div class="footer__logo mb-20">
                        <?php magezix_footer_v3_logo();?>
                    </div>
                    <?php 
                        dynamic_sidebar( 'footer-1' );
                    ?>
                    <?php if(!empty($app_stors)):?>
                    <div class="apps-img mt-25 ul_li">
                        <?php foreach($app_stors as $app):?>
                            <?php if(!empty($app['app_logo']['url'])):?>
                                <div class="app mt-15">
                                    <a href="<?php echo esc_url($app['app_Store_link']);?>"><img src="<?php echo esc_url($app['app_logo']['url']);?>" alt="<?php echo esc_attr($app['app_logo']['alt']);?>"></a>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
                <?php } ?>
                <?php 
                    if(is_active_sidebar( 'footer-2' )){
                        dynamic_sidebar( 'footer-2' );
                    }
                ?>
                <?php 
                    if(is_active_sidebar( 'footer-3' )){
                        dynamic_sidebar( 'footer-3' );
                    }
                ?>
                <?php 
                    if(is_active_sidebar( 'footer-4' )){
                        dynamic_sidebar( 'footer-4' );
                    }
                ?>
            </div>
        </div>
        <?php endif;?>
        <div class="footer__bottom ul_li_center">
            <div class="footer__copyright mt-15">
                <?php 
                    if(!empty($magezix_copywrite)){
                        echo wp_kses( $magezix_copywrite, true );
                    }else{
                        esc_html_e( '© 2022 Magezix . All Rights Reserved', 'magezix' );
                    }
                ?>
            </div>

            <?php if(!empty($footer_social_link)):?>
                <div class="footer__social mt-15">
                    <?php foreach($footer_social_link as $item):?>
                        <a href="<?php echo esc_url($item['social_link']);?>"><i class="<?php echo esc_attr($item['f_icon']);?>"></i></a>
                    <?php endforeach;?>
                </div>
            <?php endif;?>

            <?php if(!empty($footer_link1['text']) || !empty($footer_link2['text'])): ?>
            <div class="footer__links mt-15">
                <?php if(!empty($footer_link1['text'])):?>
                    <a href="<?php echo esc_url($footer_link1['url']);?>"><?php echo esc_html($footer_link1['text']);?></a>
                <?php endif;?>
                <?php if(!empty($footer_link2['text'])):?>
                    <a href="<?php echo esc_url($footer_link2['url']);?>"><?php echo esc_html($footer_link2['text']);?></a>
                <?php endif;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</footer>
<!-- footer end -->