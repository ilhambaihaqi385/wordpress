<?php

class Whizzie {

	public function __construct() {
		$this->init();
	}

	public function init()
	{
	
	}
	public static function job_forum_setup_widgets(){

		set_theme_mod( 'job_forum_header_toptxt', 'Discover 30,000+ Jobs Opportunities Today!' );
		set_theme_mod( 'job_forum_header_download_text', 'Download App' );
		set_theme_mod( 'job_forum_header_download_url', '#' );
		set_theme_mod( 'job_forum_header_employe_text', 'Employers Login' );
		set_theme_mod( 'job_forum_header_employe_url', '#' );
		set_theme_mod( 'job_forum_social_links_settings', array(
			array(
				"link_text" => "fab fa-instagram",
				"link_url" => "www.instagram.com"
			),
			array(
				"link_text" => "fab fa-twitter",
				"link_url" => "www.twitter.com"
			),
			array(
				"link_text" => "fab fa-youtube",
				"link_url" => "www.youtube.com"
			),
			array(
				"link_text" => "fab fa-linkedin-in",
				"link_url" => "www.linkedin.com"
			)
		));

			/* Create Menu */
            $job_forum_menuname  = 'Main menu';
            $job_forum_location  = 'main-menu';

            $job_forum_menu = wp_get_nav_menu_object( $job_forum_menuname );

            if ( ! $job_forum_menu ) {
            $job_forum_menu_id = wp_create_nav_menu( $job_forum_menuname );

           // Home Page 
			wp_update_nav_menu_item( $job_forum_menu_id, 0, array(
				'menu-item-title'     => __( 'Home', 'job-forum' ),
				'menu-item-url'       => home_url( '/' ),
				'menu-item-type'      => 'custom',
				'menu-item-status'    => 'publish',
			) );

			// Internships Page 
			$job_forum_about_id = wp_insert_post( array(
			'post_type'   => 'page',
			'post_content' => 'We are committed to providing reliable, professional, and result-oriented solutions tailored to meet individual needs. Our goal is to empower people with the right guidance, knowledge, and support to help them make informed decisions for a better future. <br><br> Our mission is to deliver high-quality services with honesty, transparency, and dedication. We focus on understanding client requirements and offering practical solutions that create long-term value. <br><br> With a client-centric approach, experienced professionals, and a commitment to excellence, we ensure every individual receives the attention and guidance they deserve. We believe in building trust through quality service and consistent results.',
			'post_title'  => 'Internships',
			'post_status' => 'publish',
			) );

			if ( $job_forum_about_id ) {
			wp_update_nav_menu_item( $job_forum_menu_id, 0, array(
			'menu-item-title'     => 'Internships',
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $job_forum_about_id,
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			) );
			}

			// Jobs Page 
			$job_forum_about_id = wp_insert_post( array(
			'post_type'   => 'page',
			'post_content' => 'We are committed to providing reliable, professional, and result-oriented solutions tailored to meet individual needs. Our goal is to empower people with the right guidance, knowledge, and support to help them make informed decisions for a better future. <br><br> Our mission is to deliver high-quality services with honesty, transparency, and dedication. We focus on understanding client requirements and offering practical solutions that create long-term value. <br><br> With a client-centric approach, experienced professionals, and a commitment to excellence, we ensure every individual receives the attention and guidance they deserve. We believe in building trust through quality service and consistent results.',
			'post_title'  => 'Jobs',
			'post_status' => 'publish',
			) );

			if ( $job_forum_about_id ) {
			wp_update_nav_menu_item( $job_forum_menu_id, 0, array(
			'menu-item-title'     => 'Jobs',
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $job_forum_about_id,
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			) );
			}

			// Mentorships Page 
			$job_forum_about_id = wp_insert_post( array(
			'post_type'   => 'page',
			'post_content' => 'We are committed to providing reliable, professional, and result-oriented solutions tailored to meet individual needs. Our goal is to empower people with the right guidance, knowledge, and support to help them make informed decisions for a better future. <br><br> Our mission is to deliver high-quality services with honesty, transparency, and dedication. We focus on understanding client requirements and offering practical solutions that create long-term value. <br><br> With a client-centric approach, experienced professionals, and a commitment to excellence, we ensure every individual receives the attention and guidance they deserve. We believe in building trust through quality service and consistent results.',
			'post_title'  => 'Mentorships',
			'post_status' => 'publish',
			) );

			if ( $job_forum_about_id ) {
			wp_update_nav_menu_item( $job_forum_menu_id, 0, array(
			'menu-item-title'     => 'Mentorships',
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $job_forum_about_id,
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			) );
			}

            // Create Blog Page
                $job_forum_blog_page_title = 'Blog';

                $job_forum_blog_page_query = new WP_Query(array(
                    'post_type'      => 'page',
                    'name'           => sanitize_title($job_forum_blog_page_title),
                    'post_status'    => 'publish',
                    'posts_per_page' => 1
                ));
                if (!$job_forum_blog_page_query->hae_posts()) {
                    $job_forum_blog_page = array(
                        'post_type'   => 'page',
                        'post_title'  => $job_forum_blog_page_title,
                        'post_status' => 'publish',
                        'post_author' => 1,
                    );
                    $job_forum_blog_page_id = wp_insert_post($job_forum_blog_page);
                    update_option('page_for_posts', $job_forum_blog_page_id);

                    wp_update_na_menu_item($job_forum_menu_id, 0, array(
                        'menu-item-title'      => __('Blog', 'job-forum'),
                        'menu-item-url'        => get_permalink($job_forum_blog_page_id),
                        'menu-item-status'     => 'publish',
                        'menu-item-object-id'  => $job_forum_blog_page_id,
                        'menu-item-object'     => 'page',
                        'menu-item-type'       => 'post_type',
                    ));
                }
            
			/* Assign Menu Location */
			$job_forum_locations = get_theme_mod( 'nav_menu_locations', array() );
			$job_forum_locations[ $job_forum_location ] = $job_forum_menu_id;
			set_theme_mod( 'nav_menu_locations', $job_forum_locations );
		}
	}
}
 