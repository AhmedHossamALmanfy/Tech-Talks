<!-- featured post start -->
<section class="featured__post featured__post--2 overflow-hidden">
    <div class="row mt-none-30">
    <?php
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
            $mgthumb_size = 'magezix-362x527';
            $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
    ?>
        <div class="col-xl-3 col-lg-6 col-md-6 mt-30">
            <div class="featured__post-single tx-post tx-post-overly tx-post-overly--lg">
                <div class="post-thumb hlg-350 br-8">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                </div>
                <div class="post-content w-100">
                    <?php
                        if(function_exists('magezix_category_name')){
                            magezix_category_name();
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
        <?php } wp_reset_query(); } ?>
    </div>
</section>
<!-- featured post end -->