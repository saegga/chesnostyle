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
                <p class="name">Надежда Чеснокова</p>
                <span class="descr">Персональный стилист</span>
            </div>
            <div class="header-menu">
                <ul>
                    <li><a href=""></a>Начни Здесь</li>
                    <li><a href=""></a>О стиле понятно</li>
                    <li><a href=""></a>Курсы</li>
                </ul>
            </div>
            <div class="header-user-info">

            </div>
        </div>
    </div>
</header>
