<?php 

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 

function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 

}

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Верхнее меню' );
}


function dcwd_get_cart_icon_with_count() {
	if ( class_exists( 'WC_Quotation' ) ) {
		$cart_item_count = count( WC_Adq()->quote->get_quote() );
	}
	else {
		$cart_item_count = WC()->cart->get_cart_contents_count();
	}

	$cart_count_span = '';
	if ( $cart_item_count ) {
		$cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
	}
	
	if ( class_exists( 'WC_Quotation' ) ) {
		$cart_url = StaticAdqQuoteRequest::get_quote_list_link();
	}
	else {
		$cart_url = get_permalink( wc_get_page_id( 'cart' ) );
	}
	$cart_link = '<a class="cart-icon" href="' . $cart_url . '"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a>';

	return $cart_link;
}


// Add cart icon to the top of page content.
add_filter( 'the_content', 'dcwd_add_cart_icon_to_top_of_content' );
function dcwd_add_cart_icon_to_top_of_content( $content ) {
	if ( is_single() || is_page() ) {
		// Add the cart link to the start of the content.
		return dcwd_get_cart_icon_with_count() . $content;
	}

	return $content;
}

// Add to top of shop, product category archive pages and cart pages
add_action( 'woocommerce_archive_description', 'dcwd_add_cart_icon_to_top_of_wc_pages' );
// Add to top of single product pages.
add_action( 'woocommerce_before_single_product', 'dcwd_add_cart_icon_to_top_of_wc_pages' );
function dcwd_add_cart_icon_to_top_of_wc_pages() {
	echo dcwd_get_cart_icon_with_count();
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
