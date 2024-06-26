<?php
global $dp_options, $post;
if ( ! $dp_options ) $dp_options = get_design_plus_option();

// 動画, Youtube
if ( in_array( $dp_options['header_content_type'], array( 'type2', 'type3' ) ) ) :
	$type = null;
	$html = null;
	$url = null;
	$header_video_sp_image = $dp_options['header_video_sp_image'] ?? 0;


	// 動画
	if ( 'type2' === $dp_options['header_content_type'] ) :
		// スマホ画像表示
		if(wp_is_mobile() && $header_video_sp_image && $url = wp_get_attachment_url( $dp_options['header_video_image'] )):
			$type = 'image';
		elseif ( !auto_play_movie() && $url = wp_get_attachment_url( $dp_options['header_video_image'] ) ) :
				$type = 'image';
		elseif ( auto_play_movie() && $url = wp_get_attachment_url( $dp_options['header_video'] ) ) :
			$type = 'type2';
		endif;

	// Youtube
	elseif ( 'type3' === $dp_options['header_content_type'] ) :
		// スマホ画像表示
		if(wp_is_mobile() && $header_video_sp_image && $url = wp_get_attachment_url( $dp_options['header_youtube_image'] )):
			$type = 'image';
		elseif ( !auto_play_movie() && $url = wp_get_attachment_url( $dp_options['header_youtube_image'] )) :
			$type = 'image';
		elseif ( auto_play_movie() && $dp_options['header_youtube_url'] ) :
			// parse youtube video id
			// https://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match
			if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $dp_options['header_youtube_url'], $matches ) ) :
				$type = 'type3';
				$url = 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=0&controls=0&enablejsapi=1&fs=0&iv_load_policy=3&loop=1&mute=1&origin=' . ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . '&playlist=' . $matches[1] . '&rel=0&showinfo=0';
			endif;
		endif;
	endif;

	if ( $url && $type ) :
		// モバイルコンテンツ
		$content_type_mobile = null;
		if ( in_array( $dp_options['header_video_content_type_mobile'], array( 'type1', 'type2' ) ) ) :
			$content_type_mobile = $dp_options['header_video_content_type_mobile'];
		endif;
?>
	<div class="p-index-video<?php if ( $content_type_mobile ) echo ' has-mobile-content'; ?><?php if(wp_is_mobile()){ echo ' is-mobile'; }; ?><?php if($type == 'type3'){ echo ' yt-player'; }; ?><?php if($type=="image") echo ' is_sp-image'; ?>">
<?php
		if ( $content_type_mobile ) :
?>
		<div class="p-header-content--mobile">
			<div class="p-header-content__inner l-inner">
<?php
			if ( 'type1' === $content_type_mobile && $dp_options['header_video_logo_mobile_type1'] && $mobile_logo_image = wp_get_attachment_url( $dp_options['header_video_logo_mobile_type1'] ) ) :
?>
				<div class="p-header-content__logo"><img src="<?php echo esc_attr( $mobile_logo_image ); ?>" alt=""<?php if ( $dp_options['header_video_logo_width_mobile_type1'] ) echo ' width="' . esc_attr( $dp_options['header_video_logo_width_mobile_type1'] ) . '"'; ?>></div>
<?php
			elseif ( 'type2' === $content_type_mobile ) :
?>
					<div class="p-header-content__catch p-header-content__catch--<?php echo esc_attr( $dp_options['header_video_catch_align_mobile_type2'] ); if ( $dp_options['header_video_catch_vertical_mobile_type2'] ) echo ' p-header-content__catch-vertical'; ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $dp_options['header_video_catch_mobile_type2'] ) ); ?></div>
<?php
			endif;
?>
			</div>
		</div>
<?php
		endif;

		$logo_image = 'type1' === $dp_options['header_video_content_type'] && $dp_options['header_video_logo'] ? wp_get_attachment_url( $dp_options['header_video_logo'] ) : null;
		$catch = 'type2' === $dp_options['header_video_content_type'] ? $dp_options['header_video_catch'] : null;
		$desc = $dp_options['display_header_video_desc'] ? $dp_options['header_video_desc'] : null;
		$button = $dp_options['display_header_video_button'] ? $dp_options['header_video_button_label'] : null;
		$overlay = ( $dp_options['display_header_video_overlay'] && 0 < $dp_options['header_video_overlay_opacity'] );

		if ( $logo_image || $catch || $desc || $button ) :
?>
		<div class="p-header-content">
			<div class="p-header-content__inner l-inner">
<?php
			if ( $logo_image ) :
?>
				<div class="p-header-content__logo"><img src="<?php echo esc_attr( $logo_image ); ?>" alt=""<?php if ( $dp_options['header_video_logo_width'] ) echo ' width="' . esc_attr( $dp_options['header_video_logo_width'] ) . '"'; ?>></div>
<?php
			endif;

			if ( $catch ) :
?>
				<div class="p-header-content__catch p-header-content__catch--<?php echo esc_attr( $dp_options['header_video_catch_align'] ); if ( $dp_options['header_video_catch_vertical'] ) echo ' p-header-content__catch-vertical'; ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $catch ) ); ?></div>
<?php
			endif;

			if ( $desc ) :
?>
				<div class="p-header-content__desc p-header-content__desc--<?php echo esc_attr( $dp_options['header_video_desc_align'] ); ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $desc ) ); ?></div>
<?php
			endif;

			if ( $button ) :
				if ( $dp_options['header_video_link_url'] ) :
?>
				<div class="p-header-content__button">
					<a class="p-button" href="<?php echo esc_url( $dp_options['header_video_link_url'] ); ?>"<?php if ( $dp_options['header_video_target'] ) echo ' target="_blank"'; ?>><?php echo esc_html( $button ); ?></a>
				</div>
<?php
				else :
?>
				<div class="p-header-content__button">
					<span class="p-button"><?php echo esc_html( $button ); ?></span>
				</div>
<?php
				endif;
			endif;
?>
			</div>
		</div>
<?php
		endif;

		if ( 'type2' == $type ) :
?>
		<video id="js-index-video" class="p-header-content__video p-header-content__video-video" src="<?php echo esc_attr( $url ); ?>" loop muted playsinline></video>
<?php
		elseif ( 'type3' == $type ) :
?>
		<iframe id="js-index-youtube" class="p-header-content__video p-header-content__video-youtube" data-src="<?php echo esc_attr( $url ); ?>"></iframe>
<?php
		else :
?>
		<div class="p-header-content__image"><img src="<?php echo esc_attr( $url ); ?>" alt=""></div>
<?php
		endif;

		if ( $overlay || $dp_options['header_video_link_url'] ) :
			if ( $dp_options['header_video_link_url'] ) :
?>
		<a class="p-header-content__overlay" href="<?php echo esc_url( $dp_options['header_video_link_url'] ); ?>"<?php if ( $dp_options['header_video_target'] ) echo ' target="_blank"'; ?>></a>
<?php
			else :
?>
		<div class="p-header-content__overlay"></div>
<?php
			endif;
		endif;
?>
		<div class="p-header-content__mobile-arrow"></div>
	</div>
<?php
	endif;

// 画像スライダー
else :
	$display_slides = 0;

	// モバイルコンテンツ
	$content_type_mobile = null;
	if ( in_array( $dp_options['slider_content_type_mobile'], array( 'type1', 'type2' ) ) ) :
		$content_type_mobile = $dp_options['slider_content_type_mobile'];
	endif;

	for ( $i = 1; $i <= 3; $i++ ) :
		if ( is_mobile() && $dp_options['slider_image_sp' . $i] ) :
			$slider_image = wp_get_attachment_image_src( $dp_options['slider_image_sp' . $i], 'full' );
		else :
			$slider_image = wp_get_attachment_image_src( $dp_options['slider_image' . $i], 'full' );
		endif;
		if ( empty( $slider_image[0] ) ) continue;

		$logo_image = 'type1' === $dp_options['slider_content_type' . $i] && $dp_options['slider_logo' . $i] ? wp_get_attachment_url( $dp_options['slider_logo' . $i] ) : null;
		$catch = 'type2' === $dp_options['slider_content_type' . $i] ? $dp_options['slider_catch' . $i] : null;
		$desc = $dp_options['display_slider_desc' . $i] ? $dp_options['slider_desc' . $i] : null;
		$button = $dp_options['display_slider_button' . $i] ? $dp_options['slider_button_label' . $i] : null;
		$overlay = ( $dp_options['display_slider_overlay' . $i] && 0 < $dp_options['slider_overlay_opacity' . $i] );

		$display_slides++;
		if ( 1 == $display_slides ) :
?>
	<div id="js-index-slider" class="p-index-slider p-index-slider--<?php echo esc_attr( $dp_options['slide_effect_type'] ); if ( $content_type_mobile ) echo ' has-mobile-content'; ?>" data-interval="<?php echo esc_attr( $dp_options['slide_time_seconds'] ); ?>">
<?php
			if ( $content_type_mobile ) :
?>
		<div class="p-header-content--mobile">
			<div class="p-header-content__inner l-inner">
<?php
				if ( 'type1' === $content_type_mobile && $dp_options['slider_logo_mobile_type1'] && $mobile_logo_image = wp_get_attachment_url( $dp_options['slider_logo_mobile_type1'] ) ) :
?>
				<div class="p-header-content__logo"><img src="<?php echo esc_attr( $mobile_logo_image ); ?>" alt=""<?php if ( $dp_options['slider_logo_width_mobile_type1'] ) echo ' width="' . esc_attr( $dp_options['slider_logo_width_mobile_type1'] ) . '"'; ?>></div>
<?php
				elseif ( 'type2' === $content_type_mobile ) :
?>
					<div class="p-header-content__catch p-header-content__catch--<?php echo esc_attr( $dp_options['slider_catch_align_mobile_type2'] ); if ( $dp_options['slider_catch_vertical_mobile_type2'] ) echo ' p-header-content__catch-vertical'; ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $dp_options['slider_catch_mobile_type2'] ) ); ?></div>
<?php
				endif;
?>
			</div>
		</div>
<?php
			endif;
		endif;
?>
		<div class="p-index-slider__item p-index-slider__item--<?php echo $i; ?>">
<?php
		if ( $logo_image || $catch || $desc || $button ) :
?>
			<div class="p-header-content">
				<div class="p-header-content__inner l-inner">
<?php
			if ( $logo_image ) :
?>
					<div class="p-header-content__logo"><img src="<?php echo esc_attr( $logo_image ); ?>" alt=""<?php if ( $dp_options['slider_logo_width' . $i] ) echo ' width="' . esc_attr( $dp_options['slider_logo_width' . $i] ) . '"'; ?>></div>
<?php
			endif;

			if ( $catch ) :
?>
					<div class="p-header-content__catch p-header-content__catch--<?php echo esc_attr( $dp_options['slider_catch_align' . $i] ); if ( $dp_options['slider_catch_vertical' . $i] ) echo ' p-header-content__catch-vertical'; ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $catch ) ); ?></div>
<?php
			endif;

			if ( $desc ) :
?>
					<div class="p-header-content__desc p-header-content__desc--<?php echo esc_attr( $dp_options['slider_desc_align' . $i] ); ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $desc ) ); ?></div>
<?php
			endif;

			if ( $button ) :
				if ( $dp_options['slider_url' . $i] ) :
?>
					<div class="p-header-content__button">
						<a class="p-button" href="<?php echo esc_url( $dp_options['slider_url' . $i] ); ?>"<?php if ( $dp_options['slider_target' . $i] ) echo ' target="_blank"'; ?>><?php echo esc_html( $button ); ?></a>
					</div>
<?php
				else :
?>
					<div class="p-header-content__button">
						<span class="p-button"><?php echo esc_html( $button ); ?></span>
					</div>
<?php
				endif;
			endif;
?>
				</div>
			</div>
<?php
		endif;

		if ( $dp_options['slider_url' . $i] ) :
?>
			<a class="p-header-content__image" href="<?php echo esc_url( $dp_options['slider_url' . $i] ); ?>"<?php if ( $dp_options['slider_target' . $i] ) echo ' target="_blank"'; ?>>
				<img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt="">
				<div class="p-header-content__image-slice">
					<div class="p-header-content__image-slice--1"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--2"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--3"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--4"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--5"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--6"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--7"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--8"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
				</div>
			</a>
<?php
		else :
?>
			<div class="p-header-content__image">
				<img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt="">
				<div class="p-header-content__image-slice">
					<div class="p-header-content__image-slice--1"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--2"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--3"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--4"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--5"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--6"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--7"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
					<div class="p-header-content__image-slice--8"><div><img <?php echo 1 == $display_slides ? 'src' : 'data-lazy'; ?>="<?php echo esc_attr( $slider_image[0] ); ?>" alt=""></div></div>
				</div>
			</div>
<?php
		endif;

		if ( $overlay ) :
			if ( $dp_options['slider_url' . $i] ) :
?>
			<a class="p-header-content__overlay" href="<?php echo esc_url( $dp_options['slider_url' . $i] ); ?>"<?php if ( $dp_options['slider_target' . $i] ) echo ' target="_blank"'; ?>></a>
<?php
			else :
?>
			<div class="p-header-content__overlay"></div>
<?php
			endif;
		endif;
?>
		</div>
<?php
	endfor;

	if ( $display_slides ) :
?>
		<div class="p-header-content__mobile-arrow"></div>
	</div>
<?php
	endif;
endif;
