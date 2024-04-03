<?php
global $dp_options, $dp_default_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<?php // お知らせの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Information page basic setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Breadcrumb label', 'tcd-w' ); ?></h4>
	<p><?php _e( 'The breadcrumb is displayed at information archive and information single page. You can change name of page as you like.(default: Information)', 'tcd-w' ); ?></p>
	<input class="regular-text" type="text" name="dp_options[information_breadcrumb_label]" value="<?php echo esc_attr( $dp_options['information_breadcrumb_label'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Slug', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Slug is the string used for URL. You can use a-z and 0-9. Default slug is "information".', 'tcd-w' ); ?></p>
	<p><strong><?php _e( 'Existing posts will not be visible if you change the slug.', 'tcd-w' ); ?></strong></p>
	<input class="regular-text hankaku" type="text" name="dp_options[information_slug]" value="<?php echo esc_attr( $dp_options['information_slug'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Headline for page header', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the title of page header in information archive and information single page.', 'tcd-w' ); ?></p>
	<input class="regular-text" name="dp_options[information_header_headline]" type="text" value="<?php echo esc_attr( $dp_options['information_header_headline'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Description for page header', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the description of page header in information archive and information single page.', 'tcd-w' ); ?></p>
	<textarea class="large-text" cols="50" rows="2" name="dp_options[information_header_desc]"><?php echo esc_textarea( $dp_options['information_header_desc'] ); ?></textarea>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // お知らせページの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Information title / contents setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of information title', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page title.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[information_title_font_size]" value="<?php echo esc_attr( $dp_options['information_title_font_size'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of information title for mobile', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page title for mobile.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[information_title_font_size_mobile]" value="<?php echo esc_attr( $dp_options['information_title_font_size_mobile'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Post title color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font color of the single page title.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[information_title_color]" type="text" value="<?php echo esc_attr( $dp_options['information_title_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['information_title_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Font size of information contents', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page contents.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[information_content_font_size]" value="<?php echo esc_attr( $dp_options['information_content_font_size'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of information contents for mobile', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page contents for mobile.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[information_content_font_size_mobile]" value="<?php echo esc_attr( $dp_options['information_content_font_size_mobile'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Information contents color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font color of the single page contents.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[information_content_color]" type="text" value="<?php echo esc_attr( $dp_options['information_content_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['information_content_color'] ); ?>">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // 表示設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Display setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Archive post number', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the number of posts to be displayed in archive page. ', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[archive_information_num]" value="<?php echo esc_attr( $dp_options['archive_information_num'] ); ?>" min="1">
	<h4 class="theme_option_headline2"><?php _e( 'Settings for archive page', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
	<ul>
		<li><label><input name="dp_options[show_breadcrumb_archive_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_breadcrumb_archive_information'] ); ?>> <?php _e( 'Display breadcrumb', 'tcd-w' ); ?></label></li>
	</ul>
	<h4 class="theme_option_headline2"><?php _e( 'Settings for archive page and single page', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
	<ul>
		<li><label><input name="dp_options[show_thumbnail_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_thumbnail_information'] ); ?>> <?php _e( 'Display thumbnail', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_date_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_date_information'] ); ?>> <?php _e( 'Display date', 'tcd-w' ); ?></label></li>
	</ul>
	<h4 class="theme_option_headline2"><?php _e( 'Settings for single page', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
	<ul>
		<li><label><input name="dp_options[show_breadcrumb_single_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_breadcrumb_single_information'] ); ?>> <?php _e( 'Display breadcrumb', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_sns_top_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_top_information'] ); ?>> <?php _e( 'Buttons to the article top', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_sns_btm_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_btm_information'] ); ?>> <?php _e( 'Buttons to the article bottom', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_next_post_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_next_post_information'] ); ?>> <?php _e( 'Display next previous post link', 'tcd-w' ); ?></label></li>
	</ul>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // 最新のお知らせの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Recent information setting', 'tcd-w' ); ?></h3>
	<p><?php _e( 'You can set recent information list displayed at bottom of information single page.', 'tcd-w' ); ?></p>
	<p><label><input name="dp_options[show_recent_information]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_recent_information'] ); ?>> <?php _e( 'Display reccent information list', 'tcd-w' ); ?></label></p>
	<h4 class="theme_option_headline2"><?php _e( 'Headline for Recent information', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set heading of recent information list.', 'tcd-w' ); ?></p>
	<input class="regular-text" type="text" name="dp_options[recent_information_headline]" value="<?php echo esc_attr( $dp_options['recent_information_headline'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Archive link text', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the button to archive page displayed at right end of the heading. If you set blank, button is not displayed.', 'tcd-w' ); ?></p>
	<input class="regular-text" type="text" name="dp_options[recent_information_link_text]" value="<?php echo esc_attr( $dp_options['recent_information_link_text'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Post number', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set the number of posts of recent information list.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[recent_information_num]" value="<?php echo esc_attr( $dp_options['recent_information_num'] ); ?>" min="1">
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
