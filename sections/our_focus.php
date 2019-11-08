<section class="focus" id="focus">
<div class="container">
	<!-- SECTION HEADER -->
	<div class="section-header">
		<!-- SECTION TITLE -->
		<?php
		echo '<h2 class="dark-text">' . esc_html__( 'SLUŽBY' ) . '</h2>';
		echo '<h6>' . esc_html__('Lorem ipsum dolor sit amet' ) . '</h6>';
		?>
	</div>

	<div class="row">
		<?php

			if ( is_active_sidebar( 'sidebar-ourfocus' ) ) :

				dynamic_sidebar( 'sidebar-ourfocus' );

			else :

				the_widget(
					'zerif_ourfocus',
					'title=PARALLAX EFFECT&text=Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.&link=#&image_uri=' . get_stylesheet_directory_uri() . '/images/parallax.png',
					array(
						'before_widget' => '',
						'after_widget'  => '',
					)
				);

				the_widget(
					'zerif_ourfocus',
					'title=WOOCOMMERCE&text=Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.&link=#&image_uri=' . get_stylesheet_directory_uri() . '/images/woo.png',
					array(
						'before_widget' => '',
						'after_widget'  => '',
					)
				);

				the_widget(
					'zerif_ourfocus',
					'title=CUSTOM CONTENT BLOCKS&text=Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.&link=#&image_uri=' . get_stylesheet_directory_uri() . '/images/ccc.png',
					array(
						'before_widget' => '',
						'after_widget'  => '',
					)
				);

				the_widget(
					'zerif_ourfocus',
					'title=GO PRO FOR MORE FEATURES&text=Get new content blocks: pricing table, Google Maps, and more. Change the sections order, display each block exactly where you need it, customize the blocks with whatever colors you wish.&link=#&image_uri=' . get_stylesheet_directory_uri() . '/images/ti-logo.png',
					array(
						'before_widget' => '',
						'after_widget'  => '',
					)
				);

			endif;

			?>



	</div>



</div> <!-- / END CONTAINER -->



</section>  <!-- / END FOCUS SECTION -->