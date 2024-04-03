<?php

/**
 * Translation
 */
load_theme_textdomain( 'tcd-w', get_template_directory() . '/languages' );

// style.cssのDescriptionをPoedit等に認識させる
__( 'WordPress theme "FAMOUS" is developed for creators and artists to showcase their personal portfolios. And all the pages (ABOUT, WORKS, VOICE) implemented in the theme make your work stand out.', 'tcd-famous' );

/**
 * Theme setup
 */
function famous_setup() {
	// Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Title tag
	add_theme_support( 'title-tag' );

	// Image sizes
	add_image_size( 'size1', 300, 300, true );
	add_image_size( 'size2', 550, 380, true );
	add_image_size( 'size3', 600, 600, true );
	add_image_size( 'size4', 1200, 900, true );
	add_image_size( 'size5', 1200, 0, false );
	add_image_size( 'works1', 600, 600, true );
	add_image_size( 'works2', 1200, 600, true );
	add_image_size( 'works3', 600, 1200, true );
	add_image_size( 'size-card', 300, 300, true ); // カードリンクパーツ用

	// imgタグのsrcsetを未使用に
	add_filter( 'wp_calculate_image_srcset', '__return_empty_array' );

	// Menu
	register_nav_menus( array(
		'global_front' => __( 'Global menu (front page)', 'tcd-w' ),
		'global_sub' => __( 'Global menu (sub page)', 'tcd-w' ),
		'footer' => __( 'Footer menu', 'tcd-w' )
	) );
}
add_action( 'after_setup_theme', 'famous_setup' );

/**
 * Theme init
 */
function famous_init() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	// Emoji
	if ( 0 == $dp_options['use_emoji'] ) {
      // remove inline script
      remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
      // remove inline style
      remove_action( 'wp_print_styles', 'print_emoji_styles' );
      // remove inline style  6.4 later
      if ( function_exists( 'wp_enqueue_emoji_styles' ) ) {
        remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
        remove_action( 'admin_enqueue_scripts', 'wp_enqueue_emoji_styles' );
      }

      // initだと早いため、admin_initで実行
      add_action( 'admin_init', function(){
        // remove inline script
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        // remove inline style
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        // remove inline style 6.4 later
        if ( function_exists( 'wp_enqueue_emoji_styles' ) ) {
          remove_action( 'admin_enqueue_scripts', 'wp_enqueue_emoji_styles' );
        }
      } );
	}

	// カスタム投稿 お知らせ
	register_post_type( $dp_options['information_slug'], array(
		'label' => $dp_options['information_breadcrumb_label'],
		'labels' => array(
			'name' => $dp_options['information_breadcrumb_label'],
			'singular_name' => $dp_options['information_breadcrumb_label'],
			'add_new' => __( 'Add New', 'tcd-w' ),
			'add_new_item' => __( 'Add New Item', 'tcd-w' ),
			'edit_item' => __( 'Edit', 'tcd-w' ),
			'new_item' => __( 'New item', 'tcd-w' ),
			'view_item' => __( 'View Item', 'tcd-w' ),
			'search_items' => __( 'Search Items', 'tcd-w' ),
			'not_found' => __( 'Not Found', 'tcd-w' ),
			'not_found_in_trash' => __( 'Not found in trash', 'tcd-w' ),
			'parent_item_colon' => ''
		),
		'public' => true,
		'publicly_queryable' => true,
		'menu_position' => 5,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail' )
	) );

	// カスタム投稿 Works
	register_post_type( $dp_options['works_slug'], array(
		'label' => $dp_options['works_breadcrumb_label'],
		'labels' => array(
			'name' => $dp_options['works_breadcrumb_label'],
			'singular_name' => $dp_options['works_breadcrumb_label'],
			'add_new' => __( 'Add New', 'tcd-w' ),
			'add_new_item' => __( 'Add New Item', 'tcd-w' ),
			'edit_item' => __( 'Edit', 'tcd-w' ),
			'new_item' => __( 'New item', 'tcd-w' ),
			'view_item' => __( 'View Item', 'tcd-w' ),
			'search_items' => __( 'Search Items', 'tcd-w' ),
			'not_found' => __( 'Not Found', 'tcd-w' ),
			'not_found_in_trash' => __( 'Not found in trash', 'tcd-w' ),
			'parent_item_colon' => ''
		),
		'public' => true,
		'publicly_queryable' => true,
		'menu_position' => 5,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor' )
	) );

	if ( $dp_options['use_works_category'] ) {
		register_taxonomy(
			$dp_options['works_category_slug'],
			$dp_options['works_slug'],
			array(
				'label' => $dp_options['works_category_label'],
				'labels' => array(
					'name' => $dp_options['works_category_label'],
					'singular_name' => $dp_options['works_category_label']
				),
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'hierarchical' => true,
			)
		);
	}

	// カスタム投稿 Voice
	register_post_type( $dp_options['voice_slug'], array(
		'label' => $dp_options['voice_breadcrumb_label'],
		'labels' => array(
			'name' => $dp_options['voice_breadcrumb_label'],
			'singular_name' => $dp_options['voice_breadcrumb_label'],
			'add_new' => __( 'Add New', 'tcd-w' ),
			'add_new_item' => __( 'Add New Item', 'tcd-w' ),
			'edit_item' => __( 'Edit', 'tcd-w' ),
			'new_item' => __( 'New item', 'tcd-w' ),
			'view_item' => __( 'View Item', 'tcd-w' ),
			'search_items' => __( 'Search Items', 'tcd-w' ),
			'not_found' => __( 'Not Found', 'tcd-w' ),
			'not_found_in_trash' => __( 'Not found in trash', 'tcd-w' ),
			'parent_item_colon' => ''
		),
		'public' => true,
		'publicly_queryable' => true,
		'menu_position' => 5,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail' )
	) );
}
add_action( 'init', 'famous_init' );

/**
 * Theme scripts and style
 */
function famous_scripts() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	// 登録のみ
	wp_register_script( 'famous-inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array( 'jquery' ), version_num(), true );
	wp_register_script( 'famous-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), version_num(), true );
	wp_register_script( 'famous-freewall', get_template_directory_uri() . '/js/freewall.js', array( 'jquery' ), version_num(), true );
	wp_register_script( 'famous-works', get_template_directory_uri() . '/js/works.js', array( 'jquery', 'famous-inview', 'famous-imagesloaded', 'famous-freewall' ), version_num(), true );
	wp_register_script( 'famous-googlemap-api', 'https://maps.googleapis.com/maps/api/js?key=' . esc_attr( $dp_options['gmap_api_key'] ), array(), null, true );

	// 共通
	wp_enqueue_style( 'famous-style', get_stylesheet_uri(), array(), version_num() );
	wp_enqueue_script( 'famous-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), version_num(), true );

	// slick読み込みフラグ
	$slick_load = false;

	if ( is_front_page() ) {
		$slick_load = true;
		wp_enqueue_script( 'famous-front-page', get_template_directory_uri() . '/js/front-page.js', array( 'jquery', 'famous-inview' ), version_num(), true );
	}

	// 記事スライダーウィジェット
	if ( $active_sidebar = get_active_sidebar() ) {
		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( ! empty( $sidebars_widgets[$active_sidebar] ) ) {
			foreach ( $sidebars_widgets[$active_sidebar] as $id ) {
				if ( 0 === strpos( $id, 'tcdw_post_slider_widget' ) ) {
				$slick_load = true;
				break;
				}
			}
		}
	}

	// slick
	if ( $slick_load ) {
		wp_enqueue_script( 'famous-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), version_num(), true );
		wp_enqueue_style( 'famous-slick', get_template_directory_uri() . '/css/slick.min.css' );

		// ページビルダーのslick.js,slick.cssを読み込まないように
		add_filter( 'page_builder_slick_enqueue_script', '__return_false' );
		add_filter( 'page_builder_slick_enqueue_style', '__return_false' );
	}

	// works
	if ( is_post_type_archive( $dp_options['works_slug'] ) || is_singular( $dp_options['works_slug'] ) || is_tax( $dp_options['works_category_slug'] ) ) {
		wp_enqueue_script( 'famous-works' );
	}

	// フッターバー
	if ( is_mobile() && 'type3' !== $dp_options['footer_bar_display'] ) {
		wp_enqueue_style( 'famous-footer-bar', get_template_directory_uri() . '/css/footer-bar.css', false, version_num() );
		wp_enqueue_script( 'famous-footer-bar', get_template_directory_uri() . '/js/footer-bar.js', array( 'jquery' ), version_num(), true );
	}

	// ヘッダースクロール
	if ( is_front_page() ) {
		if ( in_array( $dp_options['header_bar_front'], array( 'type2', 'type3' ) ) || in_array( $dp_options['header_bar_front_mobile'], array( 'type2', 'type3' ) ) ) {
			wp_enqueue_script( 'famous-header-fix', get_template_directory_uri() . '/js/header-fix.js', array( 'jquery' ), version_num(), true );
		}
	} else {
		if ( in_array( $dp_options['header_bar_sub'], array( 'type2', 'type3' ) ) || in_array( $dp_options['header_bar_sub_mobile'], array( 'type2', 'type3' ) ) ) {
			wp_enqueue_script( 'famous-header-fix', get_template_directory_uri() . '/js/header-fix.js', array( 'jquery' ), version_num(), true );
		}
	}

	// アドミンバーのインラインスタイルを出力しない
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
	remove_action( 'wp_head', 'wp_admin_bar_header' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_admin_bar_bump_styles' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_admin_bar_header_styles' );
}
add_action( 'wp_enqueue_scripts', 'famous_scripts' );

function famous_admin_scripts() {
	// 管理画面共通
	wp_enqueue_style( 'tcd_admin_css', get_template_directory_uri() . '/admin/css/tcd_admin.css', array(), version_num() );
	wp_enqueue_script( 'tcd_script', get_template_directory_uri() . '/admin/js/tcd_script.js', array( 'jquery', 'jquery-ui-resizable' ), version_num() );
	wp_localize_script( 'tcd_script', 'TCD_MESSAGES', array(
		'ajaxSubmitSuccess' => __( 'Settings Saved Successfully', 'tcd-w' ),
		'ajaxSubmitError' => __( 'Can not save data. Please try again.', 'tcd-w' )
	) );

	// 画像アップロードで使用
	wp_enqueue_script( 'cf-media-field', get_template_directory_uri() . '/admin/js/cf-media-field.js', array( 'media-upload' ), version_num() );
	wp_localize_script( 'cf-media-field', 'cfmf_text', array(
		'image_title' => __( 'Please Select Image', 'tcd-w' ),
		'image_button' => __( 'Use this Image', 'tcd-w' ),
		'video_title' => __( 'Please Select Video', 'tcd-w' ),
		'video_button' => __( 'Use this Video', 'tcd-w' )
	) );

	// メディアアップローダーAPIを利用するための処理
	wp_enqueue_media();

	// ウィジェットで使用
	wp_enqueue_script( 'famous-widget-script', get_template_directory_uri() . '/admin/js/widget.js', array( 'jquery' ), version_num() );

	// テーマオプションのタブで使用
	wp_enqueue_script( 'jquery.cookieTab', get_template_directory_uri() . '/admin/js/jquery.cookieTab.js', array(), version_num() );

	// テーマオプションのAJAX保存で使用
	wp_enqueue_script( 'jquery-form' );

	// フッターバー
	wp_enqueue_style( 'famous-admin-footer-bar', get_template_directory_uri() . '/admin/css/footer-bar.css', array(), version_num() );
	wp_enqueue_script( 'famous-admin-footer-bar', get_template_directory_uri() . '/admin/js/footer-bar.js', array(), version_num() );

	// WPカラーピッカー
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'famous_admin_scripts' );

// シェアボタンのCSSを読み込み
function famous_add_sns_link_files() {
	wp_enqueue_style( 'sns-button', get_template_directory_uri() . '/css/sns-botton.css', '', version_num() );
}
add_action( 'wp_enqueue_scripts', 'famous_add_sns_link_files' );

// Editor style
function famous_add_editor_styles() {
	add_theme_support('editor-styles');
	add_editor_style( get_template_directory_uri()."/admin/css/editor-style-02.css?d=".date('YmdGis', filemtime(get_template_directory().'/admin/css/editor-style-02.css')) );
}
add_action( 'admin_init', 'famous_add_editor_styles' );

// 各サムネイル画像生成時の品質を82→90に
function famous_wp_editor_set_quality( $quality, $mime_type ) {
	return 90;
}
add_filter( 'wp_editor_set_quality', 'famous_wp_editor_set_quality', 10, 2 );

// Widget area
function famous_widgets_init() {
	// Common side widget
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Common side widget', 'tcd-w' ),
		'description' => __( 'Widgets set in this widget area are displayed as "basic widget" in the sidebar of all pages. If there are individual settings, the widget will be displayed.', 'tcd-w' ),
		'id' => 'common_side_widget'
	) );

	// Archive side widget
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Archive side widget', 'tcd-w' ),
		'id' => 'archive_side_widget'
	) );

	// Post side widget
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Post side widget', 'tcd-w' ),
		'id' => 'post_side_widget'
	) );

	// Information side widget
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Information side widget', 'tcd-w' ),
		'id' => 'information_side_widget'
	) );

	// Page side widget
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Page side widget', 'tcd-w' ),
		'id' => 'page_side_widget'
	) );

	// Archive side widget (mobile)
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Archive side widget (mobile)', 'tcd-w' ),
		'id' => 'archive_side_widget_mobile'
	) );

	// Post side widget (mobile)
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Post side widget (mobile)', 'tcd-w' ),
		'id' => 'post_side_widget_mobile'
	) );

	// Information side widget (mobile)
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Information side widget (mobile)', 'tcd-w' ),
		'id' => 'information_side_widget_mobile'
	) );

	// Page side widget (mobile)
	register_sidebar( array(
		'before_widget' => '<div class="p-widget p-widget-sidebar %2$s" id="%1$s">' . "\n",
		'after_widget' => "</div>\n",
		'before_title' => '<h2 class="p-widget__title">',
		'after_title' => '</h2>' . "\n",
		'name' => __( 'Page side widget (mobile)', 'tcd-w' ),
		'id' => 'page_side_widget_mobile'
	) );
}
add_action( 'widgets_init', 'famous_widgets_init' );

/**
 * get active sidebar
 */
function get_active_sidebar() {
	global $post, $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	$sidebars = array();

	if ( is_front_page() ) {

	} elseif ( is_post_type_archive( $dp_options['information_slug'] ) ) {

	} elseif ( is_singular( $dp_options['information_slug'] ) ) {
		if ( is_mobile() ) {
			$sidebars[] = 'information_side_widget_mobile';
		} else {
			$sidebars[] = 'information_side_widget';
		}

	} elseif ( is_post_type_archive( $dp_options['works_slug'] ) || is_singular( $dp_options['works_slug'] ) ) {

	} elseif ( is_post_type_archive( $dp_options['voice_slug'] ) || is_singular( $dp_options['voice_slug'] ) ) {

	} elseif ( is_home() || is_archive() ) {
		if ( is_mobile() ) {
			$sidebars[] = 'archive_side_widget_mobile';
		} else {
			$sidebars[] = 'archive_side_widget';
		}

	} elseif ( is_page() ) {
		if ( 'show' == $post->display_side_content ) {
			if ( is_mobile() ) {
				$sidebars[] = 'page_side_widget_mobile';
			} else {
				$sidebars[] = 'page_side_widget';
			}
		}

	} elseif ( is_singular() ) {
		if ( is_mobile() ) {
			$sidebars[] = 'post_side_widget_mobile';
		} else {
			$sidebars[] = 'post_side_widget';
		}
	}

	if ( ! empty( $sidebars ) ) {
		$sidebars[] = 'common_side_widget';
	}

	$sidebars = apply_filters( 'get_active_sidebar-sidebars', $sidebars );

	if ( ! empty( $sidebars ) ) {
		foreach( $sidebars as $sidebar ) {
			if ( is_active_sidebar( $sidebar ) ) {
				return $sidebar;
			}
		}
	}

	return false;
}

/**
 * body class
 */
function famous_body_classes( $classes ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	if ( get_active_sidebar() ) {
		$classes[] = 'l-sidebar--' . $dp_options['sidebar'];
	}

	if ( is_front_page() ) {
		$classes[] = 'l-header--' . $dp_options['header_bar_front'];
		$classes[] = 'l-header--' . $dp_options['header_bar_front_mobile'] . '--mobile';

		if ( in_array( $dp_options['header_bar_front'], array( 'type2', 'type3' ) ) ) {
			$classes[] = 'l-header__fix';
		}

		if ( in_array( $dp_options['header_bar_front_mobile'], array( 'type2', 'type3' ) ) ) {
			$classes[] = 'l-header__fix--mobile';
		}
	} else {
		$classes[] = 'l-header--' . $dp_options['header_bar_sub'];
		$classes[] = 'l-header--' . $dp_options['header_bar_sub_mobile'] . '--mobile';

		if ( in_array( $dp_options['header_bar_sub'], array( 'type2', 'type3' ) ) ) {
			$classes[] = 'l-header__fix';
		}

		if ( in_array( $dp_options['header_bar_sub_mobile'], array( 'type2', 'type3' ) ) ) {
			$classes[] = 'l-header__fix--mobile';
		}
	}

	if ( is_post_type_archive( $dp_options['works_slug'] ) && 'works' != $dp_options['works_slug'] ) {
		$classes[] = 'post-type-archive-works';
	}

	return array_unique( $classes );
}
add_filter( 'body_class', 'famous_body_classes' );

/**
 * Excerpt
 */
function custom_excerpt_length( $length = null ) {
	return is_mobile() ? 50 : 154;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more = null ) {
	return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/**
 * Remove wpautop from the excerpt
 */
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Customize archive title
 */
function famous_archive_title( $title ) {
	global $author, $post;
	if ( is_author() ) {
		$title = get_the_author_meta( 'display_name', $author );
	} elseif ( is_category() || is_tag() ) {
		$title = single_term_title( '', false );
	} elseif ( is_day() ) {
		$title = get_the_time( __( 'F jS, Y', 'tcd-w' ), $post );
	} elseif ( is_month() ) {
		$title = get_the_time( __( 'F, Y', 'tcd-w' ), $post );
	} elseif ( is_year() ) {
		$title = get_the_time( __( 'Y', 'tcd-w' ), $post );
	} elseif ( is_search() ) {
		$title = __( 'Search result', 'tcd-w' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'famous_archive_title', 10 );

/**
 * ビジュアルエディタに表(テーブル)の機能を追加
 */
function mce_external_plugins_table( $plugins ) {
	$plugins['table'] = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.4/plugins/table/plugin.min.js';
	return $plugins;
}
add_filter( 'mce_external_plugins', 'mce_external_plugins_table' );

/**
 * tinymceのtableボタンにclass属性プルダウンメニューを追加
 */
function mce_buttons_table( $buttons ) {
	$buttons[] = 'table';
	return $buttons;
}
add_filter( 'mce_buttons', 'mce_buttons_table' );

function table_classes_tinymce( $settings ) {
	$styles = array(
		array( 'title' => __( 'Default style', 'tcd-w' ), 'value' => '' ),
		array( 'title' => __( 'No border', 'tcd-w' ), 'value' => 'table_no_border' ),
		array( 'title' => __( 'Display only horizontal border', 'tcd-w' ), 'value' => 'table_border_horizontal' )
	);
	$settings['table_class_list'] = json_encode( $styles );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'table_classes_tinymce' );

/**
 * ビジュアルエディタにページ分割ボタンを追加
 */
function add_nextpage_buttons( $buttons ) {
	$buttons[] = 'wp_page';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_nextpage_buttons' );

/**
 * Translate Hex to RGB
 */
function hex2rgb( $hex ) {
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}

	return array( $r, $g, $b );
}

/**
 * ユーザーエージェントを判定するための関数
 */
function is_mobile() {
	static $is_mobile = null;

	if ( $is_mobile !== null ) {
		return $is_mobile;
	}

	// タブレットも含める場合は wp_is_mobile()
	$ua = array(
		'iPhone', // iPhone
		'iPod', // iPod touch
		'Android.*Mobile', // 1.5+ Android *** Only mobile
		'Windows.*Phone', // *** Windows Phone
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'BlackBerry', // BlackBerry
		'BB10', // BlackBerry10
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate' // Other iPhone browser
	);

	if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
		$is_mobile = false;
	} elseif ( preg_match( '/' . implode( '|', $ua ) . '/i', $_SERVER['HTTP_USER_AGENT'] ) ) {
		$is_mobile = true;
	} else {
		$is_mobile = false;
	}

	return $is_mobile;
}

/**
 * スクリプトのバージョン管理
 */
function version_num() {
	static $theme_version = null;

	if ( $theme_version !== null ) {
		return $theme_version;
	}

	if ( function_exists( 'wp_get_theme' ) ) {
		$theme_data = wp_get_theme();
	} else {
		$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	}

	if ( isset( $theme_data['Version'] ) ) {
		$theme_version = $theme_data['Version'];
	} else {
		$theme_version = '';
	}

	return $theme_version;
}

/**
 * カードリンクパーツ
 */
function get_the_custom_excerpt( $content, $length ) {
	$length = $length ? $length : 70; // デフォルトの長さを指定する
	$content = preg_replace( '/<!--more-->.+/is', '', $content ); // moreタグ以降削除
	$content = strip_shortcodes( $content ); // ショートコード削除
	$content = strip_tags( $content ); // タグの除去
	$content = str_replace( '&nbsp;', '', $content ); // 特殊文字の削除（今回はスペースのみ）
	$content = mb_substr( $content, 0, $length ); // 文字列を指定した長さで切り取る
	return $content.'...';
}

/**
 * カードリンクショートコード
 */
function clink_scode( $atts ) {
	extract( shortcode_atts( array( 'url' => '', 'title' => '', 'excerpt' => '' ), $atts ) );
	$id = url_to_postid( $url ); // URLから投稿IDを取得
	if ( ! $url || ! $id ) return false;

	$post = get_post( $id ); // IDから投稿情報の取得
	$date = mysql2date( 'Y.m.d', $post->post_date ); // 投稿日の取得
	$img_width = 120; // 画像サイズの幅指定
	$img_height = 120; // 画像サイズの高さ指定
	$no_image = get_template_directory_uri() . '/img/common/no-image-300x300.gif';

	// 抜粋を取得
	if ( empty( $excerpt ) ) {
		if ( $post->post_excerpt ) {
			$excerpt = get_the_custom_excerpt( $post->post_excerpt, 115 );
		} else {
			$excerpt = get_the_custom_excerpt( $post->post_content, 115 );
		}
	}

	// タイトルを取得
	if ( empty( $title ) ) {
		$title = strip_tags( get_the_title( $id ) );
	}

	// アイキャッチ画像を取得
	if ( has_post_thumbnail( $id ) ) {
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'size-card' );
		$img_tag = '<img src="' . $img[0] . '" alt="' . $title . '" width="' . $img[1] . '" height="' . $img[2] . '">';
	} else {
		$img_tag ='<img src="' . $no_image . '" alt="" width="' . $img_width . '" height="' . $img_height . '">';
	}

	$clink = '<div class="cardlink"><a href="' . esc_url( $url ) . '"><div class="cardlink_thumbnail">' . $img_tag . '</div></a><div class="cardlink_content"><span class="cardlink_timestamp">' . esc_html( $date ) . '</span><div class="cardlink_title"><a href="' . esc_url( $url ) . '">' . esc_html( $title ) . '</a></div><div class="cardlink_excerpt">' . esc_html( $excerpt ) . '</div></div><div class="cardlink_footer"></div></div>';

	return $clink;
}
add_shortcode( 'clink', 'clink_scode' );

/**
 * カスタムコメント
 */
function custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if ( ! $commentcount ) {
		$commentcount = 0;
	}
?>
<li id="comment-<?php comment_ID(); ?>" class="c-comment__list-item comment">
	<div class="c-comment__item-header u-clearfix">
		<div class="c-comment__item-meta u-clearfix">
<?php
	if ( function_exists( 'get_avatar' ) && get_option( 'show_avatars' ) ) {
		echo get_avatar( $comment, 35, '', false, array( 'class' => 'c-comment__item-avatar' ) );
	}
	if ( get_comment_author_url() ) {
		echo '<a id="commentauthor-' . get_comment_ID() . '" class="c-comment__item-author" rel="nofollow">' . get_comment_author() . '</a>' . "\n";
	} else {
		echo '<span id="commentauthor-' . get_comment_ID() . '" class="c-comment__item-author">' . get_comment_author() . '</span>' . "\n";
	}
?>
			<time class="c-comment__item-date" datetime="<?php comment_time( 'c' ); ?>"><?php comment_time( __( 'F jS, Y', 'tcd-w' ) ); ?></time>
		</div>
		<ul class="c-comment__item-act">
<?php
	if ( 1 == get_option( 'thread_comments' ) ) :
?>
			<li><?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment-content', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __( 'REPLY', 'tcd-w' ) . '' ) ) ); ?></li>
<?php
	else :
?>
			<li><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID(); ?>', 'comment-<?php comment_ID(); ?>', 'js-comment__textarea');"><?php _e( 'REPLY', 'tcd-w' ); ?></a></li>
<?php
	endif;
?>
		<li><a href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID(); ?>', 'comment-<?php comment_ID(); ?>', 'comment-content-<?php comment_ID(); ?>', 'js-comment__textarea');"><?php _e( 'QUOTE', 'tcd-w' ); ?></a></li>
		<?php edit_comment_link( __( 'EDIT', 'tcd-w' ), '<li>', '</li>'); ?>
		</ul>
	</div>
	<div id="comment-content-<?php comment_ID(); ?>" class="c-comment__item-body">
<?php
	if ( 0 == $comment->comment_approved ) {
		echo '<span class="c-comment__item-note">' . __( 'Your comment is awaiting moderation.', 'tcd-w' ) . '</span>' . "\n";
	} else {
		comment_text();
	}
?>
	</div>
<?php
}

// Information/Voice 表示件数
function famous_pre_get_posts( $wp_query ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	if ( ! is_admin() && $wp_query->is_main_query() ) {
		if ( $wp_query->is_post_type_archive( $dp_options['information_slug'] ) && 0 < $dp_options['archive_information_num'] ) {
			$wp_query->set( 'posts_per_page', $dp_options['archive_information_num'] );
		} elseif ( $wp_query->is_post_type_archive( $dp_options['voice_slug'] ) && 0 < $dp_options['archive_voice_num'] ) {
			$wp_query->set( 'posts_per_page', $dp_options['archive_voice_num'] );
		}
	}
}
add_filter( 'pre_get_posts', 'famous_pre_get_posts' );

// Voice 詳細ページリダイレクト
function voice_single_redirect() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	if ( is_singular( $dp_options['voice_slug'] ) ) {
		wp_redirect( get_post_type_archive_link( $dp_options['voice_slug'] ) );
		exit;
	}
}
add_filter( 'wp', 'voice_single_redirect' );

// ページビルダー投稿タイプフィルター
function famous_page_builder_post_types( $post_types ) {
	return array( 'post', 'page', 'information' );
}
add_filter( 'get_page_builder_post_types', 'famous_page_builder_post_types' );

// Theme options
get_template_part( 'admin/theme-options' );
get_template_part( 'admin/theme-options-tools' );

// Contents Builder
get_template_part( 'admin/contents-builder' );

// Simple Local Avatars
require get_template_directory() . '/functions/simple-local-avatars/simple-local-avatars.php';

// Add custom columns
get_template_part( 'functions/admin_column' );

// Custom CSS
get_template_part( 'functions/custom_css' );

// Add quicktags to the visual editor
get_template_part( 'functions/custom_editor' );

// hook wp_head
get_template_part( 'functions/head' );

// OGP
get_template_part( 'functions/ogp' );

// Recommend post
get_template_part( 'functions/recommend' );

// Page builder
get_template_part( 'pagebuilder/pagebuilder' );

// Post custom fields
get_template_part( 'functions/post_cf' );

// Page custom fields
get_template_part( 'functions/page_cf' );
get_template_part( 'functions/page_cf2' );

// Password protected pages
get_template_part( 'functions/password_form' );

// Show custom fields in quick edit
get_template_part( 'functions/quick_edit' );

// Meta title and description
get_template_part( 'functions/seo' );

// Modal CTA
get_template_part( 'functions/modal_cta' );

// Shortcode
get_template_part( 'functions/short_code' );

// User profile
get_template_part( 'functions/user_profile' );

// Update notifier
get_template_part( 'functions/update_notifier' );

// マニュアル
get_template_part( 'functions/manual' );

// カスタマイザー設定( 外観 > ウィジェットから設定を取り除く)
get_template_part( 'functions/customizer' );

// Widgets
get_template_part( 'widget/ad' );
get_template_part( 'widget/archive_list' );
get_template_part( 'widget/category_list' );
get_template_part( 'widget/google_search' );
get_template_part( 'widget/post_slider' );
get_template_part( 'widget/styled_post_list_tab' );

// Works
get_template_part( 'functions/works' );


// ウィジェットブロックエディターを無効化 --------------------------------------------------------------------------------
function exclude_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'exclude_theme_support' );

// 埋め込みコンテンツのレスポンシブ化
add_theme_support( 'responsive-embeds' );

// videoタグやyoutubeの自動再生に対応しているか判定 ----------------------------------------------
// Android 標準ブラウザは不可、Android版 Chrome ver53以下は不可、iOS ver10以下は不可、それ以外は再生を許可
function auto_play_movie() {
  $ua = mb_strtolower($_SERVER['HTTP_USER_AGENT']);
  // Android -----------------------------------
  if( preg_match('/android/ui', $ua) ) {
    //echo 'Android<br />';
    // 標準ブラウザ
    if (strpos($ua, 'android') !== false && strpos($ua, 'linux; u;') !== false && strpos($ua, 'chrome') === false) {
      return FALSE;
    // Chrome
    } elseif ( preg_match('/(chrome)\/([0-9\.]+)/', $ua , $matches) ){
      $match = (float) $matches[2];
      $version = floor($match);
      if($version < 53){
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      return TRUE;
    }
  // iOS ---------------------------------------
  } elseif(preg_match('/iphone|ipod|ipad/ui', $ua)) {
    //echo 'iOS<br />';
    if ( preg_match('/(iphone|ipod|ipad) os ([0-9_]+)/', $ua, $matches) ) {
      $matches[2] = (float) str_replace('_', '.', $matches[2]);
      $version = floor($matches[2]);
      if($version < 10){
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      return TRUE;
    }
  // PC等、その他のOS ---------------------------------------
  } else {
    //echo 'OTHER OS<br />';
    return TRUE;
  }
}