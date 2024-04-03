<?php
global $dp_options, $dp_default_options, $modal_cta_type_options, $text_align_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<?php // モーダルCTA トップページ設定 ?>
<p style="margin-top: -20px;"><?php _e( '"CTA (Call To Action)" refers to contents such as text, images, and moving images that are displayed to evoke actions to site visitors.With this theme, you can display banner template, MP4 video, Youtube video, CTA content of 4 types of free space at the time of page transition.', 'tcd-w' ); ?></p>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Modal CTA setting for front page', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Set the modal CTA to be displayed on the front page.', 'tcd-w' ); ?></p>
	<p><label><input type="checkbox" name="dp_options[show_modal_cta_front]" value="1" data-toggle=".toggle-modal_cta_front" <?php checked( $dp_options['show_modal_cta_front'], 1 ); ?>><?php _e( 'Show Modal CTA on front page', 'tcd-w' ); ?></label></p>
	<div class="toggle-modal_cta_front"<?php if ( ! $dp_options['show_modal_cta_front'] && ! $dp_options['show_modal_cta_sub_same_front'] ) echo ' style="display: none;"'; ?>>
		<h4 class="theme_option_headline2"><?php _e( 'Contents type', 'tcd-w' ); ?></h4>
        <div class="theme_option_message"><?php echo __( '<p>Banner template:Show image and text .</p><p>Video:Show MP4 format videos.</p><p>Youtube:Show Youtube videos.</p><p>Freespace:Create content freely as you like blog posts.</p>', 'tcd-w' ); ?></div>
		<ul>
			<?php foreach( $modal_cta_type_options as $option ) : ?>
			<li><label><input type="radio" name="dp_options[modal_cta_front_type]" value="<?php echo esc_attr( $option['value'] ); ?>" data-toggle=".modal_cta_front_type-<?php echo esc_attr( $option['value'] ); ?>" data-hide="[class*='modal_cta_front_type-']" <?php checked( $option['value'], $dp_options['modal_cta_front_type'] ); ?>> <?php echo $option['label']; ?></label></li>
			<?php endforeach; ?>
		</ul>
		<div class="modal_cta_front_type-type1"<?php if ( 'type1' !== $dp_options['modal_cta_front_type'] ) echo ' style="display: none;"'; ?>>
			<h4 class="theme_option_headline2"><?php _e( 'Image setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set banner image', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_front_image]" value="1" data-toggle=".toggle-display_modal_cta_front_image" <?php checked( $dp_options['display_modal_cta_front_image'], 1 ); ?>><?php _e( 'Display image', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_front_image"<?php if ( ! $dp_options['display_modal_cta_front_image'] ) echo ' style="display: none;"' ?>>
				<h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h5>
				<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1180, 400 ); ?></p>
				<div class="image_box cf">
					<div class="cf cf_media_field hide-if-no-js modal_cta_front_image">
						<input class="cf_media_id" type="hidden" value="<?php echo esc_attr( $dp_options['modal_cta_front_image'] ); ?>" name="dp_options[modal_cta_front_image]">
						<div class="preview_field"><?php if ( $dp_options['modal_cta_front_image'] ) { echo wp_get_attachment_image( $dp_options['modal_cta_front_image'], 'full' ); } ?></div>
						<div class="button_area">
							<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
							<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['modal_cta_front_image'] ) { echo 'hidden'; } ?>">
						</div>
					</div>
				</div>
				<h4 class="theme_option_headline2"><?php _e( 'Link URL', 'tcd-w' ); ?></h4>
                <p><?php _e( 'Set the link URL of the banner image', 'tcd-w' ); ?></p>
				<p><label><?php _e( 'Link URL', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[modal_cta_front_image_url]" value="<?php echo esc_attr( $dp_options['modal_cta_front_image_url'] ); ?>"></label></p>
				<p><label><input type="checkbox" name="dp_options[modal_cta_front_image_target_blank]" value="1" <?php checked( 1, $dp_options['modal_cta_front_image_target_blank'] ); ?>> <?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
			</div>
			<h4 class="theme_option_headline2"><?php _e( 'Catchphrase setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'You can set the catchphrase below the banner image, and check \"use catchphrase\" to set detail options.', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_front_catch]" value="1" data-toggle=".toggle-display_modal_cta_front_catch" <?php checked( $dp_options['display_modal_cta_front_catch'], 1 ); ?>><?php _e( 'Display catchphrase', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_front_catch"<?php if ( ! $dp_options['display_modal_cta_front_catch'] ) echo ' style="display: none;"' ?>>
				<h5 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h5>
				<p><?php _e( 'Please set texts for catchphrase, font size, color and align.', 'tcd-w' ); ?></p>
				<textarea class="large-text" name="dp_options[modal_cta_front_catch]"><?php echo esc_textarea( $dp_options['modal_cta_front_catch'] ); ?></textarea>
				<table>
					<tr>
						<td><?php _e( 'Font size', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_front_catch_font_size]" value="<?php echo esc_attr( $dp_options['modal_cta_front_catch_font_size'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font size for mobile', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_front_catch_font_size_mobile]" value="<?php echo esc_attr( $dp_options['modal_cta_front_catch_font_size_mobile'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_front_catch_color]" value="<?php echo esc_attr( $dp_options['modal_cta_front_catch_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_catch_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Text align', 'tcd-w' ); ?></label></td>
						<td>
							<select name="modal_cta_front_catch_align]">
								<?php foreach ( $text_align_options as $option ) : ?>
								<option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $option['value'], $dp_options['modal_cta_front_catch_align'] ); ?>><?php echo esc_html( $option['label'] ); ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<h4 class="theme_option_headline2"><?php _e( 'Description setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'You can set the description below the catchphrase, and check \"use description\" to set detail options.', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_front_desc]" value="1" data-toggle=".toggle-display_modal_cta_front_desc" <?php checked( $dp_options['display_modal_cta_front_desc'], 1 ); ?>><?php _e( 'Display description', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_front_desc"<?php if ( ! $dp_options['display_modal_cta_front_desc'] ) echo ' style="display: none;"' ?>>
				<h5 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h5>
				<p><?php _e( 'Please set texts for description, font size, color and align.', 'tcd-w' ); ?></p>
				<textarea class="large-text" name="dp_options[modal_cta_front_desc]"><?php echo esc_textarea( $dp_options['modal_cta_front_desc'] ); ?></textarea>
				<table>
					<tr>
						<td><?php _e( 'Font size', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_front_desc_font_size]" value="<?php echo esc_attr( $dp_options['modal_cta_front_desc_font_size'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font size for mobile', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_front_desc_font_size_mobile]" value="<?php echo esc_attr( $dp_options['modal_cta_front_desc_font_size_mobile'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_front_desc_color]" value="<?php echo esc_attr( $dp_options['modal_cta_front_desc_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_desc_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Text align', 'tcd-w' ); ?></label></td>
						<td>
							<select name="modal_cta_front_desc_align]">
								<?php foreach ( $text_align_options as $option ) : ?>
								<option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $option['value'], $dp_options['modal_cta_front_desc_align'] ); ?>><?php echo esc_html( $option['label'] ); ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<h4 class="theme_option_headline2"><?php _e( 'Button setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'You can set the button displayed at the bottom, and check \"use button\" to set detail options.', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_front_button]" value="1" data-toggle=".toggle-display_modal_cta_front_button" <?php checked( $dp_options['display_modal_cta_front_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_front_button"<?php if ( ! $dp_options['display_modal_cta_front_button'] ) echo ' style="display: none;"' ?>>
				<p><?php _e( 'Please set button label, link url and colors.', 'tcd-w' ); ?></p>
				<h5 class="theme_option_headline2"><?php _e( 'Button settings', 'tcd-w' ); ?></h5>
				<p><label><?php _e( 'Button label', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[modal_cta_front_button_label]" value="<?php echo esc_attr( $dp_options['modal_cta_front_button_label'] ); ?>"></label></p>
				<p><label><?php _e( 'Link URL', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[modal_cta_front_button_url]" value="<?php echo esc_attr( $dp_options['modal_cta_front_button_url'] ); ?>"></label></p>
				<p><label><input type="checkbox" name="dp_options[modal_cta_front_button_target_blank]" value="1" <?php checked( 1, $dp_options['modal_cta_front_button_target_blank'] ); ?>> <?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
				<table>
					<tr>
						<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_front_button_font_color]" value="<?php echo esc_attr( $dp_options['modal_cta_front_button_font_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_button_font_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><?php _e( 'Background color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_front_button_bg_color]" value="<?php echo esc_attr( $dp_options['modal_cta_front_button_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_button_bg_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><?php _e( 'Font color on hover', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_front_button_font_color_hover]" value="<?php echo esc_attr( $dp_options['modal_cta_front_button_font_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_button_font_color_hover'] ); ?>"></td>
					</tr>
					<tr>
						<td><?php _e( 'Background color on hover', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_front_button_bg_color_hover]" value="<?php echo esc_attr( $dp_options['modal_cta_front_button_bg_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_button_bg_color_hover'] ); ?>"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="modal_cta_front_type-type2"<?php if ( 'type2' !== $dp_options['modal_cta_front_type'] ) echo ' style="display: none;"'; ?>>
			<h4 class="theme_option_headline2"><?php _e( 'Video file', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please upload or select MP4 video.', 'tcd-w' ); ?></p>
			<div class="cf cf_video_field hide-if-no-js modal_cta_front_video">
				<input type="hidden" value="<?php echo esc_attr( $dp_options['modal_cta_front_video'] ); ?>" name="dp_options[modal_cta_front_video]" class="cf_media_id">
				<div class="preview_field"><?php if ( $dp_options['modal_cta_front_video'] && wp_get_attachment_url( $dp_options['modal_cta_front_video'] ) ) { echo '<p class="media_url">' . wp_get_attachment_url( $dp_options['modal_cta_front_video'] ) . '</p>'; } ?></div>
				<div class="buttton_area">
					<input type="button" value="<?php _e( 'Select Video', 'tcd-w' ); ?>" class="cfvf-select-video button">
					<input type="button" value="<?php _e( 'Remove Video', 'tcd-w' ); ?>" class="cfvf-delete-video button <?php if ( ! $dp_options['modal_cta_front_video'] ) { echo 'hidden'; } ?>">
				</div>
			</div>
			<ul>
				<li><label><input type="checkbox" name="dp_options[modal_cta_front_video_autoplay]" value="1" <?php checked( $dp_options['modal_cta_front_video_autoplay'], 1 ); ?>> <?php _e( 'Autoplay (Forced to mute)', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_front_video_loop]" value="1" <?php checked( $dp_options['modal_cta_front_video_loop'], 1 ); ?>> <?php _e( 'Loop', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_front_video_mute]" value="1" <?php checked( $dp_options['modal_cta_front_video_mute'], 1 ); ?>> <?php _e( 'Mute', 'tcd-w' ); ?></label></li>
			</ul>
		</div>
		<div class="modal_cta_front_type-type3"<?php if ( 'type3' !== $dp_options['modal_cta_front_type'] ) echo ' style="display: none;"'; ?>>
			<h4 class="theme_option_headline2"><?php _e( 'Youtube URL', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set Youtube URL.', 'tcd-w' ); ?></p>
			<input type="text" class="regular-text" name="dp_options[modal_cta_front_youtube]" value="<?php echo esc_attr( $dp_options['modal_cta_front_youtube'] ); ?>">
			<ul>
				<li><label><input type="checkbox" name="dp_options[modal_cta_front_youtube_autoplay]" value="1" <?php checked( $dp_options['modal_cta_front_youtube_autoplay'], 1 ); ?>> <?php _e( 'Autoplay (PC only, Forced to mute)', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_front_youtube_loop]" value="1" <?php checked( $dp_options['modal_cta_front_youtube_loop'], 1 ); ?>> <?php _e( 'Loop', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_front_youtube_mute]" value="1" <?php checked( $dp_options['modal_cta_front_youtube_mute'], 1 ); ?>> <?php _e( 'Mute', 'tcd-w' ); ?></label></li>
			</ul>
		</div>
		<div class="modal_cta_front_type-type4"<?php if ( 'type4' !== $dp_options['modal_cta_front_type'] ) echo ' style="display: none;"'; ?>>
			<h5 class="theme_option_headline2"><?php _e( 'Wysiwyg editor', 'tcd-w' ); ?></h5>
            <p><?php _e( 'Please create content freely as you like blog posts.', 'tcd-w' ); ?></p>
<?php
	wp_editor(
		$dp_options['modal_cta_front_editor'],
		'modal_cta_front_editor',
		array(
			'textarea_name' => 'dp_options[modal_cta_front_editor]',
			'textarea_rows' => 10
		)
	);
?>
		</div>
		<h4 class="theme_option_headline2"><?php _e( 'Color of modal overlay', 'tcd-w' ); ?></h4>
        <div class="theme_option_message">
        <p><?php _e( 'While CTA is displayed, you can not perform operations such as clicking on the page. At that time, you can visually notify that operation is impossible by superimposing colors (overlaying) on the page contents.', 'tcd-w' ); ?></p></div>
        <p><?php _e( 'Sets the color of the overlay.', 'tcd-w' ); ?></p>
		<input class="c-color-picker" name="dp_options[modal_cta_front_overlay_color]" type="text" value="<?php echo esc_attr( $dp_options['modal_cta_front_overlay_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_front_overlay_color'] ); ?>">
		<h4 class="theme_option_headline2"><?php _e( 'Opacity of modal overlay', 'tcd-w' ); ?></h4>
		<p><?php _e( 'Please enter the number 0 - 1.0. (e.g. 0.6)', 'tcd-w' ); ?></p>
		<input type="number" class="small-text" name="dp_options[modal_cta_front_overlay_opacity]" value="<?php echo esc_attr( $dp_options['modal_cta_front_overlay_opacity'] ); ?>" min="0" max="1" step="0.1">
		<h4 class="theme_option_headline2"><?php _e( 'Delayed display setting', 'tcd-w' ); ?></h4>
        <p><?php _e( 'Set timing to display CTA. If you want to display "0" immediately after the page is read, if you want to display it after the specified number of seconds, set an arbitrary number of seconds.', 'tcd-w' ); ?></p>
		<input type="number" class="small-text" name="dp_options[modal_cta_front_delay]" value="<?php echo esc_attr( $dp_options['modal_cta_front_delay'] ); ?>" min="0"> <?php _e( ' seconds', 'tcd-w' ); ?>
		<p><label><input type="checkbox" name="dp_options[modal_cta_front_delay_after_load_icon]" value="1" <?php checked( $dp_options['modal_cta_front_delay_after_load_icon'], 1 ); ?>><?php _e( 'If using load icon, Delay start after hide the load icon.', 'tcd-w' ); ?></label></p>
		<h4 class="theme_option_headline2"><?php _e( 'Display only once setting', 'tcd-w' ); ?></h4>
        <p><?php _e( 'Please check if you want to display CTA only when accessing page for the first time.', 'tcd-w' ); ?></p>
		<p><label><input type="checkbox" name="dp_options[modal_cta_front_only_once]" value="1" <?php checked( $dp_options['modal_cta_front_only_once'], 1 ); ?>><?php _e( 'Display only once until browser closes', 'tcd-w' ); ?></label></p>
	</div>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // モーダルCTA 下層ページ設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Modal CTA setting for sub page', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Set the modal CTA to be displayed on the sub page.', 'tcd-w' ); ?></p>
	<p><label><input type="checkbox" name="dp_options[show_modal_cta_sub_same_front]" value="1" data-toggle-reverse=".toggle-modal_cta_sub" data-toggle-show=".toggle-modal_cta_front" <?php checked( $dp_options['show_modal_cta_sub_same_front'], 1 ); ?>><?php _e( 'Same as front page setting', 'tcd-w' ); ?></label></p>
	<div class="toggle-modal_cta_sub" <?php if ( $dp_options['show_modal_cta_sub_same_front'] ) echo ' style="display: none;"'; ?>>
		<h4 class="theme_option_headline2"><?php _e( 'Contents type', 'tcd-w' ); ?></h4>
        <div class="theme_option_message"><?php echo __( '<p>Banner template:Show image and text .</p><p>Video:Show MP4 format videos.</p><p>Youtube:Show Youtube videos.</p><p>Freespace:Create content freely as you like blog posts.</p>', 'tcd-w' ); ?></div>
		<ul>
			<?php foreach( $modal_cta_type_options as $option ) : ?>
			<li><label><input type="radio" name="dp_options[modal_cta_sub_type]" value="<?php echo esc_attr( $option['value'] ); ?>" data-toggle=".modal_cta_sub_type-<?php echo esc_attr( $option['value'] ); ?>" data-hide="[class*='modal_cta_sub_type-']" <?php checked( $option['value'], $dp_options['modal_cta_sub_type'] ); ?>> <?php echo $option['label']; ?></label></li>
			<?php endforeach; ?>
		</ul>
		<div class="modal_cta_sub_type-type1"<?php if ( 'type1' !== $dp_options['modal_cta_sub_type'] ) echo ' style="display: none;"'; ?>>
			<h4 class="theme_option_headline2"><?php _e( 'Image setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Set banner image', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_sub_image]" value="1" data-toggle=".toggle-display_modal_cta_sub_image" <?php checked( $dp_options['display_modal_cta_sub_image'], 1 ); ?>><?php _e( 'Display image', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_sub_image"<?php if ( ! $dp_options['display_modal_cta_sub_image'] ) echo ' style="display: none;"' ?>>
				<h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h5>
				<p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 1180, 400 ); ?></p>
				<div class="image_box cf">
					<div class="cf cf_media_field hide-if-no-js modal_cta_sub_image">
						<input class="cf_media_id" type="hidden" value="<?php echo esc_attr( $dp_options['modal_cta_sub_image'] ); ?>" name="dp_options[modal_cta_sub_image]">
						<div class="preview_field"><?php if ( $dp_options['modal_cta_sub_image'] ) { echo wp_get_attachment_image( $dp_options['modal_cta_sub_image'], 'full' ); } ?></div>
						<div class="button_area">
							<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
							<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['modal_cta_sub_image'] ) { echo 'hidden'; } ?>">
						</div>
					</div>
				</div>
				<h4 class="theme_option_headline2"><?php _e( 'Link URL', 'tcd-w' ); ?></h4>
                <p><?php _e( 'Set the link URL of the banner image', 'tcd-w' ); ?></p>
				<p><label><?php _e( 'Link URL', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[modal_cta_sub_image_url]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_image_url'] ); ?>"></label></p>
				<p><label><input type="checkbox" name="dp_options[modal_cta_sub_image_target_blank]" value="1" <?php checked( 1, $dp_options['modal_cta_sub_image_target_blank'] ); ?>> <?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
			</div>
			<h4 class="theme_option_headline2"><?php _e( 'Catchphrase setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'You can set the catchphrase below the banner image, and check \"use catchphrase\" to set detail options.', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_sub_catch]" value="1" data-toggle=".toggle-display_modal_cta_sub_catch" <?php checked( $dp_options['display_modal_cta_sub_catch'], 1 ); ?>><?php _e( 'Display catchphrase', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_sub_catch"<?php if ( ! $dp_options['display_modal_cta_sub_catch'] ) echo ' style="display: none;"' ?>>
				<h5 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h5>
				<p><?php _e( 'Please set texts for catchphrase, font size, color and align.', 'tcd-w' ); ?></p>
				<textarea class="large-text" name="dp_options[modal_cta_sub_catch]"><?php echo esc_textarea( $dp_options['modal_cta_sub_catch'] ); ?></textarea>
				<table>
					<tr>
						<td><?php _e( 'Font size', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_sub_catch_font_size]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_catch_font_size'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font size for mobile', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_sub_catch_font_size_mobile]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_catch_font_size_mobile'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_sub_catch_color]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_catch_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_catch_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Text align', 'tcd-w' ); ?></label></td>
						<td>
							<select name="modal_cta_sub_catch_align]">
								<?php foreach ( $text_align_options as $option ) : ?>
								<option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $option['value'], $dp_options['modal_cta_sub_catch_align'] ); ?>><?php echo esc_html( $option['label'] ); ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<h4 class="theme_option_headline2"><?php _e( 'Description setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'You can set the description below the catchphrase, and check \"use description\" to set detail options.', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_sub_desc]" value="1" data-toggle=".toggle-display_modal_cta_sub_desc" <?php checked( $dp_options['display_modal_cta_sub_desc'], 1 ); ?>><?php _e( 'Display description', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_sub_desc"<?php if ( ! $dp_options['display_modal_cta_sub_desc'] ) echo ' style="display: none;"' ?>>
				<h5 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h5>
				<p><?php _e( 'Please set texts for description, font size, color and align.', 'tcd-w' ); ?></p>
				<textarea class="large-text" name="dp_options[modal_cta_sub_desc]"><?php echo esc_textarea( $dp_options['modal_cta_sub_desc'] ); ?></textarea>
				<table>
					<tr>
						<td><?php _e( 'Font size', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_sub_desc_font_size]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_desc_font_size'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font size for mobile', 'tcd-w' ); ?></td>
						<td><input type="number" class="small-text" name="dp_options[modal_cta_sub_desc_font_size_mobile]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_desc_font_size_mobile'] ); ?>" min="0"> px</td>
					</tr>
					<tr>
						<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_sub_desc_color]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_desc_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_desc_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><label><?php _e( 'Text align', 'tcd-w' ); ?></label></td>
						<td>
							<select name="modal_cta_sub_desc_align]">
								<?php foreach ( $text_align_options as $option ) : ?>
								<option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $option['value'], $dp_options['modal_cta_sub_desc_align'] ); ?>><?php echo esc_html( $option['label'] ); ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<h4 class="theme_option_headline2"><?php _e( 'Button setting', 'tcd-w' ); ?></h4>
            <p><?php _e( 'You can set the button displayed at the bottom, and check \"use button\" to set detail options.', 'tcd-w' ); ?></p>
			<p><label><input type="checkbox" name="dp_options[display_modal_cta_sub_button]" value="1" data-toggle=".toggle-display_modal_cta_sub_button" <?php checked( $dp_options['display_modal_cta_sub_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
			<div class="toggle-display_modal_cta_sub_button"<?php if ( ! $dp_options['display_modal_cta_sub_button'] ) echo ' style="display: none;"' ?>>
				<p><?php _e( 'Please set button label, link url and colors.', 'tcd-w' ); ?></p>
				<h5 class="theme_option_headline2"><?php _e( 'Button settings', 'tcd-w' ); ?></h5>
				<p><label><?php _e( 'Button label', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[modal_cta_sub_button_label]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_button_label'] ); ?>"></label></p>
				<p><label><?php _e( 'Link URL', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[modal_cta_sub_button_url]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_button_url'] ); ?>"></label></p>
				<p><label><input type="checkbox" name="dp_options[modal_cta_sub_button_target_blank]" value="1" <?php checked( 1, $dp_options['modal_cta_sub_button_target_blank'] ); ?>> <?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
				<table>
					<tr>
						<td><?php _e( 'Font color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_sub_button_font_color]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_button_font_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_button_font_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><?php _e( 'Background color', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_sub_button_bg_color]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_button_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_button_bg_color'] ); ?>"></td>
					</tr>
					<tr>
						<td><?php _e( 'Font color on hover', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_sub_button_font_color_hover]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_button_font_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_button_font_color_hover'] ); ?>"></td>
					</tr>
					<tr>
						<td><?php _e( 'Background color on hover', 'tcd-w' ); ?></td>
						<td><input type="text" class="c-color-picker" name="dp_options[modal_cta_sub_button_bg_color_hover]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_button_bg_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_button_bg_color_hover'] ); ?>"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="modal_cta_sub_type-type2"<?php if ( 'type2' !== $dp_options['modal_cta_sub_type'] ) echo ' style="display: none;"'; ?>>
			<h4 class="theme_option_headline2"><?php _e( 'Video file', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please upload or select MP4 video.', 'tcd-w' ); ?></p>
			<div class="cf cf_video_field hide-if-no-js modal_cta_sub_video">
				<input type="hidden" value="<?php echo esc_attr( $dp_options['modal_cta_sub_video'] ); ?>" name="dp_options[modal_cta_sub_video]" class="cf_media_id">
				<div class="preview_field"><?php if ( $dp_options['modal_cta_sub_video'] && wp_get_attachment_url( $dp_options['modal_cta_sub_video'] ) ) { echo '<p class="media_url">' . wp_get_attachment_url( $dp_options['modal_cta_sub_video'] ) . '</p>'; } ?></div>
				<div class="buttton_area">
					<input type="button" value="<?php _e( 'Select Video', 'tcd-w' ); ?>" class="cfvf-select-video button">
					<input type="button" value="<?php _e( 'Remove Video', 'tcd-w' ); ?>" class="cfvf-delete-video button <?php if ( ! $dp_options['modal_cta_sub_video'] ) { echo 'hidden'; } ?>">
				</div>
			</div>
			<ul>
				<li><label><input type="checkbox" name="dp_options[modal_cta_sub_video_autoplay]" value="1" <?php checked( $dp_options['modal_cta_sub_video_autoplay'], 1 ); ?>> <?php _e( 'Autoplay (Forced to mute)', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_sub_video_loop]" value="1" <?php checked( $dp_options['modal_cta_sub_video_loop'], 1 ); ?>> <?php _e( 'Loop', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_sub_video_mute]" value="1" <?php checked( $dp_options['modal_cta_sub_video_mute'], 1 ); ?>> <?php _e( 'Mute', 'tcd-w' ); ?></label></li>
			</ul>
		</div>
		<div class="modal_cta_sub_type-type3"<?php if ( 'type3' !== $dp_options['modal_cta_sub_type'] ) echo ' style="display: none;"'; ?>>
			<h4 class="theme_option_headline2"><?php _e( 'Youtube URL', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Please set Youtube URL.', 'tcd-w' ); ?></p>
			<input type="text" class="regular-text" name="dp_options[modal_cta_sub_youtube]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_youtube'] ); ?>">
			<ul>
				<li><label><input type="checkbox" name="dp_options[modal_cta_sub_youtube_autoplay]" value="1" <?php checked( $dp_options['modal_cta_sub_youtube_autoplay'], 1 ); ?>> <?php _e( 'Autoplay (PC only, Forced to mute)', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_sub_youtube_loop]" value="1" <?php checked( $dp_options['modal_cta_sub_youtube_loop'], 1 ); ?>> <?php _e( 'Loop', 'tcd-w' ); ?></label></li>
				<li><label><input type="checkbox" name="dp_options[modal_cta_sub_youtube_mute]" value="1" <?php checked( $dp_options['modal_cta_sub_youtube_mute'], 1 ); ?>> <?php _e( 'Mute', 'tcd-w' ); ?></label></li>
			</ul>
		</div>
		<div class="modal_cta_sub_type-type4"<?php if ( 'type4' !== $dp_options['modal_cta_sub_type'] ) echo ' style="display: none;"'; ?>>
			<h5 class="theme_option_headline2"><?php _e( 'Wysiwyg editor', 'tcd-w' ); ?></h5>
            <p><?php _e( 'Please create content freely as you like blog posts.', 'tcd-w' ); ?></p>
<?php
	wp_editor(
		$dp_options['modal_cta_sub_editor'],
		'modal_cta_sub_editor',
		array(
			'textarea_name' => 'dp_options[modal_cta_sub_editor]',
			'textarea_rows' => 10
		)
	);
?>
		</div>
		<h4 class="theme_option_headline2"><?php _e( 'Color of modal overlay', 'tcd-w' ); ?></h4>
        <div class="theme_option_message">
        <p><?php _e( 'While CTA is displayed, you can not perform operations such as clicking on the page. At that time, you can visually notify that operation is impossible by superimposing colors (overlaying) on the page contents.', 'tcd-w' ); ?></p></div>
        <p><?php _e( 'Sets the color of the overlay.', 'tcd-w' ); ?></p>
		<input class="c-color-picker" name="dp_options[modal_cta_sub_overlay_color]" type="text" value="<?php echo esc_attr( $dp_options['modal_cta_sub_overlay_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['modal_cta_sub_overlay_color'] ); ?>">
		<h4 class="theme_option_headline2"><?php _e( 'Opacity of modal overlay', 'tcd-w' ); ?></h4>
		<p><?php _e( 'Please enter the number 0 - 1.0. (e.g. 0.6)', 'tcd-w' ); ?></p>
		<input type="number" class="small-text" name="dp_options[modal_cta_sub_overlay_opacity]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_overlay_opacity'] ); ?>" min="0" max="1" step="0.1">
		<h4 class="theme_option_headline2"><?php _e( 'Delayed display setting', 'tcd-w' ); ?></h4>
        <p><?php _e( 'Set timing to display CTA. If you want to display "0" immediately after the page is read, if you want to display it after the specified number of seconds, set an arbitrary number of seconds.', 'tcd-w' ); ?></p>
		<input type="number" class="small-text" name="dp_options[modal_cta_sub_delay]" value="<?php echo esc_attr( $dp_options['modal_cta_sub_delay'] ); ?>" min="0"> <?php _e( ' seconds', 'tcd-w' ); ?>
		<p><label><input type="checkbox" name="dp_options[modal_cta_sub_delay_after_load_icon]" value="1" <?php checked( $dp_options['modal_cta_sub_delay_after_load_icon'], 1 ); ?>><?php _e( 'If using load icon, Delay start after hide the load icon.', 'tcd-w' ); ?></label></p>
		<h4 class="theme_option_headline2"><?php _e( 'Display only once setting', 'tcd-w' ); ?></h4>
        <p><?php _e( 'Please check if you want to display CTA only when accessing page for the first time.', 'tcd-w' ); ?></p>
		<p><label><input type="checkbox" name="dp_options[modal_cta_sub_only_once]" value="1" <?php checked( $dp_options['modal_cta_sub_only_once'], 1 ); ?>><?php _e( 'Display only once until browser closes', 'tcd-w' ); ?></label></p>
	</div>
	<div class="show_modal_cta_sub_checkboxes">
		<h4 class="theme_option_headline2"><?php _e( 'Display Settings for archive page', 'tcd-w' ); ?></h4>
		<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
		<ul>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_post]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_post'] ); ?>><?php _e( 'Display Modal CTA on post archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_category]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_category'] ); ?>><?php _e( 'Display Modal CTA on category archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_tag]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_tag'] ); ?>><?php _e( 'Display Modal CTA on tag archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_date]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_date'] ); ?>><?php _e( 'Display Modal CTA on date archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_author]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_author'] ); ?>><?php _e( 'Display Modal CTA author archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_search]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_search'] ); ?>><?php _e( 'Display Modal CTA on search results page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_information]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_information'] ); ?>><?php _e( 'Display Modal CTA on information archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_works]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_works'] ); ?>><?php _e( 'Display Modal CTA on works archive page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_archive_voice]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_archive_voice'] ); ?>><?php _e( 'Display Modal CTA on voice archive page', 'tcd-w' ); ?></label></li>
		</ul>
		<p>
			<input type="button" class="button-secondary button-checkall" value="<?php echo __( 'Check all', 'tcd-w' ); ?>">
			<input type="button" class="button-secondary button-uncheckall" value="<?php echo __( 'Uncheck all', 'tcd-w' ); ?>">
		</p>
	</div>
	<div class="show_modal_cta_sub_checkboxes">
		<h4 class="theme_option_headline2"><?php _e( 'Display Settings for single page', 'tcd-w' ); ?></h4>
		<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
		<ul>
			<li><label><input name="dp_options[show_modal_cta_sub_single_post]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_single_post'] ); ?>><?php _e( 'Display Modal CTA on post single page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_single_page]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_single_page'] ); ?>><?php _e( 'Display Modal CTA on page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_single_information]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_single_information'] ); ?>><?php _e( 'Display Modal CTA on information single page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_single_works]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_single_works'] ); ?>><?php _e( 'Display Modal CTA on works single page', 'tcd-w' ); ?></label></li>
			<li><label><input name="dp_options[show_modal_cta_sub_404]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_modal_cta_sub_404'] ); ?>><?php _e( 'Display Modal CTA on 404 page', 'tcd-w' ); ?></label></li>
		</ul>
		<p>
			<input type="button" class="button-secondary button-checkall" value="<?php echo __( 'Check all', 'tcd-w' ); ?>">
			<input type="button" class="button-secondary button-uncheckall" value="<?php echo __( 'Uncheck all', 'tcd-w' ); ?>">
		</p>
	</div>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
