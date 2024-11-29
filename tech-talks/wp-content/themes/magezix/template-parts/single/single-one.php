<?php
/**
 * Template part for displaying single posts layout One
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
                <div class="ajax-scroll-post">


               <?php
                    while ( have_posts() ) :
                        the_post(); ?>
                        <div class="blog-post-wrap-all mt-50">
                        <div class="blog-post-wrap ">
                            <article id="post-<?php the_ID(); ?>"  <?php post_class('post-details'); ?>>
                                <?php if (true == cs_get_option('blog_single_category_switcher')): ?>
                                    <?php magezix_category_name();?>
                                <?php endif; ?>
                                <?php
                                    the_title( '<h2>', '</h2>' );
                                ?>
                                <div class="post-details__meta ul_li_between mb-25 mt-none-30">
                                    <ul class="post-meta post-meta--4 style-2 ul_li mt-30">
                                        <?php if (true == cs_get_option('blog_single_admin_switcher')): ?>
                                        <li>
                                            <div class="post-meta__author ul_li">
                                                <div class="avatar">
                                                    <?php magezix_main_author_avatars(22);?>
                                                </div>
                                                <span><?php the_author()?>
                                                    <?php
                                                    if(function_exists('magezix_ready_time_ago')){ ?>
                                                        / <span class="year"><?php echo magezix_ready_time_ago();?></span>
                                                    <?php }
                                                    ?>
                                                </span>
                                            </div>
                                        </li>
                                        <?php endif; ?>

                                        <li><i class="far fa-calendar-alt"></i>
                                        <?php
                                            $upload_date = get_the_date('U');
                                            $date_format = get_option('date_format');
                                            $translated_date = date_i18n($date_format, $upload_date);
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
                                    <?php
                                        if(function_exists('magezix_post_share') && true == cs_get_option('blog_single_top_social_icon_switcher')){
                                            magezix_post_share();
                                        }
                                    ?>
                                </div>
                                <?php if(has_post_thumbnail()):?>
                                <figure class="post-thumb mb-30">
                                    <?php the_post_thumbnail('magezix-991x564');?>
                                </figure>
                                <?php endif;?>

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
                                <?php // get_template_part( 'template-parts/post-formats/biography' ); ?>
                            </article>
                        </div>
                        <?php
                        if (true == cs_get_option('blog_single_next_prev_post_switcher')) {
                            magezix_single_post_pagination();
                        }


                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;?>
                    </div>
                   <?php endwhile;?>
                </div>
            </div>
            <?php get_sidebar();?>
        </div>
    </div>
</div>