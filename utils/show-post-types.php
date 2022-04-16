<?php

function show_post_types() {

    $args = array(
        'public'   => true,
        '_builtin' => false
    );

    $result = '';

    $output = 'names'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'

    $post_types = get_post_types( $args, $output, $operator ); 

    foreach ( $post_types  as $post_type ) {

       $result .= '<strong>"' . $post_type . '",</strong> ';
    }
    
    return $result;
}

?>