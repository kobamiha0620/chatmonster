<?php
global $dp_options, $dp_default_options, $post_order_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<?php // Worksの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Works page basic setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Breadcrumb label', 'tcd-w' ); ?></h4>
	<p><?php _e( 'The breadcrumb is displayed at works archive and works single page. You can change name of page as you like.(default: Works)', 'tcd-w' ); ?></p>
	<input class="regular-text" type="text" name="dp_options[works_breadcrumb_label]" value="<?php echo esc_attr( $dp_options['works_breadcrumb_label'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Slug', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Slug is the string used for URL. You can use a-z and 0-9. Default slug is "works".', 'tcd-w' ); ?></p>
	<p><strong><?php _e( 'Existing posts will not be visible if you change the slug.', 'tcd-w' ); ?></strong></p>
	<input class="regular-text hankaku" type="text" name="dp_options[works_slug]" value="<?php echo esc_attr( $dp_options['works_slug'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Headline for page header', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the title of page header in works archive and works single page.', 'tcd-w' ); ?></p>
	<input class="regular-text" name="dp_options[works_header_headline]" type="text" value="<?php echo esc_attr( $dp_options['works_header_headline'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Description for page header', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the description of page header in works archive and works single page.', 'tcd-w' ); ?></p>
	<textarea class="large-text" cols="50" rows="2" name="dp_options[works_header_desc]"><?php echo esc_textarea( $dp_options['works_header_desc'] ); ?></textarea>

	<h4 class="theme_option_headline2"><?php _e( 'Description for works archive', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the description of works archive.', 'tcd-w' ); ?></p>
	<textarea class="large-text" cols="50" rows="4" name="dp_options[works_archive_desc]"><?php echo esc_textarea( $dp_options['works_archive_desc'] ); ?></textarea>
	<h4 class="theme_option_headline2"><?php _e( 'Works category', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Use the WORKS category to categorize posts of custom posting type "WORKS". If you check "Use WORKS category", detailed setting items will be displayed.', 'tcd-w' ); ?></p>
	<p><label><input type="checkbox" name="dp_options[use_works_category]" value="1" data-toggle=".toggle-use_works_category" <?php checked( $dp_options['use_works_category'], 1 ); ?>><?php _e( 'Use works category', 'tcd-w' ); ?></label></p>
	<div class="toggle-use_works_category">
		<h4 class="theme_option_headline2"><?php _e( 'Works category label', 'tcd-w' ); ?></h4>
        <p><?php _e( 'You can change the name of WORKS category as you like. You can use a-z and 0-9. Default category label is \"works-category\".', 'tcd-w' ); ?></p>
		<input class="regular-text" type="text" name="dp_options[works_category_label]" value="<?php echo esc_attr( $dp_options['works_category_label'] ); ?>">
		<h4 class="theme_option_headline2"><?php _e( 'Slug', 'tcd-w' ); ?></h4>
		<p><?php _e( 'Slug is the string used for URL. You can use a-z and 0-9. Default slug is "works-category".', 'tcd-w' ); ?></p>
		<p><strong><?php _e( 'Existing category will not be visible if you change the slug.', 'tcd-w' ); ?></strong></p>
		<input class="regular-text hankaku" type="text" name="dp_options[works_category_slug]" value="<?php echo esc_attr( $dp_options['works_category_slug'] ); ?>">
	</div>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // Worksページの設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Works title / contents setting', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of works title', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page title.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[works_title_font_size]" value="<?php echo esc_attr( $dp_options['works_title_font_size'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of works title for mobile', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page title for mobile.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[works_title_font_size_mobile]" value="<?php echo esc_attr( $dp_options['works_title_font_size_mobile'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Post title color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font color of the single page title.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[works_title_color]" type="text" value="<?php echo esc_attr( $dp_options['works_title_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['works_title_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Font size of works contents', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page contents.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[works_content_font_size]" value="<?php echo esc_attr( $dp_options['works_content_font_size'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Font size of works contents for mobile', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font size of the single page contents for mobile.', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[works_content_font_size_mobile]" value="<?php echo esc_attr( $dp_options['works_content_font_size_mobile'] ); ?>" min="0"><span>px</span>
	<h4 class="theme_option_headline2"><?php _e( 'Works contents color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'You can set the font color of the single page contents.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[works_content_color]" type="text" value="<?php echo esc_attr( $dp_options['works_content_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['works_content_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Color of modal overlay', 'tcd-w' ); ?></h4>
    <div class="theme_option_message">
    <p><?php _e( 'While CTA is displayed, you can not perform operations such as clicking on the page. At that time, you can visually notify that operation is impossible by superimposing colors (overlaying) on the page contents.', 'tcd-w' ); ?></p></div>
    <p><?php _e( 'Sets the color of the overlay.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[works_modal_overlay_color]" type="text" value="<?php echo esc_attr( $dp_options['works_modal_overlay_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['works_modal_overlay_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Opacity of modal overlay', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please enter the number 0 - 1.0. (e.g. 0.5)', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[works_modal_overlay_opacity]" value="<?php echo esc_attr( $dp_options['works_modal_overlay_opacity'] ); ?>" min="0" max="1" step="0.1">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // Worksのアーカイブ設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Settings for archive page', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Post order', 'tcd-w' ); ?></h4>
	<fieldset class="cf select_type2">
		<?php foreach ( $post_order_options as $option ) : ?>
		<label><input type="radio" name="dp_options[archive_works_order]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $dp_options['archive_works_order'] ); ?>><?php echo $option['label']; ?></label>
		<?php endforeach; ?>
	</fieldset>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // Worksの表示設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Display setting', 'tcd-w' ); ?></h3>
	<p><?php _e( 'Please check items to display.', 'tcd-w' ); ?></p>
	<h4 class="theme_option_headline2"><?php _e( 'Settings for archive page', 'tcd-w' ); ?></h4>
	<ul>
		<li><label><input name="dp_options[show_breadcrumb_archive_works]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_breadcrumb_archive_works'] ); ?>> <?php _e( 'Display breadcrumb', 'tcd-w' ); ?></label></li>
	</ul>
	<h4 class="theme_option_headline2"><?php _e( 'Settings for single page', 'tcd-w' ); ?></h4>
	<ul>
		<li><label><input name="dp_options[show_breadcrumb_single_works]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_breadcrumb_single_works'] ); ?>> <?php _e( 'Display breadcrumb', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_category_works]" type="checkbox" value="1" <?php checked( 1, $dp_options['show_category_works'] ); ?>><?php _e( 'Display works category', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_sns_top_works]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_top_works'] ); ?>> <?php _e( 'Buttons to the article top', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_sns_btm_works]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_btm_works'] ); ?>> <?php _e( 'Buttons to the article bottom', 'tcd-w' ); ?></label></li>
		<li><label><input name="dp_options[show_next_post_works]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_next_post_works'] ); ?>> <?php _e( 'Display next previous post link', 'tcd-w' ); ?></label></li>
	</ul>
	<input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
</div>
