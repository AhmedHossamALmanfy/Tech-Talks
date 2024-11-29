<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

class Magezix_Category_List extends WP_Widget {


	function __construct() {
        $widget_opt = array(
            'classname'		 => 'magezix-category-list',
            'description'	 => esc_html__('Magezix Category List','magezix-core')
        );

        parent::__construct( 'Magezix_Category_List', esc_html__( 'Magezix Category List', 'magezix-core' ), $widget_opt );
    }

	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$va_category_HTML ='<ul class="widget__category">';
		if ( ! empty( $instance['magezix_title'] ) && !$instance['magezix_hide_title']) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['magezix_title'] ) . $args['after_title'];
		}
		
		if(isset($instance['magezix_taxonomy_type'])){
				$args_val = array( 'hide_empty' => 'true', 'parent'=>0 );				
				$excludeCat= $instance['magezix_selected_categories'] ? $instance['magezix_selected_categories'] : '';
				$magezix_action_on_cat= $instance['magezix_action_on_cat'] ? $instance['magezix_action_on_cat'] : '';
				if($excludeCat && $magezix_action_on_cat!='')
				$args_val[$magezix_action_on_cat] = $excludeCat;
				
				$terms = get_terms( $instance['magezix_taxonomy_type'], $args_val );
				
				if ( !empty($terms) ) {	

					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term );
						
						if ( is_wp_error( $term_link ) ) {
						continue;
						}
						
					$carrentActiveClass='';	
					$category_image = '';
					if($term->taxonomy=='category' && is_category())
					{
                 $thisCat = get_category(get_query_var('cat'),false);
              
                
					  if($thisCat->term_id == $term->term_id)
						$carrentActiveClass='class="active-cat img_cat_item_list_Single"';
				    }
					 
					if(is_tax())
					{
					    $currentTermType = get_query_var( 'taxonomy' );
					    $termId= get_queried_object()->term_id;
						 if(is_tax($currentTermType) && $termId==$term->term_id)
                    $carrentActiveClass='class="active-cat img_cat_item_list_Single"';
                    
					}
                  

				$meta = get_term_meta($term->term_id, 'magezix_cate_meta', true);

				$icon_name = !empty( $meta['icon_name'] )? $meta['icon_name'] : '';
				 
						$va_category_HTML .='<li>
						<a  href="' . esc_url( $term_link ) . '">
                        <span class="icon"><i class="'.esc_attr($icon_name).'"></i></span>
                        <span class="cat-title">'. $term->name.'</span>
                        ';
						if (empty( $instance['magezix_hide_count'] )) {
						$va_category_HTML .='<span class="cat-number">('.$term->count.')</span>';
						}
                        $va_category_HTML .='
                        <span class="arrow-icon"><i class="fal fa-long-arrow-right"></i></span></a>
                        ';
                        
					}
				}
			
			}	
		$va_category_HTML .='</ul>';

		echo wp_kses_post($va_category_HTML);
		echo $args['after_widget'];
	}


	public function form( $instance ) {
		$magezix_title 				= ! empty( $instance['magezix_title'] ) ? $instance['magezix_title'] : esc_html__( 'WP Categories', 'magezix-core' );
		$magezix_hide_title 			= ! empty( $instance['magezix_hide_title'] ) ? $instance['magezix_hide_title'] : '';
		$magezix_taxonomy_type 			= ! empty( $instance['magezix_taxonomy_type'] ) ? $instance['magezix_taxonomy_type'] : esc_html__( 'category', 'magezix-core' );
		$magezix_selected_categories 	= (! empty( $instance['magezix_selected_categories'] ) && ! empty( $instance['magezix_action_on_cat'] ) ) ? $instance['magezix_selected_categories'] : array();
		$magezix_action_on_cat 			= ! empty( $instance['magezix_action_on_cat'] ) ? $instance['magezix_action_on_cat'] : '';
		$magezix_hide_count 			= ! empty( $instance['magezix_hide_count'] ) ? $instance['magezix_hide_count'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'magezix_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'magezix_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'magezix_title' ) ); ?>" type="text" value="<?php echo esc_attr( $magezix_title ); ?>">
		</p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'magezix_hide_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'magezix_hide_title' ) ); ?>" type="checkbox" value="1" <?php checked( $magezix_hide_title, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'magezix_hide_title' ) ); ?>"><?php _e( esc_attr( 'Hide Title' ) ); ?> </label> 
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'magezix_taxonomy_type' ) ); ?>"><?php _e( esc_attr( 'Taxonomy Type:' ) ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'magezix_taxonomy_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'magezix_taxonomy_type' ) ); ?>">
					<?php 
					$args = array(
					  'public'   => true,
					  '_builtin' => false
					  
					); 
					$output = 'names'; // or objects
					$operator = 'and'; // 'and' or 'or'
					$taxonomies = get_taxonomies( $args, $output, $operator ); 
					array_push($taxonomies,'category');
					if ( !empty($taxonomies) ) {
					foreach ( $taxonomies as $taxonomy ) {

						echo '<option value="'.$taxonomy.'" '.selected($taxonomy,$magezix_taxonomy_type).'>'.$taxonomy.'</option>';
					}
					}

				?>    
		</select>
		</p>
		<p>
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'magezix_action_on_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'magezix_action_on_cat' ) ); ?>">
           <option value="" <?php selected($magezix_action_on_cat,'' )?> > <?php echo esc_html__('Show All Category','magezix-core').' :'; ?> </option>       
           <option value="include" <?php selected($magezix_action_on_cat,'include' )?> > <?php echo esc_html__("Include Selected Category:","magezix-core"); ?> </option>       
           <option value="exclude" <?php selected($magezix_action_on_cat,'exclude' )?> > <?php echo esc_html__("Exclude Selected Category","magezix-core").' :'; ?> </option>
		</select> 
		<select class="widefat magezix-category-widget" id="<?php echo esc_attr( $this->get_field_id( 'magezix_selected_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'magezix_selected_categories' ) ); ?>[]" multiple>
					<?php 			
					if($magezix_taxonomy_type){
					$args = array( 'hide_empty=0' );
					$terms = get_terms( $magezix_taxonomy_type, $args );
			        echo '<option value="" '.selected(true, in_array('',$magezix_selected_categories), false).'>'.esc_html('None ','magezix-core').'</option>';
					if ( !empty($terms) ) {
					foreach ( $terms as $term ) {
						echo '<option value="'.$term->term_id.'" '.selected(true, in_array($term->term_id,$magezix_selected_categories), false).'>'.$term->name.'</option>';
					}
				    	
					}
				}

				?>    
		</select>
		</p>
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'magezix_hide_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'magezix_hide_count' ) ); ?>" type="checkbox" value="1" <?php checked( $magezix_hide_count, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'magezix_hide_count' ) ); ?>"><?php echo esc_attr__( 'Hide Count','magezix-core' ) ; ?> </label> 
		</p>
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['magezix_title'] 					= ( ! empty( $new_instance['magezix_title'] ) ) ? strip_tags( $new_instance['magezix_title'] ) : '';
		$instance['magezix_hide_title'] 			= ( ! empty( $new_instance['magezix_hide_title'] ) ) ? strip_tags( $new_instance['magezix_hide_title'] ) : '';
		$instance['magezix_taxonomy_type'] 			= ( ! empty( $new_instance['magezix_taxonomy_type'] ) ) ? strip_tags( $new_instance['magezix_taxonomy_type'] ) : '';
		$instance['magezix_selected_categories'] 	= ( ! empty( $new_instance['magezix_selected_categories'] ) ) ? $new_instance['magezix_selected_categories'] : '';
		$instance['magezix_action_on_cat'] 			= ( ! empty( $new_instance['magezix_action_on_cat'] ) ) ? $new_instance['magezix_action_on_cat'] : '';
		$instance['magezix_hide_count'] 			= ( ! empty( $new_instance['magezix_hide_count'] ) ) ? strip_tags( $new_instance['magezix_hide_count'] ) : '';
		return $instance;
	}
}


