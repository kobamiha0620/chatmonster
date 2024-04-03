<?php
global $dp_options, $dp_default_options, $footer_bar_display_options, $footer_bar_button_options, $footer_bar_icon_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<?php // フッターの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Footer setting', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Set the content to display in the footer area.', 'tcd-w' ); ?></p>
	<h4 class="theme_option_headline2"><?php _e( 'Footer image', 'tcd-w' ); ?></h4>
	<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1450, 650 ); ?></p>
	<div class="image_box cf">
		<div class="cf cf_media_field hide-if-no-js footer_image">
			<input type="hidden" value="<?php echo esc_attr( $dp_options['footer_image'] ); ?>" name="dp_options[footer_image]" class="cf_media_id">
			<div class="preview_field"><?php if ( $dp_options['footer_image'] ) { echo wp_get_attachment_image( $dp_options['footer_image'], 'medium' ); } ?></div>
			<div class="button_area">
				<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
				<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['footer_image'] ) { echo 'hidden'; } ?>">
			</div>
		</div>
	</div>
	<h4 class="theme_option_headline2"><?php _e( 'Color of overlay', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Use overlay, to become easy to read the catchphrase on the image. Please set the overlay color.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[footer_overlay_color]" type="text" value="<?php echo esc_attr( $dp_options['footer_overlay_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_overlay_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Opacity of overlay', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please enter the number 0 - 1.0. (e.g. 0)', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[footer_overlay_opacity]" value="<?php echo esc_attr( $dp_options['footer_overlay_opacity'] ); ?>" min="0" max="1" step="0.1">
	<h4 class="theme_option_headline2"><?php _e( 'Parallax setting', 'tcd-w' ); ?></h4>
	<p><label><input name="dp_options[footer_image_parallax]" type="checkbox" value="1" <?php checked( 1, $dp_options['footer_image_parallax'] ); ?>><?php _e( 'Display as parallax scrolling effect', 'tcd-w' ); ?></label></p>
	<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set a description to be displayed on the footer.', 'tcd-w' ); ?></p>
	<textarea class="large-text" cols="50" rows="4" name="dp_options[footer_desc]"><?php echo esc_textarea( $dp_options['footer_desc'] ); ?></textarea>
	<table>
		<tr>
			<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
			<td><input type="number" class="small-text" name="dp_options[footer_desc_font_size]" value="<?php echo esc_attr( $dp_options['footer_desc_font_size'] ); ?>" min="1"><span>px</span></td>
		</tr>
		<tr>
			<td><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label></td>
			<td><input type="number" class="small-text" name="dp_options[footer_desc_font_size_mobile]" value="<?php echo esc_attr( $dp_options['footer_desc_font_size_mobile'] ); ?>" min="1"><span>px</span></td>
		</tr>
		<tr>
			<td><label><?php _e( 'Font color', 'tcd-w' ); ?></label></td>
			<td><input class="c-color-picker" name="dp_options[footer_desc_color]" type="text" value="<?php echo esc_attr( $dp_options['footer_desc_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_desc_color'] ); ?>"></td>
		</tr>
	</table>
	<h4 class="theme_option_headline2"><?php _e( 'SNS button setting', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please input URL to display the SNS icon and check for RSS button.', 'tcd-w' ); ?></p>
	<table class="theme_option_table">
		<tr>
			<td><?php _e( 'Facebook URL', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[facebook_url]" value="<?php echo esc_attr( $dp_options['facebook_url'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'X URL', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[twitter_url]" value="<?php echo esc_attr( $dp_options['twitter_url'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Instagram URL', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[instagram_url]" value="<?php echo esc_attr( $dp_options['instagram_url'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Tiktok URL', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[tiktok_url]" value="<?php echo esc_attr( $dp_options['tiktok_url'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Pinterest URL', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[pinterest_url]" value="<?php echo esc_attr( $dp_options['pinterest_url'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Youtube URL', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[youtube_url]" value="<?php echo esc_attr( $dp_options['youtube_url'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Contact page URL (You can use mailto:)', 'tcd-w' ); ?></td>
			<td><input class="large-text" type="text" name="dp_options[contact_url]" value="<?php echo esc_attr( $dp_options['contact_url'] ); ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><label><input name="dp_options[show_rss]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_rss'] ); ?>><?php _e( 'Display RSS button', 'tcd-w' ); ?></label></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><label><?php _e( 'SNS button color', 'tcd-w' ); ?></label></td>
			<td><input class="c-color-picker" name="dp_options[footer_sns_icon_color]" type="text" value="<?php echo esc_attr( $dp_options['footer_sns_icon_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_sns_icon_color'] ); ?>"></td>
		</tr>
		<tr>
			<td><label><?php _e( 'SNS button hover color', 'tcd-w' ); ?></label></td>
			<td><input class="c-color-picker" name="dp_options[footer_sns_icon_color_hover]" type="text" value="<?php echo esc_attr( $dp_options['footer_sns_icon_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_sns_icon_color_hover'] ); ?>"></td>
		</tr>
	</table>
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // フッターメニューの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Footer menu setting', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Set the color scheme of the footer menu.', 'tcd-w' ); ?></p>
	<h4 class="theme_option_headline2"><?php _e( 'Font color', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Set font color of footer menu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[footer_menu_font_color]" type="text" value="<?php echo esc_attr( $dp_options['footer_menu_font_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_menu_font_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Font hover color', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Set hover font color of footer menu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[footer_menu_font_color_hover]" type="text" value="<?php echo esc_attr( $dp_options['footer_menu_font_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_menu_font_color_hover'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Background color', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Set background color of footer menu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[footer_menu_bg_color]" type="text" value="<?php echo esc_attr( $dp_options['footer_menu_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_menu_bg_color'] ); ?>">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // コピーライトの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Copyright setting', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Set the color scheme of the copyright display area.', 'tcd-w' ); ?></p>
	<h4 class="theme_option_headline2"><?php _e( 'Font color', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Set font color of copyright display area.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[copyright_font_color]" type="text" value="<?php echo esc_attr( $dp_options['copyright_font_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['copyright_font_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Background color', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Set background color of copyright display area.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[copyright_bg_color]" type="text" value="<?php echo esc_attr( $dp_options['copyright_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['copyright_bg_color'] ); ?>">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // フッターバーの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Setting of the footer bar for smart phone', 'tcd-w' ); ?></h3>
	<p><?php _e( 'Please set the footer bar which is displayed with smart phone.', 'tcd-w' ); ?>
	<h4 class="theme_option_headline2"><?php _e( 'Display type of the footer bar', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please select how to display the footer bar. When you scroll a page by a certain amount, the footer bar is displayed with the selected animation. If you do not use the footer bar, please check "Hide".', 'tcd-w' ); ?></p>
	<fieldset class="cf select_type2">
		<?php foreach ( $footer_bar_display_options as $option ) : ?>
		<label><input type="radio" name="dp_options[footer_bar_display]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $dp_options['footer_bar_display'], $option['value'] ); ?>><?php echo $option['label']; ?></label>
		<?php endforeach; ?>
	</fieldset>
	<h4 class="theme_option_headline2"><?php _e( 'Settings for the appearance of the footer bar', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please set the color and transparency of the footer bar.', 'tcd-w' ); ?></p>
	<table class="theme_option_table">
		<tr>
			<td><?php _e( 'Background color', 'tcd-w' ); ?></td>
			<td><input class="c-color-picker" name="dp_options[footer_bar_bg]" type="text" value="<?php echo esc_attr( $dp_options['footer_bar_bg'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_bar_bg'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Border color', 'tcd-w' ); ?></td>
			<td><input class="c-color-picker" name="dp_options[footer_bar_border]" type="text" value="<?php echo esc_attr( $dp_options['footer_bar_border'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_bar_border'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
			<td><input class="c-color-picker" name="dp_options[footer_bar_color]" type="text" value="<?php echo esc_attr( $dp_options['footer_bar_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_bar_color'] ); ?>"></td>
		</tr>
		<tr>
			<td><?php _e( 'Opacity of background', 'tcd-w' ); ?></td>
			<td><input type="number" class="small-text" name="dp_options[footer_bar_tp]" value="<?php echo esc_attr( $dp_options['footer_bar_tp'] ); ?>" min="0" max="1" step="0.1"></td>
		</tr>
		<tr>
			<td colspan="2"><?php _e( 'Please enter the number 0 - 1.0. (e.g. 0.8)', 'tcd-w' ); ?></td>
		</tr>
	</table>
	<h4 class="theme_option_headline2"><?php _e( 'Settings for the contents of the footer bar', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can display the button with icon in footer bar. (We recommend you to set max 4 buttons.)', 'tcd-w' ); ?><br><?php _e( 'You can select button types below.', 'tcd-w' ); ?></p>
	<table class="table-border">
		<tr>
			<th><?php _e( 'Default', 'tcd-w' ); ?></th>
			<td><?php _e( 'You can set link URL.', 'tcd-w' ); ?></td>
		</tr>
		<tr>
			<th><?php _e( 'Share', 'tcd-w' ); ?></th>
			<td><?php _e( 'Share buttons are displayed if you tap this button.', 'tcd-w' ); ?></td>
		</tr>
		<tr>
			<th><?php _e( 'Telephone', 'tcd-w' ); ?></th>
			<td><?php _e( 'You can call this number.', 'tcd-w' ); ?></td>
		</tr>
	</table>
	<p><?php _e( 'Click "Add item", and set the button for footer bar. You can drag the item to change their order.', 'tcd-w' ); ?></p>
	<div class="repeater-wrapper">
		<div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
			<?php
			if ( $dp_options['footer_bar_btns'] ) :
				foreach ( $dp_options['footer_bar_btns'] as $key => $value ) :
			?>
			<div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
				<h4 class="theme_option_subbox_headline"><?php echo esc_attr( $value['label'] ? $value['label'] : __( 'New item', 'tcd-w' ) ); ?></h4>
				<div class="sub_box_content">
					<p class="footer-bar-target" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1" <?php checked( $value['target'], 1 ); ?>><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
					<table class="table-repeater">
						<tr class="footer-bar-type">
							<th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
							<td>
								<select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
									<?php foreach ( $footer_bar_button_options as $option ) : ?>
									<option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $value['type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
							<td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="large-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value="<?php echo esc_attr( $value['label'] ); ?>"></td>
						</tr>
						<tr class="footer-bar-url" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>">
							<th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
							<td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value="<?php echo esc_attr( $value['url'] ); ?>"></td>
						</tr>
						<tr class="footer-bar-number" style="<?php if ( $value['type'] !== 'type3' ) { echo 'display: none;'; } ?>">
							<th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
							<td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value="<?php echo esc_attr( $value['number'] ); ?>"></td>
						</tr>
						<tr>
							<th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
							<td>
								<?php foreach ( $footer_bar_icon_options as $option ) : ?>
								<p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $value['icon'] ); ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php echo $option['label']; ?></label></p>
								<?php endforeach; ?>
							</td>
						</tr>
					</table>
					<p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
				</div>
			</div>
			<?php
				endforeach;
			endif;
			?>
			<?php
				$key = 'addindex';
				ob_start();
			?>
			<div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
			<h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
				<div class="sub_box_content">
					<p class="footer-bar-target"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1"><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
					<table class="table-repeater">
						<tr class="footer-bar-type">
								<th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
								<td>
									<select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
										<?php foreach ( $footer_bar_button_options as $option ) : ?>
										<option value="<?php echo esc_attr( $option['value'] ); ?>"><?php echo $option['label']; ?></option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
						<tr>
							<th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
							<td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="large-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value=""></td>
						</tr>
						<tr class="footer-bar-url">
							<th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
							<td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value=""></td>
						</tr>
						<tr class="footer-bar-number" style="display: none;">
							<th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
							<td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value=""></td>
						</tr>
						<tr>
							<th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
							<td>
								<?php foreach ( $footer_bar_icon_options as $option ) : ?>
								<p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>"<?php if ( 'file-text' == $option['value'] ) { echo ' checked="checked"'; } ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php echo $option['label']; ?></label></p>
								<?php endforeach; ?>
							</td>
						</tr>
					</table>
					<p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
				</div>
			</div>
			<?php $clone = ob_get_clean(); ?>
		</div>
		<a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
	</div>
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
