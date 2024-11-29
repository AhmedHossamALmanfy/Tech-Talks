<?php
    if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
    $query->the_post();
        $mgthumb_size = 'full';
        $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
?>
<div class="featured__post-item tx-post tx-post-overly tx-post-overly--lg">
    <div class="post-thumb mzx-post__item overlay-70 br-6">
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
    </div>
    <div class="post-content w-90">
        <?php
            if(function_exists('magezix_category_name')){
                magezix_category_name();
            }
        ?>
        <h2 class="post-title border-effect fs-22"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
        <ul class="post-meta post-meta--4 ul_li mt-10">
            <li>
                <div class="post-meta__author ul_li">
                    <div class="avatar color2">
                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                    </div>
                    <span><?php the_author()?> / <span class="year color2"><?php echo magezix_ready_time_ago();?></span></span>
                </div>
            </li>
            <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
            <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
        </ul>
    </div>
</div>
<?php } wp_reset_query(); } ?>