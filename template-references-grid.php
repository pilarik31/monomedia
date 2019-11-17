<?php
/*
Template Name: References grid
*/
get_header();
?>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-12">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main">
					<section class="page-section" id="portfolio">
						<div class="container">
							<div class="portfolio-box">
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
							</div>
					</section>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<!-- <div class="sidebar-wrap col-md-3 content-left-wrap"> -->

			<?php// get_sidebar(); ?>

		<!-- </div> .sidebar-wrap -->

	</div><!-- .container -->
	<?php
	get_footer();
	?>
