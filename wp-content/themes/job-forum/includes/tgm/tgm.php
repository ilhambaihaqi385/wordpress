<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function job_forum_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'job-forum' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'job-forum' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Elementor', 'job-forum' ),
			'slug'             => 'elementor',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WP Job Portal', 'job-forum' ),
			'slug'             => 'wp-job-portal',
			'required'         => false,
			'force_activation' => false,
		)
	);
	
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'job_forum_register_recommended_plugins' );