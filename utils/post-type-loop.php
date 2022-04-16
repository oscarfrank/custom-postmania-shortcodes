<?php

function custom_post_list($atts, $content = null){

    extract(shortcode_atts(array(
        'type' => 'post',
        'tax' => '',
        'slug' => '',
        'num' => '5',
        'orderby' => 'date',
        'order' => 'ASC',
        'title' => '',
        'table' => 'true',
    ), $atts));

    
    if($tax != '' && $slug == ''){
        $pterms = get_the_terms( get_the_ID(), $tax  );
             
            if( $pterms ) {
                 
                $ptermnames[] = 0;
                         
                foreach( $pterms as $pterm ) {  
                     
                    $ptermnames[] = $pterm->name;           
                }
            }

            $slug = $ptermnames;
    }
 
    $args = array(
                    'post_type' => $type,
                    'category_name' => $category,
                    'tag' => $tag,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $tax,
                            'field'    => 'slug',
                            'terms'    => $slug,
                        ),
                    ),
                    'posts_per_page' => $num,
                    'publish_status' => 'published',
                    'order' => $order,
                    'orderby' => $orderby,
                 );
 
    $result = '';

    if($title != ''){
        $result .= '<h4>'.$title.'</h4>';
    }

    $query = new WP_Query($args);
    if($query->have_posts()) {


        // When Table isn't Turned ON
        if($table == 'true'){
            while($query->have_posts()) {
                $query->the_post();
                $result .= '<div class="ircp-link">'.get_the_title().' - <a href="'. get_the_permalink() .'" title="'.get_the_title().'" class="ircp-button">Apply Now</a></div>';
            }
    
            wp_reset_postdata();
            return '<div class="ircp-section"><ul class="ircp-custom-list">'. $result .'</ul></div>';

        } else {

            while($query->have_posts()) {
                $query->the_post();
                $result .= '<li><a href="'. get_the_permalink() .'" title="'.get_the_title().'" >'. get_the_title() .'</a></li>';
    
            }
    
            wp_reset_postdata();
            return '<div class="ircp-section"><ul class="ircp-custom-list">'. $result .'</ul></div>';
        }
        
          
    }  
}

?>