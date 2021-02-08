<?php 

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 

function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 

}

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Верхнее меню' );
}


if ( ! function_exists( 'cart_link' ) ) {
	function cart_link() {
		?>
        <a href="/cart/" class="cart">
            <?if( WC()->cart->cart_contents_count > 0):?>
                <i class="count"><?//= WC()->cart->get_cart_total();?></i>
            <?endif;?>
        </a>
		<?
	}
}

//Ajax Обновление кратких данных из корзины
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
    <a href="/cart/" class="cart">
        <?if( WC()->cart->cart_contents_count > 0):?>
                    <i class="count"><?//= WC()->cart->get_cart_total();?></i>
                <?endif;?>
        </a>
	<?php
	$fragments['a.cart'] = ob_get_clean();
	return $fragments;
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
