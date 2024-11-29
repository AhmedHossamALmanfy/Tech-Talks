<?php
/**
 * Template part for displaying single posts layout Three
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */

$magezixPostClass = '';
$reading_switch = cs_get_option('enable_reading_progress');
if(is_active_sidebar('sidebar-1')){
	$magezixPostClass = 'col-xl-9 col-lg-8 sticky-coloum-item';
}else{
	$magezixPostClass = 'col-lg-10 offset-lg-1 no-active-sidebar';
}
?>
<?php if(true == $reading_switch):?>
<div id="magx_reading_progress"></div>
<?php endif;?>
<div class="magezix-single-post pb-120">
    <div class="container">
    <div class="row">
        <div class="col-12 sticky-coloum-item mb-30">
            <div class="post-slide pos-rel">
                <div class="tx-post-item post-slide__layout3 tx-post tx-post-overly">
                    <div class="post-thumb br-0">
                        <?php the_post_thumbnail('agezix-1355x615');?>
                    </div>
                    <div class="post-content text-center">
                        <h2 class="post-title border-effect"><?php the_title();?></h2>
                        <ul class="post-meta post-meta--4 ul_li_center mt-25">
                            <?php if (true == cs_get_option('blog_single_admin_switcher')): ?>
                            <li>
                                <div class="post-meta__author ul_li">
                                    <div class="avatar">
                                        <?php magezix_main_author_avatars(22);?>
                                    </div>
                                    <span><?php the_author()?> /
                                        <?php if(function_exists('magezix_ready_time_ago')):?>
                                            <span class="year"><?php echo magezix_ready_time_ago();?></span>
                                        <?php endif;?>
                                    </span>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if (true == cs_get_option('blog_single_comment_switcher')): ?>
                                <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_html(get_comments_number());?></li>
                            <?php endif; ?>
                            <?php if (true == cs_get_option('blog_single_read_switcher')): ?>
                                <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row mt-none-50 sticky-coloum-wrap">
            <div class="<?php echo esc_attr($magezixPostClass);?>">

               <?php
                    while ( have_posts() ) :
                        the_post(); ?>
                        <div class="blog-post-wrap mt-50">
                            <article class="post-details">
                                <div class="entry-content has-dropcap">
                                        <?php
                                        the_content(
                                            sprintf(
                                                wp_kses(
                                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'magezix' ),
                                                    array(
                                                        'span' => array(
                                                            'class' => array(),
                                                        ),
                                                    )
                                                ),
                                                wp_kses_post( get_the_title() )
                                            )
                                        );

                                        wp_link_pages(
                                            array(
                                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magezix' ),
                                                'after'  => '</div>',
                                            )
                                        );
                                        ?>
                                    </div><!-- .entry-content -->
                            </article>
                        </div>
                        <?php
                        if (true == cs_get_option('blog_single_next_prev_post_switcher')) {
                            magezix_single_post_pagination();
                        }
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile;?>
            </div>
            <?php get_sidebar();?>
        </div>
    </div>
</div>