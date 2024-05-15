<?php
/**
 * Post Options
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'ace-news' ),
		'panel' => 'ace_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'ace_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'ace-news' ),
			'section' => 'ace_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'ace_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'ace-news' ),
			'section' => 'ace_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'ace_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'ace-news' ),
			'section' => 'ace_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'ace_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'ace-news' ),
			'section' => 'ace_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'ace_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'ace-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ace_news_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'ace-news' ),
		'section'  => 'ace_news_post_options',
		'settings' => 'ace_news_post_related_post_label',
		'type'     => 'text',
	)
);
