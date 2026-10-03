<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));


	Kirki::add_field( 'theme_config_id', [
		'label'       => esc_html__( 'Logo Size','job-forum' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'choices' => [
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_forum_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'job-forum' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-forum' ),
			'off' => esc_html__( 'Disable', 'job-forum' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_forum_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'job-forum' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-forum' ),
			'off' => esc_html__( 'Disable', 'job-forum' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	
	// Theme color

	Kirki::add_section( 'job_forum_theme_color_setting', array(
		'title'    => __( 'Color Option', 'job-forum' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_first_theme_color',
		'label'       => __( 'Theme First color', 'job-forum'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'job-forum' ),
		'section'     => 'job_forum_theme_color_setting',
		'type'        => 'color',
		'default'     => '#6E00BE',
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_second_theme_color',
		'label'       => __( 'Theme Second color', 'job-forum'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'job-forum' ),
		'section'     => 'job_forum_theme_color_setting',
		'type'        => 'color',
		'default'     => '#F8F5FF',
	) );


	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'job_forum_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'job-forum' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'job_forum_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_h1_typography_heading',
		'section'     => 'job_forum_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_h1_typography_font',
		'section'   =>  'job_forum_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'variant'       =>  '400',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  array('.header-image-box h1 , h1'),
				'suffix' => '!important'
			],
		],

	) );

	//Heading 2 Section

	Kirki::add_section( 'job_forum_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_h2_typography_heading',
		'section'     => 'job_forum_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_h2_typography_font',
		'section'   =>  'job_forum_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'job_forum_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_h3_typography_heading',
		'section'     => 'job_forum_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_h3_typography_font',
		'section'   =>  'job_forum_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'job_forum_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_h4_typography_heading',
		'section'     => 'job_forum_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_h4_typography_font',
		'section'   =>  'job_forum_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'job_forum_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_h5_typography_heading',
		'section'     => 'job_forum_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_h5_typography_font',
		'section'   =>  'job_forum_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'job_forum_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_h6_typography_heading',
		'section'     => 'job_forum_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_h6_typography_font',
		'section'   =>  'job_forum_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'job_forum_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'job-forum' ),
		'panel'    => 'job_forum_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_body_typography_heading',
		'section'     => 'job_forum_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'job_forum_body_typography_font',
		'section'   =>  'job_forum_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Be Vietnam Pro', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	//Theme Options Panel

	Kirki::add_panel( 'job_forum_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'job-forum' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'job_forum_section_header',array(
		'title' => esc_html__( 'Header Settings', 'job-forum' ),
		'description'    => esc_html__( 'Here you can add header information.', 'job-forum' ),
		'panel' => 'job_forum_theme_options_panel',
		'tabs'  => [
			'header' => [
				'label' => esc_html__( 'Header', 'job-forum' ),
			],
			'menu'  => [
				'label' => esc_html__( 'Menu', 'job-forum' ),
			],
		],
		'priority'       => 160,
	) );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'job_forum_menu_size_heading',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_menu_size',
		'tab'      => 'menu',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'job-forum' ),
		'type'        => 'text',
		'section'     => 'job_forum_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'job_forum_menu_text_transform_heading',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'menu',
		'settings'    => 'job_forum_menu_text_transform',
		'section'     => 'job_forum_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'job-forum' ),
			'uppercase' => esc_html__( 'Uppercase', 'job-forum' ),
			'lowercase' => esc_html__( 'Lowercase', 'job-forum' ),
			'capitalize' => esc_html__( 'Capitalize', 'job-forum' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	));

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'job_forum_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'job-forum' ),
		'section'     => 'job_forum_section_header',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-forum' ),
			'off' => esc_html__( 'Disable', 'job-forum' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    =>  esc_html__( 'Add Topbar Text', 'job-forum' ),
		'type'     => 'text',
		'tab'      => 'header',
		'settings' => 'job_forum_header_toptxt',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'job_forum_header_download_heading',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Download App button', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Text', 'job-forum' ),
		'settings' => 'job_forum_header_download_text',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Url', 'job-forum' ),
		'settings' => 'job_forum_header_download_url',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'job_forum_header_employe_heading',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Employers Login', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Text', 'job-forum' ),
		'settings' => 'job_forum_header_employe_text',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    =>  esc_html__( ' Url', 'job-forum' ),
		'settings' => 'job_forum_header_employe_url',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'job_forum_disable_search_icon',
		'label'       => esc_html__( 'Enable/Disable Search', 'job-forum' ),
		'section'     => 'job_forum_section_header',
		'default'     => 'on',
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-forum' ),
			'off' => esc_html__( 'Disable', 'job-forum' ),
		],
	]);

		Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'job_forum_header_login_heading',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Login button', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Url', 'job-forum' ),
		'settings' => 'job_forum_header_login_url',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'job_forum_header_register_heading',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Register button', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Url', 'job-forum' ),
		'settings' => 'job_forum_header_register_url',
		'section'  => 'job_forum_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'job_forum_enable_socail_link',
		'section'     => 'job_forum_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'tab'      => 'header',
		'section'     => 'job_forum_section_header',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'job-forum' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'job-forum' ),
		'settings'     => 'job_forum_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'job-forum' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'job-forum' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'job-forum' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'job-forum' ),
				'description' => esc_html__( 'Add the social icon url here.', 'job-forum' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'job_forum_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'job-forum' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'job-forum' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'job-forum' ),
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => 'false',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'job-forum' ),
		'settings'    => 'job_forum_shop_page_layout',
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'job-forum' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'job-forum' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'job_forum_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'job-forum' ),
		'settings'    => 'job_forum_products_per_row',
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => '4',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'job-forum' ),
		'settings'    => 'job_forum_products_per_page',
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => '8',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'job-forum' ),
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'job-forum' ),
		'settings'    => 'job_forum_single_product_sidebar_layout',
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'job-forum' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'job-forum' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'job_forum_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_products_button_border_radius_heading',
		'section'     => 'job_forum_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'job_forum_products_button_border_radius',
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_sale_badge_position_heading',
		'section'     => 'job_forum_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'job_forum_sale_badge_position',
		'section'     => 'job_forum_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'job-forum' ),
			'left' => esc_html__( 'Left', 'job-forum' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_products_sale_font_size_heading',
		'section'     => 'job_forum_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'job_forum_products_sale_font_size',
		'section'     => 'job_forum_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'job_forum_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'job-forum' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'job-forum' ),
		'panel'    => 'job_forum_theme_options_panel',
		'priority'       => 10,
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'job-forum' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'job-forum' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => false,
		'priority'    => 10,
		'tab'      => 'general',
	] );
    
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_preloader_type_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Select Preloader Type', 'job-forum' ) . '</h3>',
	] );
	
	Kirki::add_field( 'theme_config_id', [
		'type'     => 'radio',
		'tab'      => 'general',
		'settings' => 'job_forum_preloader_type',
		'section'  => 'job_forum_additional_setting',
		'default'  => 'diamond',
		'choices'  => [
			'diamond' => esc_html__( 'Diamond', 'job-forum' ),
			'orbit' => esc_html__( 'Orbit Pulse Loader', 'job-forum' ),
			'liquid' => esc_html__( 'Liquid Glow Loader', 'job-forum' ),
		],
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_preloader_bg_image_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Preloader Background', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'job_forum_preloader_bg_image',
		'tab'      => 'general',
		'type'        => 'background',
		'section'     => 'job_forum_additional_setting',
		'default'     => [
			'background-color'      => 'rgba(255, 255, 255, 1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.preloader-types',
			],
		],
	]);
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => true ,
		'priority'    => 10,
		'tab'      => 'general',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_enable_sidebar_sticky_heading',
		'section'     => 'job_forum_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sticky Sidebar', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'job_forum_enable_sticky_sidebar',
		'label'       => esc_html__( 'Enable or Disable Sticky Sidebar', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_enable_sidebar_animation_heading',
		'section'     => 'job_forum_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Animation', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'job_forum_enable_sidebar_animation',
		'label'       => esc_html__( 'Enable or Disable Sidebar Animation', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'job_forum_enable_footer_animation',
		'label'       => esc_html__( 'Enable or Disable Footer Animation', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_scroll_alignment_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'job_forum_scroll_alignment',
		'section'     => 'job_forum_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'job-forum' ),
			'center' => esc_html__( 'center', 'job-forum' ),
			'right' => esc_html__( 'right', 'job-forum' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_scroller_border_radius_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'job_forum_scroller_border_radius',
		'section'     => 'job_forum_additional_setting',
		'default'     => '50',
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_cursor_outline_heading',
		'section'     => 'job_forum_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dot Cursor', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'job_forum_cursor_outline',
		'label'       => esc_html__( 'Enable or Disable Dot Cursor', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_progress_bar_heading',
		'section'     => 'job_forum_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'job_forum_progress_bar',
		'label'       => esc_html__( 'Enable or Disable Progress Bar', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_progress_bar_position_heading',
		'section'     => 'job_forum_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Position', 'job-forum' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'job_forum_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'job_forum_progress_bar_position',
		'section'     => 'job_forum_additional_setting',
		'default'     => 'top',
		'choices'     => [
			'top' => esc_html__( 'Top', 'job-forum' ),
			'bottom' => esc_html__( 'Bottom', 'job-forum' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'job_forum_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_progress_bar_color_heading',
		'section'     => 'job_forum_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Color', 'job-forum' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'job_forum_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_progress_bar_color',
		'tab'      => 'general',
		'label'       => __( 'Color', 'job-forum' ),
		'type'        => 'color',
		'section'     => 'job_forum_additional_setting',
		'transport' => 'auto',
		'default'     => '#6E00BE',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '#elemento-progress-bar',
				'property' => 'background-color',
			),
		),
		'active_callback'  => [
			[
				'setting'  => 'job_forum_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'job_forum_single_page_layout_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'job_forum_single_page_layout',
		'section'     => 'job_forum_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'job-forum' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'job-forum' ),
			'One Column' => esc_html__( 'One Column', 'job-forum' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'job_forum_header_background_attachment_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'job_forum_header_background_attachment',
		'section'     => 'job_forum_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'job-forum' ),
			'fixed' => esc_html__( 'Fixed', 'job-forum' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'job_forum_header_image_height_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image height', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_header_image_height',
		'label'       => __( 'Image Height', 'job-forum' ),
		'description'    => esc_html__( 'Enter a value in pixels. Example:500px', 'job-forum' ),
		'type'        => 'text',
		'tab'      => 'header-image',
		'default'    => [
			'desktop' => '450px',
			'tablet'  => '400px',
			'mobile'  => '200px',
		],
		'responsive' => true,
		'section'     => 'job_forum_additional_setting',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.header-image-box'),
				'property' => 'height',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'job_forum_header_overlay_heading',
		'section'     => 'job_forum_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_header_overlay_setting',
		'tab'      => 'header-image',
		'label'       => __( 'Overlay Color', 'job-forum' ),
		'type'        => 'color',
		'section'     => 'job_forum_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000085',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'job_forum_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'job_forum_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'job-forum' ),
		'section'     => 'job_forum_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'job_forum_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'job-forum' ),
		'description'    => esc_html__( 'Here you can add post information.', 'job-forum' ),
		'panel'    => 'job_forum_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'job-forum' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'job-forum' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_enable_post_animation_heading',
		'section'     => 'job_forum_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Animation', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_enable_post_animation',
		'label'       => esc_html__( 'Enable or Disable Blog Post Animation', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_post_layout_heading',
		'section'     => 'job_forum_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_post_layout',
		'section'     => 'job_forum_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'job-forum' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'job-forum' ),
			'One Column' => esc_html__( 'One Column', 'job-forum' ),
			'Three Columns' => esc_html__( 'Three Columns', 'job-forum' ),
			'Four Columns' => esc_html__( 'Four Columns', 'job-forum' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_length_setting_heading',
		'section'     => 'job_forum_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'job_forum_length_setting',
		'section'     => 'job_forum_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'job-forum' ),
		'settings'    => 'job_forum_single_post_tag',
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'job-forum' ),
		'settings'    => 'job_forum_single_post_category',
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_single_post_radius',
		'section'     => 'job_forum_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'job-forum' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'job_forum_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_show_related_post_heading',
		'section'     => 'job_forum_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related post', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'job_forum_show_related_post',
		'label'       => esc_html__( 'Enable or Disable Related post', 'job-forum' ),
		'section'     => 'job_forum_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	// No Results Page Settings

	Kirki::add_section( 'job_forum_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'job-forum' ),
		'panel'    => 'job_forum_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_page_not_found_title_heading',
		'section'     => 'job_forum_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_forum_page_not_found_title',
		'section'  => 'job_forum_no_result_section',
		'default'  => esc_html__('404 Error!', 'job-forum'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_page_not_found_text_heading',
		'section'     => 'job_forum_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_forum_page_not_found_text',
		'section'  => 'job_forum_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'job-forum'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'job_forum_page_not_found_line_break',
		'section'  => 'job_forum_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_no_results_title_heading',
		'section'     => 'job_forum_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_forum_no_results_title',
		'section'  => 'job_forum_no_result_section',
		'default'  => esc_html__('Nothing Found', 'job-forum'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_no_results_content_heading',
		'section'     => 'job_forum_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_forum_no_results_content',
		'section'  => 'job_forum_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'job-forum'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'job_forum_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'job-forum' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'job-forum' ),
        'panel'    => 'job_forum_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_show_footer_widget_heading',
		'section'     => 'job_forum_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_show_footer_widget',
		'label'       => esc_html__( 'Footer Widget', 'job-forum' ),
		'section'     => 'job_forum_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_show_footer_copyright',
		'label'       => esc_html__( 'Footer Copyright', 'job-forum' ),
		'section'     => 'job_forum_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_text_heading',
		'section'     => 'job_forum_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_forum_footer_text',
		'section'  => 'job_forum_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_sticky_heading',
		'section'     => 'job_forum_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Sticky Copyright', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_forum_sticky_copyright_enable',
		'label'       => esc_html__( ' Sticky Copyright Section Enable / Disable', 'job-forum' ),
		'section'     => 'job_forum_footer_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-forum' ),
			'off' => esc_html__( 'Disable', 'job-forum' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_enable_heading',
		'section'     => 'job_forum_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_forum_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'job-forum' ),
		'section'     => 'job_forum_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-forum' ),
			'off' => esc_html__( 'Disable', 'job-forum' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_background_widget_heading',
		'section'     => 'job_forum_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'job_forum_footer_background_widget',
		'type'        => 'background',
		'section'     => 'job_forum_footer_section',
		'default'     => [
			'background-color'      => '#121212',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_widget_alignment_heading',
		'section'     => 'job_forum_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Alignment', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'job_forum_footer_widget_alignment',
		'section'     => 'job_forum_footer_section',
		'default'     =>[
			'desktop' => 'left',
			'tablet'  => 'left',
			'mobile'  => 'center',
		],
		'responsive' => true,
		'label'       => __( 'Widget Alignment', 'job-forum' ),
		'transport' => 'auto',
		'choices'     => [
			'center' => esc_html__( 'center', 'job-forum' ),
			'right' => esc_html__( 'right', 'job-forum' ),
			'left' => esc_html__( 'left', 'job-forum' ),
		],
		'output' => array(
			array(
				'element'  => '.footer-area',
				'property' => 'text-align',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_copright_color_heading',
		'section'     => 'job_forum_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'job-forum' ),
		'section'     => 'job_forum_footer_section',
		'transport' => 'auto',
		'default'     => '#1a1a1a',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_copright_text_color_heading',
		'section'     => 'job_forum_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'job-forum' ),
		'section'     => 'job_forum_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );


	// Footer Social Icons Section

	Kirki::add_section( 'job_forum_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'job-forum' ),
		'panel'    => 'job_forum_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_footer_social_icon_hide_heading',
		'section'     => 'job_forum_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_forum_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'job-forum' ),
		'section'     => 'job_forum_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_forum_enable_footer_socail_link_align_heading',
		'section'     => 'job_forum_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'job-forum' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'job_forum_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'job-forum' ),
		'section'     => 'job_forum_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'job-forum' ),
			'right' => esc_html__( 'right', 'job-forum' ),
			'left' => esc_html__( 'left', 'job-forum' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'job_forum_enable_footer_socail_link',
		'section'     => 'job_forum_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'job-forum' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'job_forum_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'job-forum' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'job-forum' ),
		'settings'     => 'job_forum_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'job-forum' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'job-forum' ). ' <a href="https://fontawesome.com/v6/search?ic=brands" target="_blank"><strong>' . esc_html__( 'View All', 'job-forum' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'job-forum' ),
				'description' => esc_html__( 'Add the social icon url here.', 'job-forum' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	load_template( trailingslashit( get_template_directory() ) . '/includes/logo/logo-resizer.php' );
}
