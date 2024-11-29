
<?php if(!empty($settings['section_heading'])):?>
<h2 class="tx-section-heading style-3 mb-30">
    <span><?php echo wp_kses( $settings['section_heading'], true );?></span>
</h2>
<?php endif;?>
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

        if(get_post_meta(get_the_ID(), 'magezix_post_format_meta', true)) {
            $post_video_meta = get_post_meta(get_the_ID(), 'magezix_post_format_meta', true);
        } else {
            $post_video_meta = array();
        }

        if( array_key_exists( 'video_link', $post_video_meta )) {
            $video_link = $post_video_meta['video_link'];
        } else {
            $video_link = '';
        }

    ?>
    <?php if(0 == $query->current_post):?>
    <div class="col-xl-8 col-lg-6 col-md-6 mt-30">
        <div class="video-post__item video-post__item--lg tx-post tx-post-overly">
            <div class="post-thumb h-507">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                <?php if('video' == get_post_format( get_the_ID() ) && $video_link ):?>
                    <a class="popup-video" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                <?php endif;?>
            </div>
            <div class="post-content w-100 text-center">
                <div class="post-meta ul_li_center">
                    <div class="post-meta__author ul_li">
                        <div class="avatar">
                            <?php magezix_post_author_avatars($settings['avater_size']);?>
                        </div>
                        <span><?php the_author()?></span>
                    </div>
                    <span><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                </div>
                <h2 class="post-title border-effect fs-30"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                <?php if($tags){ ?>
                <div class="tags-slide-wrap ul_li_center mt-20">
                    <span><?php esc_html_e( '# Tags', 'magezix-core' );?></span>
                    <div class="tags-slide owl-carousel">
                        <?php foreach ( $tags as $tag ) :
                            $tag_link = get_tag_link( $tag->term_id );?>
                        <div class="item">
                            <a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php else:?>
    <?php if ( 1 ==  $query->current_post ): ?>
    <div class="col-xl-4 col-lg-6 col-md-6 mt-30">
        <div class="scroll-post h-507 mCustomScrollbar" data-mcs-theme="dark">
        <?php endif;?>
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
            <?php if (($query->current_post + 1) == ($query->post_count)):?>
        </div>
    </div>
    <?php endif; endif;?>
    <?php } wp_reset_query(); } ?>
</div>