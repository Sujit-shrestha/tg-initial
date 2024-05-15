<?php
/**
 * Excerpt
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_excerpt_options',
	array(
		'panel' => 'ace_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'ace-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'ace_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'ace_news_sanitize_number_range',
		'validate_callback' => 'ace_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'ace_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ace-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'ace-news' ),
		'section'     => 'ace_news_excerpt_options',
		'settings'    => 'ace_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
