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

$query = get_posts($args);
$endItem = count($query) -1;
?>
<div class="container">
    <?php if(!empty($settings['section_heading'])):?>
        <h2 class="tx-section-heading tx-section-heading--white mb-30">
            <span><?php echo esc_html($settings['section_heading']);?></span>
        </h2>
    <?php endif;?>
    <div class="row">
        <?php foreach($query as $mzx => $post):
                $title = wp_trim_words( get_the_title($post->ID), $settings['title_length'], '' );

            if(get_post_meta($post->ID, 'magezix_post_format_meta', true)) {
                $post_video_meta = get_post_meta($post->ID, 'magezix_post_format_meta', true);
            } else {
                $post_video_meta = array();
            }

            if( array_key_exists( 'video_link', $post_video_meta )) {
                $video_link = $post_video_meta['video_link'];
            } else {
                $video_link = '';
            }
        ?>
            <?php if( $mzx < 2 ):?>
        <?php if( $mzx == 0 ):?>
        <div class="col-lg-3">
            <div class="video-post__left mr-30">
            <?php endif;?>
                <div class="video-post__item video-post__item--sm tx-post mt-30">
                    <div class="post-thumb">
                        <?php
                            if(function_exists('magezix_category_badge_sm2')){
                                magezix_category_badge_sm2();
                            }
                        ?>
                        <a href="<?php the_permalink($post->ID);?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url( $post->ID ));?>" alt="<?php echo esc_attr($post->post_title); ?>"></a>
                        <a class="popup-video popup-video--sm" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <?php if( $mzx == 1 || $endItem == $mzx ):?>
            </div>
        </div>
        <?php endif;?>
        <?php elseif( $mzx == 2 ):?>

        <div class="col-lg-6">
            <div class="video-post__item video-post__item--lg tx-post tx-post-overly tx-post-overly--lg mt-30 ml-none-30">
                <div class="post-thumb">
                    <a href="<?php the_permalink($post->ID);?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url( $post->ID ));?>" alt="<?php echo esc_attr($post->post_title); ?>"></a>
                    <a class="popup-video" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                </div>
                <div class="post-content w-100">
                    <div class="post-meta ul_li">
                        <div class="post-meta__author ul_li">
                            <div class="avatar">
                                <?php magezix_post_author_avatars($settings['avater_size']);?>
                            </div>
                            <span><?php the_author()?></span>
                        </div>
                        <span><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                    </div>
                    <h2 class="post-title border-effect fs-28"><a href="<?php the_permalink($post->ID);?>"><?php echo esc_html($title);?></a></h2>

                </div>
            </div>
        </div>
        <?php elseif( $mzx > 2 ):?>
        <?php if( $mzx == 3 ):?>
        <div class="col-lg-3">
            <div class="video-post__right ml-none-10">
            <?php endif;?>
                <div class="video-post__item video-post__item--md tx-post mt-30">
                    <div class="post-thumb">
                        <?php
                            magezix_category_badge_sm2();
                        ?>
                        <a href="<?php the_permalink($post->ID);?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url( $post->ID ));?>" alt="<?php echo esc_attr($post->post_title); ?>"></a>
                        <a class="popup-video" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <?php if( $mzx == 4 || $endItem == $mzx ):?>
            </div>
        </div>
        <?php break; endif;?>
                <?php endif;?>
        <?php endforeach;?>
    </div>
</div>