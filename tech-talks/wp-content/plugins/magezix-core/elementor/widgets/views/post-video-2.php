<?php

$args = array(
    'post_type'           => 'post',
    'posts_per_page'      => !empty( $settings['pst_per_page'] ) ? $settings['pst_per_page'] : 1,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'order'               => $settings['postorder'],
    'orderby'             => $settings['postorderby'],
);
if( ! empty($settings['post_categories'] ) ){
    $args['category_name'] = implode(',', $settings['post_categories']);
}
if("yes" == $settings['skip_post']){
    $args['offset'] = $settings['skip_post_count'];
}
if(!empty($settings['post_tags'][0])) {
    $args['tax_query'] = array(
        array(
        'taxonomy' => 'post_tag',
        'field'    => 'ids',
        'terms'    => $settings['post_tags']
        )
    );
}
if( isset($settings['post_format']) && is_array($settings['post_format']) && count($settings['post_format']) > 0  ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'post_format',
            'field'    => 'slug',
            'terms'    => $settings['post_format'],
            'operator' => 'IN'
        )
    );
}

$query = new \WP_Query( $args );
?>
<div class="video-post__wrapper black-bg ml-65">
    <?php if(!empty($settings['section_heading'])):?>
        <h2 class="tx-section-heading tx-section-heading--white mb-40">
            <span><?php echo esc_html($settings['section_heading']);?></span>
        </h2>
    <?php endif;?>
    <div class="row flex-row-reverse mt-none-30">
        <?php
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();
                $mgthumb_size = 'full';
                $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );

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
                $tags = get_the_tags(get_the_ID());
            ?>
            <?php if(0 == $query->current_post):?>
            <div class="col-xl-8 col-lg-12">
                <div class="video-post__item video-post__item--lg tx-post tx-post-overly tx-post-overly--lg mt-30">
                    <div class="post-thumb">
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
                        <ul class="post-tags justify-content-center ul_li mt-20">
                            <?php
                                if($tags){ ?>
                                <li><span><?php esc_html_e( '# Tags', 'magezix-core' );?></span></li>
                            <?php foreach ( $tags as $tag ) :
                                $tag_link = get_tag_link( $tag->term_id );?>
                                <li><a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a></li>
                            <?php endforeach; } ?>
                        </ul>

                    </div>
                </div>
            </div>
            <?php else:?>
                <?php if ( 1 ==  $query->current_post ): ?>
            <div class="col-xl-4 col-lg-12">
                <div class="video-post__left">
                    <?php endif;?>
                    <div class="video-post__item video-post__item--sm tx-post mt-30">
                        <div class="post-thumb">
                            <?php
                                if(function_exists('magezix_category_name')){
                                    magezix_category_name();
                                }
                            ?>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                            <?php if('video' == get_post_format( get_the_ID() ) && $video_link ):?>
                            <a class="popup-video popup-video--sm" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                            <?php endif;?>
                        </div>
                    </div>
                            <?php if (($query->current_post + 1) == ($query->post_count)):?>
                        <?php endif; endif;?>
                    <?php } wp_reset_query(); } ?>
                </div>
            </div>

    </div>
</div>