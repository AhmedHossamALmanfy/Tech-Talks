<div class="post-content mt-25">
    <?php if(function_exists('magezix_entry_tags_list') && true == cs_get_option('blog_tag_switcher')):?>
    <ul class="post-tags post-tags--2 ul_li mb-15">        
        <?php magezix_entry_tags_list();?>
    </ul>  
    <?php endif;?>  
    <h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
    <ul class="post-meta post-meta--4 style-2 ul_li mt-10">
        <li>
            <?php if (true == cs_get_option('blog_admin_switcher')): ?>
                <div class="post-meta__author ul_li">
                    <div class="avatar">
                        <?php magezix_main_author_avatars(22);?>
                    </div>
                    <span><?php the_author()?>
                    <?php
                    if(function_exists('magezix_ready_time_ago')){ ?>
                        / <span class="year"><?php echo magezix_ready_time_ago();?></span>
                    <?php }
                    ?>
                    </span>
                </div>
            <?php endif; ?>
        </li>
        <?php if (true == cs_get_option('blog_comment_switcher')): ?>
            <li><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
        <?php endif; ?>
        <?php if (true == cs_get_option('blog_reading_switcher')): ?>
            <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
        <?php endif; ?>
    </ul>
    <?php the_excerpt();?>
</div>