<div class="tech-post__wrap">
    <ul class="tab-post__nav nav nav-tabs" id="txTabThree" role="tablist">
        <?php foreach($settings['magezix_list_tab'] as $item):?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if('yes' == $item['is_active']){echo esc_attr('active');}?>" id="tabsFour-<?php echo esc_attr($item['_id']);?>" data-bs-toggle="tab" data-bs-target="#tabsFourWrap-<?php echo esc_attr($item['_id']);?>" type="button" role="tab" aria-controls="tabsFour-<?php echo esc_attr($item['_id']);?>" aria-selected="true"><?php \Elementor\Icons_Manager::render_icon( $item['tbicon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo wp_kses( $item['tab_title'], true );?></button>
            </li>
        <?php endforeach;?>
    </ul>
    <div class="tab-content" id="txTabContentThree">
    <?php foreach($settings['magezix_list_tab'] as $item):

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
        <div class="tab-pane animated fadeInUp <?php if('yes' == $item['is_active']){echo esc_attr('show active');}?>" id="tabsFourWrap-<?php echo esc_attr($item['_id']);?>" role="tabpanel" aria-labelledby="tabsFour-<?php echo esc_attr($item['_id']);?>">
            <?php
                if ( $query->have_posts() ) {
                $iten_number = 0;
                while ( $query->have_posts() ) {
                $query->the_post();
                    $mgthumb_size = 'large';
                    $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
                    $iten_number++;
            ?>
            <div class="tech-post__item tx-post ul_li mt-35">
                <div class="post-thumb">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                </div>
                <div class="post-content">
                        <?php
                            if(function_exists('magezix_category_badge_sm2')){
                                magezix_category_badge_sm2();
                            }
                        ?>
                    <h3 class="post-title border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h3>
                    <div class="post-meta post-meta--2 ul_li mt-6">
                        <div class="post-meta__author ul_li">
                            <div class="avatar">
                                <?php magezix_post_author_avatars($settings['avater_size']);?>
                            </div>
                            <span><?php the_author()?></span>
                        </div>
                        <span class="read-time"><i class="far fa-clock"></i><?php print get_the_date( "M d, Y" ); ?></span>
                    </div>
                </div>
            </div>
            <?php } wp_reset_query(); } ?>
        </div>
        <?php endforeach;?>

    </div>
</div>