<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;

$neeon_team_position 		= get_post_meta( $post->ID, 'neeon_team_position', true );
$neeon_team_website       	= get_post_meta( $post->ID, 'neeon_team_website', true );
$neeon_team_email    		= get_post_meta( $post->ID, 'neeon_team_email', true );
$neeon_team_phone    		= get_post_meta( $post->ID, 'neeon_team_phone', true );
$neeon_team_address    		= get_post_meta( $post->ID, 'neeon_team_address', true );
$neeon_team_skill       	= get_post_meta( $post->ID, 'neeon_team_skill', true );
$neeon_team_counter      	= get_post_meta( $post->ID, 'neeon_team_count', true );
$socials        			= get_post_meta( $post->ID, 'neeon_team_socials', true );
$socials        			= array_filter( $socials );
$socials_fields 			= NeeonTheme_Helper::team_socials();

$neeon_team_contact_form 	= get_post_meta( $post->ID, 'neeon_team_contact_form', true );

$thumb_size = 'neeon-size6';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-content">
		<div class="row">			
			<div class="col-lg-8 col-12">
				<div class="team-content">
					<div class="team-heading">
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php if ( $neeon_team_position ) { ?>
						<span class="designation"><?php echo esc_html( $neeon_team_position );?></span>
						<?php } ?>
					</div>
					<?php the_content();?>
					<?php if ( !empty( $socials ) ) { ?>
					<ul class="team-social">
						<?php foreach ( $socials as $key => $value ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>						
					<?php } ?>
				</div>
				<!-- Team Skills -->
				<?php if ( NeeonTheme::$options['team_skill'] ) { ?>
					<?php if ( !empty( $neeon_team_skill ) ) { ?>
					<div class="rt-skill-wrap">
						<div class="rt-skills">
							<h4><?php esc_html_e( 'Skill', 'neeon' );?></h4>
							<?php foreach ( $neeon_team_skill as $skill ): ?>
								<?php
								if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
									continue;
								}
								$skill_value = (int) $skill['skill_value'];
								$skill_style = "width:{$skill_value}%; animation-name: slideInLeft;";

								if ( !empty( $skill['skill_color'] ) ) {
									$skill_style .= "background-color:{$skill['skill_color']};";
								}
								?>
								<div class="rt-skill-each">
									<div class="rt-name"><?php echo esc_html( $skill['skill_name'] );?></div>
									<div class="progress">
										<div class="progress-bar progress-bar-striped wow slideInLeft animated" data-wow-delay="0s" data-wow-duration="3s" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?>"> <span><?php echo esc_html( $skill_value );?>%</span></div>
									</div>								
								</div>
							<?php endforeach;?> 
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-lg-4 col-12">
				<div class="team-thumb">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						} else {
							if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>	
				</div>
				<!-- Team info -->
				<?php if ( NeeonTheme::$options['team_info'] ) { ?>
				<?php if ( !empty( $neeon_team_website ) ||  !empty( $neeon_team_phone ) || !empty( $neeon_team_email ) || !empty( $neeon_team_address )) { ?>
				<div class="team-info">
					<h4><?php esc_html_e( 'Info', 'neeon' );?></h4>
					<ul>
						<?php if ( !empty( $neeon_team_website ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Website', 'neeon' );?> : </span><?php echo esc_html( $neeon_team_website );?></li>
						<?php } if ( !empty( $neeon_team_phone ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Phone', 'neeon' );?> : </span><a href="tel:<?php echo esc_html( $neeon_team_phone );?>"><?php echo esc_html( $neeon_team_phone );?></a></li>
						<?php } if ( !empty( $neeon_team_email ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Email', 'neeon' );?> : </span><a href="mailto:<?php echo esc_html( $neeon_team_email );?>"><?php echo esc_html( $neeon_team_email );?></a></li>
						<?php } if ( !empty( $neeon_team_address ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Address', 'neeon' );?> : </span><?php echo esc_html( $neeon_team_address );?></li>	
						<?php } ?>
					</ul>
				</div>
				<?php } } ?>
			</div>		
		</div>
	</div>
	
	<?php if( NeeonTheme::$options['show_related_team'] == '1' && is_single() && !empty ( neeon_related_team() ) ) { ?>
	<div class="related-post">
		<?php echo neeon_related_team(); ?>
	</div>
	<?php } ?>
</div>