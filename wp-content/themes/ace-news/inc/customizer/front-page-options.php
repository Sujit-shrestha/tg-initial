<?php
/**
 * Front Page Options
 *
 * @package Ace News
 */

$wp_customize->add_panel(
	'ace_news_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'ace-news' ),
		'priority' => 130,
	)
);

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';
