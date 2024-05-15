<?php
/**
 * Archive Layout
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'ace-news' ),
		'panel' => 'ace_news_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'ace_news_archive_column_layout',
	array(
		'default'           => 'column-3',
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_archive_column_layout',
	array(
		'label'   => esc_html__( 'Column Layout', 'ace-news' ),
		'section' => 'ace_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'ace-news' ),
			'column-3' => __( 'Column 3', 'ace-news' ),
		),
	)
);
