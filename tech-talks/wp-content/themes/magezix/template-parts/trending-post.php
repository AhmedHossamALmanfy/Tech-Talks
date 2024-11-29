<?php 
$trending   = cs_get_option('select-tags-trend');
$trending_count   = cs_get_option('trend_post_count');
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
<div class="col-xl-6 col-lg-7">
    <div class="header__top-slide">
        <span class="icon"><i class="fas fa-bolt"></i></span>
        <div class="trending-slide owl-carousel">
        <?php
            if ($trendingPost->have_posts()) {
            while ($trendingPost->have_posts()):
            $trendingPost->the_post(); ?>
            <div class="ts-item">
                <h2 class="post-title"><a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(), 10, '' );?></a></h2>
            </div>
            <?php
            endwhile;
            wp_reset_postdata(); }?>
        </div>
    </div>
</div>