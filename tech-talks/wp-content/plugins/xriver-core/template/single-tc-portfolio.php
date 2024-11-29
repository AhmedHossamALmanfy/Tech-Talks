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
            $portfolio_nav_show = function_exists('get_field') ? get_field('portfolio_nav_show', $id) : '';

        ?>

        <section class="details_section section_space pt-0 pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <?php
                            the_content();

                            if( 1 == $portfolio_nav_show  ) :
                            if(!empty(get_previous_post() || get_next_post()) ) :
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="details_content">
                                    <div class="details_content_space pb-0">
                                        <div class="nextprev_post_wrap">
                                            <?php
                                                $xriver_prev_post = get_previous_post();
                                                if($xriver_prev_post) :
                                            ?>
                                            <a class="prev_post" href="<?php print get_the_permalink($xriver_prev_post); ?>">
                                                <i class="fal fa-long-arrow-left"></i> <?php print esc_html__( 'Prev project', 'xriver' );?>
                                            </a>

                                            <a class="view_more" href="<?php get_the_permalink(); ?>">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 0H7V7H0V0ZM9 0V7H16V0H9ZM0 16H7V9H0V16ZM9 16H16V9H9V16Z" fill="white"/>
                                                </svg>
                                            </a>
                                            <?php endif; ?>
                                            <?php
                                                $xriver_next_post = get_next_post();
                                                if ( $xriver_next_post ) :
                                            ?>
                                            <a class="next_post" href="<?php print get_the_permalink($xriver_next_post); ?>">
                                                <?php print esc_html__( 'Next project', 'xriver' );?>
                                                <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            endif;
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
            endwhile; wp_reset_query();
        endif;
        ?>


<?php get_footer();?>