<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
	elegant_description();
	elegant_keywords();
	elegant_canonical();

	/**
	 * Fires in the head, before {@see wp_head()} is called. This action can be used to
	 * insert elements into the beginning of the head before any styles or scripts.
	 *
	 * @since 1.0
	 */
	do_action( 'et_head_meta' );

	$template_directory_uri = get_template_directory_uri();
?>
	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="container">
        <div class="header-line">
            <div class="header-logo">
                <p class="name">
                    Надежда Чеснокова
                </p>
                <span class="descr">Персональный стилист</span>
            </div>
            <?
                    wp_nav_menu( [
                        'theme_location'  => 'top',
                        'menu'            => '', 
                        'container'       => 'div', 
                        'container_class' => 'header-menu', 
                        'container_id'    => '',
                        'menu_class'      => 'menu', 
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',
                    ] );
                ?>
            <div class="header-menu">
                <!-- <ul class="">
                    <li><a href="">Начни Здесь</a></li>
                    <li><a href="">О стиле понятно</a> </li>
                    <li><a href="">Курсы</a></li>
                    <li><a href="">Услуги</a></li>
                    <li><a href="">О проекте</a></li>
                </ul> -->
            </div>
            <div class="header-user-info">
                <a href="/my-account/" class="account"></a>
                <?php
					if ( ! $et_top_info_defined && ( ! $et_slide_header || is_customize_preview() ) ) {
						et_show_cart_total( array(
							'no_text' => true,
						) );
					}
					?>
                <a href="" class="cart">
                    <i class="count">1</i>
                </a>
            </div>
        </div>
    </div>
</header>
