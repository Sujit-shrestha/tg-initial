<?php
if ( ! class_exists( 'Ace_News_Two_Column_Posts_Widget' ) ) {
	/**
	 * Adds Ace_News_Two_Column_Posts_Widget Widget.
	 */
	class Ace_News_Two_Column_Posts_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$ace_news_two_column_posts_widget_ops = array(
				'classname'   => 'two-column-posts ascendoor-widget style-1',
				'description' => __( 'Retrive Two Column Posts Widgets', 'ace-news' ),
			);
			parent::__construct(
				'ace_news_two_column_widget',
				__( 'Ascendoor Two Column Posts Widget', 'ace-news' ),
				$ace_news_two_column_posts_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$two_column_posts_offset = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';

			echo $args['before_widget'];
			?>
			<div class="two-column-posts-wrapper">
				<?php
				for ( $i = 1; $i <= 2; $i++ ) {
					$two_column_posts_title    = ( ! empty( $instance[ 'title_' . $i ] ) ) ? ( $instance[ 'title_' . $i ] ) : '';
					$two_column_posts_title    = apply_filters( 'widget_title_' . $i, $two_column_posts_title, $instance, $this->id_base );
					$two_column_posts_category = isset( $instance[ 'category_' . $i ] ) ? absint( $instance[ 'category_' . $i ] ) : '';
					?>
					<div class="single-column-posts-wrapper">
						<div class="main-wrap">
						<?php if ( ! empty( $two_column_posts_title ) ) { ?>
							<div class="title-heading">
								<?php
								echo $args['before_title'] . esc_html( $two_column_posts_title ) . $args['after_title'];
								?>
							</div>
							<?php
						}
							$two_column_posts_widgets_args = array(
								'post_type'      => 'post',
								'posts_per_page' => absint( 4 ),
								'offset'         => absint( $two_column_posts_offset ),
								'cat'            => absint( $two_column_posts_category ),
							);
							$query                         = new WP_Query( $two_column_posts_widgets_args );
							if ( $query->have_posts() ) :
								$j = 1;
								while ( $query->have_posts() ) :
									$query->the_post();
									$classes = $j === 1 ? 'tile-layout' : 'list-layout';
									?>
									<div class="blog-post-container <?php echo esc_attr( $classes ); ?>">
										<div class="blog-post-inner">
											<div class="blog-post-image">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
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
									$j++;
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$two_column_posts_title_1    = isset( $instance['title_1'] ) ? ( $instance['title_1'] ) : '';
			$two_column_posts_title_2    = isset( $instance['title_2'] ) ? ( $instance['title_2'] ) : '';
			$two_column_posts_offset     = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$two_column_posts_category_1 = isset( $instance['category_1'] ) ? absint( $instance['category_1'] ) : '';
			$two_column_posts_category_2 = isset( $instance['category_2'] ) ? absint( $instance['category_2'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_1' ) ); ?>"><?php esc_html_e( 'Section Title 1', 'ace-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_1' ) ); ?>" type="text" value="<?php echo esc_attr( $two_column_posts_title_1 ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category_1' ) ); ?>"><?php esc_html_e( 'Select the category 1 to show posts', 'ace-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_1' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories_1 = ace_news_get_post_cat_choices();
					foreach ( $categories_1 as $category_1 => $value_1 ) {
						?>
						<option value="<?php echo absint( $category_1 ); ?>" <?php selected( $two_column_posts_category_1, $category_1 ); ?>><?php echo esc_html( $value_1 ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_2' ) ); ?>"><?php esc_html_e( 'Section Title 2', 'ace-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_2' ) ); ?>" type="text" value="<?php echo esc_attr( $two_column_posts_title_2 ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category_2' ) ); ?>"><?php esc_html_e( 'Select the category 2 to show posts', 'ace-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_2' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories_2 = ace_news_get_post_cat_choices();
					foreach ( $categories_2 as $category_2 => $value_2 ) {
						?>
						<option value="<?php echo absint( $category_2 ); ?>" <?php selected( $two_column_posts_category_2, $category_2 ); ?>><?php echo esc_html( $value_2 ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over', 'ace-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $two_column_posts_offset ); ?>" />
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance               = $old_instance;
			$instance['title_1']    = sanitize_text_field( $new_instance['title_1'] );
			$instance['title_2']    = sanitize_text_field( $new_instance['title_2'] );
			$instance['offset']     = (int) $new_instance['offset'];
			$instance['category_1'] = (int) $new_instance['category_1'];
			$instance['category_2'] = (int) $new_instance['category_2'];
			return $instance;
		}

	}
}
