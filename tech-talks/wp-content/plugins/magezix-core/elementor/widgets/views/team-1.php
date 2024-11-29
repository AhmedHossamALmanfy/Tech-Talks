<div class="columnist__item pos-rel mt-30">
    <div class="columnist__thumb">
        <img src="<?php echo esc_url($settings['team_img']['url']);?>" alt="<?php echo esc_attr($settings['team_img']['alt']);?>">
    </div>
    <div class="columnist__content">
        <h3 class="columnist__name"><?php echo esc_html($settings['authore_name']);?></h3>
        <span class="columnist__desc"><?php echo esc_html($settings['designation_txt']);?></span>
        <span class="columnist__tag"><?php echo esc_html($settings['designation']);?></span>
    </div>
    <div class="columnist__social-wrap">
        <span class="plus-icon"><i class="fal fa-plus"></i></span>
        <ul class="columnist__social">             
            <?php foreach($settings['socials'] as $item):?>
                <li><a href="<?php echo esc_url($item['link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>