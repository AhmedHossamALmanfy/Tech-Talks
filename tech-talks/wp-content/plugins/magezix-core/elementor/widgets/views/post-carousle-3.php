<?php if(!empty($settings['topic_heading'])):?>
<h2 class="tx-section-heading style-3 mb-45">
    <span>Todays <span>Topics</span></span>
</h2>
<?php endif;?>
<div class="politics-post-slide tx-post__carousel-nav owl-carousel">
<?php foreach($settings['trendingtopics'] as $item):?>
    <div class="politics-post-slide-item">
    <?php
        $args = array(
            'post_type'           => 'post',
            'posts_per_page'      => !empty( $item['pst_per_page'] ) ? $item['pst_per_page'] : 1,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'order'               => $item['postorder'],
            'orderby'             => $item['postorderby'],
        );
        if( ! empty($item['post_categories'] ) ){
            $args['category_name'] = implode(',', $item['post_categories']);
        }
        if("yes" == $item['skip_post']){
            $args['offset'] = $item['skip_post_count'];
        }
        if(!empty($item['post_tags'][0])) {
            $args['tax_query'] = array(
                array(
                'taxonomy' => 'post_tag',
                'field'    => 'ids',
                'terms'    => $item['post_tags']
                )
            );
        }
        if( isset($item['post_format']) && is_array($item['post_format']) && count($item['post_format']) > 0  ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => $item['post_format'],
                    'operator' => 'IN'
                )
            );
        }
        $query = new \WP_Query( $args );
    ?>
    <?php
        if ( $query->have_posts() ) {
        $iten_number = 0;
        while ( $query->have_posts() ) {
        $query->the_post();
            $mgthumb_size = 'large';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
            $iten_number++;
    ?>
        <div class="politics-post__item politics-post__item--3 tx-post ul_li">
            <div class="post-thumb mzx-post__item">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                <span class="post-number"><?php if($iten_number < 10){echo esc_attr('0'. $iten_number);}else{echo esc_attr($iten_number);} ;?></span>
            </div>
            <div class="post-content">
                <?php
                    if(function_exists('magezix_category_pl')){
                        magezix_category_pl();
                    }
                ?>
                <h2 class="post-title border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
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
        <?php } wp_reset_query(); } ?>
    </div>
    <?php endforeach;?>
</div>