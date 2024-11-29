<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */

?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('tx-post-item tx-post-item__layout2 tx-post tx-post-overly format-standard mt-50'); ?>>
    <div class="post-thumb">
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'magezix-991x564' );?></a>
    </div>
    <div class="post-content text-center">
        <?php if(function_exists('magezix_entry_tags_list') && true == cs_get_option('blog_category_switcher')):?>
        <ul class="post-tags ul_li_center mb-15">

            <li><span><?php esc_html_e( '# Tags', 'magezix' );?></span></li>
            <?php magezix_entry_tags_list();?>
        </ul>
        <?php endif;?>
        <h2 class="post-title border-effect"><a href=""<?php the_permalink();?>"><?php the_title();?></a></h2>
        <ul class="post-meta post-meta--4 ul_li_center mt-25">
            <?php if (true == cs_get_option('blog_admin_switcher')): ?>
            <li>
                <div class="post-meta__author ul_li">
                    <div class="avatar">
                        <?php magezix_post_author_avatars(22);?>
                    </div>
                    <span><?php the_author()?> / <span class="year"><?php echo magezix_ready_time_ago();?></span></span>
                </div>
            </li>
            <?php endif; ?>
            <?php if (true == cs_get_option('blog_comment_switcher')): ?>
            <li><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
            <?php endif; ?>
            <?php if (true == cs_get_option('blog_reading_switcher')): ?>
            <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
            <?php endif; ?>
        </ul>
    </div>
</article>
<?php endwhile; ?>
