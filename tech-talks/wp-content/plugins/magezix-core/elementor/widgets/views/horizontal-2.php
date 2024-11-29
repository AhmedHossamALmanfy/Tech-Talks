<div class="tx-post__video-post tx-post__video-post-big tx-post mt-10 ul_li">
    <div class="post-thumb">
        <a href="single-post.html"><?php the_post_thumbnail( $mgthumb_size );?></a>
        <?php if('video' == get_post_format( get_the_ID() ) && $video_link ):?>
            <a class="popup-video popup-video--sm" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
        <?php endif;?>
    </div>
    <div class="post-content">
        <?php
            if(function_exists('magezix_category_badge_sm2')){
                magezix_category_badge_sm2();
            }
        ?>
        <h2 class="post-title fs-18 border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
        <div class="post-meta post-meta--2 ul_li mt-6">
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