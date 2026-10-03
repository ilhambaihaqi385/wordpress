<?php

function get_page_id_by_title($job_forum_pagename){
  $job_forum_args = array(
 'post_type' => 'page',
 'posts_per_page' => 1,
 'title' => $job_forum_pagename
  );
  $job_forum_query = new WP_Query( $job_forum_args );    $job_forum_page_id = '1';
 if (isset($job_forum_query->post->ID)) {
      $job_forum_page_id = $job_forum_query->post->ID;
  } return $job_forum_page_id;
}
//about theme info
add_action( 'admin_menu', 'job_forum_gettingstarted' );
function job_forum_gettingstarted() {
	add_theme_page( esc_html__('Job Forum', 'job-forum'), esc_html__('Job Forum', 'job-forum'), 'edit_theme_options', 'job_forum_about', 'job_forum_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function job_forum_admin_theme_style() {
	wp_enqueue_style('job-forum-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('job-forum-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Admin notice code START
	wp_register_script('job-forum-notice', esc_url(get_template_directory_uri()) . '/includes/getstart/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('job-forum-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'job_forum_admin_theme_style');

// Changelog
if ( ! defined( 'JOB_FORUM_CHANGELOG_URL' ) ) {
    define( 'JOB_FORUM_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function job_forum_changelog_screen() {
	global $wp_filesystem;
	$job_forum_changelog_file = apply_filters( 'job_forum_changelog_file', JOB_FORUM_CHANGELOG_URL );

	if ( $job_forum_changelog_file && is_readable( $job_forum_changelog_file ) ) {
		WP_Filesystem();
		$job_forum_changelog = $wp_filesystem->get_contents( $job_forum_changelog_file );
		$job_forum_changelog_list = job_forum_parse_changelog( $job_forum_changelog );

		// ✅ wrapper + button add kiya gaya hai
		echo '<div id="job-forum-changelog-container">';
		echo wp_kses_post( $job_forum_changelog_list );
		echo '</div>';
		echo '<button id="job-forum-load-more" class="button button-primary" style="margin-top:15px;">Load More</button>';
	}
}

function job_forum_parse_changelog( $job_forum_content ) {
	$job_forum_content = explode ( '== ', $job_forum_content );
	$job_forum_changelog_isolated = '';

	foreach ( $job_forum_content as $key => $job_forum_value ) {
		if ( strpos( $job_forum_value, 'Changelog ==' ) === 0 ) {
	    	$job_forum_changelog_isolated = str_replace( 'Changelog ==', '', $job_forum_value );
	    }
	}

	$job_forum_changelog_array = explode( '= ', $job_forum_changelog_isolated );
	unset( $job_forum_changelog_array[0] );

	$job_forum_changelog = '<div class="changelog">';
	foreach ( $job_forum_changelog_array as $job_forum_value ) {
		$job_forum_value = preg_replace( '/\n+/', '</span><span>', $job_forum_value );
		$job_forum_value = '<div class="block-changelog"><span class="heading">= ' . $job_forum_value . '</span></div>';
		$job_forum_changelog .= str_replace( '<span></span>', '', $job_forum_value );
	}
	$job_forum_changelog .= '</div>';

	return wp_kses_post( $job_forum_changelog );
}

//guidline for about theme
function job_forum_mostrar_guide() { 
	//custom function about theme customizer
	$job_forum_return = add_query_arg( array()) ;
	$job_forum_theme = wp_get_theme( 'job-forum' );
	?>
<div class="container-getstarted">
		<div class="inner-side-content1">
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/includes/getstart/images/sticky-header-logo.png" />
			</div>
		    <div class="coupon-container-box-left">
			    <div class="iner-sidebar-pro-btn">
				    <span class="premium-btn"><a href="<?php echo esc_url( JOB_FORUM_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium Theme', 'job-forum'); ?></a>
				    </span>
			    </div>
		    </div>
        </div>					
   <div class="top-head">
	    <div class="top-title">
		     <h2><?php esc_html_e( 'Job Forum', 'job-forum' ); ?></h2>
		     <h4><?php esc_html_e( 'Welcome to WP Elemento Theme!', 'job-forum' ); ?></h4>
		     <p><?php esc_html_e( 'Click on the quick start button to import the demo.', 'job-forum' ); ?></p>
			    <div class="iner-sidebar-pro-btn">
					<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
						$job_forum_plugin_ins = Job_Forum_Plugin_Activation_WPElemento_Importer::get_instance();
						$job_forum_actions = $job_forum_plugin_ins->job_forum_recommended_actions;
					?>
					<div class="job-forum-recommended-plugins ">
						<div class="job-forum-action-list">
							<?php if ($job_forum_actions): foreach ($job_forum_actions as $job_forum_key => $job_forum_actionValue): ?>
									<div class="job-forum-action" id="<?php echo esc_attr($job_forum_actionValue['id']);?>">
										<div class="action-inner plugin-activation-redirect">
											<?php echo wp_kses_post($job_forum_actionValue['link']); ?>
										</div>
									</div>
								<?php endforeach;
							endif; ?>
						</div>
					</div>
				   <?php }else{ ?>
					<span class="quick-btn">
				    <?php if (isset($_GET['imported']) && $_GET['imported'] == 'true'): ?>
                        <a href="<?php echo esc_url( site_url() ); ?>" target="_blank"><?php esc_html_e('Visit Site', 'job-forum'); ?></a>
						<?php
						$job_forum_page_id = get_page_id_by_title('Home');
						?>
						<a href="<?php echo esc_url( admin_url('post.php?post=' . $job_forum_page_id . '&action=elementor') ); ?>" 
							target="_blank" class="elementor-edit-btn"><?php esc_html_e('Edit With Elementor', 'job-forum'); ?>
						</a>
                    <?php else: ?>
                        <a href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'job-forum'); ?></a>
                    <?php endif; ?>
					<?php } ?>
				   </span>
				    <span class="premium-btn"><a href="<?php echo esc_url( JOB_FORUM_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'job-forum'); ?></a>
				    </span>
				    <span class="demo-btn"><a href="<?php echo esc_url( JOB_FORUM_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'job-forum'); ?></a>
				    </span>
				    <span class="doc-btn"><a href="<?php echo esc_url( JOB_FORUM_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle at $89', 'job-forum'); ?></a>
				    </span>
			    </div>
            </div>			
		<div class="inner-side-content">
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" />
			</div>
			<div class="top-right">
			  <span class="version"><?php esc_html_e( 'Version', 'job-forum' ); ?>: <?php echo esc_html($job_forum_theme['Version']);?></span>
		    </div>
		</div>
    </div>
    <div class="inner-cont">
	    <div class="tab-outer-box1">
		   <div class="tab-inner-box">
			   <div class= "bundle-box">
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/includes/getstart/images/bundle.png"/>
				    <h1><?php esc_html_e('ELEMENTOR WordPress THEME BUNDLE', 'job-forum'); ?></h1>
			     <div>
				    <p class="product-price"><?php esc_html_e('Price:', 'job-forum'); ?>
                        <span class="regular-price"><?php esc_html_e('$3,240.00', 'job-forum'); ?></span>
                        <span class="sale-price"><?php esc_html_e('$89.00', 'job-forum'); ?></span>
                    </p>
					<p><?php esc_html_e('The Elementor WordPress Theme Bundle offers a stunning collection of 120+ Premium Elementor Themes', 'job-forum'); ?></p>
                 </div>
				</div> 
			    <div class="offer-box"> 
				    <div class="offer1-box">
                       <span class="off-text1"><a href="<?php echo esc_url( JOB_FORUM_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Buy Bundle at 20% Discount', 'job-forum'); ?></a></span>
				    </div> 
		        </div>
			</div>	
		</div>	
		<div class="tab-outer-box2">
			<div class="tab-outer-box-2-1">
			  <h3><?php esc_html_e( 'Customizer Setting', 'job-forum' ); ?></h3>
			  <div class="lite-theme-inner">
				<div>
					<h3><?php esc_html_e('Theme Customizer', 'job-forum'); ?></h3>
					<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'job-forum'); ?></p>
					<div class="info-link">
					   <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Open customizer', 'job-forum'); ?></a>
					</div>
				</div>
				<div>
					<h3><?php esc_html_e('Help Docs', 'job-forum'); ?></h3>
					<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'job-forum'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( JOB_FORUM_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'job-forum'); ?></a>
					</div>
				</div>
				<div>
					<h3><?php esc_html_e('Need Support?', 'job-forum'); ?></h3>
					<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'job-forum'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( JOB_FORUM_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'job-forum'); ?></a>
					</div>
				</div>
				<div>
					<h3><?php esc_html_e('Reviews & Testimonials', 'job-forum'); ?></h3>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'job-forum'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( JOB_FORUM_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'job-forum'); ?></a>
					</div>
				</div>
            </div>	
		</div>
			<div class="tab-outer-box-2-2">
			  <h3><?php esc_html_e( 'Link to customizer', 'job-forum' ); ?></h3>
				<div class="first-row">
					<div class="row-box">
						<div class="row-box1">
							<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your Website logo','job-forum'); ?></a>
						</div>
						<div class="row-box2">
							<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Edit Your Menus','job-forum'); ?></a>
						</div>
					</div>
							
					<div class="row-box">
						<div class="row-box1">
							<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Add Header Image','job-forum'); ?></a>
						</div>
						<div class="row-box2">
							<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Add Footer Widget','job-forum'); ?></a>
						</div>
					</div>
				</div>
            </div>	
			<div class="tab-outer-box-2-3">
				<h3><?php esc_html_e( 'Change log', 'job-forum' ); ?></h3>	
		     <?php job_forum_changelog_screen(); ?>
          </div>	
        </div>
    </div>
</div>	
<?php } ?>