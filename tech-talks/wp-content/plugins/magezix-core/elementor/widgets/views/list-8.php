<div class="trending-post pt-30">
    <?php if(!empty($settings['section_heading'])):?>
        <h2 class="tx-section-heading style-2 mb-30">
            <span><?php echo esc_html($settings['section_heading']);?></span>
        </h2>
    <?php endif;?>
    <div class="sports-post__wrap">
        <?php
        if ( $query->have_posts() ) {
        $iten_number = 0;
        while ( $query->have_posts() ) {
        $query->the_post();
            $mgthumb_size = 'full';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
            $iten_number++;
        ?>
        <div class="sports-post__item tx-post ul_li">
            <div class="post-thumb br-3">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                <?php
                    if(function_exists('magezix_category_name')){
                        magezix_category_name();
                    }
                ?>
            </div>
            <div class="post-content">
                <h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                <?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?>
                <ul class="post-meta post-meta--4 style-2 ul_li">
                    <li>
                        <div class="post-meta__author ul_li">
                            <div class="avatar">
                                <?php magezix_post_author_avatars($settings['avater_size']);?>
                            </div>
                            <span><?php the_author()?> / <?php echo magezix_ready_time_ago();?></span>
                        </div>
                    </li>
                    <li class="magezix-comment"><i class="far fa-comments-alt"></i><?php esc_html_e( 'Comment', 'magezix-core' );?> (<?php echo esc_attr(get_comments_number());?>)</li>
                    <li><i class="far fa-share-all"></i> (<?php echo magezix_get_views();?>)</li>
                </ul>
            </div>
        </div>

        <?php } wp_reset_query(); } ?>

    </div>
</div>