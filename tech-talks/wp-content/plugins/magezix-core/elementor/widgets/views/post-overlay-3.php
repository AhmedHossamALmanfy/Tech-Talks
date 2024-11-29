<div class="country-news row">
    <?php
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
            $mgthumb_size = 'full';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
    ?>
    <div class="col-lg-6">
        <div class="tx-post tx-post-overly tx-post-overly--sm">
            <div class="post-thumb mzx-post__item br-3">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
            </div>
            <div class="post-content p-22">
                <ul class="post-meta post-meta--3 ul_li mb-6">
                    <li class="author"><i class="fas fa-user"></i><?php the_author()?></li>
                    <li class="date"><i class="fas fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></li>
                </ul>
                <h2 class="post-title border-effect-2 fs-16"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                <?php if(!empty($settings['readmore_text'])):?>
                <div class="read-more mt-6">
                    <a href="<?php the_permalink();?>"><?php echo esc_html($settings['readmore_text']); ?> <i class="far fa-angle-double-right"></i></a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php } wp_reset_query(); } ?>
</div>