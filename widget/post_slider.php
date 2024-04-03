<?php
/**
 * Post slider (tcd ver)
 */
class Tcdw_Post_Slider_Widget extends WP_Widget {

	/**
	 * List types.
	 */
	protected $list_types = array();

	/**
	 * Default instance.
	 */
	protected $default_instance = array();

	function __construct() {
		$this->list_types = array(
			'recent_post' => __( 'Recent post', 'tcd-w' ),
			'recommend_post' => __( 'Recommend post', 'tcd-w' ),
			'recommend_post2' => __( 'Recommend post2', 'tcd-w' ),
			'pickup_post' => __( 'Pickup post', 'tcd-w' ),
			'category' => __( 'Category', 'tcd-w')
		);

		$this->default_instance = array(
			'title' => '',
			'list_type' => 'pickup_post',
			'category' => 0,
			'post_num' => 5,
			'post_order' => 'date1',
			'slide_interval' => 7
		);

		parent::__construct(
			'tcdw_post_slider_widget', // ID
			__( 'Post slider (tcd ver)', 'tcd-w' ), // Name
			array(
				'classname' => 'tcdw_post_slider_widget',
				'description' => __( 'Displays post slider.', 'tcd-w' )
			)
		);
	}

	function widget( $args, $instance ) {
		global $dp_options;
		if ( ! $dp_options ) $dp_options = get_design_plus_option();

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$list_type = isset( $instance['list_type'] ) ? $instance['list_type'] : 'pickup_post';
		$category = isset( $instance['category'] ) ? $instance['category'] : 0;
		$post_num = isset( $instance['post_num'] ) ? absint( $instance['post_num'] ) : 5;
		$post_order = isset( $instance['post_order'] ) ? $instance['post_order'] : 'date1';
		$slide_interval = isset( $instance['slide_interval'] ) ? absint( $instance['slide_interval'] ) : 7;

		if ( 'date2' == $post_order ) {
			$order = 'ASC';
		} else {
			$order = 'DESC';
		}
		if ( $post_order == 'date1' || $post_order == 'date2' ) {
			$post_order = 'date';
		}

		$args = array();

		if ( in_array( $list_type, array( 'recommend_post', 'recommend_post2', 'pickup_post' ) ) ) {
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_num,
				'ignore_sticky_posts' => 1,
				'orderby' => $post_order,
				'order' => $order,
				'meta_key' => $list_type,
				'meta_value' => 'on'
			);
		} elseif ( 'category' == $list_type ) {
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_num,
				'ignore_sticky_posts' => 1,
				'orderby' => $post_order,
				'order' => $order,
				'cat' => $category
			);
		} elseif ( 'recent_post' == $list_type ) {
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_num,
				'ignore_sticky_posts' => 1,
				'orderby' => $post_order,
				'order' => $order
			);
		}

		if ( ! $args ) {
			return;
		}

		$widget_query = new WP_Query( $args );

		if ( $widget_query->have_posts() ) :
			global $post;

			echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			echo '<ul class="p-widget-slider" data-interval="' . esc_attr( $slide_interval ) . '">' . "\n";

			while ( $widget_query->have_posts() ) :
				$widget_query->the_post();
?>
	<li class="p-widget-slider__item">
		<a class="p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?> u-clearfix" href="<?php the_permalink(); ?>">
			<div class="p-widget-slider__item-thumbnail p-hover-effect__image js-object-fit-cover"><?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'size2' );
					else :
						echo '<img src="' . get_template_directory_uri() . '/img/no-image-600x600.gif" alt="">';
					endif;
			?></div>
			<h3 class="p-widget-slider__item-title"><?php echo mb_strimwidth( strip_tags( get_the_title() ), 0, is_mobile() ? 69 : 71, '...' ); ?></h3>
		</a>
	</li>
<?php
			endwhile;
			wp_reset_postdata();

			echo "</ul>\n";

			echo $after_widget;

		endif;
	}

	function form( $instance ) {
		$instance = array_merge( $this->default_instance, $instance );

		$title = isset( $instance['title'] ) ? $instance['title'] : '';
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'tcd-w' ); ?></label>
			<input class="large-text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'list_type' ); ?>"><?php _e( 'Post type:', 'tcd-w' ); ?></label>
			<select class="widefat js-tcdw_post_slider_widget-list_type" id="<?php echo $this->get_field_id( 'list_type' ); ?>" name="<?php echo $this->get_field_name( 'list_type' ); ?>">
<?php
		foreach ( $this->list_types as $key => $value ) :
			echo '<option value="' . esc_attr( $key ) . '" ' . selected( $instance['list_type'], $key, false ) . '>' . esc_html( $value ) . '</option>';
		endforeach;
?>
			</select>
		</p>
		<p class="tcdw_post_slider_widget-list_type-category<?php echo 'category' == $instance['list_type'] ? '' : ' hidden'; ?>">
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'tcd-w' ); ?></label>
<?php
		wp_dropdown_categories( array(
			'class' => 'widefat',
			'echo' => 1,
			'hide_empty' => 0,
			'hierarchical' => 1,
			'id' => $this->get_field_id( 'category' ),
			'name' => $this->get_field_name( 'category' ),
			'selected' => $instance['category'],
			'show_count' => 0,
			'value_field' => 'term_id'
		) );
?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_num' ); ?>"><?php _e( 'Number of post:', 'tcd-w' ); ?></label>
			<input class="large-text" id="<?php echo $this->get_field_id( 'post_num' ); ?>" name="<?php echo $this->get_field_name( 'post_num' ); ?>" type="number" value="<?php echo esc_attr( $instance['post_num'] ); ?>" min="1">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_order' ); ?>"><?php _e( 'Post order:', 'tcd-w' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'post_order' ); ?>" name="<?php echo $this->get_field_name( 'post_order' ); ?>">
				<option value="date1" <?php selected( $instance['post_order'], 'date1' ); ?>><?php _e( 'Date (DESC)', 'tcd-w' ); ?></option>
				<option value="date2" <?php selected( $instance['post_order'], 'date2' ); ?>><?php _e( 'Date (ASC)', 'tcd-w' ); ?></option>
				<option value="rand" <?php selected( $instance['post_order'], 'rand' ); ?>><?php _e( 'Random', 'tcd-w' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'slide_interval' ); ?>"><?php _e( 'Slide interval seconds', 'tcd-w' ); ?>:</label>
			<input class="small-text" id="<?php echo $this->get_field_id( 'slide_interval' ); ?>" name="<?php echo $this->get_field_name( 'slide_interval' ); ?>" type="number" value="<?php echo esc_attr( $instance['slide_interval'] ); ?>" min="3" max="15"> <?php _e( ' seconds', 'tcd-w' ); ?>
		</p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['list_type'] = isset( $new_instance['list_type'] ) ? strip_tags( $new_instance['list_type'] ) : 'pickup_post';
		$instance['category'] = isset( $new_instance['category'] ) ? absint( $new_instance['category'] ) : 0;
		$instance['post_num'] = isset( $new_instance['post_num'] ) ? absint( $new_instance['post_num'] ) : 5;
		$instance['post_order'] = isset( $new_instance['list_type'] ) ? strip_tags( $new_instance['post_order'] ) : 'date1';
		$instance['slide_interval'] = isset( $new_instance['slide_interval'] ) ? absint( $new_instance['slide_interval'] ) : 5;
		return $instance;
	}
}

function register_tcdw_post_slider_widget() {
	register_widget( 'Tcdw_Post_Slider_Widget' );
}
add_action( 'widgets_init', 'register_tcdw_post_slider_widget' );
