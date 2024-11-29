<div class="wrap most-popular__right">
        <?php
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
            $mgthumb_size = 'full';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
        ?>
    <?php if(0 == $query->current_post):?>
    <div class="sports-post__single tx-post">
        <div class="post-thumb br-4">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
        </div>
        <div class="post-content mt-15">
            <ul class="post-meta post-meta--4 style-2 ul_li mb-15">
                <li>
                    <div class="post-meta__author ul_li">
                        <div class="avatar">
                            <?php magezix_post_author_avatars($settings['avater_size']);?>
                        </div>
                        <span><?php the_author()?></span>
                    </div>
                </li>
                <li><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></li>
            </ul>
            <h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
            <?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?>
        </div>
    </div>
    <?php else:?>
    <div class="sports-post__single-xs tx-post__category-item tx-post__category-item--3 tx-post ul_li">
        <div class="post-thumb">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
        </div>
        <div class="post-content">
            <h3 class="post-title border-effect-2 mb-6"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h3>
            <ul class="post-meta post-meta--4 style-2 ul_li">
                <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
                <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
            </ul>
        </div>
    </div>
    <?php endif; } wp_reset_query(); } ?>
</div>