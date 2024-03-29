<?php get_header();


if ( get_option( 'show_on_front' ) == 'page' ) {
	?>
	<div class="clear"></div>
	</header> <!-- / END HOME SECTION  -->
	<div id="content" class="site-content">
		<div class="container">
			<div class="content-left-wrap col-md-9">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) {
							/* Start the Loop */
							while ( have_posts() ) {
								the_post();

								/*
								 *Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							}

							zerif_paging_nav();
						} else {
							get_template_part( 'content', 'none' );
						}
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .content-left-wrap -->

			<div class="sidebar-wrap col-md-3 content-left-wrap">
				<?php get_sidebar(); ?>
			</div><!-- .sidebar-wrap -->
		</div><!-- .container -->

		<?php

} else {
	if ( isset( $_POST['submitted'] ) ) {

		/* recaptcha */
		$zerif_contactus_sitekey        = get_theme_mod( 'zerif_contactus_sitekey' );
		$zerif_contactus_secretkey      = get_theme_mod( 'zerif_contactus_secretkey' );
		$zerif_contactus_recaptcha_show = get_theme_mod( 'zerif_contactus_recaptcha_show' );

		if ( isset( $zerif_contactus_recaptcha_show ) && $zerif_contactus_recaptcha_show != 1 && ! empty( $zerif_contactus_sitekey ) && ! empty( $zerif_contactus_secretkey ) ) {

				$captcha;

			if ( isset( $_POST['g-recaptcha-response'] ) ) {
				$captcha = $_POST['g-recaptcha-response'];
			}

			if ( ! $captcha ) {
				$hasError = true;
			}

				$response = wp_remote_get(
					'https://www.google.com/recaptcha/api/siteverify?secret='
					. $zerif_contactus_secretkey
					. '&response='
					. $captcha
					. '&remoteip='
					. $_SERVER['REMOTE_ADDR']
				);



			if ( $response['body'] . success == false ) {
				$hasError = true;
			}
		}
		/* name */

		if ( trim( $_POST['myname'] ) === '' ) {
			$nameError = __( '* Please enter your name.', 'zerif-lite' );
			$hasError  = true;
		} else {
			$name = trim( $_POST['myname'] );
		}

		/* email */
		if ( trim( $_POST['myemail'] ) === '' ) {
			$emailError = __( '* Please enter your email address.', 'zerif-lite' );
			$hasError   = true;
		} elseif ( ! preg_match( '/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i', trim( $_POST['myemail'] ) ) ) {
			$emailError = __( '* You entered an invalid email address.', 'zerif-lite' );
			$hasError   = true;
		} else {
			$email = trim( $_POST['myemail'] );
		}

		/* subject */
		if ( trim( $_POST['mysubject'] ) === '' ) {
			$subjectError = __( '* Please enter a subject.', 'zerif-lite' );
			$hasError     = true;
		} else {
			$subject = trim( $_POST['mysubject'] );
		}

		/* message */
		if ( trim( $_POST['mymessage'] ) === '' ) {
			$messageError = __( '* Please enter a message.', 'zerif-lite' );
			$hasError     = true;
		} else {
			$message = stripslashes( trim( $_POST['mymessage'] ) );
		}

		/* send the email */
		if ( ! isset( $hasError ) ) {
			$zerif_contactus_email = get_theme_mod( 'zerif_contactus_email' );

			if ( empty( $zerif_contactus_email ) ) {
				$emailTo = get_theme_mod( 'zerif_email' );
			} else {
				$emailTo = $zerif_contactus_email;
			}

			if ( isset( $emailTo ) && $emailTo != '' ) {

				if ( empty( $subject ) ) {
					$subject = 'From ' . $name;
				}

				$body    = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";
				$headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
				wp_mail( $emailTo, $subject, $body, $headers );
				$emailSent = true;
			} else {
				$emailSent = false;
			}
		}
	}
}

$zerif_bigtitle_show = get_theme_mod( 'zerif_bigtitle_show' );



if ( isset( $zerif_bigtitle_show ) && $zerif_bigtitle_show != 1 ) {
	include get_template_directory() . '/sections/big_title.php';
}
?>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<?php
	/* OUR FOCUS SECTION */
	$zerif_ourfocus_show = get_theme_mod( 'zerif_ourfocus_show' );
	if ( isset( $zerif_ourfocus_show ) && $zerif_ourfocus_show != 1 ) {
		include get_template_directory() . '/sections/our_focus.php';
	}

	/* RIBBON WITH BOTTOM BUTTON */
	require get_template_directory() . '/sections/ribbon_with_bottom_button.php';

	/* ABOUT US */
	$zerif_aboutus_show = get_theme_mod( 'zerif_aboutus_show' );
	if ( isset( $zerif_aboutus_show ) && $zerif_aboutus_show != 1 ) {
		include get_template_directory() . '/sections/about_us.php';
	}

	/* OUR TEAM */
	$zerif_ourteam_show = get_theme_mod( 'zerif_ourteam_show' );
	if ( isset( $zerif_ourteam_show ) && $zerif_ourteam_show != 1 ) {
		include get_template_directory() . '/sections/our_team.php';
	}

	/* TESTIMONIALS */
	$zerif_testimonials_show = get_theme_mod( 'zerif_testimonials_show' );
	if ( isset( $zerif_testimonials_show ) && $zerif_testimonials_show != 1 ) {
		include get_template_directory() . '/sections/testimonials.php';
	}

	/* RIBBON WITH RIGHT SIDE BUTTON */
	require get_template_directory() . '/sections/ribbon_with_right_button.php';

	/* LATEST NEWS */
	$zerif_latestnews_show = get_theme_mod( 'zerif_latestnews_show' );
	if ( isset( $zerif_latestnews_show ) && $zerif_latestnews_show != 1 ) {
		include get_template_directory() . '/sections/latest_news.php';
	}

	if ( true ) {
		include get_template_directory() . '/sections/products.php';
	}

	/* CONTACT US */
	$zerif_contactus_show = get_theme_mod( 'zerif_contactus_show' );
	if ( isset( $zerif_contactus_show ) && $zerif_contactus_show != 1 ) {
		?>
		<section class="contact-us" id="contact">
			<div class="container">
				<!-- SECTION HEADER -->
				<div class="section-header">
					<?php
					$zerif_contactus_title = get_theme_mod( 'zerif_contactus_title', __( 'Get in touch', 'zerif-lite' ) );

					if ( ! empty( $zerif_contactus_title ) ) {
						echo '<h2 class="white-text">' . $zerif_contactus_title . '</h2>';
					}

					$zerif_contactus_subtitle = get_theme_mod( 'zerif_contactus_subtitle' );

					if ( isset( $zerif_contactus_subtitle ) && $zerif_contactus_subtitle != '' ) {
						echo '<h6 class="white-text">' . $zerif_contactus_subtitle . '</h6>';
					}
					?>
				</div>
				<!-- / END SECTION HEADER -->

				<!-- CONTACT FORM-->
				<div class="row">
					<?php
					if ( isset( $emailSent ) && $emailSent == true ) {
						echo '<div class="notification success"><p>'
						. esc_html__( 'Thanks, your email was sent successfully!', 'zerif-lite' )
						. '</p></div>';
					} elseif ( isset( $_POST['submitted'] ) ) {
						echo '<div class="notification error"><p>'
						. esc_html__( 'Sorry, an error occured.', 'zerif-lite' )
						. '</p></div>';
					}

					if ( isset( $nameError ) && $nameError != '' ) {
						echo '<div class="notification error"><p>' . esc_html( $nameError ) . '</p></div>';
					}

					if ( isset( $emailError ) && $emailError != '' ) {
						echo '<div class="notification error"><p>' . esc_html( $emailError ) . '</p></div>';
					}

					if ( isset( $subjectError ) && $subjectError != '' ) {
						echo '<div class="notification error"><p>' . esc_html( $subjectError ) . '</p></div>';
					}

					if ( isset( $messageError ) && $messageError != '' ) {
						echo '<div class="notification error"><p>' . esc_html( $messageError ) . '</p></div>';
					}

					?>



						<form role="form" method="POST" action="" 
						onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)"
						class="contact-form">

							<input type="hidden" name="scrollPosition">
							<input type="hidden" name="submitted" id="submitted" value="true" />
							<div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" 
							data-scrollreveal="enter left after 0s over 1s">

								<input required="required" type="text" name="myname"
								placeholder="<?php esc_html_e( 'Your Name', 'zerif-lite' ); ?>" 
								class="form-control input-box" value="
								<?php
								if ( isset( $_POST['myname'] ) ) {
									echo esc_attr( $_POST['myname'] );
								}
								?>
								">
							</div>

							<div class="col-lg-4 col-sm-4 zerif-rtl-contact-email"
							data-scrollreveal="enter left after 0s over 1s">
								<input required="required" type="email" name="myemail"
								placeholder="<?php esc_html_e( 'Your Email', 'zerif-lite' ); ?>"
								class="form-control input-box" value="
								<?php
								if ( isset( $_POST['myemail'] ) ) {
									echo is_email( $_POST['myemail'] ) ? $_POST['myemail'] : '';
								}
								?>
							">
							</div>

							<div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
								<input required="required" type="text" name="mysubject"
								placeholder="<?php esc_html_e( 'Subject', 'zerif-lite' ); ?>"
								class="form-control input-box" value="
								<?php
								if ( isset( $_POST['mysubject'] ) ) {
									echo esc_attr( $_POST['mysubject'] );
								}
								?>
							">
							</div>



							<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">
								<textarea name="mymessage" class="form-control textarea-box"
								placeholder="<?php esc_html_e( 'Your Message', 'zerif-lite' ); ?>">
								<?php
								if ( isset( $_POST['mymessage'] ) ) {
									echo esc_html( $_POST['mymessage'] );
								}
								?>
								</textarea>
							</div>
							<?php

							$zerif_contactus_button_label = get_theme_mod( 'zerif_contactus_button_label', esc_html__( 'Send Message', 'zerif-lite' ) );

							if ( ! empty( $zerif_contactus_button_label ) ) {
								echo '<button class="btn btn-primary custom-button red-btn"
								type="submit" data-scrollreveal="enter left after 0s over 1s">'
								. $zerif_contactus_button_label
								. '</button>';
							}



							$zerif_contactus_sitekey        = get_theme_mod( 'zerif_contactus_sitekey' );
							$zerif_contactus_secretkey      = get_theme_mod( 'zerif_contactus_secretkey' );
							$zerif_contactus_recaptcha_show = get_theme_mod( 'zerif_contactus_recaptcha_show' );

							if ( isset( $zerif_contactus_recaptcha_show )
							&& $zerif_contactus_recaptcha_show != 1
							&& ! empty( $zerif_contactus_sitekey )
							&& ! empty( $zerif_contactus_secretkey ) ) {

								echo '<div class="g-recaptcha zerif-g-recaptcha" data-sitekey="' . $zerif_contactus_sitekey . '"></div>';
							}
							?>
						</form>
				</div>
				<!-- / END CONTACT FORM-->
			</div> <!-- / END CONTAINER -->
		</section> <!-- / END CONTACT US SECTION-->
		<?php

	}

	get_footer();
	?>





<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-67007217-1', 'auto');
ga('send', 'pageview');
</script>
