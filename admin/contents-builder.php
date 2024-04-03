<?php

/**
 * コンテンツビルダー コンテンツ一覧取得
 */
function cb_get_contents() {
	global $dp_options;		// $dp_optionsは保存時にWPが使用するため使えない
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	return array(
		'blog' => array(
			'name' => 'blog',
			'label' => __( 'Blog', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => __( 'BLOG', 'tcd-w' ),
				'cb_headline_color' => '#000000',
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 30,
				'cb_desc' => '',
				'cb_desc_color' => '#000000',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 14,
				'cb_list_type' => 'all',
				'cb_category' => 0,
				'cb_order' => 'date',
				'cb_post_num' => 4,
				'cb_show_date' => 1,
				'cb_show_category' => 1,
				'cb_show_archive_link' => 0,
				'cb_archive_link_text' => __( 'Blog archive', 'tcd-w' ),
				'cb_archive_link_target_blank' => 0,
				'cb_archive_link_font_color' => '#ffffff',
				'cb_archive_link_bg_color' => $dp_options['secondary_color'],
				'cb_archive_link_font_color_hover' => '#ffffff',
				'cb_archive_link_bg_color_hover' => $dp_options['primary_color'],
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			),
			'cb_list_type_options' => array(
				'all' => __( 'All posts', 'tcd-w' ),
				'category' => __( 'Category', 'tcd-w' ),
				'recommend_post' => __( 'Recommend post', 'tcd-w' ),
				'recommend_post2' => __( 'Recommend post2', 'tcd-w' ),
				'pickup_post' => __( 'Pickup post', 'tcd-w' )
			),
			'cb_order_options' => array(
				'date' => __( 'Date (DESC)', 'tcd-w' ),
				'date2' => __( 'Date (ASC)', 'tcd-w' ),
				'random' => __( 'Random', 'tcd-w' )
			)
		),
		'information' => array(
			'name' => 'information',
			'label' => __( 'Information', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => __( 'INFORMATION', 'tcd-w' ),
				'cb_headline_color' => '#000000',
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 30,
				'cb_desc' => '',
				'cb_desc_color' => '#000000',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 14,
				'cb_order' => 'date',
				'cb_post_num' => 4,
				'cb_show_date' => 1,
				'cb_show_archive_link' => 0,
				'cb_archive_link_text' => __( 'Information archive', 'tcd-w' ),
				'cb_archive_link_target_blank' => 0,
				'cb_archive_link_font_color' => '#ffffff',
				'cb_archive_link_bg_color' => $dp_options['secondary_color'],
				'cb_archive_link_font_color_hover' => '#ffffff',
				'cb_archive_link_bg_color_hover' => $dp_options['primary_color'],
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			),
			'cb_order_options' => array(
				'date' => __( 'Date (DESC)', 'tcd-w' ),
				'date2' => __( 'Date (ASC)', 'tcd-w' ),
				'random' => __( 'Random', 'tcd-w' )
			)
		),
		'works' => array(
			'name' => 'works',
			'label' => __( 'WORKS', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => __( 'WORKS', 'tcd-w' ),
				'cb_headline_color' => '#000000',
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 30,
				'cb_desc' => '',
				'cb_desc_color' => '#000000',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 14,
				'cb_category' => 0,
				'cb_order' => 'date',
				'cb_post_num' => 12,
				'cb_show_archive_link' => 0,
				'cb_archive_link_text' => __( 'Works archive', 'tcd-w' ),
				'cb_archive_link_target_blank' => 0,
				'cb_archive_link_font_color' => '#ffffff',
				'cb_archive_link_bg_color' => $dp_options['secondary_color'],
				'cb_archive_link_font_color_hover' => '#ffffff',
				'cb_archive_link_bg_color_hover' => $dp_options['primary_color'],
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			),
			'cb_order_options' => array(
				'date' => __( 'Date (DESC)', 'tcd-w' ),
				'date2' => __( 'Date (ASC)', 'tcd-w' ),
				'random' => __( 'Random', 'tcd-w' )
			)
		),
		'voice_carousel' => array(
			'name' => 'voice_carousel',
			'label' => __( 'Voice carousel slider', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => __( 'VOICE', 'tcd-w' ),
				'cb_headline_color' => '#000000',
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 30,
				'cb_desc' => '',
				'cb_desc_color' => '#000000',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 14,
				'cb_order' => 'date',
				'cb_post_num' => 9,
				'cb_show_thumbnail' => 1,
				'cb_slide_time_seconds' => 7,
				'cb_arrow_font_color' => '#000000',
				'cb_arrow_font_color_hover' => $dp_options['secondary_color'],
				'cb_show_archive_link' => 0,
				'cb_archive_link_text' => __( 'Voice archive', 'tcd-w' ),
				'cb_archive_link_target_blank' => 0,
				'cb_archive_link_font_color' => '#ffffff',
				'cb_archive_link_bg_color' => $dp_options['secondary_color'],
				'cb_archive_link_font_color_hover' => '#ffffff',
				'cb_archive_link_bg_color_hover' => $dp_options['primary_color'],
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			),
			'cb_order_options' => array(
				'date' => __( 'Date (DESC)', 'tcd-w' ),
				'date2' => __( 'Date (ASC)', 'tcd-w' ),
				'random' => __( 'Random', 'tcd-w' )
			)
		),
		'about' => array(
			'name' => 'about',
			'label' => __( 'ABOUT', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => '',
				'cb_headline_color' => '#000000',
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 30,
				'cb_desc' => '',
				'cb_desc_color' => '#000000',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 14,
				'cb_image1' => '',
				'cb_image_label1' => '',
				'cb_image_url1' => '',
				'cb_image_target_blank1' => 0,
				'cb_image2' => '',
				'cb_image_label2' => '',
				'cb_image_url2' => '',
				'cb_image_target_blank2' => 0,
				'cb_image3' => '',
				'cb_image_label3' => '',
				'cb_image_url3' => '',
				'cb_image_target_blank3' => 0,
				'cb_desc2' => '',
				'cb_desc_color2' => '#000000',
				'cb_desc_font_size2' => 14,
				'cb_desc_font_size_mobile2' => 14,
				'cb_button_label' => '',
				'cb_button_url' => '',
				'cb_button_target_blank' => 0,
				'cb_button_font_color' => '#ffffff',
				'cb_button_bg_color' => $dp_options['secondary_color'],
				'cb_button_font_color_hover' => '#ffffff',
				'cb_button_bg_color_hover' => $dp_options['primary_color'],
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			)
		),
		'pr' => array(
			'name' => 'pr',
			'label' => __( 'PR&amp;ACCESS', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_type' => 'type1',
				'cb_image' => '',
				'cb_headline' => __( 'PR&amp;ACCESS', 'tcd-w' ),
				'cb_headline_color' => '#000000',
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 30,
				'cb_desc' => '',
				'cb_desc_color' => '#000000',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 14,
				'cb_show_googlemap' => '',
				'cb_googlemap_address' => '', // Google Maps で使用する住所
				'cb_googlemap_desc' => '', // マップの下に表示する説明文（住所情報等に使用）
				'cb_map_link_label' => __( 'View in Google Maps', 'tcd-w' ), // 「大きな地図で見る」のラベル
				'cb_map_link_label_sp' => __( 'View in Google Maps', 'tcd-w' ), // 「大きな地図で見る」のラベル（スマホ用）
				'cb_map_link' => '', // 「大きな地図で見る」のリンクURL
				'cb_map_link_bg' => '#ffffff', // 「大きな地図で見る」の背景色
				'cb_map_link_color' => '#000000', // 「大きな地図で見る」の文字色
				'cb_map_link_border_color' => '#dddddd', // 「大きな地図で見る」の枠線の色
				'cb_map_link_bg_hover' => '#ffffff', // 「大きな地図で見る」の背景色（ホバー）
				'cb_map_link_color_hover' => '#000000', // 「大きな地図で見る」の文字色（ホバー）
				'cb_map_link_border_color_hover' => '#dddddd', // 「大きな地図で見る」の枠線の色（ホバー）
				'cb_googlemap_saturation' => -100, // Google Maps の彩度（デフォルトは -100 のモノクロ）
				'cb_googlemap_marker_type' => 'type1', // マーカーのタイプ（テーマオプション設定、デフォルト、カスタム）
				'cb_googlemap_custom_marker_type' => 'type1', // カスタムマーカーのタイプ（テキスト、画像）
				'cb_googlemap_marker_text' => '', // カスタムマーカーのテキスト
				'cb_googlemap_marker_color' => '#ffffff', // カスタムマーカーの文字色
				'cb_googlemap_marker_img' => '', // カスタムマーカーの画像
				'cb_googlemap_marker_bg' => '#000000', // カスタムマーカーの背景色
				'cb_wysiwyg_editor' => '',
				'cb_button_label' => '',
				'cb_button_url' => '',
				'cb_button_target_blank' => 0,
				'cb_button_font_color' => '#ffffff',
				'cb_button_bg_color' => $dp_options['secondary_color'],
				'cb_button_font_color_hover' => '#ffffff',
				'cb_button_bg_color_hover' => $dp_options['primary_color'],
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			),
			'cb_type_options' => array(
				'type1' => __( 'Template', 'tcd-w' ),
				'type2' => __( 'Header image, Free space and button', 'tcd-w' ),
			),
			'cb_googlemap_marker_type_options' => array(
				'type1' => __( 'Use settings in Theme Options', 'tcd-w' ),
				'type2' => __( 'Use default marker', 'tcd-w' ),
				'type3' => __( 'Use custom marker', 'tcd-w' )
			),
			'cb_googlemap_custom_marker_type_options' => array(
				'type1' => __( 'Text', 'tcd-w' ),
				'type2' => __( 'Image', 'tcd-w' )
			)
		),
		'wysiwyg' => array(
			'name' => 'wysiwyg',
			'label' => __( 'Free space', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_wysiwyg_editor' => '',
				'cb_background_image' => '',
				'cb_background_image_overlay_color' => '#ffffff',
				'cb_background_image_overlay_opacity' => 0.8,
				'cb_background_image_parallax' => 0,
				'cb_background_color' => ''
			)
		)
	);
}

/**
 * コンテンツビルダー js/css
 */
function cb_admin_scripts() {
	wp_enqueue_style( 'tcd-cb', get_template_directory_uri() . '/admin/css/contents-builder.css', array(), version_num() );
	wp_enqueue_script( 'tcd-cb', get_template_directory_uri() . '/admin/js/contents-builder.js', array( 'jquery-ui-sortable' ), version_num(), true);
	wp_enqueue_style( 'editor-buttons' );
}
add_action( 'admin_print_scripts-appearance_page_theme_options', 'cb_admin_scripts' );
add_action( 'admin_print_scripts-toplevel_page_theme_options', 'cb_admin_scripts' );

/**
 * コンテンツビルダー入力設定
 */
function cb_inputs() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();
?>
	<div class="theme_option_field cf">
		<h3 class="theme_option_headline"><?php _e( 'Contents Builder', 'tcd-w' ); ?></h3>
		<p><?php _e( 'Please set contents of front page with contents builder.', 'tcd-w' ); ?></p>
		<div class="theme_option_message"><?php echo __( '<p>You can build contents freely with this function.</p><p>FIRST STEP: Click Add content button.<br>SECOND STEP: Select content from dropdown menu to show on each column.</p><p>You can change row by dragging MOVE button and you can delete row by clicking DELETE button.</p>', 'tcd-w' ); ?></div>

		<div id="contents_builder_wrap">
			<div id="contents_builder" data-delete-confirm="<?php _e( 'Are you sure you want to delete this content?', 'tcd-w' ); ?>">
<?php
	if ( ! empty( $dp_options['contents_builder'] ) ) :
		foreach ( $dp_options['contents_builder'] as $key => $content ) :
			$cb_index = 'cb_' . ( $key + 1 );
?>
				<div class="cb_row">
					<ul class="cb_button cf">
						<li><span class="cb_move"><?php echo __( 'Move', 'tcd-w' ); ?></span></li>
						<li><span class="cb_delete"><?php echo __( 'Delete', 'tcd-w' ); ?></span></li>
					</ul>
					<div class="cb_column_area cf">
						<div class="cb_column">
							<input type="hidden" value="<?php echo $cb_index; ?>" class="cb_index">
							<?php the_cb_content_select( $cb_index, $content['cb_content_select'] ); ?>
							<?php if ( ! empty( $content['cb_content_select'] ) ) the_cb_content_setting( $cb_index, $content['cb_content_select'], $content ); ?>
						</div>
					</div><!-- END .cb_column_area -->
				</div><!-- END .cb_row -->
<?php
		endforeach;
	endif;
?>
			</div><!-- END #contents_builder -->
			<div id="cb_add_row_buttton_area">
				<input type="button" value="<?php echo __( 'Add content', 'tcd-w' ); ?>" class="button-secondary add_row">
			</div>
			<p><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></p>
		</div><!-- END #contents_builder_wrap -->

<?php
	// コンテンツビルダー追加用 非表示
	$cb_index = 'cb_cloneindex';
?>
		<div id="contents_builder-clone" class="hidden">
			<div class="cb_row">
				<ul class="cb_button cf">
					<li><span class="cb_move"><?php echo __( 'Move', 'tcd-w' ); ?></span></li>
					<li><span class="cb_delete"><?php echo __( 'Delete', 'tcd-w' ); ?></span></li>
				</ul>
				<div class="cb_column_area cf">
					<div class="cb_column">
						<input type="hidden" class="cb_index" value="cb_cloneindex">
						<?php the_cb_content_select( $cb_index ); ?>
					</div>
				</div><!-- END .cb_column_area -->
			</div><!-- END .cb_row -->
<?php
	foreach ( cb_get_contents() as $key => $value ) :
		the_cb_content_setting( 'cb_cloneindex', $key );
	endforeach;
?>
		</div><!-- END #contents_builder-clone.hidden -->
	</div>
<?php
}

/**
 * コンテンツビルダー用 コンテンツ選択プルダウン
 */
function the_cb_content_select( $cb_index = 'cb_cloneindex', $selected = null ) {
	$cb_contents = cb_get_contents();

	if ( $selected && isset( $cb_contents[$selected] ) ) {
		$add_class = ' hidden';
	} else {
		$add_class = '';
	}

	$out = '<select name="dp_options[contents_builder][' . esc_attr( $cb_index ) . '][cb_content_select]" class="cb_content_select' . $add_class . '">';
	$out .= '<option value="">' . __( 'Choose the content', 'tcd-w' ) . '</option>';

	foreach ( $cb_contents as $key => $value ) {
		$out .= '<option value="' . esc_attr( $key ) . '"' . selected( $key, $selected, false ) . '>' . esc_html( $value['label'] ) . '</option>';
	}

	$out .= '</select>';

	echo $out;
}

/**
 * コンテンツビルダー用 コンテンツ設定
 */
function the_cb_content_setting( $cb_index = 'cb_cloneindex', $cb_content_select = null, $value = array() ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	$cb_contents = cb_get_contents();

	// 不明なコンテンツの場合は終了
	if ( ! $cb_content_select || ! isset( $cb_contents[$cb_content_select] ) ) return false;

	// コンテンツデフォルト値に入力値をマージ
	if ( isset( $cb_contents[$cb_content_select]['default'] ) ) {
		$value = array_merge( (array) $cb_contents[$cb_content_select]['default'], $value );
	}
?>
	<div class="cb_content_wrap cf cb_content-<?php echo esc_attr( $cb_content_select ); ?>">

<?php
	// ブログ
	if ( 'blog' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?><span><?php if(!empty($value['cb_headline'])){?>：<?php echo esc_textarea( strip_tags( $value['cb_headline']) ); ?><?php } ?></span></h3>
		<div class="cb_content">
			<p><?php _e( 'This is posts list of blog.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the heading.', 'tcd-w' ); ?></p>
			<textarea class="large-text cb-repeater-label" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_headline_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the description.', 'tcd-w' ); ?></p>
			<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color]" value="<?php echo esc_attr( $value['cb_desc_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_list_type_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Post type', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Select the type of post you want to display.', 'tcd-w' ); ?></p>
			<p class="description"><?php _e( 'Recommended posts and Pickup posts can be set from post edit screen / quick edit.', 'tcd-w' ); ?></p>
			<ul class="cb_list_type-radios">
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_list_type_options'] as $k => $v ) :
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_list_type]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_list_type'], $k, false ) . '> '. esc_html( $v ) . '</label>';
				if ( 'category' == $k ) :
					echo '&nbsp;&nbsp;';
					wp_dropdown_categories( array(
						'class' => '',
						'echo' => 1,
						'hide_empty' => 0,
						'hierarchical' => 1,
						'id' => '',
						'name' => 'dp_options[contents_builder][' . $cb_index . '][cb_category]',
						'selected' => $value['cb_category'],
						'show_count' => 0,
						'value_field' => 'term_id'
					) );
				endif;
				echo '</li>';
			endforeach;
?>
			</ul>
<?php
		endif;

		if ( ! empty( $cb_contents[$cb_content_select]['cb_order_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Display order', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Select the order of the post from date (DESC) or date (ASC) or random.', 'tcd-w' ); ?></p>
			<ul>
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_order_options'] as $k => $v ) :
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_order]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_order'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
			endforeach;
?>
			</ul>
<?php
		endif;
?>
			<h4 class="theme_option_headline2"><?php _e( 'Post number', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the number of displayed articles', 'tcd-w' ); ?></p>
			<input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_post_num]" value="<?php echo esc_attr( $value['cb_post_num'] ); ?>" min="4" step="4">
			<h4 class="theme_option_headline2"><?php _e( 'Display setting', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the display of each item.', 'tcd-w' ); ?></p>
			<ul>
				<li>
					<input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_date]" type="hidden" value="">
					<label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_date]" type="checkbox" value="1" <?php checked( $value['cb_show_date'], 1 ); ?>><?php _e( 'Display date', 'tcd-w' ); ?></label>
				</li>
				<li>
					<input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_category]" type="hidden" value="">
					<label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_category]" type="checkbox" value="1" <?php checked( $value['cb_show_category'], 1 ); ?>><?php _e( 'Display category', 'tcd-w' ); ?></label>
				</li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Archive link', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set the archive page button to be displayed at the bottom.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_archive_link]" type="checkbox" value="1" <?php checked( $value['cb_show_archive_link'], 1 ); ?>><?php _e( 'Display archive link', 'tcd-w' ); ?></label></p>
			<table>
				<tr>
					<td><label><?php _e( 'Archive link label', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_text]" value="<?php echo esc_attr( $value['cb_archive_link_text'] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_target_blank]" type="checkbox" value="1" <?php checked( $value['cb_archive_link_target_blank'], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color]" value="<?php echo esc_attr( $value['cb_archive_link_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color_hover'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 750 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>

<?php
	// Information
	elseif ( 'information' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?><span><?php if(!empty($value['cb_headline'])){?>：<?php echo esc_textarea( strip_tags( $value['cb_headline']) ); ?><?php } ?></span></h3>
		<div class="cb_content">
			<p><?php _e( 'This is posts list of information.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the heading.', 'tcd-w' ); ?></p>
			<textarea class="large-text cb-repeater-label" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_headline_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the description.', 'tcd-w' ); ?></p>
			<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color]" value="<?php echo esc_attr( $value['cb_desc_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_order_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Display order', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Select the order of the post from date (DESC) or date (ASC) or random.', 'tcd-w' ); ?></p>
			<ul>
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_order_options'] as $k => $v ) :
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_order]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_order'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
			endforeach;
?>
			</ul>
<?php
		endif;
?>
			<h4 class="theme_option_headline2"><?php _e( 'Post number', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the number of displayed articles', 'tcd-w' ); ?></p>
			<input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_post_num]" value="<?php echo esc_attr( $value['cb_post_num'] ); ?>" min="4" step="4">
			<h4 class="theme_option_headline2"><?php _e( 'Display setting', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the display of each item.', 'tcd-w' ); ?></p>
			<ul>
				<li>
					<input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_date]" type="hidden" value="">
					<label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_date]" type="checkbox" value="1" <?php checked( $value['cb_show_date'], 1 ); ?>><?php _e( 'Display date', 'tcd-w' ); ?></label>
				</li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Archive link', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set the archive page button to be displayed at the bottom.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_archive_link]" type="checkbox" value="1" <?php checked( $value['cb_show_archive_link'], 1 ); ?>><?php _e( 'Display archive link', 'tcd-w' ); ?></label></p>
			<table>
				<tr>
					<td><label><?php _e( 'Archive link label', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_text]" value="<?php echo esc_attr( $value['cb_archive_link_text'] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_target_blank]" type="checkbox" value="1" <?php checked( $value['cb_archive_link_target_blank'], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color]" value="<?php echo esc_attr( $value['cb_archive_link_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color_hover'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 800 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>

<?php
	// Works
	elseif ( 'works' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?><span><?php if(!empty($value['cb_headline'])){?>：<?php echo esc_textarea( strip_tags( $value['cb_headline']) ); ?><?php } ?></span></h3>
		<div class="cb_content">
			<p><?php _e( 'This is works gallery.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the heading.', 'tcd-w' ); ?></p>
			<textarea class="large-text cb-repeater-label" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_headline_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the description.', 'tcd-w' ); ?></p>
			<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color]" value="<?php echo esc_attr( $value['cb_desc_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
<?php
		if ( $dp_options['use_works_category'] ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Works category', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Select the works category you want to display.', 'tcd-w' ); ?></p>
			<p>
<?php
			wp_dropdown_categories( array(
				'class' => '',
				'echo' => 1,
				'hide_empty' => 0,
				'hierarchical' => 1,
				'id' => '',
				'name' => 'dp_options[contents_builder][' . $cb_index . '][cb_category]',
				'selected' => $value['cb_category'],
				'show_count' => 0,
				'show_option_all' => __( 'All categories', 'tcd-w' ),
				'taxonomy' => $dp_options['works_category_slug'],
				'value_field' => 'term_id',
			) );
?>
			</p>
<?php
		endif;

		if ( ! empty( $cb_contents[$cb_content_select]['cb_order_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Display order', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Select the order of the post from date (DESC) or date (ASC) or random.', 'tcd-w' ); ?></p>
			<ul>
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_order_options'] as $k => $v ) :
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_order]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_order'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
			endforeach;
?>
			</ul>
<?php
		endif;
?>
			<h4 class="theme_option_headline2"><?php _e( 'Post number', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the number of displayed articles', 'tcd-w' ); ?></p>
			<input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_post_num]" value="<?php echo esc_attr( $value['cb_post_num'] ); ?>" min="0">
			<h4 class="theme_option_headline2"><?php _e( 'Archive link', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set the archive page button to be displayed at the bottom.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_archive_link]" type="checkbox" value="1" <?php checked( $value['cb_show_archive_link'], 1 ); ?>><?php _e( 'Display archive link', 'tcd-w' ); ?></label></p>
			<table>
				<tr>
					<td><label><?php _e( 'Archive link label', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_text]" value="<?php echo esc_attr( $value['cb_archive_link_text'] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_target_blank]" type="checkbox" value="1" <?php checked( $value['cb_archive_link_target_blank'], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color]" value="<?php echo esc_attr( $value['cb_archive_link_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color_hover'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 800 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>

<?php
	// Voiceカルーセル
	elseif ( 'voice_carousel' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?><span><?php if(!empty($value['cb_headline'])){?>：<?php echo esc_textarea( strip_tags( $value['cb_headline']) ); ?><?php } ?></span></h3>
		<div class="cb_content">
			<p><?php _e( 'This slider shows voice list.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the heading.', 'tcd-w' ); ?></p>
			<textarea class="large-text cb-repeater-label" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_headline_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the description.', 'tcd-w' ); ?></p>
			<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color]" value="<?php echo esc_attr( $value['cb_desc_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_order_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Display order', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Select the order of the post from date (DESC) or date (ASC) or random.', 'tcd-w' ); ?></p>
			<ul>
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_order_options'] as $k => $v ) :
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_order]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_order'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
			endforeach;
?>
			</ul>
<?php
		endif;
?>
			<h4 class="theme_option_headline2"><?php _e( 'Post number', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the number of displayed articles', 'tcd-w' ); ?></p>
			<input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_post_num]" value="<?php echo esc_attr( $value['cb_post_num'] ); ?>" min="3" step="3">
			<h4 class="theme_option_headline2"><?php _e( 'Display setting', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Set the display of each item.', 'tcd-w' ); ?></p>
			<ul>
				<li>
					<input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_thumbnail]" type="hidden" value="">
					<label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_thumbnail]" type="checkbox" value="1" <?php checked( $value['cb_show_thumbnail'], 1 ); ?>><?php _e( 'Display thumbnail', 'tcd-w' ); ?></label>
				</li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Slide interval seconds', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set slide interval seconds. (3 to 15 seconds)', 'tcd-w' ); ?></p>
			<input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_slide_time_seconds]" value="<?php echo esc_attr( $value['cb_slide_time_seconds'] ); ?>" min="3" max="15"> <?php _e( ' seconds', 'tcd-w' ); ?>
			<h4 class="theme_option_headline2"><?php _e( 'Arrow setting', 'tcd-w' ); ?></h4>
			<p><?php _e( 'You can set arrow button on slider.', 'tcd-w' ); ?></p>
			<table>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_arrow_font_color]" value="<?php echo esc_attr( $value['cb_arrow_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_arrow_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_arrow_font_color_hover]" value="<?php echo esc_attr( $value['cb_arrow_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_arrow_font_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Archive link', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set the archive page button to be displayed at the bottom.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_archive_link]" type="checkbox" value="1" <?php checked( $value['cb_show_archive_link'], 1 ); ?>><?php _e( 'Display archive link', 'tcd-w' ); ?></label></p>
			<table>
				<tr>
					<td><label><?php _e( 'Archive link label', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_text]" value="<?php echo esc_attr( $value['cb_archive_link_text'] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_target_blank]" type="checkbox" value="1" <?php checked( $value['cb_archive_link_target_blank'], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color]" value="<?php echo esc_attr( $value['cb_archive_link_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_font_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_font_color_hover'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_bg_color_hover]" value="<?php echo esc_attr( $value['cb_archive_link_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_archive_link_bg_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 800 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>

<?php
	// About
	elseif ( 'about' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?><span><?php if(!empty($value['cb_headline'])){?>：<?php echo esc_textarea( strip_tags( $value['cb_headline']) ); ?><?php } ?></span></h3>
		<div class="cb_content">
            <p><?php _e( 'Text + Circle image + Text content is displayed.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the heading.', 'tcd-w' ); ?></p>
			<textarea class="large-text cb-repeater-label" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_headline_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the description.', 'tcd-w' ); ?></p>
			<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color]" value="<?php echo esc_attr( $value['cb_desc_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
<?php
		for ( $i = 1; $i <= 3; $i++ ) :
?>
			<h4 class="theme_option_headline2"><?php echo __( 'Image', 'tcd-w' ) . $i; ?></h4>
            <p><?php _e( 'Please set a square image. Automatically trim the circle and display it.', 'tcd-w' ); ?></p>          
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 300, 300 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_image<?php echo $i; ?>">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_image' . $i] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_image<?php echo $i; ?>]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_image' . $i] ) { echo wp_get_attachment_image( $value['cb_image' . $i], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_image' . $i] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Image title', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_image_label<?php echo $i; ?>]" value="<?php echo esc_attr( $value['cb_image_label' . $i] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Link URL', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_image_url<?php echo $i; ?>]" value="<?php echo esc_attr( $value['cb_image_url' . $i] ); ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_image_target_blank<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $value['cb_image_target_blank' . $i], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
<?php
		endfor;
?>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?>2</h4>
			<p><?php _e( 'Please set the description displayed at bottom of image', 'tcd-w' ); ?></p>
			<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc2]" rows="4"><?php echo esc_textarea( $value['cb_desc2'] ); ?></textarea>
			<table style="margin-top: 5px;">
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color2]" value="<?php echo esc_attr( $value['cb_desc_color2'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color2'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size2]" value="<?php echo esc_attr( $value['cb_desc_font_size2'] ); ?>" min="1"><span>px</span></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile2]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile2'] ); ?>" min="1"><span>px</span></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Button', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set the link button to be displayed at the bottom.', 'tcd-w' ); ?></p>
			<table>
				<tr>
					<td><label><?php _e( 'Button label', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_label]" value="<?php echo esc_attr( $value['cb_button_label'] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Link URL', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_url]" value="<?php echo esc_attr( $value['cb_button_url'] ); ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_target_blank]" type="checkbox" value="1" <?php checked( $value['cb_button_target_blank'], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_font_color]" value="<?php echo esc_attr( $value['cb_button_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_bg_color]" value="<?php echo esc_attr( $value['cb_button_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_bg_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_font_color_hover]" value="<?php echo esc_attr( $value['cb_button_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_font_color_hover'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_bg_color_hover]" value="<?php echo esc_attr( $value['cb_button_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_bg_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 800 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>

<?php
	// PR&ACCESS
	elseif ( 'pr' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?><span><?php if(!empty($value['cb_headline'])){?>：<?php echo esc_textarea( strip_tags( $value['cb_headline']) ); ?><?php } ?></span></h3>
		<div class="cb_content">
            <p><?php _e( 'Show header image and text and Google Maps', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<h4 class="theme_option_headline2"><?php _e( 'Content type', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please select a content type.', 'tcd-w' ); ?></p>
			<ul class="cb_type">
<?php
		foreach ( $cb_contents[$cb_content_select]['cb_type_options'] as $k => $v ) :
			echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_type]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_type'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
		endforeach;
?>
			</ul>

			<h4 class="theme_option_headline2"><?php _e( 'Header image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set a header image.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1180, 400 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_image'] ) { echo wp_get_attachment_image( $value['cb_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>

			<div class="cb_type-type1">
				<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
				<p><?php _e( 'Please set the heading.', 'tcd-w' ); ?></p>
				<textarea class="large-text cb-repeater-label" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
				<table style="margin-top: 5px;">
					<tr>
						<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_headline_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
						<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" min="1"><span>px</span></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
						<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
					</tr>
				</table>
				<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
				<p><?php _e( 'Please set the description.', 'tcd-w' ); ?></p>
				<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
				<table style="margin-top: 5px;">
					<tr>
						<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_color]" value="<?php echo esc_attr( $value['cb_desc_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_desc_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
						<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" min="1"><span>px</span></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
						<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
					</tr>
				</table>
				<h4 class="theme_option_headline2"><?php _e( 'Google maps', 'tcd-w' ); ?></h4>
				<p><?php _e( 'You can set the Google maps.', 'tcd-w' ); ?></p>
				<p><label><input type="checkbox" class="cb_show_googlemap" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_googlemap]" value="1" <?php checked( $value['cb_show_googlemap'], 1 ); ?>> <?php _e( 'Display Google maps', 'tcd-w' ); ?></label></p>
				<div class="cb_googlemap-content hidden">
					<h4 class="theme_option_headline2"><?php _e( 'Map address', 'tcd-w' ); ?></h4>
					<p><?php _e( 'Please set a map address.', 'tcd-w' ); ?></p>
					<input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_address]" value="<?php echo esc_attr( $value['cb_googlemap_address'] ); ?>">
					<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
					<p><?php _e( 'The description is displayed after the map.', 'tcd-w' ); ?></p>
					<textarea class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_desc]" rows="4"><?php echo esc_textarea( $value['cb_googlemap_desc'] ); ?></textarea>
					<h4 class="theme_option_headline2"><?php _e( '"View in Google Maps" settings', 'tcd-w' ); ?></h4>
                    <?php _e( 'You can set large map button.', 'tcd-w' ); ?></p>
                    <div class="theme_option_message"><?php echo __( '<p>In addition to allowing you to go to the Google Maps page with a single click and view large maps, smartphone can use the Google Maps route guidance function smoothly.</p>', 'tcd-w' ); ?></div>
					<table>
						<tr>
							<td><label><?php _e( 'Link label', 'tcd-w' ); ?></td>
							<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_label]" value="<?php echo esc_attr( $value['cb_map_link_label'] ); ?>" size="30"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Link label for mobile', 'tcd-w' ); ?></td>
							<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_label_sp]" value="<?php echo esc_attr( $value['cb_map_link_label_sp'] ); ?>" size="30"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Link URL', 'tcd-w' ); ?></td>
							<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link]" value="<?php echo esc_attr( $value['cb_map_link'] ); ?>"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
							<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_bg]" value="<?php echo esc_attr( $value['cb_map_link_bg'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_map_link_bg'] ); ?>"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
							<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_color]" value="<?php echo esc_attr( $value['cb_map_link_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_map_link_color'] ); ?>"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Border color', 'tcd-w' ); ?></td>
							<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_border_color]" value="<?php echo esc_attr( $value['cb_map_link_border_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_map_link_border_color'] ); ?>"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Background color on hover', 'tcd-w' ); ?></td>
							<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_bg_hover]" value="<?php echo esc_attr( $value['cb_map_link_bg_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_map_link_bg_hover'] ); ?>"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Font color on hover', 'tcd-w' ); ?></td>
							<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_color_hover]" value="<?php echo esc_attr( $value['cb_map_link_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_map_link_color_hover'] ); ?>"></td>
						</tr>
						<tr>
							<td><label><?php _e( 'Border color on hover', 'tcd-w' ); ?></td>
							<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_map_link_border_color_hover]" value="<?php echo esc_attr( $value['cb_map_link_border_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_map_link_border_color_hover'] ); ?>"></td>
						</tr>
					</table>
					<h4 class="theme_option_headline2"><?php _e( 'Saturation', 'tcd-w' ); ?></h4>
					<p><?php _e( 'Please set the saturation of the map. If you set it to -100 the output map is monochrome.', 'tcd-w' ); ?></p>
					<p class="range-output"><?php _e( 'Current value: ', 'tcd-w' ); ?><span><?php echo esc_attr( $value['cb_googlemap_saturation'] ); ?></span></p>
					<input class="range" type="range" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_saturation]" value="<?php echo esc_attr( $value['cb_googlemap_saturation'] ); ?>" min="-100" max="100" step="10">
					<h4 class="theme_option_headline2"><?php _e( 'Marker type', 'tcd-w' ); ?></h4>
					<p><?php _e( 'Please select a marker type.', 'tcd-w' ); ?></p>
					<ul class="cb_googlemap_marker_type">
<?php
		foreach ( $cb_contents[$cb_content_select]['cb_googlemap_marker_type_options'] as $k => $v ) :
			echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_googlemap_marker_type]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_googlemap_marker_type'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
		endforeach;
?>
					</ul>
					<div class="cb_googlemap_marker_type-type3 hidden">
						<h4 class="theme_option_headline2"><?php _e( 'Custom marker type', 'tcd-w' ); ?></h4>
						<ul class="cb_googlemap_custom_marker_type">
<?php
		foreach ( $cb_contents[$cb_content_select]['cb_googlemap_custom_marker_type_options'] as $k => $v ) :
			echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_googlemap_custom_marker_type]" value="' . esc_attr( $k ) . '" ' . checked( $value['cb_googlemap_custom_marker_type'], $k, false ) . '> '. esc_html( $v ) . '</label></li>';
		endforeach;
?>
						</ul>
						<div class="cb_googlemap_custom_marker_type-type1">
							<h4 class="theme_option_headline2"><?php _e( 'Custom marker text', 'tcd-w' ); ?></h4>
							<input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_marker_text]" value="<?php echo esc_attr( $value['cb_googlemap_marker_text'] ); ?>">
							<h4 class="theme_option_headline2"><?php _e( 'Marker font color', 'tcd-w' ); ?></h4>
							<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_marker_color]" value="<?php echo esc_attr( $value['cb_googlemap_marker_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_googlemap_marker_color'] ); ?>">
						</div>
						<div class="cb_googlemap_custom_marker_type-type2 hidden">
							<h4 class="theme_option_headline2"><?php _e( 'Custom marker image', 'tcd-w' ); ?></h4>
							<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 60, 20 ); ?></p>
							<div class="image_box cf">
								<div class="cf cf_media_field hide-if-no-js cb_googlemap_marker_img">
									<input type="hidden" value="<?php echo esc_attr( $value['cb_googlemap_marker_img'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_marker_img]" class="cf_media_id">
									<div class="preview_field"><?php if ( $value['cb_googlemap_marker_img'] ) { echo wp_get_attachment_image( $value['cb_googlemap_marker_img'], 'medium' ); } ?></div>
									<div class="button_area">
										<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
										<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_googlemap_marker_img'] ) { echo 'hidden'; } ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="cb_googlemap_custom_marker_type-marker_bg">
							<h4 class="theme_option_headline2"><?php _e( 'Marker background color', 'tcd-w' ); ?></h4>
							<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_googlemap_marker_bg]" value="<?php echo esc_attr( $value['cb_googlemap_marker_bg'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_googlemap_marker_bg'] ); ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="cb_type-type2 hidden">
				<h4 class="theme_option_headline2"><?php _e( 'Free space', 'tcd-w' ); ?></h4>
				<?php
					wp_editor(
						$value['cb_wysiwyg_editor'],
						'cb_wysiwyg_editor-' . $cb_index,
						array(
							'textarea_name' => 'dp_options[contents_builder][' . $cb_index . '][cb_wysiwyg_editor]',
							'textarea_rows' => 10
						)
					);
				?>
			</div>

			<h4 class="theme_option_headline2"><?php _e( 'Button', 'tcd-w' ); ?></h4>
			<p><?php _e( 'You can set the button.', 'tcd-w' ); ?></p>
			<table>
				<tr>
					<td><label><?php _e( 'Button label', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_label]" value="<?php echo esc_attr( $value['cb_button_label'] ); ?>" size="30"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Link URL', 'tcd-w' ); ?></td>
					<td><input type="text" class="large-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_url]" value="<?php echo esc_attr( $value['cb_button_url'] ); ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_target_blank]" type="checkbox" value="1" <?php checked( $value['cb_button_target_blank'], 1 ); ?>> <?php _e( 'Use target blank for this link', 'tcd-w' ); ?></label></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_font_color]" value="<?php echo esc_attr( $value['cb_button_font_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_font_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_bg_color]" value="<?php echo esc_attr( $value['cb_button_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_bg_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Font hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_font_color_hover]" value="<?php echo esc_attr( $value['cb_button_font_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_font_color_hover'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Background hover color', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_button_bg_color_hover]" value="<?php echo esc_attr( $value['cb_button_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_button_bg_color_hover'] ); ?>"></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 800 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>

<?php
	// フリーススペース
	elseif ( 'wysiwyg' == $cb_content_select ) :
?>
		<h3 class="cb_content_headline"><?php _e( 'WYSIWYG editor', 'tcd-w' ); ?><span></span></h3>
		<div class="cb_content">
            <p><?php _e( 'Please create content freely as you like blog posts.', 'tcd-w' ); ?></p>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( $value['cb_display'], 1 ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>

			<?php
				wp_editor(
					$value['cb_wysiwyg_editor'],
					'cb_wysiwyg_editor-' . $cb_index,
					array(
						'textarea_name' => 'dp_options[contents_builder][' . $cb_index . '][cb_wysiwyg_editor]',
						'textarea_rows' => 10,
						'editor_class' => 'change_content_headline'
					)
				);
			?>
			<h4 class="theme_option_headline2"><?php _e( 'Content background image', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background image and overlay color.', 'tcd-w' ); ?></p>
			<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 800 ); ?></p>
			<div class="image_box cf">
				<div class="cf cf_media_field hide-if-no-js cb_background_image">
					<input type="hidden" value="<?php echo esc_attr( $value['cb_background_image'] ); ?>" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image]" class="cf_media_id">
					<div class="preview_field"><?php if ( $value['cb_background_image'] ) { echo wp_get_attachment_image( $value['cb_background_image'], 'medium' ); } ?></div>
					<div class="button_area">
						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['cb_background_image'] ) { echo 'hidden'; } ?>">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td><label><?php _e( 'Overlay color of background image', 'tcd-w' ); ?></td>
					<td><input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_color]" value="<?php echo esc_attr( $value['cb_background_image_overlay_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_color'] ); ?>"></td>
				</tr>
				<tr>
					<td><label><?php _e( 'Overlay color opacity of background image', 'tcd-w' ); ?></td>
					<td><input type="number" class="small-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_overlay_opacity]" value="<?php echo esc_attr( $value['cb_background_image_overlay_opacity'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $cb_contents[$cb_content_select]['default']['cb_background_image_overlay_opacity'] ); ?>" min="0" max="1" step="0.1"></td>
				</tr>
				<tr>
					<td colspan="2"><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_image_parallax]" type="checkbox" value="1" <?php checked( $value['cb_background_image_parallax'], 1 ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></td>
				</tr>
			</table>
			<h4 class="theme_option_headline2"><?php _e( 'Content background color', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set the background color. When using background image, background color is unavailable.', 'tcd-w' ); ?></p>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker">

			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>
<?php
	else :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_content_select ); ?></h3>
		<div class="cb_content">
			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-secondary close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>
<?php
	endif;
?>
	</div><!-- END .cb_content_wrap -->
<?php
}

/**
 * コンテンツビルダー用 保存整形
 */
function cb_validate( $input = array() ) {
	if ( ! empty( $input['contents_builder'] ) ) {
		$cb_contents = cb_get_contents();
		$cb_data = array();

		foreach ( $input['contents_builder'] as $key => $value ) {
			// クローン用はスルー
			if ( in_array( $key, array( 'cb_cloneindex', 'cb_cloneindex2' ), true ) ) continue;

			// コンテンツデフォルト値に入力値をマージ
			if ( ! empty( $value['cb_content_select'] ) && isset( $cb_contents[$value['cb_content_select']]['default'] ) ) {
				$value = array_merge( (array) $cb_contents[$value['cb_content_select']]['default'], $value );
			}

			// ブログ
			if ( 'blog' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = absint( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = absint( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_color'] = wp_filter_nohtml_kses( $value['cb_desc_color'] );
				$value['cb_desc_font_size'] = absint( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = absint( $value['cb_desc_font_size_mobile'] );
				$value['cb_category'] = absint( $value['cb_category'] );
				$value['cb_post_num'] = absint( $value['cb_post_num'] );
				$value['cb_show_date'] = ! empty( $value['cb_show_date'] ) ? 1 : 0;
				$value['cb_show_category'] = ! empty( $value['cb_show_category'] ) ? 1 : 0;
				$value['cb_show_archive_link'] = ! empty( $value['cb_show_archive_link'] ) ? 1 : 0;
				$value['cb_archive_link_text'] = wp_filter_nohtml_kses( $value['cb_archive_link_text'] );
				$value['cb_archive_link_target_blank'] = ! empty( $value['cb_archive_link_target_blank'] ) ? 1 : 0;
				$value['cb_archive_link_font_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color'] );
				$value['cb_archive_link_bg_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color'] );
				$value['cb_archive_link_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color_hover'] );
				$value['cb_archive_link_bg_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color_hover'] );
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				if ( ! empty( $value['cb_list_type'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_list_type_options'][$value['cb_list_type']] ) ) {
					$value['cb_list_type'] = null;
				}
				if ( empty( $value['cb_list_type'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_list_type'] ) ) {
					$value['cb_list_type'] = $cb_contents[$value['cb_content_select']]['default']['cb_list_type'];
				}

				if ( ! empty( $value['cb_order'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_order_options'][$value['cb_order']] ) ) {
					$value['cb_order'] = null;
				}
				if ( empty( $value['cb_order'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_order'] ) ) {
					$value['cb_order'] = $cb_contents[$value['cb_content_select']]['default']['cb_order'];
				}

			// Information
			} elseif ( 'information' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = absint( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = absint( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_color'] = wp_filter_nohtml_kses( $value['cb_desc_color'] );
				$value['cb_desc_font_size'] = absint( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = absint( $value['cb_desc_font_size_mobile'] );
				$value['cb_post_num'] = absint( $value['cb_post_num'] );
				$value['cb_show_date'] = ! empty( $value['cb_show_date'] ) ? 1 : 0;
				$value['cb_show_archive_link'] = ! empty( $value['cb_show_archive_link'] ) ? 1 : 0;
				$value['cb_archive_link_text'] = wp_filter_nohtml_kses( $value['cb_archive_link_text'] );
				$value['cb_archive_link_target_blank'] = ! empty( $value['cb_archive_link_target_blank'] ) ? 1 : 0;
				$value['cb_archive_link_font_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color'] );
				$value['cb_archive_link_bg_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color'] );
				$value['cb_archive_link_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color_hover'] );
				$value['cb_archive_link_bg_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color_hover'] );
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				if ( ! empty( $value['cb_order'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_order_options'][$value['cb_order']] ) ) {
					$value['cb_order'] = null;
				}
				if ( empty( $value['cb_order'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_order'] ) ) {
					$value['cb_order'] = $cb_contents[$value['cb_content_select']]['default']['cb_order'];
				}

			// Works
			} elseif ( 'works' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = absint( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = absint( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_color'] = wp_filter_nohtml_kses( $value['cb_desc_color'] );
				$value['cb_desc_font_size'] = absint( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = absint( $value['cb_desc_font_size_mobile'] );
				$value['cb_category'] = absint( $value['cb_category'] );
				$value['cb_post_num'] = absint( $value['cb_post_num'] );
				$value['cb_show_archive_link'] = ! empty( $value['cb_show_archive_link'] ) ? 1 : 0;
				$value['cb_archive_link_text'] = wp_filter_nohtml_kses( $value['cb_archive_link_text'] );
				$value['cb_archive_link_target_blank'] = ! empty( $value['cb_archive_link_target_blank'] ) ? 1 : 0;
				$value['cb_archive_link_font_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color'] );
				$value['cb_archive_link_bg_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color'] );
				$value['cb_archive_link_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color_hover'] );
				$value['cb_archive_link_bg_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color_hover'] );
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				if ( ! empty( $value['cb_order'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_order_options'][$value['cb_order']] ) ) {
					$value['cb_order'] = null;
				}
				if ( empty( $value['cb_order'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_order'] ) ) {
					$value['cb_order'] = $cb_contents[$value['cb_content_select']]['default']['cb_order'];
				}

			// Voiceカルーセル
			} elseif ( 'carousel' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = absint( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = absint( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_color'] = wp_filter_nohtml_kses( $value['cb_desc_color'] );
				$value['cb_desc_font_size'] = absint( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = absint( $value['cb_desc_font_size_mobile'] );
				$value['cb_post_num'] = absint( $value['cb_post_num'] );
				$value['cb_slide_time_seconds'] = absint( $value['cb_slide_time_seconds'] );
				$value['cb_show_thumbnail'] = ! empty( $value['cb_show_thumbnail'] ) ? 1 : 0;
				$value['cb_arrow_font_color'] = wp_filter_nohtml_kses( $value['cb_arrow_font_color'] );
				$value['cb_arrow_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_arrow_font_color_hover'] );
				$value['cb_show_archive_link'] = ! empty( $value['cb_show_archive_link'] ) ? 1 : 0;
				$value['cb_archive_link_text'] = wp_filter_nohtml_kses( $value['cb_archive_link_text'] );
				$value['cb_archive_link_target_blank'] = ! empty( $value['cb_archive_link_target_blank'] ) ? 1 : 0;
				$value['cb_archive_link_font_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color'] );
				$value['cb_archive_link_bg_color'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color'] );
				$value['cb_archive_link_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_font_color_hover'] );
				$value['cb_archive_link_bg_color_hover'] = wp_filter_nohtml_kses( $value['cb_archive_link_bg_color_hover'] );
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				if ( ! empty( $value['cb_order'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_order_options'][$value['cb_order']] ) ) {
					$value['cb_order'] = null;
				}
				if ( empty( $value['cb_order'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_order'] ) ) {
					$value['cb_order'] = $cb_contents[$value['cb_content_select']]['default']['cb_order'];
				}


			// About
			} elseif ( 'about' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = absint( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = absint( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_color'] = wp_filter_nohtml_kses( $value['cb_desc_color'] );
				$value['cb_desc_font_size'] = absint( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = absint( $value['cb_desc_font_size_mobile'] );
				$value['cb_desc2'] = wp_filter_nohtml_kses( $value['cb_desc2'] );
				$value['cb_desc_color2'] = wp_filter_nohtml_kses( $value['cb_desc_color2'] );
				$value['cb_desc_font_size2'] = absint( $value['cb_desc_font_size2'] );
				$value['cb_desc_font_size_mobile2'] = absint( $value['cb_desc_font_size_mobile2'] );
				$value['cb_button_label'] = wp_filter_nohtml_kses( $value['cb_button_label'] );
				$value['cb_button_url'] = wp_filter_nohtml_kses( $value['cb_button_url'] );
				$value['cb_button_target_blank'] = ! empty( $value['cb_button_target_blank'] ) ? 1 : 0;
				$value['cb_button_font_color'] = wp_filter_nohtml_kses( $value['cb_button_font_color'] );
				$value['cb_button_bg_color'] = wp_filter_nohtml_kses( $value['cb_button_bg_color'] );
				$value['cb_button_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_button_font_color_hover'] );
				$value['cb_button_bg_color_hover'] = wp_filter_nohtml_kses( $value['cb_button_bg_color_hover'] );
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				for( $i = 1; $i <= 3; $i++ ) {
					$value['cb_image' . $i] = absint( $value['cb_image' . $i] );
					$value['cb_image_label' . $i] = wp_filter_nohtml_kses( $value['cb_image_label' . $i] );
					$value['cb_image_url' . $i] = wp_filter_nohtml_kses( $value['cb_image_url' . $i] );
					$value['cb_image_target_blank' . $i] = ! empty( $value['cb_image_target_blank' . $i] ) ? 1 : 0;
				}

			// PR&ACCESS
			} elseif ( 'pr' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_image'] = absint( $value['cb_image'] );
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = absint( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = absint( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_color'] = wp_filter_nohtml_kses( $value['cb_desc_color'] );
				$value['cb_desc_font_size'] = absint( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = absint( $value['cb_desc_font_size_mobile'] );
				$value['cb_show_googlemap'] = ! empty( $value['cb_show_googlemap'] ) ? 1 : 0;
				$value['cb_googlemap_address'] = wp_filter_nohtml_kses( $value['cb_googlemap_address'] );
				$value['cb_googlemap_desc'] = $value['cb_googlemap_desc'];
				$value['cb_map_link_label'] = wp_filter_nohtml_kses( $value['cb_map_link_label'] );
				$value['cb_map_link_label_sp'] = wp_filter_nohtml_kses( $value['cb_map_link_label_sp'] );
				$value['cb_map_link'] = wp_filter_nohtml_kses( $value['cb_map_link'] );
				$value['cb_map_link_bg'] = wp_filter_nohtml_kses( $value['cb_map_link_bg'] );
				$value['cb_map_link_color'] = wp_filter_nohtml_kses( $value['cb_map_link_color'] );
				$value['cb_map_link_border_color'] = wp_filter_nohtml_kses( $value['cb_map_link_border_color'] );
				$value['cb_map_link_bg_hover'] = wp_filter_nohtml_kses( $value['cb_map_link_bg_hover'] );
				$value['cb_map_link_color_hover'] = wp_filter_nohtml_kses( $value['cb_map_link_color_hover'] );
				$value['cb_map_link_border_color_hover'] = wp_filter_nohtml_kses( $value['cb_map_link_border_color_hover'] );
				$value['cb_googlemap_saturation'] = intval( $value['cb_googlemap_saturation'] );
				$value['cb_googlemap_marker_text'] = wp_filter_nohtml_kses( $value['cb_googlemap_marker_text'] );
				$value['cb_googlemap_marker_color'] = wp_filter_nohtml_kses( $value['cb_googlemap_marker_color'] );
				$value['cb_googlemap_marker_img'] = wp_filter_nohtml_kses( $value['cb_googlemap_marker_img'] );
				$value['cb_googlemap_marker_bg'] = wp_filter_nohtml_kses( $value['cb_googlemap_marker_bg'] );
				$value['cb_button_label'] = wp_filter_nohtml_kses( $value['cb_button_label'] );
				$value['cb_button_url'] = wp_filter_nohtml_kses( $value['cb_button_url'] );
				$value['cb_button_target_blank'] = ! empty( $value['cb_button_target_blank'] ) ? 1 : 0;
				$value['cb_button_font_color'] = wp_filter_nohtml_kses( $value['cb_button_font_color'] );
				$value['cb_button_bg_color'] = wp_filter_nohtml_kses( $value['cb_button_bg_color'] );
				$value['cb_button_font_color_hover'] = wp_filter_nohtml_kses( $value['cb_button_font_color_hover'] );
				$value['cb_button_bg_color_hover'] = wp_filter_nohtml_kses( $value['cb_button_bg_color_hover'] );
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				if ( ! empty( $value['cb_type'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_type_options'][$value['cb_type']] ) ) {
					$value['cb_type'] = null;
				}
				if ( empty( $value['cb_type'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_type'] ) ) {
					$value['cb_type'] = $cb_contents[$value['cb_content_select']]['default']['cb_type'];
				}

				if ( ! empty( $value['cb_googlemap_marker_type'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_googlemap_marker_type_options'][$value['cb_googlemap_marker_type']] ) ) {
					$value['cb_googlemap_marker_type'] = null;
				}
				if ( empty( $value['cb_googlemap_marker_type'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_googlemap_marker_type'] ) ) {
					$value['cb_googlemap_marker_type'] = $cb_contents[$value['cb_content_select']]['default']['cb_googlemap_marker_type'];
				}

				if ( ! empty( $value['cb_googlemap_custom_marker_type'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_googlemap_custom_marker_type_options'][$value['cb_googlemap_custom_marker_type']] ) ) {
					$value['cb_googlemap_custom_marker_type'] = null;
				}
				if ( empty( $value['cb_googlemap_custom_marker_type'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_googlemap_custom_marker_type'] ) ) {
					$value['cb_googlemap_custom_marker_type'] = $cb_contents[$value['cb_content_select']]['default']['cb_googlemap_custom_marker_type'];
				}

			// フリースペース
			} elseif ( 'wysiwyg' == $value['cb_content_select'] ) {
				$value['cb_display'] = ! empty( $value['cb_display'] ) ? 1 : 0;
				$value['cb_background_image'] = wp_filter_nohtml_kses( $value['cb_background_image'] );
				$value['cb_background_image_overlay_color'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_color'] );
				$value['cb_background_image_overlay_opacity'] = wp_filter_nohtml_kses( $value['cb_background_image_overlay_opacity'] );
				$value['cb_background_image_parallax'] = ! empty( $value['cb_background_image_parallax'] ) ? 1 : 0;
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );
			}

			$cb_data[] = $value;
		}

		$input['contents_builder'] = $cb_data;
	}

	return $input;
}

/**
 * クローン用のリッチエディター化処理をしないようにする
 * クローン後のリッチエディター化はjsで行う
 */
function cb_tiny_mce_before_init( $mceInit, $editor_id ) {
	if ( strpos( $editor_id, 'cb_cloneindex' ) !== false ) {
		$mceInit['wp_skip_init'] = true;
	}
	return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'cb_tiny_mce_before_init', 10, 2 );
