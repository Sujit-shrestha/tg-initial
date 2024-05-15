<?php
/**
 * Typography
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_typography',
	array(
		'panel' => 'ace_news_theme_options',
		'title' => esc_html__( 'Typography', 'ace-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ace_news_site_title_font',
	array(
		'default'           => 'Headland One',
		'sanitize_callback' => 'ace_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ace_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ace-news' ),
		'section'  => 'ace_news_typography',
		'settings' => 'ace_news_site_title_font',
		'type'     => 'select',
		'choices'  => ace_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ace_news_site_description_font',
	array(
		'default'           => 'Aleo',
		'sanitize_callback' => 'ace_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ace_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ace-news' ),
		'section'  => 'ace_news_typography',
		'settings' => 'ace_news_site_description_font',
		'type'     => 'select',
		'choices'  => ace_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ace_news_header_font',
	array(
		'default'           => 'Gelasio',
		'sanitize_callback' => 'ace_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ace_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ace-news' ),
		'section'  => 'ace_news_typography',
		'settings' => 'ace_news_header_font',
		'type'     => 'select',
		'choices'  => ace_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ace_news_body_font',
	array(
		'default'           => 'Proza Libre',
		'sanitize_callback' => 'ace_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ace_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ace-news' ),
		'section'  => 'ace_news_typography',
		'settings' => 'ace_news_body_font',
		'type'     => 'select',
		'choices'  => ace_news_get_all_google_font_families(),
	)
);
