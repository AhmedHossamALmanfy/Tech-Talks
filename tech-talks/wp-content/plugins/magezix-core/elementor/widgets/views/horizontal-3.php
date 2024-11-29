<div class="politics-post__video tx-post ul_li">
    <div class="post-thumb br-4">
        <a href="single-post.html"><?php the_post_thumbnail( $mgthumb_size );?></a>
        <?php if('video' == get_post_format( get_the_ID() ) && $video_link ):?>
            <a class="popup-video popup-video--sm" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
        <?php endif;?>
    </div>
    <div class="post-content">
        <h2 class="post-title border-effect fs-24"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
        <p><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?></p>
        <ul class="post-meta post-meta--4 style-4 style-2 ul_li">
            <li>
                <div class="post-meta__author ul_li">
                    <div class="avatar">
                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                    </div>
                    <span><?php the_author()?> / <?php echo magezix_ready_time_ago();?></span>
                </div>
            </li>
            <li class="magezix-comment"><i class="far fa-comments-alt"></i><?php esc_html_e( 'Comment', 'magezix-core' );?> (<?php echo esc_attr(get_comments_number());?>)</li>
        </ul>
    </div>
</div>