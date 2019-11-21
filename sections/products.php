<?php

/**
 * Products main page section
 *
 * @package monomedia
 */

echo '<section class="products" id="products">';
echo '<div class="container">';
/* SECTION HEADER */
echo '<div class="section-header">';


/* title */
echo '<h2 class="dark-text">' . esc_html__( 'PRODUKTY' ) . '</h2>';


/* subtitle */
$zerif_latestnews_subtitle = get_theme_mod( 'zerif_latestnews_subtitle' );
if ( ! empty( $zerif_latestnews_subtitle ) ) {
	echo '<h6 class="dark-text">' . $zerif_latestnews_subtitle . '</h6>';
}
/* START */
?>
<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
		<section class="page-section">
			<!-- <div class="container"> -->
			<div class="product-box">
				<?php
				$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$wp_query = new WP_Query(
					array(
						'post_type' => 'post',
						'showposts' => '8',
						'paged'     => $paged,
					)
				);

				if ( $wp_query->have_posts() ) {

					while ( $wp_query->have_posts() ) {

						$wp_query->the_post();
						get_template_part( 'content-grid', get_post_format() );
					}
				}

				zerif_paging_nav();

				wp_reset_postdata();
				?>
			</div>
			<!-- </div> -->
		</section>
	</main><!-- #main -->

</div><!-- #primary -->



<?php
/* END */



echo '</div><!-- END .section-header -->';
echo '<div class="clear"></div>';

echo '</div><!-- .container -->';
echo '</section>';
