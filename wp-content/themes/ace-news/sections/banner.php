<?php
if ( ! get_theme_mod( 'ace_news_enable_banner_section', false ) ) {
	return;
}

$recent_content_ids  = $slider_content_ids = $editor_content_ids = array();
$recent_content_type = get_theme_mod( 'ace_news_recent_news_content_type', 'post' );
$slider_content_type = get_theme_mod( 'ace_news_banner_slider_content_type', 'post' );
$editor_content_type = get_theme_mod( 'ace_news_editor_choice_content_type', 'post' );

if ( $recent_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$recent_content_ids[] = get_theme_mod( 'ace_news_recent_news_content_post_' . $i );
	}
	$recent_args = array(
		'post_type'           => $recent_content_type,
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $recent_content_ids ) ) ) {
		$recent_args['post__in'] = array_filter( $recent_content_ids );
		$recent_args['orderby']  = 'post__in';
	} else {
		$recent_args['orderby'] = 'date';
	}
} elseif ( $recent_content_type === 'category' ) {
	$cat_content_id = get_theme_mod( 'ace_news_recent_news_content_category' );
	$recent_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}

$recent_args = apply_filters( 'ace_news_banner_section_args', $recent_args );

if ( $slider_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'ace_news_banner_slider_content_post_' . $i );
	}
	$banner_slider_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $slider_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $slider_content_ids ) ) ) {
		$banner_slider_args['post__in'] = array_filter( $slider_content_ids );
		$banner_slider_args['orderby']  = 'post__in';
	} else {
		$banner_slider_args['orderby'] = 'date';
	}
} elseif ( $slider_content_type === 'category' ) {
	$cat_content_id     = get_theme_mod( 'ace_news_banner_slider_content_category' );
	$banner_slider_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$banner_slider_args = apply_filters( 'ace_news_banner_section_args', $banner_slider_args );

if ( $editor_content_type === 'post' ) {
	for ( $i = 1; $i <= 2; $i++ ) {
		$editor_content_ids[] = get_theme_mod( 'ace_news_editor_choice_content_post_' . $i );
	}
	$editor_args = array(
		'post_type'           => $editor_content_type,
		'post__in'            => array_filter( $editor_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 2 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_content_ids ) ) ) {
		$editor_args['post__in'] = array_filter( $editor_content_ids );
		$editor_args['orderby']  = 'post__in';
	} else {
		$editor_args['orderby'] = 'date';
	}
} elseif ( $editor_content_type === 'category' ) {
	$cat_content_id = get_theme_mod( 'ace_news_editor_choice_content_category' );
	$editor_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 2 ),
	);
}
$editor_args = apply_filters( 'ace_news_banner_section_args', $editor_args );

ace_news_render_banner_section( $recent_args, $banner_slider_args, $editor_args );

/**
 * Render Banner Section.
 */
function ace_news_render_banner_section( $recent_args, $banner_slider_args, $editor_args ) {
	$slider_title   = get_theme_mod( 'ace_news_banner_slider_title', __( 'Banner Slider', 'ace-news' ) );
	$editor_title   = get_theme_mod( 'ace_news_editor_choice_title', __( 'Editor Choice', 'ace-news' ) );
	$viewall_button = get_theme_mod( 'ace_news_editor_choice_button_label', __( 'View All', 'ace-news' ) );
	$button_url     = get_theme_mod( 'ace_news_editor_choice_button_link' );
	$content_type   = get_theme_mod( 'ace_news_editor_choice_content_type', 'post' );
	if ( 'category' === $content_type ) {
		$editor_category = get_theme_mod( 'ace_news_editor_choice_content_category' );
		$button_url      = ! empty( $button_url ) ? $button_url : get_category_link( $editor_category );
	} else {
		$button_url = ! empty( $button_url ) ? $button_url : '#';
	}

	$recent_title   = get_theme_mod( 'ace_news_recent_news_title', __( 'Recent News', 'ace-news' ) );
	$viewall_button = get_theme_mod( 'ace_news_recent_news_button_label', __( 'View All', 'ace-news' ) );
	$button_url     = get_theme_mod( 'ace_news_recent_news_button_link' );
	$content_type   = get_theme_mod( 'ace_news_recent_news_content_type', 'post' );
	if ( 'category' === $content_type ) {
		$recent_category = get_theme_mod( 'ace_news_recent_news_content_category' );
		$button_url      = ! empty( $button_url ) ? $button_url : get_category_link( $recent_category );
	} else {
		$button_url = ! empty( $button_url ) ? $button_url : '#';
	}

	?>

	<section id="ace_news_banner_section" class="banner-section ascendoor-customizer-section banner-style-2">
		<?php
		if ( is_customize_preview() ) :
			ace_news_section_link( 'ace_news_banner_section' );
		endif;
		?>
		<div class="section-wrapper">
			<div class="banner-container-wrapper">

				<!-- Banner Slider -->
				<div class="banner-slider-part">
					<div class="main-wrap">
						<div class="banner-slider-header">
							<?php if ( ! empty( $slider_title ) ) { ?>
								<div class="title-heading">
									<h3 class="widget-title">
										<span><?php echo esc_html( $slider_title ); ?></span>
									</h3>
								</div>
							<?php } ?>
							<div class="banner-slider-navigation"></div>
						</div>
						<div class="banner-slider slick-button">
							<?php
							$banner_slider_query = new WP_Query( $banner_slider_args );
							if ( $banner_slider_query->have_posts() ) {
								while ( $banner_slider_query->have_posts() ) :
									$banner_slider_query->the_post();
									$excerpt_count = get_theme_mod( 'ace_news_banner_slider_length', 15 );
									?>
									<div class="blog-post-container tile-layout">
										<div class="blog-post-inner">
											<div class="blog-post-image">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
											</div>
											<div class="blog-post-detail">
												<div class="post-categories">
													<?php ace_news_categories_list(); ?>
												</div>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<p class="post-excerpt">
													<?php echo wp_kses_post( wp_trim_words( get_the_content(), $excerpt_count ) ); ?>
												</p>
												<div class="post-meta">
													<?php ace_news_posted_by(); ?>
													<?php ace_news_posted_on(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php
								endwhile;
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
				</div>
				<!-- End Banner Slider -->

				<!-- Banner Editor Choice -->
				<div class="editors-choice">
					<div class="main-wrap">
						<?php if ( ! empty( $editor_title || $viewall_button ) ) : ?>
							<div class="title-heading">
								<h3 class="widget-title">
									<span><?php echo esc_html( $editor_title ); ?></span>
								</h3>
								<a href="<?php echo esc_url( $button_url ); ?>" class="view-all"><?php echo esc_html( $viewall_button ); ?></a>
							</div>
						<?php endif; ?>
						<div class="post-wrapper">
							<?php
							$editor_query = new WP_Query( $editor_args );
							if ( $editor_query->have_posts() ) {
								while ( $editor_query->have_posts() ) :
									$editor_query->the_post();
									?>
									<div class="blog-post-container tile-layout">
										<div class="blog-post-inner">
											<div class="blog-post-image">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
											</div>
											<div class="blog-post-detail">
												<div class="post-categories">
													<?php ace_news_categories_list(); ?>
												</div>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<div class="post-meta">
													<?php ace_news_posted_by(); ?>
													<?php ace_news_posted_on(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php
								endwhile;
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
				</div>
				<!-- End Banner Editor Choice -->

				<!-- End Banner Recent Stories -->
				<div class="recent-stories">
					<div class="main-wrap">
						<?php if ( ! empty( $recent_title || $viewall_button ) ) : ?>
							<div class="title-heading">
								<h3 class="widget-title">
									<span><?php echo esc_html( $recent_title ); ?></span>
								</h3>
								<a href="<?php echo esc_url( $button_url ); ?>" class="view-all"><?php echo esc_html( $viewall_button ); ?></a>
							</div>
						<?php endif ?>
						<div class="post-wrapper">
							<?php
							$recent_query = new WP_Query( $recent_args );
							if ( $recent_query->have_posts() ) {
								while ( $recent_query->have_posts() ) :
									$recent_query->the_post();
									?>
									<div class="blog-post-container list-layout">
										<div class="blog-post-inner">
											<div class="blog-post-image">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
											</div>
											<div class="blog-post-detail">
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<div class="post-meta">
													<?php ace_news_posted_by(); ?>
													<?php ace_news_posted_on(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php
								endwhile;
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
				</div>
				<!-- End Banner Recent Stories -->

			</div>
		</div>
	</section>

	<?php

}
