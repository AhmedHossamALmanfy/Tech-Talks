<div class="row sticky-coloum-wrap mt-none-30">
    <div class="sticky-coloum-item mt-30">
        <div class="international-news__wrap">
            <?php if(!empty($settings['section_heading'])):?>
            <h2 class="tx-section-heading mb-30">
                <span><?php echo esc_html($settings['section_heading']);?></span>
            </h2>
            <?php endif;?>
            <div class="row mt-none-30">
            <?php
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();
                $mgthumb_size = 'full';
                $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
            ?>
            <?php if(0 == $query->current_post):?>
                <div class="col-xl-7 col-lg-6 mt-30">
                    <div class="tx-post tx-post-overly tx-post-overly--lg mr-none-15">
                        <div class="post-thumb hlg-415 br-0">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                        </div>
                        <div class="post-content w-90">
                            <?php
                                if(function_exists('magezix_category_badge_sm2')){
                                    magezix_category_badge_sm2();
                                }
                            ?>
                            <h2 class="post-title border-effect fs-28"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                            <div class="post-meta ul_li mt-25">
                                <div class="post-meta__author ul_li">
                                    <div class="avatar">
                                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                                    </div>
                                    <span><?php the_author()?></span>
                                </div>
                                <span><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else:?>
                <div class="col-xl-5 col-lg-6 mt-30">
                    <div class="most-reading__post-item tx-post tx-post-overly tx-post-overly--sm ml-20">
                        <div class="post-thumb br-0">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                        </div>
                        <div class="post-content">
                            <?php
                                if(function_exists('magezix_category_badge_sm2')){
                                    magezix_category_badge_sm2();
                                }
                            ?>
                            <h2 class="post-title border-effect-2 fs-20"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                            <div class="post-meta ul_li mt-15">
                                <div class="post-meta__author ul_li">
                                    <div class="avatar">
                                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                                    </div>
                                    <span><?php the_author()?></span>
                                </div>
                                <span><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (($query->current_post + 1) == ($query->post_count)):?>
                <?php endif; endif;?>
                <?php } wp_reset_query(); } ?>
            </div>
        </div>
    </div>
</div>