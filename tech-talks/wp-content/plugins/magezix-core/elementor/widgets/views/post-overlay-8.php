<?php
    if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
    $query->the_post();
        $mgthumb_size = 'full';
        $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
?> 
<div class="featured__post-item tx-post tx-post-overly tx-post-overly--sm">
    <div class="post-thumb mzx-post__item overlay-70 br-4">
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
    </div>
    <div class="post-content">
        <?php 
            if(function_exists('magezix_category_badge_sm2')){
                magezix_category_badge_sm2();
            }                    
        ?>
        <h2 class="post-title border-effect-2 fs-18"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
    </div>
</div>
<?php } wp_reset_query(); } ?>