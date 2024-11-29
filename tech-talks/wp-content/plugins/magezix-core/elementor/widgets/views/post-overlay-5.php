
<div class="trending__post-middle">
    <?php
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
            $mgthumb_size = 'full';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
    ?>
    <div class="tx-post tx-post-overly">
        <div class="post-thumb hxl-590 br-5">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
        </div>
        <div class="post-content w-80">
            <?php
                if(function_exists('magezix_category_name')){
                    magezix_category_name();
                }
            ?>
            <h2 class="post-title border-effect fs-28"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
            <div class="post-meta ul_li mt-20">
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
    <?php } wp_reset_query(); } ?>
</div>