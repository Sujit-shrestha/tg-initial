<?php
/**
 * Sidebar Option
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'ace-news' ),
		'panel' => 'ace_news_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'ace_news_sidebar_position',
	array(
		'sanitize_callback' => 'ace_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ace_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ace-news' ),
		'section' => 'ace_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ace-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ace-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ace-news' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'ace_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'ace_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ace_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ace-news' ),
		'section' => 'ace_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ace-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ace-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ace-news' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'ace_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'ace_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ace_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ace-news' ),
		'section' => 'ace_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ace-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ace-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ace-news' ),
		),
	)
);
