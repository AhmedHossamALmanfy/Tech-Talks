<?php
//Blog Sidebar Team Widget
class Glox_Team_Post extends WP_Widget{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Glox_Team_Post', /* Name */esc_html__('Glox Team Post', 'aginco'), array( 'description' => esc_html__('Show the Team Post', 'aginco')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);

        echo wp_kses_post($before_widget); ?>

		<div class="author-widget">
            <div class="widget-content">
                <?php 
					$args = array('post_type' => 'glow_team', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'team_cat','field' => 'id','terms' => (array)$instance['cat']));
					$this->posts($args);
				?>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $number = ($instance) ? esc_attr($instance['number']) : 1;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'aginco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php
                while ($query->have_posts()): $query->the_post(); 
                if(get_post_meta(get_the_ID(), 'glow_team_meta', true)) {
                    $team_meta = get_post_meta(get_the_ID(), 'glow_team_meta', true);
                    } else {
                        $team_meta = array();
                    }
                
                    if( array_key_exists( 'tem_designation', $team_meta )) {
                        $tem_designation = $team_meta['tem_designation'];
                    } else {
                        $tem_designation = '';
                    }

                    if( array_key_exists( 'tem_social_icon', $team_meta )) {
                        $tem_social_icon = $team_meta['tem_social_icon'];
                    } else {
                        $tem_social_icon = '';
                    }
			?>
            <div class="author-image">
                <?php the_post_thumbnail(); ?>
            </div>
            <h4><?php the_title(); ?></h4>
            <div class="designation"><?php echo esc_html($tem_designation);?></div>
            <div class="text"><?php echo wp_trim_words( get_the_content(), 20, '...' );?></div>
            <!-- Social Box -->
			<ul class="social-box">
                <?php foreach($tem_social_icon as $item):?>
                    <a href="<?php echo esc_url($item['social_link']);?>"><i class="<?php echo esc_attr($item['social_icon']);?>"></i></a>
                <?php endforeach;?>
             </ul>
            
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}