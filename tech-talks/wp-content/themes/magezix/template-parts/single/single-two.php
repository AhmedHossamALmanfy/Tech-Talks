<?php
/**
 * Template part for displaying single posts layout Two
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
        <div class="row mt-none-50 sticky-coloum-wrap">
            <div class="<?php echo esc_attr($magezixPostClass);?>">

               <?php
                    while ( have_posts() ) :
                        the_post(); ?>
                        <div class="blog-post-wrap mt-50">
                            <article class="post-details">
                                <div class="post-slide pos-rel mb-25">
                                    <?php the_post_thumbnail('magezix-991x564');?>
                                    <?php if (true == cs_get_option('blog_single_date_switcher')): ?>
                                        <div class="post-date">
                                            <div class="date">
                                            <?php echo wp_kses( get_the_date('d'), true ); ?> <br> <span><?php echo wp_kses( get_the_date('M'), true ); ?></span>

                                            </div>
                                            <span class="post-shape"><img src="<?php echo get_template_directory_uri()?>/assets/img/post-shape.png" alt=""></span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <h2><?php the_title();?></h2>
                                <ul class="post-meta meta-bottom-border post-meta--4 style-2 meta-bottom-border ul_li mt-25">
                                    <?php if (true == cs_get_option('blog_single_admin_switcher')): ?>
                                    <li>
                                        <div class="post-meta__author ul_li">
                                            <div class="avatar">
                                                <?php magezix_main_author_avatars(22);?>
                                            </div>
                                            <span><?php the_author()?>  / <span class="year"><?php
                                                    if(function_exists('magezix_ready_time_ago')){ ?>
                                                        <span class="year"><?php echo magezix_ready_time_ago();?></span>
                                                    <?php }
                                                    ?>  </span></span>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <li><i class="far fa-calendar-alt"></i>
                                        <?php
                                            $date_format = get_option('date_format');
                                            $current_date = get_the_date($date_format);
                                            $translated_date = date_i18n($date_format, strtotime($current_date));
                                            echo $translated_date;
                                        ?>
                                    </li>

                                    <?php if (true == cs_get_option('blog_single_comment_switcher')): ?>
                                    <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_html(get_comments_number());?></li>
                                    <?php endif; ?>

                                    <?php if (true == cs_get_option('blog_single_read_switcher')): ?>
                                    <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
                                    <?php endif; ?>
                                </ul>
                                <div class="entry-content">
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
                                <div class="post-tags-share mt-20 mb-55">
                                    <?php if (true == cs_get_option('blog_single_bottom_tag_switcher')): ?>
                                    <div class="tags d-flex align-items-center mt-30">
                                        <ul class="list-unstyled ul_li">
                                            <?php magezix_entry_footer();?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (true == cs_get_option('blog_single_bottom_social_icon_switcher')): ?>
                                        <?php
                                            if(function_exists('magezix_post_two_share')){
                                                magezix_post_two_share();
                                            }
                                        ?>
                                    <?php endif; ?>
                                </div>
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