<span class="politics-sec-heading">Trending</span>
<?php
    if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
    $query->the_post();
        $mgthumb_size = 'full';
        $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
        $tags = get_the_tags(get_the_ID());
?> 
<div class="tx-post tx-post-overly tx-post-overly--md">
    <div class="post-thumb mzx-post__item br-0 hlg-595">
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
    </div>
    <div class="post-content">
        <h2 class="post-title border-effect fs-20"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
        <div class="tags-slide-wrap ul_li mt-20">
        <?php if($tags){ ?>
            <span><?php esc_html_e( '# Tags', 'magezix-core' );?></span>
            <div class="tags-slide owl-carousel">
            <?php foreach ( $tags as $tag ) :
               $tag_link = get_tag_link( $tag->term_id );?>
                <div class="item">
                    <a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } wp_reset_query(); } ?>
