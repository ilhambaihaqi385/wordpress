<?php

  $job_forum_theme_custom_setting_css = '';

    // Global Color
    $job_forum_first_theme_color = get_theme_mod('job_forum_first_theme_color', '#6E00BE');
    $job_forum_second_theme_color = get_theme_mod('job_forum_second_theme_color', '#F8F5FF');

    $job_forum_theme_custom_setting_css .=':root {';
        $job_forum_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($job_forum_first_theme_color ).'!important;';
        $job_forum_theme_custom_setting_css .='--secondary-theme-color: '.esc_attr($job_forum_second_theme_color ).'!important;';
    $job_forum_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$job_forum_scroll_alignment = get_theme_mod('job_forum_scroll_alignment', 'right');

    if($job_forum_scroll_alignment == 'right'){
        $job_forum_theme_custom_setting_css .='.scroll-up{';
            $job_forum_theme_custom_setting_css .='right: 30px;!important;';
			$job_forum_theme_custom_setting_css .='left: auto;!important;';
        $job_forum_theme_custom_setting_css .='}';
    }else if($job_forum_scroll_alignment == 'center'){
        $job_forum_theme_custom_setting_css .='.scroll-up{';
            $job_forum_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $job_forum_theme_custom_setting_css .='}';
    }else if($job_forum_scroll_alignment == 'left'){
        $job_forum_theme_custom_setting_css .='.scroll-up{';
            $job_forum_theme_custom_setting_css .='left: 30px;!important;';
			$job_forum_theme_custom_setting_css .='right: auto;!important;';
        $job_forum_theme_custom_setting_css .='}';
    }

    // Woocommerce Sale Position
    $job_forum_sale_badge_position = get_theme_mod( 'job_forum_sale_badge_position','right');
    if($job_forum_sale_badge_position == 'left'){
        $job_forum_theme_custom_setting_css .='.woocommerce ul.products li.product .onsale{';
            $job_forum_theme_custom_setting_css .='left: 10px; right: auto;';
        $job_forum_theme_custom_setting_css .='}';
    }else if($job_forum_sale_badge_position == 'right'){
        $job_forum_theme_custom_setting_css .='.woocommerce ul.products li.product .onsale{';
            $job_forum_theme_custom_setting_css .='left: auto; right: 10px;';
        $job_forum_theme_custom_setting_css .='}';
    }