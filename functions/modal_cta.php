<?php

function tcd_modal_cta_meta_box() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	add_meta_box(
		'tcd_modal_cta_meta_box', // ID of meta box
		__( 'Modal CTA setting', 'tcd-w' ), // label
		'show_tcd_modal_cta_meta_box', // callback function
		array( 'post', 'page', $dp_options['information_slug'], $dp_options['works_slug'] ), // post type
		'side', // context
		'default' // priority
	);
}
add_action( 'add_meta_boxes', 'tcd_modal_cta_meta_box' );

function show_tcd_modal_cta_meta_box( $post ) {
	global $post;

	echo '<input type="hidden" name="tcd_modal_cta_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

	// サイドコンテンツの設定
	$modal_cta = array(
		'name' => __( 'Modal CTA setting', 'tcd-w' ),
		'id' => 'modal_cta',
		'type' => 'radio',
		'std' => '',
		'options' => array(
			array(
				'name' => __( 'Use theme option setting', 'tcd-w' ),
				'value' => ''
			),
			array(
				'name' => __( 'Display Modal CTA', 'tcd-w' ),
				'value' => 'show'
			),
			array(
				'name' => __( 'Hide Modal CTA', 'tcd-w' ),
				'value' => 'hide'
			)
		)
	);
	$modal_cta_meta = $post->modal_cta ? $post->modal_cta : $modal_cta['std'];

	echo '<p>' . __( 'Please set display the Modal CTA.', 'tcd-w' ) . '</p>' . "\n";

	echo '<ul class="radio">';
	foreach ( $modal_cta['options'] as $modal_cta_option ) {
		echo '<li><label><input type="radio" id="side_content-' . esc_attr( $modal_cta_option['value'] ) . '" name="' . $modal_cta['id'] . '" value="' . esc_attr( $modal_cta_option['value'] ) . '"' . checked( $modal_cta_meta, $modal_cta_option['value'], false ) . ' />' . esc_html( $modal_cta_option['name'] ). '</label></li>';
	}
	echo '</ul>';
}

function save_tcd_modal_cta_meta_box( $post_id ) {

	// verify nonce
	if ( ! isset( $_POST['tcd_modal_cta_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['tcd_modal_cta_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// save or delete
	$cf_keys = array( 'modal_cta' );
	foreach ( $cf_keys as $cf_key ) {
		$old = get_post_meta( $post_id, $cf_key, true );
		$new = isset( $_POST[$cf_key] ) ? $_POST[$cf_key] : '';

		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $cf_key, $new );
		} elseif ( ! $new && $old ) {
			delete_post_meta( $post_id, $cf_key, $old );
		}
	}
}
add_action( 'save_post', 'save_tcd_modal_cta_meta_box' );

// モーダルCTAモードを取得 front|sub|false|0）
function get_modal_cta_mode() {
	static $flag = null;

	if ( null !== $flag ) {
		return $flag;
	}

	global $dp_options, $post;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	$flag = null;

	if ( is_front_page() ) {
		if($dp_options['show_modal_cta_front'] ){
			$flag = 'front';
		}else{
			$flag = false;		
		}
	} elseif ( $dp_options['show_modal_cta_sub_same_front'] ) {
		$flag = 'front';
	} else {
		$flag = 'sub';
	}

	if ( ! is_front_page() ) {
		if ( is_singular() ) {
			if ( 'hide' === $post->modal_cta ) {
				$flag = false;
			} elseif ( 'show' !== $post->modal_cta ) {
				if (
					( is_singular( 'post' ) && ! $dp_options['show_modal_cta_sub_single_post'] ) ||
					( is_page() && ! $dp_options['show_modal_cta_sub_single_page'] ) ||
					( is_singular( $dp_options['information_slug'] ) && ! $dp_options['show_modal_cta_sub_single_information'] ) ||
					( is_singular( $dp_options['works_slug'] ) && ! $dp_options['show_modal_cta_sub_single_works'] ) ||
					( is_singular( $dp_options['voice_slug'] ) && ! $dp_options['show_modal_cta_sub_single_voice'] )
				) {
					$flag = false;
				}
			}
		} elseif (
			( is_home() && ! $dp_options['show_modal_cta_sub_archive_post'] ) ||
			( is_category() && ! $dp_options['show_modal_cta_sub_archive_category'] ) ||
			( is_tag() && ! $dp_options['show_modal_cta_sub_archive_tag'] ) ||
			( is_date() && ! $dp_options['show_modal_cta_sub_archive_date'] ) ||
			( is_author() && ! $dp_options['show_modal_cta_sub_archive_author'] ) ||
			( is_search() && ! $dp_options['show_modal_cta_sub_archive_search'] ) ||
			( is_post_type_archive( $dp_options['information_slug'] ) && ! $dp_options['show_modal_cta_sub_archive_information'] ) ||
			( ( is_post_type_archive( $dp_options['works_slug'] ) || is_tax( $dp_options['works_category_slug'] ) ) && ! $dp_options['show_modal_cta_sub_archive_works'] ) ||
			( is_post_type_archive( $dp_options['voice_slug'] ) && ! $dp_options['show_modal_cta_sub_archive_voice'] ) ||
			( is_404() && ! $dp_options['show_modal_cta_sub_404'] )
		) {
			$flag = false;
		}
	}

	// 1回だけ表示の場合
	if ( $flag && $dp_options['modal_cta_' . $flag . '_only_once'] ) {
		// クッキーがあれば非表示に
		if ( !empty( $_COOKIE['shown_modal_cta_' . $flag] ) ) {
			$flag = 0;
		// モーダルCTAは表示＝閉じたと取れるのでjsではなくここでクッキー保存
		} else {
			setcookie( 'shown_modal_cta_' . $flag, 1, 0, COOKIEPATH, COOKIE_DOMAIN, false );
		}
	}

	return $flag;
}
add_action( 'wp', 'get_modal_cta_mode' );

// モーダルcss出力
function modal_cta_css_wp_head() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	$flag = get_modal_cta_mode();
	if ( ! $flag ) return;

	$css = array(

	);
	$css_mobile = array();

	$css[] = '.p-modal-cta { background-color: rgba(' . esc_html( implode( ', ', hex2rgb( $dp_options['modal_cta_' . $flag . '_overlay_color'] ) ) . ', ' . $dp_options['modal_cta_' . $flag . '_overlay_opacity'] ) . '); }';

	if ( 'type1' === $dp_options['modal_cta_' . $flag . '_type'] ) {
		if ( $dp_options['display_modal_cta_' . $flag . '_catch'] && $dp_options['modal_cta_' . $flag . '_catch'] ) {
			if ( 'type2' == $dp_options['modal_cta_' . $flag . '_catch_align'] ) {
				$text_align = 'center';
			} elseif ( 'type3' == $dp_options['modal_cta_' . $flag . '_catch_align'] ) {
				$text_align = 'right';
			} else {
				$text_align = 'left';
			}
			$css[] = '.p-modal-cta__catch { color: ' . esc_html( $dp_options['modal_cta_' . $flag . '_catch_color'] ) . '; font-size: ' . esc_html( $dp_options['modal_cta_' . $flag . '_catch_font_size'] ) . 'px; text-align: ' . $text_align . '; }';
			$css_mobile[] = '.p-modal-cta__catch { font-size: ' . esc_html( $dp_options['modal_cta_' . $flag . '_catch_font_size_mobile'] ) . 'px; }';
		}

		if ( $dp_options['display_modal_cta_' . $flag . '_desc'] && $dp_options['modal_cta_' . $flag . '_desc'] ) {
			if ( 'type2' == $dp_options['modal_cta_' . $flag . '_desc_align'] ) {
				$text_align = 'center';
			} elseif ( 'type3' == $dp_options['modal_cta_' . $flag . '_desc_align'] ) {
				$text_align = 'right';
			} else {
				$text_align = 'left';
			}
			$css[] = '.p-modal-cta__desc { color: ' . esc_html( $dp_options['modal_cta_' . $flag . '_desc_color'] ) . '; font-size: ' . esc_html( $dp_options['modal_cta_' . $flag . '_desc_font_size'] ) . 'px; text-align: ' . $text_align . '; }';
			$css_mobile[] = '.p-modal-cta__desc { font-size: ' . esc_html( $dp_options['modal_cta_' . $flag . '_desc_font_size_mobile'] ) . 'px; }';
		}

		if ( $dp_options['display_modal_cta_' . $flag . '_button'] && $dp_options['modal_cta_' . $flag . '_button_label'] ) {
			$css[] = '.p-modal-cta__button .p-button { background-color: ' . esc_html( $dp_options['modal_cta_' . $flag . '_button_bg_color'] ) . '; color: ' . esc_html( $dp_options['modal_cta_' . $flag . '_button_font_color'] ) . '; }';
			$css[] = '.p-modal-cta__button .p-button:hover { background-color: ' . esc_html( $dp_options['modal_cta_' . $flag . '_button_bg_color_hover'] ) . '; color: ' . esc_html( $dp_options['modal_cta_' . $flag . '_button_font_color_hover'] ) . '; }';
		}
	}

	if ( $css || $css_mobile ) {
		echo '<style type="text/css">' . "\n";

		if ( $css ) {
			echo implode( "\n", $css ) . "\n";
		}
		if ( $css_mobile ) {
			echo "@media only screen and (max-width: 991px) {\n";
			echo "\t" . implode( "\n\t", $css_mobile ) . "\n";
			echo "}\n";
		}

		echo '</style>' . "\n";
	}
}
add_action( 'wp_head', 'modal_cta_css_wp_head' );

// モーダルCTA出力
function render_modal_cta() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	$flag = get_modal_cta_mode();
	if ( ! $flag ) return;

	$out = null;
	$contents_add_class = null;

	if ( 'type2' === $dp_options['modal_cta_' . $flag . '_type'] ) {
		if ( $video_url = wp_get_attachment_url( $dp_options['modal_cta_front_video'] ) ) {
			$video_attr = '';
			if ( $dp_options['modal_cta_' . $flag . '_video_loop'] ) {
				$video_attr .= ' loop';
			}
			if ( ! $dp_options['modal_cta_' . $flag . '_video_autoplay'] && $dp_options['modal_cta_' . $flag . '_video_mute'] ) {
				$video_attr .= ' muted';
			}
			if ( $dp_options['modal_cta_' . $flag . '_video_autoplay'] ) {
				$video_attr .= ' muted';
				$video_attr .= ' data-autoplay="1"';
			}

			if ( wp_is_mobile() ) {
				$video_attr .= ' playsinline';
			}

			$contents_add_class = 'p-modal-cta__contents--video';
			$out .= '<video id="js-modal-cta--video" src="' . esc_attr( $video_url ) . '" controls' . $video_attr . '></video>';
		}
	} elseif ( 'type3' === $dp_options['modal_cta_' . $flag . '_type'] ) {
		if ( $dp_options['modal_cta_' . $flag . '_youtube'] ) {
			// youtubeのみ自動再生させるためvideoidを取得
			// parse youtube video id
			// https://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match
			if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $dp_options['modal_cta_' . $flag . '_youtube'], $matches ) ) {
				$src_attr = 'src';
				$youtube_args = array(
					'iv_load_policy' => 3,
					'origin' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'],
					'mute' => 0,
					'showinfo' => 0,
					'rel' => 0
				);
				if ( $dp_options['modal_cta_' . $flag . '_youtube_autoplay'] ) {
					$src_attr = 'data-src';
					$youtube_args['autoplay'] = 1;

					// ユーザーアクションなしのためミュートにしないと自動再生できない
					$youtube_args['mute'] = 1;
				} elseif ( $dp_options['modal_cta_' . $flag . '_youtube_mute'] ) {
					$youtube_args['mute'] = 1;
				}
				if ( $dp_options['modal_cta_' . $flag . '_youtube_loop'] ) {
					$youtube_args['loop'] = 1;
					$youtube_args['playlist'] = $matches[1];
				}
				ksort( $youtube_args );

				$contents_add_class = 'p-modal-cta__contents--youtube';
				$out .= '<div class="p-modal-cta__contents--youtube__inner">';
				$out .= '<iframe id="js-modal-cta--youtube" ' . $src_attr . '="' . esc_attr( add_query_arg( $youtube_args, 'https://www.youtube.com/embed/' . $matches[1] ) ) . '" frameborder="0"></iframe>';
				$out .= '</div>';
			} else {
				$out = wp_oembed_get( $dp_options['modal_cta_' . $flag . '_youtube'] );
			}
		}
	} elseif ( 'type4' === $dp_options['modal_cta_' . $flag . '_type'] ) {
		// ページビルダーフィルターがある場合は外す 念のため2回
		if ( $priority = has_filter( 'the_content', 'page_builder_filter_the_content' ) ) {
			remove_filter( 'the_content', 'page_builder_filter_the_content', $priority );
		}
		if ( $priority = has_filter( 'the_content', 'page_builder_filter_the_content' ) ) {
			remove_filter( 'the_content', 'page_builder_filter_the_content', $priority );
		}
		$out .= '<div class="p-entry__body">';
		$out .= trim( apply_filters( 'the_content', $dp_options['modal_cta_' . $flag . '_editor'] ) );
		$out .= '</div>';
	} else {
		if ( $dp_options['display_modal_cta_' . $flag . '_image'] && $dp_options['modal_cta_' . $flag . '_image'] ) {
			$image = wp_get_attachment_image_src( $dp_options['modal_cta_' . $flag . '_image'], 'full' );
			if ( $image ) {
				$out .= "\t\t";
				if ( $dp_options['modal_cta_' . $flag . '_image_url'] ) {
					$out .= '<a class="p-modal-cta__image-anchor" href="' . esc_attr( $dp_options['modal_cta_' . $flag . '_image_url'] ) . '"' . ( $dp_options['modal_cta_' . $flag . '_image_target_blank'] ? ' target="_blank"': '' ) . '>';
					$out .= '<div class="p-modal-cta__image p-hover-effect__image">';
					$out .= '<img src="' . esc_attr( $image[0] ) . '">';
					$out .= '</div>';
					$out .= '</a>' . "\n";
				} else {
					$out .= '<div class="p-modal-cta__image">';
					$out .= '<img src="' . esc_attr( $image[0] ) . '">';
					$out .= '</div>' . "\n";
				}
			}
		}

		if ( $dp_options['display_modal_cta_' . $flag . '_catch'] && $dp_options['modal_cta_' . $flag . '_catch'] ) {
			$out .= "\t\t";
			$out .= '<h2 class="p-modal-cta__catch">' . str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $dp_options['modal_cta_' . $flag . '_catch'] ) ) . "</h2>\n";
		}

		if ( $dp_options['display_modal_cta_' . $flag . '_desc'] && $dp_options['modal_cta_' . $flag . '_desc'] ) {
			$out .= "\t\t";
			$out .= '<div class="p-modal-cta__desc p-entry__body">' . str_replace( array( "\r\n", "\r", "\n" ), '', wpautop( $dp_options['modal_cta_' . $flag . '_desc'] ) ) . "</div>\n";
		}

		if ( $dp_options['display_modal_cta_' . $flag . '_button'] && $dp_options['modal_cta_' . $flag . '_button_label'] ) {
			$out .= "\t\t";
			$out .= '<div class="p-modal-cta__button">';
			if ( $dp_options['modal_cta_' . $flag . '_button_url'] ) {
				$out .= '<a class="p-button" href="' . $dp_options['modal_cta_' . $flag . '_button_url'] . '"' . ( $dp_options['modal_cta_' . $flag . '_button_target_blank'] ? ' target="_blank"': '' ) . '><span>' . esc_html( $dp_options['modal_cta_' . $flag . '_button_label'] ) . '</span></a>';
			} else {
				$out .= '<div class="p-button"><span>' . esc_html( $dp_options['modal_cta_' . $flag . '_button_label'] ) . '</span></div>' . "\n";
			}
			$out .= "</div>\n";
		}
	}

	if ( $out ) {
		echo '<div id="js-modal-cta" class="p-modal-cta p-modal-cta--' . $dp_options['modal_cta_' . $flag . '_type'] . ( ! $dp_options['modal_cta_' . $flag . '_delay'] && ! $dp_options['modal_cta_' . $flag . '_delay_after_load_icon'] ? ' is-active' : '' ) . '" data-delay="' . $dp_options['modal_cta_' . $flag . '_delay'] . '" data-delay-type="' . ( $dp_options['modal_cta_' . $flag . '_delay_after_load_icon'] && $dp_options['use_load_icon'] ? '1' : '0' ) . '">' . "\n";
		echo "\t" . '<div class="p-modal-cta__contents ' . $contents_add_class . '">' . "\n";
		echo "\t\t" . trim( $out ) . "\n";
		echo "\t</div>\n";
		echo "\t" . '<button class="p-modal-cta__close">&#xe91a;</button>' ." \n";
		echo "</div>\n";
	}
}
add_action( 'wp_footer', 'render_modal_cta' );
