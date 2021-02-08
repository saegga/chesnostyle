<?php 

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 

function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 

}

// if ( ! function_exists( 'et_builder_get_google_fonts' ) ) :
//     function et_builder_get_google_fonts() {
//        $google_fonts = array(
//             'customfontname' => array(
//                 'styles'        => '400',
//                 'character_set' => 'latin',
//                 'type'          => 'sans-serif',
//             ),
//         );

//         return apply_filters( 'et_builder_google_fonts', $google_fonts );
//     }
// endif;
