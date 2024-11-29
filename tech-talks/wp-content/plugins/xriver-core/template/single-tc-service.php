<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  xriver
 */
get_header();

?>
    <?php
        $id = get_the_ID();
        if( have_posts() ):
        while( have_posts() ): the_post();
    ?>
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <?php the_content(); ?>
                </div>
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar service-sidebar sticky-top">
                        <?php nextbit_movie_sidebar_func(); ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <?php
        endwhile; wp_reset_query();
    endif;
    ?>


<?php get_footer();?>