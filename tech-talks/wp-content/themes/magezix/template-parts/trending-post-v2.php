<?php 
$trending   = cs_get_option('select-tags-trend');
$trending_count   = cs_get_option('trend_post_count');
$post_label__title   = cs_get_option('post_label_');
$trending_arg = array(
    'post_type' => 'post', 
    'posts_per_page' => $trending_count, 
    'orderby' => 'date', 
    'order' => 'DESC', 
    'post_status' => 'publish', 
    'ignore_sticky_posts' => 1
);
if(!empty($trending)) {
    $trending_arg['tax_query'] = array(
        array(
        'taxonomy' => 'post_tag',
        'field'    => 'ids',
        'terms'    => $trending
        )
    );
}
$trendingPost = new WP_Query($trending_arg);

?>
<div class="header__top-slide d-none d-xl-block">
    <?php if(!empty($post_label__title)):?>
    <div class="trending-icon-wrap ul_li">
        <i class="fas fa-bolt"></i>
        <span><?php echo esc_html($post_label__title);?></span>
    </div>
    <?php endif;?>
    <div class="trending-slide owl-carousel">
        <?php
        if ($trendingPost->have_posts()) {
        while ($trendingPost->have_posts()):
        $trendingPost->the_post(); ?>
        <div class="ts-item ts-item--2 ul_li">
            <?php if(has_post_thumbnail()):?>
            <div class="post-thumb">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail');?></a>
            </div>
            <?php endif;?>
            <h2 class="post-title"><a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(), 10, '' );?></a></h2>
        </div>
        <?php
            endwhile;
            wp_reset_postdata(); }?>
    </div>
</div>