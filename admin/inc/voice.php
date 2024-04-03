<?php
global $dp_options, $dp_default_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<?php // Voiceの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Voice page basic setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Breadcrumb label', 'tcd-w' ); ?></h4>
	<p><?php _e( 'The breadcrumb is displayed at voice archive page. You can change name of page as you like.(default: Voice)', 'tcd-w' ); ?></p>
	<input class="regular-text" type="text" name="dp_options[voice_breadcrumb_label]" value="<?php echo esc_attr( $dp_options['voice_breadcrumb_label'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Slug', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Slug is the string used for URL. You can use a-z and 0-9. Default slug is "voice".', 'tcd-w' ); ?></p>
	<p><strong><?php _e( 'Existing posts will not be visible if you change the slug.', 'tcd-w' ); ?></strong></p>
	<input class="regular-text hankaku" type="text" name="dp_options[voice_slug]" value="<?php echo esc_attr( $dp_options['voice_slug'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Headline for page header', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the title of page header in voice archive.', 'tcd-w' ); ?></p>
	<input class="regular-text" name="dp_options[voice_header_headline]" type="text" value="<?php echo esc_attr( $dp_options['voice_header_headline'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Description for page header', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the description of page header in voice archive.', 'tcd-w' ); ?></p>
	<textarea class="large-text" cols="50" rows="2" name="dp_options[voice_header_desc]"><?php echo esc_textarea( $dp_options['voice_header_desc'] ); ?></textarea>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // Voiceページの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Voice title / contents setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of voice title', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the archive page title.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[voice_title_font_size]" value="<?php echo esc_attr( $dp_options['voice_title_font_size'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of voice title for mobile', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the archive page title for mobile.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[voice_title_font_size_mobile]" value="<?php echo esc_attr( $dp_options['voice_title_font_size_mobile'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Post title color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font color of the archive page title.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[voice_title_color]" type="text" value="<?php echo esc_attr( $dp_options['voice_title_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['voice_title_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Font size of voice contents', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the archive page contents.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[voice_content_font_size]" value="<?php echo esc_attr( $dp_options['voice_content_font_size'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of voice contents for mobile', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the archive page contents for mobile.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[voice_content_font_size_mobile]" value="<?php echo esc_attr( $dp_options['voice_content_font_size_mobile'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Voice contents color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font color of the archive page contents.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[voice_content_color]" type="text" value="<?php echo esc_attr( $dp_options['voice_content_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['voice_content_color'] ); ?>">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // Voiceの表示設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Display setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Archive post number', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the number of posts to be displayed in archive page. ', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[archive_voice_num]" value="<?php echo esc_attr( $dp_options['archive_voice_num'] ); ?>" min="1">
	<h4 class="theme_option_headline2"><?php _e( 'Settings for archive page', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
	<ul>
		<li><label><input name="dp_options[show_breadcrumb_archive_voice]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_breadcrumb_archive_voice'] ); ?>> <?php _e( 'Display breadcrumb', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_thumbnail_voice]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_thumbnail_voice'] ); ?>> <?php _e( 'Display thumbnail', 'tcd-w' ); ?></label></li>
	</ul>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
