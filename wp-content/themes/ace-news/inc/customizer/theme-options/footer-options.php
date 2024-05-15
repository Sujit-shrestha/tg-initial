<?php
/**
 * Footer Options
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_footer_options',
	array(
		'panel' => 'ace_news_theme_options',
		'title' => esc_html__( 'Footer Options', 'ace-news' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'ace-news' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'ace_news_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'ace_news_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'ace-news' ),
		'section'  => 'ace_news_footer_options',
		'settings' => 'ace_news_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'ace_news_scroll_top',
	array(
		'sanitize_callback' => 'ace_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'ace-news' ),
			'section' => 'ace_news_footer_options',
		)
	)
);
