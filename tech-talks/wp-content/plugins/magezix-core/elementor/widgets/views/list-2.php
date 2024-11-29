<div class="tx-post__item-wrap mrxl-none-30">
    <?php
    if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
    $query->the_post();
        $mgthumb_size = 'full';
        $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
    ?>

    <div class="tx-post__item tx-post ul_li">
        <div class="post-thumb mzx-post__item">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
        </div>
        <div class="post-content">
            <?php
                if(function_exists('magezix_category_pl')){
                    magezix_category_pl();
                }
            ?>
            <h3 class="post-title fs-17 border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h3>
            <div class="post-meta post-meta--2 ul_li">
                <div class="post-meta__author ul_li">
                    <div class="avatar">
                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                    </div>
                    <span><?php the_author()?></span>
                </div>
                <span class="date"><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
            </div>
        </div>
    </div>
    <?php } wp_reset_query(); } ?>
</div>