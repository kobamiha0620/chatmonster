<?php

// プロフィールURL項目にSNSを追加
function tcd_user_profile_user_contactmethods( $methods, $user ) {
	return array(
		'facebook_url' => __( 'Facebook URL', 'tcd-w' ),
		'twitter_url' => __( 'X URL', 'tcd-w' ),
		'instagram_url' => __( 'Instagram URL', 'tcd-w' ),
		'tiktok_url' => __( 'TikTok URL', 'tcd-w' ),
		'pinterest_url' => __( 'Pinterest URL', 'tcd-w' ),
		'youtube_url' => __( 'Youtube URL', 'tcd-w' ),
		'contact_url' => __( 'Contact page URL<br>(You can use mailto:)', 'tcd-w' )
	);
}
add_filter( 'user_contactmethods', 'tcd_user_profile_user_contactmethods', 10, 2 );

// プロフィールに項目を追加
function tcd_user_profile_edit_user_profile( $user ) {
?>
	<h3><?php _e( 'Other profile information', 'tcd-w' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><label for="show_author"><?php _e( 'Show author profile', 'tcd-w' ); ?></label></th>
			<td><input name="show_author" type="checkbox" id="show_author" value="1" <?php checked( $user->show_author, 1 ); ?>> <?php _e( 'Show', 'tcd-w'); ?></td>
		</tr>
	</table>
<?php
}
add_action( 'show_user_profile', 'tcd_user_profile_edit_user_profile', 11 );
add_action( 'edit_user_profile', 'tcd_user_profile_edit_user_profile', 11 );

// プロフィール追加項目保存
function tcd_user_profile_edit_user_profile_update( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) return false;
	update_usermeta( $user_id, 'show_author', ! empty( $_POST['show_author'] ) ? 1 : 0 );
}
add_action( 'personal_options_update', 'tcd_user_profile_edit_user_profile_update' );
add_action( 'edit_user_profile_update', 'tcd_user_profile_edit_user_profile_update' );
