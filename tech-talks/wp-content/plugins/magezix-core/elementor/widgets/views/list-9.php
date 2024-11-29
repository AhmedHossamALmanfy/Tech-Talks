<?php
    if ( $query->have_posts() ) {
        $iten_number = 0;
    while ( $query->have_posts() ) {
    $query->the_post();
        $mgthumb_size = 'full';
        $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
        $iten_number++;
    ?>
    <div class="politics-post-xs__item tx-post ul_li">
        <div class="post-thumb br-3">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
            <span class="post-number"><?php if($iten_number < 10){echo esc_attr('0'. $iten_number);}else{echo esc_attr($iten_number);} ;?></span>
        </div>
        <div class="post-content">
            <?php
                if(function_exists('magezix_category_pl')){
                    magezix_category_pl();
                }
            ?>
            <h2 class="post-title border-effect-2 fs-16"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
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