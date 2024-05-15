<?php
/**
 * Header Options
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_header_options',
	array(
		'panel' => 'ace_news_theme_options',
		'title' => esc_html__( 'Header Options', 'ace-news' ),
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'ace_news_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'ace-news' ),
			'section'  => 'ace_news_header_options',
			'settings' => 'ace_news_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ace_news_enable_flash_news_section',
		array(
			'selector' => '#ace_news_flash_news_section .section-link',
			'settings' => 'ace_news_enable_flash_news_section',
		)
	);
}

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'ace_news_flash_news_speed_controller',
	array(
		'default'           => 30,
		'sanitize_callback' => 'ace_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'ace_news_flash_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'ace-news' ),
		'description'     => esc_html__( 'Note: Default speed value is 30.', 'ace-news' ),
		'section'         => 'ace_news_header_options',
		'settings'        => 'ace_news_flash_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'ace_news_is_flash_news_section_enabled',
	)
);

// Flash News Section - Number of Flash News Posts.
$wp_customize->add_setting(
	'ace_news_flash_news_count',
	array(
		'default'           => 5,
		'sanitize_callback' => 'ace_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'ace_news_flash_news_count',
	array(
		'label'           => esc_html__( 'Number of Posts to Show', 'ace-news' ),
		'description'     => esc_html__( 'Note: Min 1 and Max 10. Please input the valid number and save. Then refresh the page to see the change.', 'ace-news' ),
		'section'         => 'ace_news_header_options',
		'settings'        => 'ace_news_flash_news_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 10,
		),
		'active_callback' => 'ace_news_is_flash_news_section_enabled',
	)
);

// Header Options - Advertisement.
$wp_customize->add_setting(
	'ace_news_header_advertisement',
	array(
		'default'           => '',
		'sanitize_callback' => 'ace_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ace_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'ace-news' ),
			'section'  => 'ace_news_header_options',
			'settings' => 'ace_news_header_advertisement',
		)
	)
);

// Header Options - Advertisement URL.
$wp_customize->add_setting(
	'ace_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ace_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'ace-news' ),
		'section'  => 'ace_news_header_options',
		'settings' => 'ace_news_header_advertisement_url',
		'type'     => 'url',
	)
);
