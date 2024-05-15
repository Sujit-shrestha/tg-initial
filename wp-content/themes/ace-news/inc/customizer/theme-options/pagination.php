<?php
/**
 * Pagination
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_pagination',
	array(
		'panel' => 'ace_news_theme_options',
		'title' => esc_html__( 'Pagination', 'ace-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ace_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ace-news' ),
			'section'  => 'ace_news_pagination',
			'settings' => 'ace_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ace_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ace-news' ),
		'section'         => 'ace_news_pagination',
		'settings'        => 'ace_news_pagination_type',
		'active_callback' => 'ace_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'ace-news' ),
			'numeric' => __( 'Numeric', 'ace-news' ),
		),
	)
);
