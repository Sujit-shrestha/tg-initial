<?php
/**
 * Flash News Section
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_flash_news_section',
	array(
		'panel' => 'ace_news_front_page_options',
		'title' => esc_html__( 'Flash News Section', 'ace-news' ),
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
			'section'  => 'ace_news_flash_news_section',
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
		'description'     => esc_html__( 'Note: Min 1. Please input the valid number and save. Then refresh the page to see the change.', 'ace-news' ),
		'section'         => 'ace_news_flash_news_section',
		'settings'        => 'ace_news_flash_news_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'ace_news_is_flash_news_section_enabled',
	)
);

