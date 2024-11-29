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
    <article id="post-<?php the_ID(); ?>" <?php post_class('sports-post__item tx-post ul_li mt-50'); ?>>
        <div class="post-thumb br-3">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' );?></a>
            <?php
                if(function_exists('magezix_category_name') && true == cs_get_option('blog_category_switcher')){
                    magezix_category_name();
                }
            ?>
        </div>
        <div class="post-content">
            <h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php echo wp_trim_words(get_the_excerpt(), 20, '')  ;?>
            <ul class="post-meta post-meta--4 style-2 ul_li">
                <li>
                <?php if (true == cs_get_option('blog_admin_switcher')): ?>
                    <div class="post-meta__author ul_li">
                        <div class="avatar">
                            <?php magezix_post_author_avatars(22);?>
                        </div>
                        <span><?php the_author()?> / <?php echo magezix_ready_time_ago();?></span>
                    </div>
                <?php endif; ?>
                </li>
                <?php if (true == cs_get_option('blog_comment_switcher')): ?>
                <li class="magezix-comment"><i class="far fa-comments-alt"></i><?php esc_html_e( 'Comment', 'magezix' );?> (<?php echo esc_attr(get_comments_number());?>)</li>
               <?php endif; ?>
                <?php if (true == cs_get_option('blog_share_switcher')): ?>
                <li><i class="far fa-share-all"></i> (<?php echo magezix_get_views();?>)</li>
                <?php endif; ?>
            </ul>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; ?>
