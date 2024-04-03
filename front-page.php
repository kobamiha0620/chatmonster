<?php
$dp_options = get_design_plus_option();

get_header();
?>
<main class="l-main">
<?php
get_template_part( 'template-parts/index-slider' );

// コンテンツビルダー
if ( ! empty( $dp_options['contents_builder'] ) ) :
	foreach ( $dp_options['contents_builder'] as $key => $cb_content ) :
		$cb_index = 'cb_' . ( $key + 1 );
		if ( empty( $cb_content['cb_content_select'] ) || empty( $cb_content['cb_display'] ) ) continue;

		$cb_item_class = 'p-cb__item p-cb__item--' . esc_attr( $cb_content['cb_content_select'] );
		$cb_item_attr = null;
		$cb_background_image = null;

		if ( ! empty( $cb_content['cb_background_image'] ) && $cb_background_image = wp_get_attachment_url( $cb_content['cb_background_image'] ) ) :
			$cb_item_class .= ' has-bg has-bg-image';
			if ( ! empty( $cb_content['cb_background_image_parallax'] ) ) :
				$cb_item_class .= ' has-bg-image-parallax';
				$cb_item_attr .= ' data-src="' . esc_attr( $cb_background_image ) . '"';

			else :
				$cb_item_attr .= ' style="background-image: url(' . esc_attr( $cb_background_image ) . ');"';
			endif;
		elseif ( ! empty( $cb_content['cb_background_color'] ) && '#ffffff' != strtolower( $cb_content['cb_background_color'] ) ) :
			$cb_item_class .= ' has-bg has-bg-color';
			$cb_item_attr .= ' style="background-color: ' . esc_attr( $cb_content['cb_background_color'] ) . ';"';
		endif;

		$cb_item_start = "\t" . '<div id="' . $cb_index . '" class="' . esc_attr( $cb_item_class ) . '"' . $cb_item_attr . '>' . "\n";
		$cb_item_start .= "\t\t" . '<div class="p-cb__item-inner l-inner">' . "\n";

		if ( ! in_array( $cb_content['cb_content_select'], array( 'pr', 'banner' ) ) ) :
			if ( ! empty( $cb_content['cb_headline'] ) ) :
				$cb_item_start .= "\t\t\t" . '<h2 class="p-cb__item-headline">' . str_replace( array( "\r\n" , "\r" , "\n" ), '<br>', esc_html( $cb_content['cb_headline'] ) ) . '</h2>' . "\n";
			endif;

			if ( ! empty( $cb_content['cb_desc'] ) ) :
				$cb_item_start .= "\t\t\t" . '<div class="p-cb__item-desc">' . str_replace( array( "\r\n", "\r", "\n" ), '', wpautop( $cb_content['cb_desc'] ) ) . '</div>' . "\n";
			endif;
		endif;

		$cb_item_end = "\t\t</div>\n";
		$cb_item_end .= "\t</div>\n";

		// ブログ
		if ( 'blog' == $cb_content['cb_content_select'] ) :
			$cb_category = null;
			$cb_archive_url = null;

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $cb_content['cb_post_num'],
				'ignore_sticky_posts' => true
			);

			if ( 'recommend_post' == $cb_content['cb_list_type'] ) :
				$args['meta_key'] = 'recommend_post';
				$args['meta_value'] = 'on';
			elseif ( 'recommend_post2' == $cb_content['cb_list_type'] ) :
				$args['meta_key'] = 'recommend_post2';
				$args['meta_value'] = 'on';
			elseif ( 'pickup_post' == $cb_content['cb_list_type'] ) :
				$args['meta_key'] = 'pickup_post';
				$args['meta_value'] = 'on';
			elseif ( 'category' == $cb_content['cb_list_type'] && $cb_content['cb_category'] ) :
				$cb_category = get_category( $cb_content['cb_category'] );
			endif;
			if ( $cb_category && ! is_wp_error( $cb_category ) ) :
				$args['cat'] = $cb_category->term_id;
			else :
				$cb_category = null;
			endif;

			if ( 'random' == $cb_content['cb_order'] ) :
				$args['orderby'] = 'rand';
			elseif ( 'date2' == $cb_content['cb_order'] ) :
				$args['orderby'] = 'date';
				$args['order'] = 'ASC';
			else :
				$args['orderby'] = 'date';
				$args['order'] = 'DESC';
			endif;

			if ( $cb_content['cb_show_archive_link'] && $cb_content['cb_archive_link_text'] ) :
				if ( $cb_category ) :
					$cb_archive_url = get_post_type_archive_link( 'post' );
					//$cb_archive_url = get_category_link( $cb_category );
				else :
					$cb_archive_url = get_post_type_archive_link( 'post' );
				endif;
			endif;

			$cb_query = new WP_Query( $args );
			if ( $cb_query->have_posts() ) :
				echo $cb_item_start;
?>
			<div class="p-index-archive<?php if ( $cb_content['cb_show_date'] ) echo ' has-date-top'; ?>">
<?php
				while ( $cb_query->have_posts() ) :
					$cb_query->the_post();
?>
				<article class="p-index-archive__item">
					<a class="p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?>" href="<?php the_permalink(); ?>">
<?php
					if ( $cb_content['cb_show_date'] ) :
?>
						<time class="p-index-archive__item-date p-article__date" datetime="<?php the_time( 'c' ); ?>"><span class="p-article__date-day"><?php the_time( 'd' ); ?></span><span class="p-article__date-month"><?php echo mysql2date( 'M', $post->post_date, false ); ?></span><span class="p-article__date-year"><?php the_time( 'Y' ); ?></span></time>
<?php
					endif;
?>
						<div class="p-index-archive__item-thumbnail p-hover-effect__image js-object-fit-cover">
<?php
					echo "\t\t\t\t\t\t\t";
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'size2' );
					else :
						echo '<img src="' . get_template_directory_uri() . '/img/no-image-600x600.gif" alt="">';
					endif;
					echo "\n";
?>
						</div>
						<div class="p-index-archive__item-info">
							<h3 class="p-index-archive__item-title p-article-<?php echo esc_attr( $post->post_type ); ?>__title p-article__title"><?php echo mb_strimwidth( strip_tags( get_the_title() ), 0, is_mobile() ? 50 : ( $cb_background_image ? 86 : 104 ), '...' ); ?></h3>
<?php
					if ( $cb_content['cb_show_category'] ) :
						echo "\t\t\t\t\t\t\t";
						echo '<p class="p-index-archive__item-meta p-article__meta">';
						$categories = get_the_category();
						if ( $categories && ! is_wp_error( $categories ) ) :
							echo '<span class="p-index-archive__item-category p-article__category" data-url="' . get_category_link( $categories[0] ) . '">' . esc_html( $categories[0]->name ) . '</span>';
						endif;
						echo "</p>\n";
					endif;
?>
						</div>
					</a>
				</article>
<?php
				endwhile;
?>
			</div>
<?php
				if ( $cb_archive_url && $cb_content['cb_archive_link_text'] ) :
?>
			<div class="p-cb__item-button__wrapper">
				<a class="p-cb__item-button p-button" href="<?php echo esc_url( $cb_archive_url ); ?>"<?php if ( $cb_content['cb_archive_link_target_blank'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $cb_content['cb_archive_link_text'] ); ?></a>
			</div>
<?php
				endif;

				echo $cb_item_end;
			endif;

		// Information
		elseif ( 'information' == $cb_content['cb_content_select'] ) :
			$args = array(
				'post_type' => $dp_options['information_slug'],
				'posts_per_page' => $cb_content['cb_post_num'],
				'ignore_sticky_posts' => true
			);

			if ( 'random' == $cb_content['cb_order'] ) :
				$args['orderby'] = 'rand';
			elseif ( 'date2' == $cb_content['cb_order'] ) :
				$args['orderby'] = 'date';
				$args['order'] = 'ASC';
			else :
				$args['orderby'] = 'date';
				$args['order'] = 'DESC';
			endif;

			$cb_query = new WP_Query( $args );
			if ( $cb_query->have_posts() ) :
				echo $cb_item_start;
?>
			<div class="p-index-archive">
<?php
				while ( $cb_query->have_posts() ) :
					$cb_query->the_post();
?>
				<article class="p-index-archive__item">
					<a class="p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?>" href="<?php the_permalink(); ?>">
						<div class="p-index-archive__item-thumbnail p-hover-effect__image js-object-fit-cover">
<?php
					echo "\t\t\t\t\t\t\t";
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'size2' );
					else :
						echo '<img src="' . get_template_directory_uri() . '/img/no-image-600x600.gif" alt="">';
					endif;
					echo "\n";
?>
						</div>
						<div class="p-index-archive__item-info">
							<h3 class="p-index-archive__item-title p-article-<?php echo esc_attr( $post->post_type ); ?>__title p-article__title"><?php echo mb_strimwidth( strip_tags( get_the_title() ), 0, is_mobile() ? 50 : ( $cb_background_image ? 86 : 104 ), '...' ); ?></h3>
<?php
					if ( $cb_content['cb_show_date'] ) :
						echo "\t\t\t\t\t\t\t";
						echo '<p class="p-index-archive__item-meta p-article__meta">';
						echo '<time class="p-article__date" datetime="' . get_the_time( 'Y-m-d' ) . '">' . get_the_time( 'Y.m.d' ) . '</time>';
						echo "</p>\n";
					endif;
?>
						</div>
					</a>
				</article>
<?php
				endwhile;
?>
			</div>
<?php
				if ( $cb_content['cb_show_archive_link'] && $cb_content['cb_archive_link_text'] ) :
?>
			<div class="p-cb__item-button__wrapper">
				<a class="p-cb__item-button p-button" href="<?php echo esc_url( get_post_type_archive_link( $dp_options['information_slug'] ) ); ?>"<?php if ( $cb_content['cb_archive_link_target_blank'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $cb_content['cb_archive_link_text'] ); ?></a>
			</div>
<?php
				endif;

				echo $cb_item_end;
			endif;

		// Works
		elseif ( 'works' == $cb_content['cb_content_select'] ) :
			// works-archive-gallery.phpへ渡すグローバル変数
			global $works_archive_gallery_vars;
			$works_archive_gallery_vars = array(
				'indent' => 3,
				'works_category_id' => 0,
				'posts_per_page' => $cb_content['cb_post_num'] > 0 ? $cb_content['cb_post_num'] : -1,
				'order' => $cb_content['cb_order']
			);

			$cb_archive_url = get_post_type_archive_link( $dp_options['works_slug'] );
			$cb_category = null;

			if ( $dp_options['use_works_category'] && $cb_content['cb_category'] ) :
				$cb_category = get_term_by( 'id', $cb_content['cb_category'], $dp_options['works_category_slug'] );
			endif;
			if ( $cb_category && ! is_wp_error( $cb_category ) ) :
				$works_archive_gallery_vars['works_category_id'] = $cb_category->term_id;
				//$cb_archive_url = get_term_link( $cb_category );
			else :
				$cb_category = null;
			endif;

			ob_start();
			get_template_part( 'template-parts/works-archive-gallery' );
			$gallery = ob_get_clean();

			if ( $gallery ) :
				// js
				wp_enqueue_script( 'famous-works' );

				echo $cb_item_start;
				echo $gallery;

				if ( $cb_content['cb_show_archive_link'] && $cb_content['cb_archive_link_text'] ) :
?>
			<div class="p-cb__item-button__wrapper">
				<a class="p-cb__item-button p-button" href="<?php echo esc_url( $cb_archive_url ); ?>"<?php if ( $cb_content['cb_archive_link_target_blank'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $cb_content['cb_archive_link_text'] ); ?></a>
			</div>
<?php
				endif;

				echo $cb_item_end;
			endif;

			$gallery = null;

		// Voiceカルーセル
		elseif ( 'voice_carousel' == $cb_content['cb_content_select'] ) :
			$args = array(
				'post_type' => $dp_options['voice_slug'],
				'posts_per_page' => $cb_content['cb_post_num'],
				'ignore_sticky_posts' => true
			);

			if ( 'random' == $cb_content['cb_order'] ) :
				$args['orderby'] = 'rand';
			elseif ( 'date2' == $cb_content['cb_order'] ) :
				$args['orderby'] = 'date';
				$args['order'] = 'ASC';
			else :
				$args['orderby'] = 'date';
				$args['order'] = 'DESC';
			endif;

			$cb_query = new WP_Query( $args );
			if ( $cb_query->have_posts() ) :
				echo $cb_item_start;

				$voice_archive_url = get_post_type_archive_link( $dp_options['voice_slug'] );
?>
				<div class="p-index-carousel<?php if ( $cb_content['cb_show_thumbnail'] ) echo ' has-thumbnail'; ?>" data-interval="<?php echo esc_attr( $cb_content['cb_slide_time_seconds'] ); ?>">
<?php
				while ( $cb_query->have_posts() ) :
					$cb_query->the_post();
?>
				<article class="p-index-carousel__item">
<?php
					if ( $cb_content['cb_show_thumbnail'] ) :

						echo "\t\t\t\t\t";
						echo '<div class="p-index-carousel__item-thumbnail p-hover-effect__image js-object-fit-cover">';
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'size1' );
						else :
							echo '<img src="' . get_template_directory_uri() . '/img/no-image-300x300.gif" alt="">';
						endif;
						echo "</div>\n";
					endif;
?>
					<h3 class="p-index-carousel__item-title p-article-<?php echo esc_attr( $post->post_type ); ?>__title p-article__title"><?php the_title(); ?></h3>
					<div class="p-index-carousel__item-desc p-entry__body p-entry-voice__body"><?php
					if ( post_password_required() ) :
						echo tcd_the_excerpt();
					else :
						echo strip_tags( get_the_content( '' ), '<p>' );
					endif;
?></div>
				</article>
<?php
				endwhile;
?>
			</div>
<?php
				if ( $cb_content['cb_show_archive_link'] && $cb_content['cb_archive_link_text'] ) :
?>
			<div class="p-cb__item-button__wrapper">
				<a class="p-cb__item-button p-button" href="<?php echo esc_url( $voice_archive_url ); ?>"<?php if ( $cb_content['cb_archive_link_target_blank'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $cb_content['cb_archive_link_text'] ); ?></a>
			</div>
<?php
				endif;

				echo $cb_item_end;
			endif;

		// About
		elseif ( 'about' == $cb_content['cb_content_select'] ) :
			$image = array(
				1 => wp_get_attachment_image_src( $cb_content['cb_image1'], 'size3' ),
				2 => wp_get_attachment_image_src( $cb_content['cb_image2'], 'size3' ),
				3 => wp_get_attachment_image_src( $cb_content['cb_image3'], 'size3' )
			);
			$image = array_filter( $image , 'is_array' );

			if ( $image || $cb_content['cb_headline'] || $cb_content['cb_desc'] || $cb_content['cb_desc2'] || ( $cb_content['cb_button_label'] && $cb_content['cb_button_url'] ) ) :
				echo $cb_item_start;

				if ( $image ) :
?>
			<div class="p-index-about__images">
<?php
					for( $i = 1; $i <= 3; $i++ ) :
						if ( ! empty( $image[$i][0] ) ) :
							if ( $cb_content['cb_image_url' . $i] ) :
?>
				<a class="p-index-about__image p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?>" href="<?php echo esc_attr( $cb_content['cb_image_url' . $i] ); ?>"<?php if ( $cb_content['cb_image_target_blank' . $i] ) echo ' target="_blank"'; ?>>
					<div class="p-index-about__image__inner p-hover-effect__image js-object-fit-cover">
						<img src="<?php echo esc_attr( $image[$i][0] ); ?>" alt="<?php echo esc_attr( $cb_content['cb_image_label' . $i] ); ?>">
						<span class="p-index-about__image-label"><?php echo esc_html( $cb_content['cb_image_label' . $i] ); ?></span>
					</div>
				</a>
<?php
							else :
?>
				<div class="p-index-about__image"><div class="p-index-about__image__inner js-object-fit-cover"><img src="<?php echo esc_attr( $image[$i][0] ); ?>" alt="<?php echo esc_attr( $cb_content['cb_image_label' . $i] ); ?>"></div></div>
<?php
							endif;
						endif;
					endfor;
?>
			</div>
<?php
				endif;

				if ( ! empty( $cb_content['cb_desc2'] ) ) :
?>
			<div class="p-cb__item-desc p-cb__item-desc2"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '', wpautop( $cb_content['cb_desc2'] ) ); ?></div>
<?php
				endif;

				if ( $cb_content['cb_button_label'] && $cb_content['cb_button_url'] ) :
?>
			<div class="p-cb__item-button__wrapper">
				<a class="p-cb__item-button p-button" href="<?php echo esc_attr( $cb_content['cb_button_url'] ); ?>"<?php if ( $cb_content['cb_button_target_blank'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $cb_content['cb_button_label'] ); ?></a>
			</div>
<?php
				endif;

				echo $cb_item_end;
			endif;

		// PR&ACCESS
		elseif ( 'pr' == $cb_content['cb_content_select'] ) :
			$image = wp_get_attachment_image_src( $cb_content['cb_image'], 'size5' );

			$has_content = false;

			// type2 free space
			if ( 'type2' == $cb_content['cb_type'] ) :
				$cb_wysiwyg_editor = apply_filters( 'the_content', $cb_content['cb_wysiwyg_editor'] );
				if ( $cb_wysiwyg_editor ) :
					$has_content = true;
				endif;

			// type1 template
			elseif ( $cb_content['cb_headline'] || $cb_content['cb_desc'] || ( $cb_content['cb_show_googlemap'] && $cb_content['cb_googlemap_address'] ) ) :
				$has_content = true;
			endif;

			if ( $image || $has_content || ( $cb_content['cb_button_label'] && $cb_content['cb_button_url'] ) ) :
				echo $cb_item_start;

				if ( $image ) :
?>
			<div class="p-index-pr__image"><img src="<?php echo esc_attr( $image[0] ); ?>" alt="<?php echo esc_attr( $cb_content['cb_headline'] ); ?>"></div>
<?php
				endif;

				// type2 free space
				if ( 'type2' == $cb_content['cb_type'] ) :
					if ( $cb_wysiwyg_editor ) :
?>
			<div class="p-entry__body">
				<?php echo $cb_wysiwyg_editor; ?>
			</div>
<?php
					endif;

				// type1 template
				else :
					if ( $cb_content['cb_headline'] ) :
						echo "\t\t\t" . '<h2 class="p-cb__item-headline">' . str_replace( array( "\r\n" , "\r" , "\n" ), '<br>', esc_html( $cb_content['cb_headline'] ) ) . '</h2>' . "\n";
					endif;

					if ( $cb_content['cb_desc'] ) :
						echo "\t\t\t" . '<div class="p-cb__item-desc">' . str_replace( array( "\r\n", "\r", "\n" ), '', wpautop( $cb_content['cb_desc'] ) ) . '</div>' . "\n";
					endif;

					// google maps
					if ( $cb_content['cb_show_googlemap'] && $cb_content['cb_googlemap_address'] ) :
						// js
						wp_enqueue_script( 'famous-googlemap-api' );

						$use_custom_marker = 0;
						$marker_text = '';
						$marker_img = '';

						 // Use custom marker in Theme Options
						if ( 'type1' === $cb_content['cb_googlemap_marker_type'] && 'type2' === $dp_options['gmap_marker_type'] ) :
							$use_custom_marker = 1;
							if ( 'type2' === $dp_options['gmap_custom_marker_type'] ) :
								$marker_img = $dp_options['gmap_marker_img'] ? wp_get_attachment_url( $dp_options['gmap_marker_img'] ) : '';
							else :
								$marker_text = $dp_options['gmap_marker_text'];
							endif;

						// Use custom overlay in content
						elseif ( 'type3' === $cb_content['cb_googlemap_marker_type'] ) :
							$use_custom_marker = 1;
							if ( 'type2' === $cb_content['cb_googlemap_custom_marker_type'] ) :
								$marker_img = $cb_content['cb_googlemap_marker_img'] ? wp_get_attachment_url( $cb_content['cb_googlemap_marker_img'] ) : '';
							else :
								$marker_text = $cb_content['cb_googlemap_marker_text'];
							endif;
						endif;

						echo "\t\t\t" . '<div id="p-index-pr__map--' . ( $key + 1 ) . '" class="p-index-pr__map" data-address="' . esc_js( $cb_content['cb_googlemap_address'] ) . '" data-address="' . esc_js( $cb_content['cb_googlemap_address'] ) . '" data-saturation="' . esc_attr( $cb_content['cb_googlemap_saturation'] ) . '"' . ( $use_custom_marker ? ' data-custom-marker="' . esc_attr( $use_custom_marker ) . '" data-marker-image="' . esc_attr( $marker_img ) . '" data-marker-text="' . esc_attr( $marker_text ) . '"' : '' ) .'></div>' . "\n";
						if ( $cb_content['cb_map_link'] ) :
							echo "\t\t\t" . '<div class="p-index-pr__map-link"><a class="" href="' . esc_url( $cb_content['cb_map_link'] ) . '" target="_blank">' . esc_html( is_mobile() ? $cb_content['cb_map_link_label_sp'] : $cb_content['cb_map_link_label'] ) . '</a></div>' . "\n";
						endif;

						if ( $cb_content['cb_googlemap_desc'] ) :
							echo "\t\t\t" . '<div class="p-index-pr__map-desc">' . str_replace( array( "\r\n", "\r", "\n" ), '', wpautop( $cb_content['cb_googlemap_desc'] ) ) . '</div>' . "\n";
						endif;
					endif;
				endif;

				if ( $cb_content['cb_button_label'] && $cb_content['cb_button_url'] ) :
?>
			<div class="p-cb__item-button__wrapper">
				<a class="p-cb__item-button p-button" href="<?php echo esc_attr( $cb_content['cb_button_url'] ); ?>"<?php if ( $cb_content['cb_button_target_blank'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $cb_content['cb_button_label'] ); ?></a>
			</div>
<?php
				endif;

				echo $cb_item_end;
			endif;

		// フリースペース
		elseif ( 'wysiwyg' == $cb_content['cb_content_select'] ) :
			$cb_wysiwyg_editor = apply_filters( 'the_content', $cb_content['cb_wysiwyg_editor'] );
			if ( $cb_wysiwyg_editor ) :
				echo $cb_item_start;
?>
			<div class="p-entry__body">
				<?php echo $cb_wysiwyg_editor; ?>
			</div>
<?php
				echo $cb_item_end;
			endif;
		endif;

	endforeach;

	wp_reset_postdata();
endif;
?>
</main>
<?php get_footer(); ?>
