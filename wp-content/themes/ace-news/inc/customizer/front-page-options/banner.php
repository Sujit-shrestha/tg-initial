<?php
/**
 * Banner Section
 *
 * @package Ace News
 */

$wp_customize->add_section(
	'ace_news_banner_section',
	array(
		'panel' => 'ace_news_front_page_options',
		'title' => esc_html__( 'Banner Section', 'ace-news' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ace_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ace_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ace_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ace_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ace-news' ),
			'section'  => 'ace_news_banner_section',
			'settings' => 'ace_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ace_news_enable_banner_section',
		array(
			'selector' => '#ace_news_banner_section .section-link',
			'settings' => 'ace_news_enable_banner_section',
		)
	);
}

// Banner Section - Recent News Title.
$wp_customize->add_setting(
	'ace_news_recent_news_title',
	array(
		'default'           => __( 'Recent News', 'ace-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ace_news_recent_news_title',
	array(
		'label'           => esc_html__( 'Recent News Title', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_recent_news_title',
		'type'            => 'text',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Recent News Content Type.
$wp_customize->add_setting(
	'ace_news_recent_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_recent_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_recent_news_content_type',
		'type'            => 'select',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ace-news' ),
			'category' => esc_html__( 'Category', 'ace-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'ace_news_recent_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ace_news_recent_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ace-news' ), $i ),
			'section'         => 'ace_news_banner_section',
			'settings'        => 'ace_news_recent_news_content_post_' . $i,
			'active_callback' => 'ace_news_is_recent_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ace_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'ace_news_recent_news_content_category',
	array(
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_recent_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_recent_news_content_category',
		'active_callback' => 'ace_news_is_recent_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ace_news_get_post_cat_choices(),
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'ace_news_recent_news_button_label',
	array(
		'default'           => __( 'View All', 'ace-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ace_news_recent_news_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_recent_news_button_label',
		'type'            => 'text',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'ace_news_recent_news_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ace_news_recent_news_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_recent_news_button_link',
		'type'            => 'url',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ace_news_recent_news_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ace_News_Customize_Horizontal_Line(
		$wp_customize,
		'ace_news_recent_news_horizontal_line',
		array(
			'section'         => 'ace_news_banner_section',
			'settings'        => 'ace_news_recent_news_horizontal_line',
			'active_callback' => 'ace_news_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Banner Slider Title.
$wp_customize->add_setting(
	'ace_news_banner_slider_title',
	array(
		'default'           => __( 'Banner Slider', 'ace-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ace_news_banner_slider_title',
	array(
		'label'           => esc_html__( 'Slider Title', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_banner_slider_title',
		'type'            => 'text',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Banner Slider Slider Content Type.
$wp_customize->add_setting(
	'ace_news_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ace-news' ),
			'category' => esc_html__( 'Category', 'ace-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Banner Slider Post.
	$wp_customize->add_setting(
		'ace_news_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ace_news_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ace-news' ), $i ),
			'section'         => 'ace_news_banner_section',
			'settings'        => 'ace_news_banner_slider_content_post_' . $i,
			'active_callback' => 'ace_news_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ace_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Banner Slider Category.
$wp_customize->add_setting(
	'ace_news_banner_slider_content_category',
	array(
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_banner_slider_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_banner_slider_content_category',
		'active_callback' => 'ace_news_is_banner_slider_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ace_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ace_news_banner_slider_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ace_News_Customize_Horizontal_Line(
		$wp_customize,
		'ace_news_banner_slider_horizontal_line',
		array(
			'section'         => 'ace_news_banner_section',
			'settings'        => 'ace_news_banner_slider_horizontal_line',
			'active_callback' => 'ace_news_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Editor Choice Title.
$wp_customize->add_setting(
	'ace_news_editor_choice_title',
	array(
		'default'           => __( 'Editor Choice', 'ace-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ace_news_editor_choice_title',
	array(
		'label'           => esc_html__( 'Editor Choice Title', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_editor_choice_title',
		'type'            => 'text',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Editor Choice Content Type.
$wp_customize->add_setting(
	'ace_news_editor_choice_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_editor_choice_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_editor_choice_content_type',
		'type'            => 'select',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ace-news' ),
			'category' => esc_html__( 'Category', 'ace-news' ),
		),
	)
);

for ( $i = 1; $i <= 2; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'ace_news_editor_choice_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ace_news_editor_choice_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ace-news' ), $i ),
			'section'         => 'ace_news_banner_section',
			'settings'        => 'ace_news_editor_choice_content_post_' . $i,
			'active_callback' => 'ace_news_is_editor_picks_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ace_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'ace_news_editor_choice_content_category',
	array(
		'sanitize_callback' => 'ace_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ace_news_editor_choice_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_editor_choice_content_category',
		'active_callback' => 'ace_news_is_editor_picks_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ace_news_get_post_cat_choices(),
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'ace_news_editor_choice_button_label',
	array(
		'default'           => __( 'View All', 'ace-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ace_news_editor_choice_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_editor_choice_button_label',
		'type'            => 'text',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'ace_news_editor_choice_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ace_news_editor_choice_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ace-news' ),
		'section'         => 'ace_news_banner_section',
		'settings'        => 'ace_news_editor_choice_button_link',
		'type'            => 'url',
		'active_callback' => 'ace_news_is_banner_slider_section_enabled',
	)
);
