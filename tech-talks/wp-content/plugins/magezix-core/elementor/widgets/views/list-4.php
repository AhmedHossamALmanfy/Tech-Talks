<div class="featured-news">
    <?php if(!empty($settings['section_heading'])):?>
    <h2 class="tx-section-heading mb-40">
        <span><?php echo esc_html($settings['section_heading']);?></span>
    </h2>
    <?php endif;?>
    <?php
        if ( $query->have_posts() ) {
        $iten_number = 0;
        while ( $query->have_posts() ) {
        $query->the_post();
        $iten_number++;
            $mgthumb_size = 'full';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
    ?>
    <div class="row <?php if($iten_number % 2 == 0){echo esc_attr('flex-row-reverse');}?>  g-0 featured-news__item featured-news__item--2 tx-post align-items-center">
        <div class="col-xl-6 col-lg-12 post-thumb hmd-400">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
            <span class="post-number"><?php if($iten_number < 10){echo esc_attr('0'. $iten_number);}else{echo esc_attr($iten_number);} ;?></span>
        </div>
        <div class="col-xl-6 col-lg-12 post-content <?php if($iten_number % 2 == 0){echo esc_attr('pr-50');} else{echo esc_attr('pl-50');}?>">
            <?php
                if(function_exists('magezix_category_name')){
                    magezix_category_name();
                }
            ?>
            <h2 class="post-title border-effect mb-20"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
            <p><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?></p>
            <div class="post-meta post-meta--black ul_li mt-20">
                <div class="post-meta__author ul_li">
                    <div class="avatar">
                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                    </div>
                    <span><?php the_author()?></span>
                </div>
                <span><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
            </div>
            <?php if(!empty($settings['post_readmore_btn'])):?>
            <div class="read-more__btn mt-30">
                <a href="<?php the_permalink();?>"><?php echo esc_html($settings['post_readmore_btn']);?></a>
            </div>
            <?php endif;?>
        </div>
    </div>
    <?php } wp_reset_query(); } ?>
</div>