<?php

// List Posts Thumbnail Widget.
require get_template_directory() . '/inc/widgets/list-posts-thumbnail-widget.php';

// List Posts Widget.
require get_template_directory() . '/inc/widgets/list-posts-widget.php';

// Grid List Posts Widget.
require get_template_directory() . '/inc/widgets/grid-list-posts-widget.php';

// Grid Posts Widget.
require get_template_directory() . '/inc/widgets/grid-posts-widget.php';

// Posts Carousel Widget.
require get_template_directory() . '/inc/widgets/posts-carousel-widget.php';

// Two Column Posts Widget.
require get_template_directory() . '/inc/widgets/two-column-posts-widget.php';

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function ace_news_register_widgets() {

	register_widget( 'Ace_News_List_Posts_Thumbnail_Widget' );

	register_widget( 'Ace_News_List_Posts_Widget' );

	register_widget( 'Ace_News_Grid_List_Posts_Widget' );

	register_widget( 'Ace_News_Grid_Posts_Widget' );

	register_widget( 'Ace_News_Posts_Carousel_Widget' );

	register_widget( 'Ace_News_Two_Column_Posts_Widget' );

	register_widget( 'Ace_News_Author_Info_Widget' );

	register_widget( 'Ace_News_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'ace_news_register_widgets' );
