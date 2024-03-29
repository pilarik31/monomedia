<?php
/**
 * Our team page section
 *
 * @package monomedia
 */

echo '<section class="our-team" id="team">';
	echo '<div class="container">';
		echo '<div class="section-header">';


		$zerif_ourteam_title = get_theme_mod( 'zerif_ourteam_title', __( 'YOUR TEAM', 'zerif-lite' ) );

if ( ! empty( $zerif_ourteam_title ) ) {
	echo '<h2 class="dark-text">' . esc_html__( $zerif_ourteam_title, 'zerif-lite' ) . '</h2>';
}

		$zerif_ourteam_subtitle = get_theme_mod( 'zerif_ourteam_subtitle', __( 'Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'zerif-lite' ) );

if ( ! empty( $zerif_ourteam_subtitle ) ) {
	echo '<h6>' . esc_html__( $zerif_ourteam_subtitle, 'zerif-lite' ) . '</h6>';
}


		echo '</div>';


if ( is_active_sidebar( 'sidebar-ourteam' ) ) {
	echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';
		dynamic_sidebar( 'sidebar-ourteam' );
	echo '</div> ';
} else {
	echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';
		the_widget(
			'zerif_team_widget',
			'name=ASHLEY SIMMONS&position=Project Manager&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri=' . get_template_directory_uri() . '/images/team1.png',
			array(
				'before_widget' => '',
				'after_widget'  => '',
			)
		);
		the_widget(
			'zerif_team_widget',
			'name=TIMOTHY SPRAY&position=Art Director&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri=' . get_template_directory_uri() . '/images/team2.png',
			array(
				'before_widget' => '',
				'after_widget'  => '',
			)
		);
		the_widget(
			'zerif_team_widget',
			'name=TONYA GARCIA&position=Account Manager&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri=' . get_template_directory_uri() . '/images/team3.png',
			array(
				'before_widget' => '',
				'after_widget'  => '',
			)
		);
		the_widget(
			'zerif_team_widget',
			'name=JASON LANE&position=Business Development&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri=' . get_template_directory_uri() . '/images/team4.png',
			array(
				'before_widget' => '',
				'after_widget'  => '',
			)
		);
	echo '</div>';
}



	echo '</div>';


echo '</section>';


