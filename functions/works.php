<?php

function tcd_works_meta_box() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	add_meta_box(
		'tcd_works_meta_box' ,// ID of meta box
		__( 'Gallery setting', 'tcd-w' ), // label
		'show_tcd_works_meta_box', // callback function
		$dp_options['works_slug'], // post type
		'normal', // context
		'high' // priority
	);

	add_meta_box(
		'tcd_works_meta_box2' ,// ID of meta box
		__( 'Works detail', 'tcd-w' ), // label
		'show_tcd_works_meta_box2', // callback function
		$dp_options['works_slug'], // post type
		'normal', // context
		'high' // priority
	);
}
add_action( 'add_meta_boxes', 'tcd_works_meta_box' );

function show_tcd_works_meta_box() {
	global $post;

	// 行デフォルト
	$row_default_value = array(
		'media_type' => 'image',
		'title' => '',
		'desc' => '',
		'image' => '',
		'thumbnail_size' => 'type1',
		'video' => '',
		'youtube_url' => ''
	);

	echo '<input type="hidden" name="tcd_works_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
?>
<p><?php _e( 'Click "Add item", and set the image and other fields. You can drag the item to change their order.', 'tcd-w' ); ?></p>
<div class="repeater-wrapper">
	<div class="repeater sortable repeater_gallery" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
	$repeater_gallery = get_post_meta( $post->ID, 'repeater_gallery', true );
	if ( $repeater_gallery ) {
		foreach ( $repeater_gallery as $key => $value ) {
			render_repeater_gallery_row( $key, $value );
		}
	} else {
		render_repeater_gallery_row( 0, $row_default_value );
	}

	ob_start();
	render_repeater_gallery_row( 'addindex', $row_default_value );
	$clone = ob_get_clean();
?>
	</div>
	<a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
</div>
<?php
}

function render_repeater_gallery_row( $key, $value ) {
	// メディアタイプオプション
	$media_type_options = array(
		array(
			'value' => 'image',
			'label' => __( 'Image', 'tcd-w' )
		),
		array(
			'value' => 'video',
			'label' => __( 'Video', 'tcd-w' )
		),
		array(
			'value' => 'youtube',
			'label' => __( 'Youtube', 'tcd-w' )
		)
	);

	// サムネイルサイズオプション
	$thumbnail_size_options = array(
		array(
			'value' => 'type1',
			'label' => __( 'Square (1:1)', 'tcd-w' )
		),
		array(
			'value' => 'type2',
			'label' => __( 'Horizontal (2:1)', 'tcd-w' )
		),
		array(
			'value' => 'type3',
			'label' => __( 'Vertical (1:2)', 'tcd-w' )
		)
	);
?>
		<div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
			<h4 class="theme_option_subbox_headline"><?php echo esc_html( $value['title'] ? $value['title'] : __( 'New item', 'tcd-w' ) ); ?></h4>
			<div class="sub_box_content">
				<h4 class="theme_option_headline2"><?php _e( 'Media type', 'tcd-w' ); ?></h4>
				<div class="repeater-item-radios repeater_gallery-media_type-radios">
					<?php foreach ( $media_type_options as $option ) : ?>
					<label><input type="radio" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][media_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $value['media_type'] ); ?>><?php echo $option['label']; ?></label>
					<?php endforeach; ?>
				</div>

				<h4 class="theme_option_headline2"><?php _e( 'Media title', 'tcd-w' ); ?></h4>
				<input class="large-text repeater-label" type="text" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][title]" value="<?php echo esc_attr( $value['title'] ); ?>">

				<h4 class="theme_option_headline2"><?php _e( 'Media description', 'tcd-w' ); ?></h4>
				<input class="large-text" type="text" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][desc]" value="<?php echo esc_attr( $value['desc'] ); ?>">

				<h4 class="theme_option_headline2 repeater_gallery-media_type--image"><?php _e( 'Image', 'tcd-w' ); ?></h4>
				<h4 class="theme_option_headline2 repeater_gallery-media_type--video repeater_gallery-media_type--youtube hidden"><?php _e( 'Thumbnail image', 'tcd-w' ); ?></h4>
				<div class="cf cf_media_field hide-if-no-js repeater_gallery-image">
					<input type="hidden" class="cf_media_id" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][image]" value="<?php echo esc_attr( isset( $value['image'] ) ? $value['image'] : '' ); ?>">
					<div class="preview_field"><?php if ( isset( $value['image'] ) ) echo wp_get_attachment_image( $value['image'], 'medium' ); ?></div>
					<div class="buttton_area">
						<input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
						<input type="button" class="cfmf-delete-img button<?php if ( empty( $value['image'] ) ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>">
					</div>
				</div>

				<h4 class="theme_option_headline2"><?php _e( 'Thumbnail image size', 'tcd-w' ); ?></h4>
				<div class="repeater-item-radios">
					<?php foreach ( $thumbnail_size_options as $option ) : ?>
					<label style="display: block;"><input type="radio" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][thumbnail_size]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $value['thumbnail_size'] ); ?>><?php echo $option['label']; ?></label>
					<?php endforeach; ?>
				</div>

				<div class="repeater_gallery-media_type--video hidden">
					<h4 class="theme_option_headline2"><?php _e( 'Video file', 'tcd-w' ); ?></h4>
					<div class="cf cf_video_field hide-if-no-js repeater_gallery-video">
						<input type="hidden" value="<?php echo esc_attr( $value['video'] ); ?>" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][video]" class="cf_media_id">
						<div class="preview_field"><?php if ( $value['video'] && wp_get_attachment_url( $value['video'] ) ) { echo '<p class="media_url">' . wp_get_attachment_url( $value['video'] ) . '</p>'; } ?></div>
						<div class="buttton_area">
							<input type="button" value="<?php _e( 'Select Video', 'tcd-w' ); ?>" class="cfvf-select-video button">
							<input type="button" value="<?php _e( 'Remove Video', 'tcd-w' ); ?>" class="cfvf-delete-video button <?php if ( ! $value['video'] ) { echo 'hidden'; } ?>">
						</div>
					</div>
				</div>

				<div class="repeater_gallery-media_type--youtube hidden">
					<h4 class="theme_option_headline2"><?php _e( 'Youtube URL', 'tcd-w' ); ?></h4>
					<input class="large-text" type="text" name="repeater_gallery[<?php echo esc_attr( $key ); ?>][youtube_url]" value="<?php echo esc_attr( $value['youtube_url'] ); ?>">
				</div>

				<p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
			</div>
		</div>
<?php
}

function show_tcd_works_meta_box2() {
	global $post;

	$notes = get_post_meta( $post->ID, 'notes', true );

	echo '<input type="hidden" name="tcd_works_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

	echo '<h4 class="theme_option_headline2" style="margin-top: 0;">' . __( 'Works notes', 'tcd-w' ) . '</h4>' . "\n";
	echo '<p>' . __( 'Please add the item from "Add row" and set display contents.', 'tcd-w' ) . '</p>' . "\n";
	echo '<div class="cf_simple_repeater_container">' . "\n";

	// 行テンプレート
	$clone = '<tr>';
	$clone .= '<td><textarea name="notes[headline][]" cols="10" rows="2" class="large-text"></textarea></td>';
	$clone .= '<td><textarea name="notes[desc][]" cols="30" rows="2" class="large-text"></textarea></td>';
	$clone .= '<td class="col-delete"><a href="#" class="button button-secondary button-delete-row">' . __( 'Delete', 'tcd-w' ) . '</a></td>';
	$clone .= '</tr>';

	echo '<table class="cf_simple_repeater cf_simple_repeater-sortable" data-delete-confirm="' . __( 'Delete?', 'tcd-w') . '">' . "\n";
	echo '<thead>' . "\n";
	echo '<tr>';
	echo '<th class="col-headline">' . __( 'Headline', 'tcd-w' ) . '</th>';
	echo '<th class="col-desc">' . __( 'Description', 'tcd-w' ) . '</th>';
	echo '<th class="col-delete"></th>';
	echo '</tr>' . "\n";
	echo '</thead>' . "\n";
	echo '<tbody>' . "\n";

	if ( isset( $notes['headline'][0] ) ) {
		foreach( array_keys( $notes['headline'] ) as $repeater_index ) {
			if ( isset( $notes['headline'][$repeater_index] ) ) {
				$row_headline = $notes['headline'][$repeater_index];
			} else {
				$row_headline = '';
			}
			if ( isset( $notes['desc'][$repeater_index] ) ) {
				$row_desc = $notes['desc'][$repeater_index];
			} else {
				$row_desc = '';
			}

			echo '<tr>';
			echo '<td><textarea name="notes[headline][]" cols="10" rows="2" class="large-text">' . esc_textarea( $row_headline ) . '</textarea></td>';
			echo '<td><textarea name="notes[desc][]" cols="30" rows="2" class="large-text">' . esc_textarea( $row_desc ) . '</textarea></td>';
			echo '<td class="col-delete"><a href="#" class="button button-secondary button-delete-row">' . __( 'Delete', 'tcd-w' ) . '</a></td>';
			echo '</tr>' . "\n";
		}
	} else {
		echo $clone."\n";
	}

	echo '</tbody>' . "\n";
	echo '</table>' . "\n";

	echo '<a href="#" class="button button-secondary button-add-row" data-clone="' . esc_attr( $clone ) . '">' . __( 'Add row', 'tcd-w' ) . '</a>' . "\n";

	echo '</div>' . "\n";
?>
<h4 class="theme_option_headline2"><?php _e( 'SNS button setting', 'tcd-w' ); ?></h4>
<table class="theme_option_table">
	<tr>
		<td><?php _e( 'Facebook URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="facebook_url" value="<?php echo esc_attr( $post->facebook_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'X URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="twitter_url" value="<?php echo esc_attr( $post->twitter_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'TikTok URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="tiktok_url" value="<?php echo esc_attr( $post->tiktok_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'Instagram URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="instagram_url" value="<?php echo esc_attr( $post->instagram_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'Pinterest URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="pinterest_url" value="<?php echo esc_attr( $post->pinterest_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'Youtube URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="youtube_url" value="<?php echo esc_attr( $post->youtube_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'Contact page URL (You can use mailto:)', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="contact_url" value="<?php echo esc_attr( $post->contact_url ); ?>"></td>
	</tr>
	<tr>
		<td><?php _e( 'RSS URL', 'tcd-w' ); ?></td>
		<td><input class="large-text" type="text" name="rss_url" value="<?php echo esc_attr( $post->rss_url ); ?>"></td>
	</tr>
</table>
<?php
}

function save_tcd_works_meta_box( $post_id ) {

	// verify nonce
	if ( ! isset( $_POST['tcd_works_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['tcd_works_meta_box_nonce'], basename( __FILE__ ) ) ) {
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

	// repeater save or delete
	$cf_keys = array(
		'repeater_gallery'
	);
	foreach ( $cf_keys as $cf_key ) {
		$old = get_post_meta( $post_id, $cf_key, true );
		$new = isset( $_POST[$cf_key] ) ? array_values( $_POST[$cf_key] ) : '';

		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $cf_key, $new );
		} elseif ( ! $new && $old ) {
			delete_post_meta( $post_id, $cf_key, $old );
		}
	}

	// save or delete
	$cf_keys = array(
		'notes',
		'facebook_url',
		'twitter_url',
		'instagram_url',
		'tiktok_url',
		'pinterest_url',
		'youtube_url',
		'contact_url',
		'rss_url',
	);
	foreach ( $cf_keys as $cf_key ) {
		$old = get_post_meta( $post_id, $cf_key, true );
		$new = isset( $_POST[$cf_key] ) ? $_POST[$cf_key] : '';

		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $cf_key, $new );
		} elseif ( ! $new && $old ) {
			delete_post_meta( $post_id, $cf_key, $old );
		}
	}

	// repeater_galleryの最初の画像をアイキャッチにセット
	$image_id = null;
	if ( ! empty( $_POST['repeater_gallery'] ) ) {
		foreach( array_values( $_POST['repeater_gallery'] ) as $gallery ) {
			if ( ! empty( $gallery['image'] ) && wp_get_attachment_image_src( $gallery['image'] ) ) {
				$image_id = $gallery['image'];
				break;
			}
		}
	}
	if ( $image_id ) {
		update_post_meta( $post_id, '_thumbnail_id', $image_id );
	} else {
		delete_post_meta( $post_id, '_thumbnail_id' );
	}

}
add_action( 'save_post', 'save_tcd_works_meta_box' );
