<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.WordPress.org/themes/basics/template-files/#template-partials
 *
 * @package Job Forum
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>
<?php 
if( get_theme_mod('job_forum_preloader_hide', false ) == true ){ 

	$job_forum_type = get_theme_mod('job_forum_preloader_type','diamond');
?>
<div class="frame">
	<div class="loader preloader-types">

		<?php if($job_forum_type == 'diamond'){ ?>

			<div class="preloader">
				<div class="diamond">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>

		<?php } elseif($job_forum_type == 'orbit'){ ?>

			<div class="orbit-loader">
				<div class="orbit-center"></div>
				<div class="orbit-ring">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>

		<?php } elseif($job_forum_type == 'liquid'){ ?>

			<div class="liquid-loader">
				<div class="liquid-blob"></div>
			</div>

		<?php } ?>

	</div>
</div>
<?php } ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'job-forum' ); ?></a>

<header id="site-navigation" class="header">
	<div class="top-header py-1">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-5 col-12 align-self-center d-flex justify-content-md-start justify-content-center">
					<?php if ( get_theme_mod('job_forum_header_toptxt') ) : ?>
						<p class="mb-0 adv-text"><?php echo esc_html( get_theme_mod('job_forum_header_toptxt' ) ); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-lg-8 col-md-7 col-12 align-self-center">
					<div class="d-flex justify-content-md-end justify-content-center row-gap-1 align-items-center flex-wrap column-gap-4">
						<?php if ( get_theme_mod('job_forum_header_download_text') ) : ?>
							<div class="download-text py-1" ><a href="<?php echo esc_url( get_theme_mod('job_forum_header_download_url' ) ); ?>"><?php echo esc_html( get_theme_mod('job_forum_header_download_text' ) ); ?></a></div>
						<?php endif; ?>
						<?php if ( get_theme_mod('job_forum_header_employe_text') ) : ?>
							<div class="employe-text py-1" ><a href="<?php echo esc_url( get_theme_mod('job_forum_header_employe_url' ) ); ?>"><?php echo esc_html( get_theme_mod('job_forum_header_employe_text' ) ); ?></a></div>
						<?php endif; ?>
						<?php $job_forum_settings = get_theme_mod( 'job_forum_social_links_settings' ); ?>
						<div class="social-links text-lg-start">
							<?php if ( is_array($job_forum_settings) || is_object($job_forum_settings) ){ ?>
								<?php foreach( $job_forum_settings as $job_forum_setting ) { ?>
									<a href="<?php echo esc_url( $job_forum_setting['link_url'] ); ?>" target="_blank">
										<i class="<?php echo esc_attr( $job_forum_setting['link_text'] ); ?> me-2"></i>
									</a>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header <?php if( get_theme_mod( 'job_forum_sticky_header',false) != '') { ?>sticky-header<?php } else { ?>close-sticky <?php } ?>">
		<div class="container py-3">
			<div class="row header-inner d-flex align-items-center row-gap-2">
				<div class="col-xl-2 col-lg-2 col-md-4 col-9 align-self-center">
					<div class="logo text-start">
						<div class="logo-image text-start">
							<?php the_custom_logo(); ?>
						</div>
						<div class="logo-content text-start">
							<?php
								if ( get_theme_mod('job_forum_display_header_title', true) == true ) :
									echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
									echo esc_attr(get_bloginfo('name'));
									echo '</a>';
								endif;
								if ( get_theme_mod('job_forum_display_header_text', false) == true ) :
									echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
								endif;
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-8 col-3 align-self-center text-lg-left text-md-end toggle-menu-col">
					<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><i class="fa-solid fa-bars"></i></span>
					</button>
					<nav id="main-menu" class="close-panal">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => false
							));
						?>
						<button class="close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-12 d-flex justify-content-lg-end justify-content-center align-self-center gap-3 align-items-center">
					<?php if( get_theme_mod( 'job_forum_disable_search_icon', 'on' ) ){ ?>
						<div class="search-box d-flex justify-content-center justify-content-md-end">
							<?php
								get_search_form();
							?>
						</div>
					<?php } ?>
					<?php if ( get_theme_mod('job_forum_header_login_url') ) : ?>
						<div class="login-button-text py-2" ><a href="<?php echo esc_url( get_theme_mod('job_forum_header_login_url' ) ); ?>"><?php esc_html_e('Login','job-forum'); ?></a></div>
					<?php endif; ?>
					<?php if ( get_theme_mod('job_forum_header_register_url') ) : ?>
						<div class="register-text py-2" ><a href="<?php echo esc_url( get_theme_mod('job_forum_header_register_url' ) ); ?>"><?php esc_html_e('Register','job-forum'); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>