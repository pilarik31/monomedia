<?php
/**
 * Clients section
 *
 * @package monomedia
 */

echo '<section class="testimonial" id="testimonials">';
	echo '<div class="container">';
		echo '<div class="section-header">';

			echo '<h2 class="white-text">' . esc_html__( 'naši klienti', 'zerif-lite' ) . '</h2>';
			echo '<h6 class="white-text">' . esc_html__( '', 'zerif-lite' ) . '</h6>';

		echo '</div>';


		echo '<div class="row" data-scrollreveal="enter right after 0s over 1s">';
			echo '<div class="col-md-12">';
				echo '<div id="client-feedbacks" class="owl-carousel owl-theme">';

					if ( is_active_sidebar( 'sidebar-testimonials' ) ) {
						dynamic_sidebar( 'sidebar-testimonials' );
					} else {
						the_widget( 'zerif_testimonial_widget', 'title=Dana Lorem&text=Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec sem vel sapien venenatis mattis non vitae augue. Nullam congue commodo lorem vitae facilisis. Suspendisse malesuada id turpis interdum dictum.&image_uri=' . get_stylesheet_directory_uri() . '/images/testimonial1.jpg' );
						the_widget( 'zerif_testimonial_widget', 'title=Linda Guthrie&text=Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec sem vel sapien venenatis mattis non vitae augue. Nullam congue commodo lorem vitae facilisis. Suspendisse malesuada id turpis interdum dictum.&image_uri=' . get_stylesheet_directory_uri() . '/images/testimonial2.jpg' );
						the_widget( 'zerif_testimonial_widget', 'title=Cynthia Henry&text=Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec sem vel sapien venenatis mattis non vitae augue. Nullam congue commodo lorem vitae facilisis. Suspendisse malesuada id turpis interdum dictum.&image_uri=' . get_stylesheet_directory_uri() . '/images/testimonial3.jpg' );
					}



				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</section>';
