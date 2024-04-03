<?php
global $dp_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();

$footer_image = wp_get_attachment_url( $dp_options['footer_image'] );
$footer_info_class = 'p-footer-info';
$footer_info_attr = '';
if ( $footer_image ) :
	$footer_info_class .= ' has-bg-image';
	if ( $dp_options['footer_image_parallax'] ) :
		$footer_info_class .= ' has-bg-image-parallax';
		$footer_info_attr .= ' data-src="' . esc_attr( $footer_image ) . '"';
	else :
		$footer_info_attr .= ' style="background-image: url(' . esc_attr( $footer_image ) . ');"';
	endif;
else :
	$footer_info_class .= ' p-footer-info--no-bg';
endif;
?>
<footer class="l-footer">
	<div class="<?php echo $footer_info_class; ?>"<?php echo $footer_info_attr; ?>>
		<div class="p-footer-info__inner l-inner">
<?php
if ( 'yes' == $dp_options['use_footer_logo_image'] && $image = wp_get_attachment_image_src( $dp_options['footer_logo_image'], 'full' ) ) :
?>
			<div class="p-logo p-footer__logo<?php if ( $dp_options['footer_logo_image_retina'] ) { echo ' p-footer__logo--retina'; } ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( $image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>"<?php if ( $dp_options['footer_logo_image_retina'] ) echo ' width="' . floor( $image[1] / 2 ) . '"'; ?>></a>
			</div>
<?php
else :
?>
			<div class="p-logo p-footer__logo p-footer__logo--text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>
<?php
endif;

if ( 'yes' == $dp_options['use_footer_logo_image_mobile'] && $image = wp_get_attachment_image_src( $dp_options['footer_logo_image_mobile'], 'full' ) ) :
?>
			<div class="p-logo p-footer__logo--mobile<?php if ( $dp_options['footer_logo_image_mobile_retina'] ) echo ' p-footer__logo--retina'; ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( $image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>"<?php if ( $dp_options['footer_logo_image_mobile_retina'] ) echo ' width="' . floor( $image[1] / 2 ) . '"'; ?>></a>
			</div>
<?php
else :
?>
			<div class="p-logo p-footer__logo--mobile p-footer__logo--text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>
<?php
endif;

$sns_html = '';
if ( $dp_options['facebook_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--facebook"><a href="' . esc_attr( $dp_options['facebook_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['twitter_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--twitter"><a href="' . esc_attr( $dp_options['twitter_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['tiktok_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--tiktok"><a href="' . esc_attr( $dp_options['tiktok_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['instagram_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--instagram"><a href="' . esc_attr( $dp_options['instagram_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['pinterest_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--pinterest"><a href="' . esc_attr( $dp_options['pinterest_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['youtube_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--youtube"><a href="' . esc_attr( $dp_options['youtube_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['contact_url'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--contact"><a href="' . esc_attr( $dp_options['contact_url'] ) . '" target="_blank"></a></li>';
endif;
if ( $dp_options['show_rss'] ) :
	$sns_html .= '<li class="p-social-nav__item p-social-nav__item--rss"><a href="' . get_bloginfo( 'rss2_url' ) . '" target="_blank"></a></li>';
endif;
if ( $sns_html ) :
?>
			<ul class="p-social-nav"><?php echo $sns_html; ?></ul>
<?php
endif;

$dp_options['footer_desc'] = trim( $dp_options['footer_desc'] );
if ( $dp_options['footer_desc'] ) :
?>
			<div class="p-footer-info__desc"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $dp_options['footer_desc'] ) ); ?></div>
<?php
endif;
?>
		</div>
	</div>
<?php
if ( has_nav_menu( 'footer' ) ) :
	echo "\t" . str_replace( array( "\r\n", "\r", "\n" ), '', wp_nav_menu( array(
		'container' => 'nav',
		'container_class' => 'p-footer-nav__container',
		'depth' => 1,
		'echo' => 0,
		'menu_class' => 'p-footer-nav l-inner',
		'theme_location' => 'footer'
	) ) ) . "\n";
endif;
?>
	<div class="p-copyright">
		<div class="p-copyright__inner l-inner">
			<p>Copyright &copy;<span class="u-hidden-xs"><?php echo date( 'Y',current_time( 'timestamp', 0 ) ); ?></span> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
		</div>
	</div>
<?php
if ( is_mobile() && 'type3' !== $dp_options['footer_bar_display'] ) :
	get_template_part( 'template-parts/footer-bar' );
endif;
?>
	<div id="js-pagetop" class="p-pagetop"><a href="#"></a></div>
</footer>
<?php wp_footer(); ?>
<script>
jQuery(function($){
	var initialized = false;
	var initialize = function(){
		if (initialized) return;
		initialized = true;

		$(document).trigger('js-initialized');
		$(window).trigger('resize').trigger('scroll');
	};

<?php
if ( $dp_options['use_load_icon'] ) :
?>
	$(window).load(function() {
		setTimeout(initialize, 800);
		$('#site_loader_animation:not(:hidden, :animated)').delay(600).fadeOut(400);
		$('#site_loader_overlay:not(:hidden, :animated)').delay(900).fadeOut(800, function(){
			$(document).trigger('js-initialized-after');
		});
	});
	setTimeout(function(){
		setTimeout(initialize, 800);
		$('#site_loader_animation:not(:hidden, :animated)').delay(600).fadeOut(400);
		$('#site_loader_overlay:not(:hidden, :animated)').delay(900).fadeOut(800, function(){
			$(document).trigger('js-initialized-after');
		});
	}, <?php echo esc_html( $dp_options['load_time'] ? $dp_options['load_time'] : 5000 ); ?>);
<?php
else : // ロード画面を表示しない
?>
	initialize();
	$(document).trigger('js-initialized-after');
<?php
endif;
?>

});
</script>
<?php
if ( is_singular() && ! is_page() ) :
	if ( 'type5' == $dp_options['sns_type_top'] || 'type5' == $dp_options['sns_type_btm'] ) :
		if ( $dp_options['show_twitter_top'] || $dp_options['show_twitter_btm'] ) :
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
		endif;
		if ( $dp_options['show_fblike_top'] || $dp_options['show_fbshare_top'] || $dp_options['show_fblike_btm'] || $dp_options['show_fbshare_btm'] ) :
?>
<!-- facebook share button code -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php
		endif;
		if ( $dp_options['show_hatena_top'] || $dp_options['show_hatena_btm'] ) :
?>
<script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
		endif;
		if ( $dp_options['show_pocket_top'] || $dp_options['show_pocket_btm'] ) :
?>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
		endif;
		if ( ($dp_options['show_pinterest_top'] && $dp_options['sns_type_top'] == 'type5') || ($dp_options['show_pinterest_btm'] && $dp_options['sns_type_btm'] == 'type5') ) :
?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php
		endif;
	endif;
endif;
?>
</body>
</html>
