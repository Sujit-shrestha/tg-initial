<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ace News
 */

get_header();

if ( is_front_page() && is_home() ) {

	require get_template_directory() . '/home.php';

} elseif ( is_front_page() && ! is_home() ) {
	?>
	<main id="primary" class="site-main">
		<?php require get_template_directory() . '/sections/sections.php'; ?>
	</main><!-- #main -->
	<?php
}

if ( true === get_theme_mod( 'ace_news_enable_frontpage_content', false )  && 'page' === get_option( 'show_on_front' ) ) {
	?>
	<div class="ace-news-main-wrapper">
		<div class="section-wrapper">
			<div class="ace-news-container-wrapper">
				<main id="primary" class="site-main">

					<?php
					do_action( 'ace_news_breadcrumb' );
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
				<?php
				if ( ace_news_is_sidebar_enabled() ) {
					get_sidebar();
				}
				?>
			</div>
		</div>
	</div>
	<?php

}

get_footer();
