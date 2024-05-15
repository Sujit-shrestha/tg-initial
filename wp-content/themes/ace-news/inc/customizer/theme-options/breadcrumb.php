<?php
/**
 * Breadcrumb
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ace-news' ),
		'panel' => 'ace_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ace_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ace_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ace-news' ),
			'section' => 'ace_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ace_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ace_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ace-news' ),
		'active_callback' => 'ace_news_is_breadcrumb_enabled',
		'section'         => 'ace_news_breadcrumb',
	)
);
