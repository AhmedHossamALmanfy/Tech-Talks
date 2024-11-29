<div class="news">
    <div class="container-fluid p-0">
        <div class="row mt-none-30 justify-content-center">
        <?php
            if ( $query->have_posts() ) {
            $iten_number = 0;
            while ( $query->have_posts() ) {
            $query->the_post();
                $mgthumb_size = 'full';
                $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
                $iten_number++;
                $tags = get_the_tags(get_the_ID());
        ?>
            <div class="col-xl-4 col-lg-6 col-md-6 mt-30">
                <div class="news-block news-block--1 tx-post">
                    <ul class="post-tags ul_li mb-20">
                        <?php
                            if($tags){ ?>
                            <li><span><?php esc_html_e( '# Tags', 'magezix-core' );?></span></li>
                        <?php foreach ( $tags as $tag ) :
                            $tag_link = get_tag_link( $tag->term_id );?>
                            <li><a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a></li>
                        <?php endforeach; } ?>
                    </ul>
                    <h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?> </p>
                    <ul class="post-meta post-meta--4 ul_li mt-25">
                        <li>
                            <div class="post-meta__author ul_li">
                                <div class="avatar">
                                    <?php magezix_post_author_avatars($settings['avater_size']);?>
                                </div>
                                <span><?php the_author()?> / <span class="year"><?php echo magezix_ready_time_ago();?></span></span>
                            </div>
                        </li>
                        <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
                        <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
                    </ul>
                </div>
            </div>
            <?php } wp_reset_query(); } ?>
        </div>
    </div>
</div>
<!-- news end -->