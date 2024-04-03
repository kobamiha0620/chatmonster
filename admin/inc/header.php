<?php
global $dp_options, $dp_default_options, $header_bar_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<?php // ヘッダーバーの表示設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Header bar setting', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Please set the display position of the header bar.', 'tcd-w' ); ?></p>
	<h4 class="theme_option_headline2"><?php _e( 'Front page', 'tcd-w' ); ?></h4>
	<fieldset class="cf select_type2">
		<?php foreach ( $header_bar_options as $option ) : ?>
		<label><input type="radio" name="dp_options[header_bar_front]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $dp_options['header_bar_front'] ); ?>><?php echo $option['label']; ?></label>
		<?php endforeach; ?>
	</fieldset>
	<h4 class="theme_option_headline2"><?php _e( 'Sub page', 'tcd-w' ); ?></h4>
	<fieldset class="cf select_type2">
		<?php foreach ( $header_bar_options as $option ) : ?>
		<label><input type="radio" name="dp_options[header_bar_sub]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $dp_options['header_bar_sub'] ); ?>><?php echo $option['label']; ?></label>
		<?php endforeach; ?>
	</fieldset>
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // ヘッダーバーの表示設定（スマホ）?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Header bar setting for mobile device', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Please set the display position of the header bar for mobile.', 'tcd-w' ); ?></p>
	<h4 class="theme_option_headline2"><?php _e( 'Front page', 'tcd-w' ); ?></h4>
	<fieldset class="cf select_type2">
		<?php foreach ( $header_bar_options as $option ) : ?>
		<label><input type="radio" name="dp_options[header_bar_front_mobile]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $dp_options['header_bar_front_mobile'] ); ?>><?php echo $option['label']; ?></label>
		<?php endforeach; ?>
	</fieldset>
	<h4 class="theme_option_headline2"><?php _e( 'Sub page', 'tcd-w' ); ?></h4>
	<fieldset class="cf select_type2">
		<?php foreach ( $header_bar_options as $option ) : ?>
		<label><input type="radio" name="dp_options[header_bar_sub_mobile]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $dp_options['header_bar_sub_mobile'] ); ?>><?php echo $option['label']; ?></label>
		<?php endforeach; ?>
	</fieldset>
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // ヘッダーバーの色の設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Color of header', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Background color setting', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please set the background color of header bar.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[header_bg]" type="text" value="<?php echo esc_attr( $dp_options['header_bg'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_bg'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Opacity of background', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please enter the number 0 - 1.0. (e.g. 1.0)', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[header_opacity]" value="<?php echo esc_attr( $dp_options['header_opacity'] ); ?>" min="0" max="1" step="0.1">
	<h4 class="theme_option_headline2"><?php _e( 'Opacity of background for sticky header bar', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please enter the number 0 - 1.0. (e.g. 0.8)', 'tcd-w' ); ?></p>
	<input type="number" class="small-text" name="dp_options[header_opacity_fixed]" value="<?php echo esc_attr( $dp_options['header_opacity_fixed'] ); ?>" min="0" max="1" step="0.1">
	<h4 class="theme_option_headline2"><?php _e( 'Text color setting', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please set the font color of header bar.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[header_font_color]" type="text" value="<?php echo esc_attr( $dp_options['header_font_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_font_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Link hover color setting', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Please set the hover font color of header bar link.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[header_font_color_hover]" type="text" value="<?php echo esc_attr( $dp_options['header_font_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_font_color_hover'] ); ?>">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
<?php // グローバルメニュー設定 ?>
<div class="theme_option_field cf">
	<h3 class="theme_option_headline"><?php _e( 'Global menu settings', 'tcd-w' ); ?></h3>
	<h4 class="theme_option_headline2"><?php _e( 'Submenu link color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set font color of sub menu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[submenu_color]" type="text" value="<?php echo esc_attr( $dp_options['submenu_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['submenu_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Submenu link color on hover', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set hover font color of sub menu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[submenu_color_hover]" type="text" value="<?php echo esc_attr( $dp_options['submenu_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['submenu_color_hover'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Submenu background color', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set background color of the submenu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[submenu_bg_color]" type="text" value="<?php echo esc_attr( $dp_options['submenu_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['submenu_bg_color'] ); ?>">
	<h4 class="theme_option_headline2"><?php _e( 'Submenu background color on hover', 'tcd-w' ); ?></h4>
	<p><?php _e( 'Set hover background color of sub menu.', 'tcd-w' ); ?></p>
	<input class="c-color-picker" name="dp_options[submenu_bg_color_hover]" type="text" value="<?php echo esc_attr( $dp_options['submenu_bg_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['submenu_bg_color_hover'] ); ?>">
	<input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
</div>
