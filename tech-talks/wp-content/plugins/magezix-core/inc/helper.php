<?php

function magezix_post_author_avatars($size) {
    echo get_avatar(get_the_author_meta('email'), $size);
}

add_action('genesis_entry_header', 'magezix_post_author_avatars');

/**
 * All Category List
 */
function magezix_post_category (){
    $terms = get_terms( array(
        'taxonomy'    => 'category',
        'hide_empty'  => true
    ) );

    $cat_list = [];
    foreach($terms as $post) {
    $cat_list[$post->slug]  = [$post->name];
    }
    return $cat_list;
}

if ( ! function_exists( 'magezix_item_tag_lists' ) ) {
    function magezix_item_tag_lists(  $type = '', $query_args = array() ) {

      $options = array();

      switch( $type ) {

        case 'pages':
        case 'page':
        $pages = get_pages( $query_args );

        if ( !empty($pages) ) {
          foreach ( $pages as $page ) {
            $options[$page->post_title] = $page->ID;
          }
        }
        break;

        case 'posts':
        case 'post':
        $posts = get_posts( $query_args );

        if ( !empty($posts) ) {
          foreach ( $posts as $post ) {
            $options[$post->post_title] = lcfirst($post->ID);
          }
        }
        break;

        case 'tags':
        case 'tag':

        if (isset($query_args['taxonomies']) && taxonomy_exists($query_args['taxonomies'])) {
          $tags = get_terms( $query_args['taxonomies'] );
            if ( !is_wp_error($tags) && !empty($tags) ) {
              foreach ( $tags as $tag ) {
                $options[$tag->name] = $tag->term_id;
            }
          }
        }
        break;
      }

      return $options;

    }
}


/**
 * Post Tag List
 */
function magezix_pl_tag_lists(){ ?>
  <ul class="post-tags ul_li mt-20 ul_li_center">
        <li><span><?php esc_html_e( '# Tags', 'magezix-core' );?></span></li>
        <?php
            $tags = get_tags();
            foreach ( $tags as $tag ) :
            $tag_link = get_tag_link( $tag->term_id );
        ?>
        <li>
            <a href='<?php echo esc_url($tag_link); ?>' title='<?php echo esc_html($tag->name);?>' class='<?php echo esc_attr($tag->slug) ?>'><?php echo esc_html($tag->name); ?></a>
        </li>
        <?php endforeach;?>
    </ul>
    <?php
}
/**
 * Post Time Ago
 */
function magezix_ready_time_ago(){
  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
}


/**
 * Post Social Share
 *
 * @return void
 */
function magezix_post_share() {

  $permalink = get_permalink( get_the_ID() );
  $title     = get_the_title();
?>
<ul class="post-share ul_li mt-30">
  <li><a class="fb" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>"><i class="fab fa-facebook-f"></i></a></li>

  <li><a class="tw" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-twitter"></i></a></li>

  <li><a class="ln" onClick="window.open('https://www.linkedin.com/cws/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Linkedin share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-linkedin-in"></i></a></li>

  <li><a class="pt" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fab fa-pinterest-p"></i></a></li>

  <!-- instagram share -->
  <li><a class="in" onClick="window.open('https://www.instagram.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Instagram share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-instagram"></i></a></li>

</ul>
<?php
}
/**
 * Post Social Style Two Share
 *
 * @return void
 */
function magezix_post_two_share() {

  $permalink = get_permalink( get_the_ID() );
  $title     = get_the_title();
?>

<div class="social-share d-flex align-items-center mt-30">
  <h5 class="title">
  <?php
    $translated_string = __( 'Share:', 'magezix-core' );
    echo esc_html($translated_string);
  ?>
</h5>
  <ul class="ul_li">
    <li><a class="fb" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>"><i class="fab fa-facebook-f"></i></a></li>

    <li><a class="tw" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-twitter"></i></a></li>

    <li><a class="ln" onClick="window.open('https://www.linkedin.com/cws/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Linkedin share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-linkedin-in"></i></a></li>

    <li><a class="pt" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fab fa-pinterest-p"></i></a></li>

    <li><a class="in" onClick="window.open('https://www.instagram.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Instagram share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-instagram"></i></a></li>
  </ul>
</div>
<?php
}


/**
 * Post get View Count
 */
function magezix_get_views( $id = false ) {
  if ( !$id ) {
      $id = get_the_ID();
  }

  $number = get_post_meta( $id, '_magezix_views_count', true );
  $precision = 2;
  if ( empty( $number ) ) {
      $number = 0;
  }

  if ( $number >= 1000 && $number < 1000000 ) {
      $formatted = number_format( $number / 1000, $precision ) . 'K';
  } else if ( $number >= 1000000 && $number < 1000000000 ) {
      $formatted = number_format( $number / 1000000, $precision ) . 'M';
  } else if ( $number >= 1000000000 ) {
      $formatted = number_format( $number / 1000000000, $precision ) . 'B';
  } else {
      $formatted = $number;
  }
  $formatted = str_replace( '.00', '', $formatted );

  return $formatted;
}

/**
* Post Update View Count
*/
function magezix_update_views() {
  if ( !is_single() || !is_singular( 'post' ) ) {
      return;
  }

  $id = get_the_ID();

  $number = get_post_meta( $id, '_magezix_views_count', true );
  if ( empty( $number ) ) {
      $number = 1;
      add_post_meta( $id, '_magezix_views_count', $number );
  } else {
      $number++;
      update_post_meta( $id, '_magezix_views_count', $number );
  }
}
add_action( 'wp', 'magezix_update_views' );