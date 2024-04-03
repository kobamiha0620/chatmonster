<?php

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-profile',
	'form' => 'form_page_builder_widget_profile',
	'form_rightbar' => 'form_rightbar_page_builder_widget', // 標準右サイドバー
	'display' => 'display_page_builder_widget_profile',
	'title' => __('Profile', 'tcd-w'),
	'priority' => 58
));

/**
 * 管理画面用js
 */
function page_builder_widget_profile_admin_scripts() {
	wp_enqueue_script('page_builder-profile-admin', get_template_directory_uri().'/pagebuilder/assets/admin/js/profile.js', array('jquery'), PAGE_BUILDER_VERSION, true);
}
add_action('page_builder_admin_scripts', 'page_builder_widget_profile_admin_scripts', 12);

/**
 * フォーム
 */
function form_page_builder_widget_profile($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_profile_default_values', array(
		'widget_index' => '',
		'layout' => 'type1',
		'image_type1' => '',
		'image_type2' => '',
		'overlay_bg_color' => '#000000',
		'overlay_bg_opacity' => 0.5,
		'logo' => '',
		'headline' => '',
		'headline_font_size' => '36',
		'headline_font_size_mobile' => '20',
		'headline_font_color_type1' => '#ffffff',
		'headline_font_color_type2' => '#000000',
		'headline_font_family' => 'type3',
		'headline_text_align' => 'center',
		'use_sns_theme_options' => 1,
		'facebook_url' => '',
		'twitter_url' => '',
		'instagram_url' => '',
		'tiktok_url' => '',
		'pinterest_url' => '',
		'youtube_url' => '',
		'contact_url' => '',
		'rss_url' => '',
		'sns_icon_color_type1' => '#ffffff',
		'sns_icon_color_hover_type1' => '#ee3c00',
		'sns_icon_color_type2' => '#000000',
		'sns_icon_color_hover_type2' => '#ee3c00',
	), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	$layout_options = array(
		'type1' => __('Type1 : Overlay contents on the image', 'tcd-w'),
		'type2' => __('Type2 : Round prifile image and contents', 'tcd-w'),
	);

	$font_family_options = array(
		'type1' => __('Meiryo', 'tcd-w'),
		'type2' => __('YuGothic', 'tcd-w'),
		'type3' => __('YuMincho', 'tcd-w')
	);

	$text_align_options = array(
		'left' => __('Align left', 'tcd-w'),
		'center' => __('Align center', 'tcd-w'),
		'right' => __('Align right', 'tcd-w')
	);
?>
<div class="form-field form-field-radio form-field-layout">
	<h4><?php _e('Layout setting', 'tcd-w'); ?></h4>
	<?php
		$radio_html = array();
		foreach($layout_options as $key => $value) {
			$attr = '';
			if ($values['layout'] == $key) {
				$attr .= ' checked="checked"';
			}
			$radio_html[] = '<label><input type="radio" name="pagebuilder[widget]['.esc_attr($values['widget_index']).'][layout]" value="'.esc_attr($key).'"'.$attr.' />'.esc_html($value).'</label>';
		}
		echo implode("<br>\n\t", $radio_html);
	?>
</div>

<div class="form-field form-field-layout-type1 hidden">
	<h4><?php _e('Background image', 'tcd-w'); ?></h4>
	<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1180, 450 ); ?></p>
	<?php
		$input_name = 'pagebuilder[widget]['.$values['widget_index'].'][image_type1]';
		$media_id = $values['image_type1'];
		pb_media_form($input_name, $media_id);
	?>
</div>

<div class="form-field form-field-layout-type1 hidden">
	<h4><?php _e('Overlay setting', 'tcd-w'); ?></h4>
	<table>
		<tr>
			<td><?php _e('Background color', 'tcd-w'); ?></td>
			<td>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_bg_color]" value="<?php echo esc_attr($values['overlay_bg_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_bg_color']); ?>" />
			</td>
		</tr>
		<tr>
			<td><?php _e('Transparency', 'tcd-w'); ?></td>
			<td>
				<input type="number" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_bg_opacity]" value="<?php echo esc_attr($values['overlay_bg_opacity']); ?>" class="small-text" min="0" max="1" step="0.1" />
				<span class="pb-description" style="margin-left: 5px;"><?php _e('Please enter the number 0 - 1.0. (e.g. 0.5)', 'tcd-w'); ?></span>
			</td>
		</tr>
	</table>
</div>

<div class="form-field form-field-layout-type2 hidden">
	<h4><?php _e('Profile image', 'tcd-w'); ?></h4>
	<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 300, 300 ); ?></p>
	<?php
		$input_name = 'pagebuilder[widget]['.$values['widget_index'].'][image_type2]';
		$media_id = $values['image_type2'];
		pb_media_form($input_name, $media_id);
	?>
</div>

<div class="form-field">
	<h4><?php _e('Logo', 'tcd-w'); ?></h4>
	<?php
		$input_name = 'pagebuilder[widget]['.$values['widget_index'].'][logo]';
		$media_id = $values['logo'];
		pb_media_form($input_name, $media_id);
	?>
</div>

<div class="form-field">
	<h4><?php _e('Catchphrase', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline]" rows="2"><?php echo esc_textarea($values['headline']); ?></textarea>
	<table style="margin-top:5px;">
		<tr>
			<td><?php _e('Font size', 'tcd-w'); ?></td>
			<td><input type="number" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline_font_size]" value="<?php echo esc_attr($values['headline_font_size']); ?>" class="small-text" min="0" /> px</td>
		</tr>
		<tr>
			<td><?php _e('Font size for mobile', 'tcd-w'); ?></td>
			<td><input type="number" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline_font_size_mobile]" value="<?php echo esc_attr($values['headline_font_size_mobile']); ?>" class="small-text" min="0" /> px</td>
		</tr>
		<tr class="form-field-layout-type1 hidden">
			<td><?php _e('Font color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline_font_color_type1]" value="<?php echo esc_attr($values['headline_font_color_type1']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['headline_font_color_type1']); ?>" /></td>
		</tr>
		<tr class="form-field-layout-type2 hidden">
			<td><?php _e('Font color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline_font_color_type2]" value="<?php echo esc_attr($values['headline_font_color_type2']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['headline_font_color_type2']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Font family', 'tcd-w'); ?></td>
			<td>
				<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline_font_family]">
					<?php
						foreach($font_family_options as $key => $value) {
							$attr = '';
							if ($values['headline_font_family'] == $key) {
								$attr .= ' selected="selected"';
							}
							echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Text align', 'tcd-w'); ?></td>
			<td>
				<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][headline_text_align]">
					<?php
						foreach($text_align_options as $key => $value) {
							$attr = '';
							if ($values['headline_text_align'] == $key) {
								$attr .= ' selected="selected"';
							}
							echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
						}
					?>
				</select>
			</td>
		</tr>
	</table>
</div>

<div class="form-field">
	<h4><?php _e('SNS button setting', 'tcd-w'); ?></h4>
	<p>
		<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][use_sns_theme_options]" value="0" />
		<label><input type="checkbox" class="checkbox-use_sns_theme_options" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][use_sns_theme_options]" value="1"<?php if ($values['use_sns_theme_options']) echo ' checked="checked"'; ?> /> <?php _e('Use SNS button settings from footer section of theme options.', 'tcd-w'); ?></label>
	</p>
	<table class="form-field-use_sns_theme_options-hide hidden">
		<tr>
			<td><?php _e( 'Facebook URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][facebook_url]" value="<?php echo esc_attr($values['facebook_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'X URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][twitter_url]" value="<?php echo esc_attr($values['twitter_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'TikTok URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][tiktok_url]" value="<?php echo esc_attr($values['tiktok_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'Instagram URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][instagram_url]" value="<?php echo esc_attr($values['instagram_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'Pinterest URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][pinterest_url]" value="<?php echo esc_attr($values['pinterest_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'Youtube URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][youtube_url]" value="<?php echo esc_attr($values['youtube_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'Contact page URL (You can use mailto:)', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][contact_url]" value="<?php echo esc_attr($values['contact_url']); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<td><?php _e( 'RSS URL', 'tcd-w' ); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][rss_url]" value="<?php echo esc_attr($values['youtube_url']); ?>" class="regular-text" /></td>
		</tr>
	</table>
	<table class="form-field-layout-type1 hidden">
		<tr>
			<td><?php _e('SNS button color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][sns_icon_color_type1]" value="<?php echo esc_attr($values['sns_icon_color_type1']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['sns_icon_color_type1']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('SNS button hover color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][sns_icon_color_hover_type1]" value="<?php echo esc_attr($values['sns_icon_color_hover_type1']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['sns_icon_color_hover_type1']); ?>" /></td>
		</tr>
	</table>
	<table class="form-field-layout-type2 hidden">
		<tr>
			<td><?php _e('SNS button color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][sns_icon_color_type2]" value="<?php echo esc_attr($values['sns_icon_color_type2']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['sns_icon_color_type2']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('SNS button hover color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][sns_icon_color_hover_type2]" value="<?php echo esc_attr($values['sns_icon_color_hover_type2']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['sns_icon_color_hover_type2']); ?>" /></td>
		</tr>
	</table>
</div>
<?php
}

/**
 * フロント出力
 */
function display_page_builder_widget_profile($values = array()) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	// layout type2
	if (!empty($values['layout']) && $values['layout'] == 'type2') {
		if (!empty($values['image_type2'])) {
			$image_type2 = wp_get_attachment_image($values['image_type2'], 'size1');
		}
		echo '<div class="pb_profile-container pb_profile-layout-type2">'."\n";
		echo "\t".'<div class="pb_profile-contents">'."\n";
		echo "\t\t".'<div class="pb_profile-contents-inner">'."\n";

		if (!empty($image_type2)) {
			echo "\t\t\t".'<div class="pb_profile_image">'.$image_type2.'</div>'."\n";
		}

	// layout type1
	} else {
		if (!empty($values['image_type1'])) {
			$image_type1 = wp_get_attachment_image($values['image_type1'], 'full');
		}
		echo '<div class="pb_profile-container pb_profile-layout-type1">'."\n";
		echo "\t".'<div class="pb_profile-contents">'."\n";
		echo "\t\t".'<div class="pb_profile-contents-inner">'."\n";
	}

	// logo
	if (!empty($values['logo'])) {
		$logo = wp_get_attachment_image($values['logo'], 'full');
		if ($logo) {
			echo "\t\t\t".'<div class="pb_profile_logo">'.$logo.'</div>'."\n";
		}
	}

	// headline
	if (!empty($values['headline'])) {
		echo "\t\t\t".'<h3 class="pb_profile_headline pb_font_family_'.esc_attr($values['headline_font_family']).'">'.str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($values['headline'])).'</h3>'."\n";
	}

	// sns
	if ( $values['use_sns_theme_options'] ) {
		$facebook_url = $dp_options['facebook_url'];
		$twitter_url = $dp_options['twitter_url'];
		$instagram_url = $dp_options['instagram_url'];
		$tiktok_url = $dp_options['tiktok_url'];
		$pinterest_url = $dp_options['pinterest_url'];
		$youtube_url = $dp_options['youtube_url'];
		$contact_url = $dp_options['contact_url'];
		$rss_url = $dp_options['show_rss'] ? get_bloginfo( 'rss2_url' ) : '';
	} else {
		$facebook_url = $values['facebook_url'];
		$twitter_url = $values['twitter_url'];
		$instagram_url = $values['instagram_url'];
		$tiktok_url = $values['tiktok_url'];
		$pinterest_url = $values['pinterest_url'];
		$youtube_url = $values['youtube_url'];
		$contact_url = $values['contact_url'];
		$rss_url = $values['rss_url'];
	}

	$sns_html = null;
	if ( $instagram_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--instagram"><a href="' . esc_attr( $instagram_url ) . '" target="_blank"></a></li>';
	}
	if ( $twitter_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--twitter"><a href="' . esc_attr( $twitter_url ) . '" target="_blank"></a></li>';
	}
	if ( $pinterest_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--pinterest"><a href="' . esc_attr( $pinterest_url ) . '" target="_blank"></a></li>';
	}
	if ( $facebook_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--facebook"><a href="' . esc_attr( $facebook_url ) . '" target="_blank"></a></li>';
	}
	if ( $tiktok_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--tiktok"><a href="' . esc_attr( $tiktok_url ) . '" target="_blank"></a></li>';
	}
	if ( $youtube_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--youtube"><a href="' . esc_attr( $youtube_url ) . '" target="_blank"></a></li>';
	}
	if ( $contact_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--contact"><a href="' . esc_attr( $contact_url ) . '" target="_blank"></a></li>';
	}
	if ( $rss_url ) {
		$sns_html .= '<li class="p-social-nav__item p-social-nav__item--rss"><a href="' . esc_attr( $rss_url ) . '" target="_blank"></a></li>';
	}
	if ( $sns_html ) {
		echo "\t\t\t".'<ul class="pb_profile_sns p-social-nav">' . $sns_html . "</ul>\n";
	}

	// layout type2
	if (!empty($values['layout']) && $values['layout'] == 'type2') {
		echo "\t\t".'</div>'."\n";
		echo "\t".'</div>'."\n";
		echo '</div>'."\n";

	// layout type1
	} else {
		echo "\t\t".'</div>'."\n";
		echo "\t".'</div>'."\n";

		if (!empty($image_type1)) {
			echo "\t".'<div class="pb_profile_overlay"></div>'."\n";
			echo "\t".'<div class="pb_profile_bg_image">'.$image_type1.'</div>'."\n";
		}

		echo '</div>'."\n";
	}

}

/**
 * フロント用css
 */
function page_builder_widget_profile_styles() {
	wp_enqueue_style('page_builder-profile', get_template_directory_uri().'/pagebuilder/assets/css/profile.css', false, PAGE_BUILDER_VERSION);
}

function page_builder_widget_profile_sctipts_styles() {
	if (is_singular() && is_page_builder() && page_builder_has_widget('pb-widget-profile')) {
		add_action('wp_enqueue_scripts', 'page_builder_widget_profile_styles', 11);
		add_action('page_builder_css', 'page_builder_widget_profile_css');
	}
}
add_action('wp', 'page_builder_widget_profile_sctipts_styles');

function page_builder_widget_profile_css() {
	// 現記事で使用しているprofileコンテンツデータを取得
	$post_widgets = get_page_builder_post_widgets(get_the_ID(), 'pb-widget-profile');
	if ($post_widgets) {
		foreach($post_widgets as $post_widget) {
			$values = $post_widget['widget_value'];

			// layout type2
			if (!empty($values['layout']) && $values['layout'] == 'type2') {
				if (!empty($values['headline'])) {
					echo $post_widget['css_class'].' .pb_profile_headline { color: '.esc_attr($values['headline_font_color_type2']).'; font-size: '.esc_attr($values['headline_font_size']).'px; text-align: '.esc_attr($values['headline_text_align']).'; }'."\n";
				}

				echo $post_widget['css_class'].' .pb_profile_sns a { color: '.esc_attr($values['sns_icon_color_type2']).';  }'."\n";
				echo $post_widget['css_class'].' .pb_profile_sns a:hover { color: '.esc_attr($values['sns_icon_color_hover_type2']).';  }'."\n";

			// layout type1
			} else {
				if (!empty($values['headline'])) {
					echo $post_widget['css_class'].' .pb_profile_headline { color: '.esc_attr($values['headline_font_color_type1']).'; font-size: '.esc_attr($values['headline_font_size']).'px; text-align: '.esc_attr($values['headline_text_align']).'; }'."\n";
				}

				echo $post_widget['css_class'].' .pb_profile_sns a { color: '.esc_attr($values['sns_icon_color_type1']).';  }'."\n";
				echo $post_widget['css_class'].' .pb_profile_sns a:hover { color: '.esc_attr($values['sns_icon_color_hover_type1']).';  }'."\n";

				echo $post_widget['css_class'].' .pb_profile_overlay { background-color: rgba('.esc_attr(implode(',', page_builder_hex2rgb($values['overlay_bg_color'])).','.$values['overlay_bg_opacity']).'); }'."\n";
			}

			if (!empty($values['headline'])) {
				echo "@media only screen and (max-width: 767px) {\n";
				echo $post_widget['css_class'].' .pb_profile_headline { font-size: '.esc_attr($values['headline_font_size_mobile']).'px; }'."\n";
				echo "}\n";
			}
		}
	}
}
