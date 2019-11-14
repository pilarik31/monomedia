<?php

/**
 * The Header the theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package monomedia
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
	<![endif]-->
	<?php wp_head(); ?>

	<!-- Smartsupp Live Chat script -->
	<!-- <script type="text/javascript">
		var _smartsupp = _smartsupp || {};
		_smartsupp.key = '8a638cd4a0fde18249442254c6b63f3041fae170';
		window.smartsupp || (function (d) {
			var s, c, o = smartsupp = function () {
				o._.push(arguments)
			};
			o._ = [];
			s = d.getElementsByTagName('script')[0];
			c = d.createElement('script');
			c.type = 'text/javascript';
			c.charset = 'utf-8';
			c.async = true;
			c.src = '//www.smartsuppchat.com/loader.js?';
			s.parentNode.insertBefore(c, s);
		})(document);
	</script> -->

</head>



<?php
if ( isset( $_POST['scrollPosition'] ) ) {
	?>

<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval( $_POST['scrollPosition'] ); ?>)">
	<?php
} else {
	?>

	<body <?php body_class(); ?>>

		<?php } ?>




		<!-- =========================
PRE LOADER
============================== -->
		<?php

		global $wp_customize;

		if ( is_front_page() && ! isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ) {
			$zerif_disable_preloader = get_theme_mod( 'zerif_disable_preloader' );

			if ( isset( $zerif_disable_preloader ) && ( $zerif_disable_preloader != 1 ) ) {
				echo '<div class="preloader">';
				echo '<div class="status">&nbsp;</div>';
				echo '</div>';
			}
		}
		?>


		<header id="home" class="header">

			<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

				<div class="container">

					<div class="navbar-header responsive-logo">

						<button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
							data-target=".bs-navbar-collapse">

							<span class="sr-only"><?php _e( 'Toggle navigation', 'zerif-lite' ); ?></span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

						</button>



						<?php
						echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="navbar-brand">';

						if ( file_exists( get_stylesheet_directory() . '/img/logo.png' ) ) {
							echo '<img src="' . get_stylesheet_directory_uri() . '/img/logo.png"
                                 alt="' . get_bloginfo( 'title' ) . '">';
						}
						echo '</a>';
						?>



					</div>

					<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" id="site-navigation">

						<?php
						if ( is_home() ) {
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'container'      => false,
									'menu_class'     => 'nav navbar-nav navbar-right responsive-nav main-nav-list',
									'fallback_cb'    => 'zerif_wp_page_menu',
								)
							);
						} else {
							wp_nav_menu(
								array(
									'theme_location' => 'secondary',
									'container'      => false,
									'menu_class'     => 'nav navbar-nav navbar-right responsive-nav main-nav-list',
									'fallback_cb'    => 'zerif_wp_page_menu',
								)
							);
						}

						?>

					</nav>

				</div>

			</div>

			<!-- / END TOP BAR -->
