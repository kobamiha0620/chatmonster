<?php
global $dp_options, $post, $works_archive_gallery_vars;
if ( ! $dp_options ) $dp_options = get_design_plus_option();

$works_archive_gallery_vars = array_merge( array(
	'indent' => 2,
	'works_category_id' => 0,
	'show_works_category_filter' => 1,
	'posts_per_page' => -1,
	'order' => $dp_options['archive_works_order'] ? $dp_options['archive_works_order'] : 'date'
), (array) $works_archive_gallery_vars );

$indent = absint( $works_archive_gallery_vars['indent'] );

if ( $dp_options['use_works_category'] && $works_archive_gallery_vars['show_works_category_filter'] ) :
	$terms = get_terms( $dp_options['works_category_slug'], array(
		'hierarchical' => false,
		'parent' => $works_archive_gallery_vars['works_category_id']
	) );
	if ( $terms && ! is_wp_error( $terms ) ) :
		echo str_repeat( "\t", $indent );
		echo '<ul class="p-works-gallery__filter">' . "\n";
		echo str_repeat( "\t", $indent + 1 );
		echo '<li class="p-works-gallery__filter-item is-active" data-cat-id=""><span>ALL</span></li>' . "\n";

		foreach( $terms as $term ) :
			echo str_repeat( "\t", $indent + 1 );
			echo '<li class="p-works-gallery__filter-item" data-cat-id="' . esc_attr( $term->term_id ) . '"><span>' . esc_html( $term->name ) . '</span></li>' . "\n";
		endforeach;

		echo str_repeat( "\t", $indent );
		echo "</ul>\n";
	endif;
endif;

$args = array(
	'post_type' => $dp_options['works_slug'],
	'post_status' => 'publish',
	'posts_per_page' => $works_archive_gallery_vars['posts_per_page'] > 0 ? $works_archive_gallery_vars['posts_per_page'] : -1,
	'ignore_sticky_posts' => true
);

if ( in_array( $works_archive_gallery_vars['order'], array( 'rand', 'random') ) ) :
	$args['orderby'] = 'rand';
elseif ( 'date2' == $works_archive_gallery_vars['order'] ) :
	$args['orderby'] = 'date';
	$args['order'] = 'ASC';
else :
	$args['orderby'] = 'date';
	$args['order'] = 'DESC';
endif;

if ( $works_archive_gallery_vars['works_category_id'] ) :
	$args['tax_query'][] = array(
		'taxonomy' => $dp_options['works_category_slug'],
		'field' => 'term_id',
		'terms' => $works_archive_gallery_vars['works_category_id'],
		'operator' => 'IN'
	);
endif;

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
	$arr_gallery_html = array();

	while ( $the_query->have_posts() ) :
		$the_query->the_post();

		$thumbnail_url = null;
		$thumbnail_size = null;

		// ギャラリー最初の画像
		foreach( (array) $post->repeater_gallery as $gallery ) :
			if ( ! empty( $gallery['image'] ) ) :
				if ( empty( $gallery['thumbnail_size'] ) ) :
					$gallery['thumbnail_size'] = 'type1';
				endif;
				if ( 'type2' === $gallery['thumbnail_size'] ) :
					$image = wp_get_attachment_image_src( $gallery['image'], 'works2' );
					$thumbnail_size = 'type2';
				elseif ( 'type3' === $gallery['thumbnail_size'] ) :
					$image = wp_get_attachment_image_src( $gallery['image'], 'works3' );
					$thumbnail_size = 'type3';
				else :
					$image = wp_get_attachment_image_src( $gallery['image'], 'works1' );
					$thumbnail_size = 'type1';
				endif;
				if ( $image ) :
					$thumbnail_url = $image[0];
					break;
				endif;
			endif;
		endforeach;

		if ( ! $thumbnail_url ) :
			$thumbnail_url = get_template_directory_uri() . '/img/no-image-600x600.gif';
			$thumbnail_size = 'type1';
		endif;

		$title = strip_tags( get_the_title() );

		$item_class = 'p-works-gallery__item p-works-gallery__item--' . esc_attr( $gallery['thumbnail_size'] );
		if ( $title ) :
			$item_class .= ' p-works-gallery__item--has-caption';
		endif;

		if ( $dp_options['use_works_category'] && $works_archive_gallery_vars['show_works_category_filter'] ) :
			$terms = get_the_terms( get_the_ID(), $dp_options['works_category_slug'] );
			if ( $terms && ! is_wp_error( $terms ) ) :
				foreach( $terms as $term ) :
					$item_class .= ' cat-' . $term->term_id;
				endforeach;
			endif;
		endif;

		$gallery_item_html = '<div class="' . $item_class . '">';
		$gallery_item_html .= '<a class="p-hover-effect--' . esc_attr( $dp_options['hover_type'] ) . '" href="' . get_permalink() . '">';
		$gallery_item_html .= '<div class="p-works-gallery__thumbnail p-hover-effect__image js-object-fit-cover">';
		$gallery_item_html .= '<img src="' . esc_attr( $thumbnail_url ) . '" alt="' . esc_attr( $title ) . '">';
		$gallery_item_html .= '</div>';

		if ( $title ) :
			$gallery_item_html .= '<h3 class="p-works-gallery__caption">' . esc_html( $title ) . '</h3>';
		endif;

		$gallery_item_html .= '</a>';
		$gallery_item_html .= '</div>';

		$arr_gallery_html[] = $gallery_item_html;
	endwhile;

	wp_reset_postdata();

	if ( $arr_gallery_html ) :
		echo str_repeat( "\t", $indent );
		echo '<div class="p-works-gallery">' . "\n";
		echo str_repeat( "\t", $indent + 1 );
		echo implode( "\n" . str_repeat( "\t", $indent + 1 ), $arr_gallery_html ) . "\n";
		echo str_repeat( "\t", $indent );
		echo "</div>\n";
	endif;

	$arr_gallery_html = $terms = $term = null;
endif;
