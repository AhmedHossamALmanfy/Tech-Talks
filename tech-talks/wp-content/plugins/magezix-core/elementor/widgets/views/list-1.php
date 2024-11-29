<div class="tx-post__category mr-none-10">
            <?php if(!empty($settings['section_heading'])):?>
            <h2 class="tx-section-heading">
                <span><?php echo esc_html($settings['section_heading']);?></span>
            </h2>
            <?php endif;?>
            <?php
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();
                $mgthumb_size = 'full';
                $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
            ?>
            <div class="tx-post__category-item tx-post ul_li mt-40">
                <div class="post-thumb">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                    <?php
                        if(function_exists('magezix_category_badge_sm2')){
                            magezix_category_badge_sm2();
                        }
                    ?>
                </div>
                <div class="post-content">
                    <span class="post-date"><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                    <h3 class="post-title border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h3>
                    <div class="post-meta post-meta--2 ul_li mt-6">
                        <div class="post-meta__author ul_li">
                            <div class="avatar">
                                <?php magezix_post_author_avatars($settings['avater_size']);?>
                            </div>
                            <span><?php the_author()?></span>
                        </div>
                        <span class="read-time"><i class="far fa-clock"></i><?php echo magezix_reading_time();?></span>
                    </div>
                </div>
            </div>
            <?php } wp_reset_query(); } ?>
        </div>