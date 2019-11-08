<?php
echo '<div class="header-content-wrap">';
echo '<div class="container">';

echo '<h1 class="intro-text">'
. esc_html__( 'VÍTEJTE NA STRÁNKÁCH REKLAMNÍ AGENTURY MONOMEDIA.CZ' )
. '</h1>';


// $zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label', __( 'Features', 'zerif-lite' ) );
// $zerif_bigtitle_redbutton_url = get_theme_mod( 'zerif_bigtitle_redbutton_url', esc_url( home_url( '/' ) ) . '#focus' );
// $zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label', __( "What's inside", 'zerif-lite' ) );
// $zerif_bigtitle_greenbutton_url = get_theme_mod( 'zerif_bigtitle_greenbutton_url', esc_url( home_url( '/' ) ) . '#focus' );

// if ( ( ! empty( $zerif_bigtitle_redbutton_label ) && ! empty( $zerif_bigtitle_redbutton_url ) ) ||

// ( ! empty( $zerif_bigtitle_greenbutton_label ) && ! empty( $zerif_bigtitle_greenbutton_url ) ) ) :


echo '<div class="buttons">';


// if ( ! empty( $zerif_bigtitle_redbutton_label ) && ! empty( $zerif_bigtitle_redbutton_url ) ) :


echo '<a href="#" class="btn btn-primary custom-button red-btn">'
. esc_html__( 'Butt 1' )
. '</a>';


// endif;


// if ( ! empty( $zerif_bigtitle_greenbutton_label ) && ! empty( $zerif_bigtitle_greenbutton_url ) ) :


echo '<a href="#" class="btn btn-primary custom-button green-btn">'
. esc_html__( 'Butt 2' ) . '</a>';


// endif;


echo '</div>';


// endif;





echo '</div>';

echo '</div><!-- .header-content-wrap -->';

echo '<div class="clear"></div>';
