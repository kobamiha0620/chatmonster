<?php
function tcd_head() {
	global $dp_options, $post;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();
	$primary_color_hex = esc_html( implode( ', ', hex2rgb( $dp_options['primary_color'] ) ) );
	$load_color1_hex = esc_html( implode( ', ', hex2rgb( $dp_options['load_color1'] ) ) ); // keyframe の記述が長くなるため、ここでエスケープ
	$load_color2_hex = esc_html( implode( ', ', hex2rgb( $dp_options['load_color2'] ) ) ); // keyframe の記述が長くなるため、ここでエスケープ
?>
<?php if ( $dp_options['favicon'] && $url = wp_get_attachment_url( $dp_options['favicon'] ) ) : ?>
<link rel="shortcut icon" href="<?php echo esc_attr( $url ); ?>">
<?php endif; ?>
<style>
<?php /* Primary color */ ?>
.p-button:hover, .p-category-item:hover, .p-entry-works__pager .p-pager__item a:hover, .c-comment__form-submit:hover, c-comment__password-protected, .c-pw__btn--register, .c-pw__btn { background-color: <?php echo esc_html( $dp_options['primary_color'] ); ?>; }
.c-comment__tab-item.is-active a, .c-comment__tab-item a:hover, .c-comment__tab-item.is-active p { background-color: <?php echo esc_html( $dp_options['primary_color'] ); ?>; border-color: <?php echo esc_html( $dp_options['primary_color'] ); ?>; }
.c-comment__tab-item.is-active a:after, .c-comment__tab-item.is-active p:after { border-top-color: <?php echo esc_html( $dp_options['primary_color'] ); ?>; }
<?php /* Secondary color */ ?>
.p-breadcrumb__item a:hover, .p-social-nav a:hover, .p-gallery-modal__button:hover, .p-modal-cta__close:hover, .p-index-archive__item-category:hover, .p-widget-categories .toggle-children:hover, .p-widget .searchform #searchsubmit:hover, .p-widget-search .p-widget-search__submit:hover, .slick-arrow:hover { color: <?php echo esc_html( $dp_options['secondary_color'] ); ?>; }
.p-button, .p-pagetop a, .p-category-item, .p-page-links > span, .p-pager__item .current, .p-page-links a:hover, .p-pager__item a:hover, .p-works-gallery__filter-item.is-active span, .slick-dots li.slick-active button, .slick-dots li:hover button { background-color: <?php echo esc_html( $dp_options['secondary_color'] ); ?>; }
.p-headline, .p-widget__title { border-color: <?php echo esc_html( $dp_options['secondary_color'] ); ?>; }
<?php /* Tertiary color */ ?>
a:hover, .p-entry__body a:hover, .custom-html-widget a:hover, .p-author__box a:hover, a:hover .p-article__title, .p-entry-nav a:hover, .p-works-gallery__filter-item:hover span, .p-entry__body .pb_simple_table a:hover { color: <?php echo esc_html( $dp_options['tertiary_color'] ); ?>; }
.p-pagetop a:hover { background-color: <?php echo esc_html( $dp_options['tertiary_color'] ); ?>; }
<?php /* Link color of post contents */ ?>
.p-entry__body a, .custom-html-widget a { color: <?php echo esc_html( $dp_options['content_link_color'] ); ?>; }
<?php /* font type */ ?>
<?php if ( 'type1' == $dp_options['font_type'] ) : ?>
body, input, textarea { font-family: Verdana, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ ProN W3", "メイリオ", Meiryo, sans-serif; }
<?php elseif ( 'type2' == $dp_options['font_type'] ) : ?>
body, input, textarea { font-family: "Segoe UI", Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif; }
<?php else : ?>
body, input, textarea { font-family: "Times New Roman", "游明朝", "Yu Mincho", "游明朝体", "YuMincho", "ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "HiraMinProN-W3", "HGS明朝E", "ＭＳ Ｐ明朝", "MS PMincho", serif; }
<?php endif; ?>
<?php /* headline font type */ ?>
.p-logo, .p-page-header__title, .p-entry-works__title, .p-modal-cta__catch, .p-header-content__catch, .p-header-content__desc, .p-cb__item-headline, .p-index-about__image-label {
<?php if ( 'type1' == $dp_options['headline_font_type'] ) : ?>
font-family: Segoe UI, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ ProN W3", "メイリオ", Meiryo, sans-serif;
<?php elseif ( 'type2' == $dp_options['headline_font_type'] ) : ?>
font-family: "Segoe UI", Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;
<?php else : ?>
font-family: "Times New Roman", "游明朝", "Yu Mincho", "游明朝体", "YuMincho", "ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "HiraMinProN-W3", "HGS明朝E", "ＭＳ Ｐ明朝", "MS PMincho", serif;
font-weight: 500;
<?php endif; ?>
}
<?php /* load */ ?>
<?php if ( 'type1' == $dp_options['load_icon'] ) : ?>
.c-load--type1 { border: 3px solid rgba(<?php echo esc_html( $load_color2_hex ); ?>, 0.2); border-top-color: <?php echo esc_html( $dp_options['load_color1'] ); ?>; }
<?php elseif ( 'type2' == $dp_options['load_icon'] ) : ?>
@-webkit-keyframes loading-square-loader {
	0% { box-shadow: 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	5% { box-shadow: 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	10% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	15% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	20% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	25% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	30% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -50px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	35% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -50px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	40% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -50px rgba(242, 205, 123, 0); }
	45%, 55% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	60% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	65% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	70% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	75% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	80% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	85% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	90% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	95%, 100% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -24px rgba(<?php echo $load_color1_hex; ?>, 0); }
}
@keyframes loading-square-loader {
	0% { box-shadow: 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	5% { box-shadow: 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	10% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	15% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	20% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	25% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	30% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -50px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	35% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -50px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(242, 205, 123, 0); }
	40% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -50px rgba(242, 205, 123, 0); }
	45%, 55% { box-shadow: 16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	60% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	65% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -16px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	70% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	75% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -16px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	80% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	85% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	90% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 1); }
	95%, 100% { box-shadow: 16px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px 8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -8px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -8px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -24px rgba(<?php echo $load_color2_hex; ?>, 0), 16px -24px rgba(<?php echo $load_color2_hex; ?>, 0), 32px -24px rgba(<?php echo $load_color1_hex; ?>, 0); }
}
.c-load--type2:before { box-shadow: 16px 0 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px 0 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 16px -16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 32px -16px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -32px rgba(<?php echo $load_color2_hex; ?>, 1), 16px -32px rgba(<?php echo $load_color2_hex; ?>, 1), 32px -32px rgba(<?php echo $load_color1_hex; ?>, 0); }
.c-load--type2:after { background-color: rgba(<?php echo $load_color1_hex; ?>, 1); }
<?php elseif ( 'type3' == $dp_options['load_icon'] ) : ?>
.c-load--type3 i { background: <?php echo esc_html( $dp_options['load_color1'] ); ?>; }
<?php endif; ?>
<?php /* hover effect */ ?>
<?php if ( $dp_options['hover1_rotate'] ) : ?>
.p-hover-effect--type1:hover img { -webkit-transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>) rotate(2deg); -moz-transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>) rotate(2deg); -ms-transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>) rotate(2deg); transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>) rotate(2deg); }
<?php else : ?>
.p-hover-effect--type1:hover img { -webkit-transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>); -moz-transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>); -ms-transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>); transform: scale(<?php echo esc_html( $dp_options['hover1_zoom'] ); ?>); }
<?php endif; ?>
<?php if ( 'type1' == $dp_options['hover2_direct'] ) : ?>
.p-hover-effect--type2 img { margin-left: -8px; }
.p-hover-effect--type2:hover img { margin-left: 8px; }
<?php else : ?>
.p-hover-effect--type2 img { margin-left: 8px; }
.p-hover-effect--type2:hover img { margin-left: -8px; }
<?php endif; ?>
<?php if ( 1 > $dp_options['hover1_opacity'] ) : ?>
.p-hover-effect--type1:hover .p-hover-effect__image { background: <?php echo esc_html( $dp_options['hover1_bgcolor'] ); ?>; }
.p-hover-effect--type1:hover img { opacity: <?php echo esc_html( $dp_options['hover1_opacity'] ); ?>; }
<?php endif; ?>
.p-hover-effect--type2:hover .p-hover-effect__image { background: <?php echo esc_html( $dp_options['hover2_bgcolor'] ); ?>; }
.p-hover-effect--type2:hover img { opacity: <?php echo esc_html( $dp_options['hover2_opacity'] ); ?> }
.p-hover-effect--type3:hover .p-hover-effect__image { background: <?php echo esc_html( $dp_options['hover3_bgcolor'] ); ?>; }
.p-hover-effect--type3:hover img { opacity: <?php echo esc_html( $dp_options['hover3_opacity'] ); ?>; }
<?php /* Entry */ ?>
.p-entry__title { font-size: <?php echo esc_html( $dp_options['title_font_size'] ); ?>px; }
.p-entry__title, .p-article-post__title { color: <?php echo esc_html( $dp_options['title_color'] ); ?>; }
.p-entry__body { font-size: <?php echo esc_html( $dp_options['content_font_size'] ); ?>px; }
.p-entry__body, .p-entry__body .pb_simple_table a { color: <?php echo esc_html( $dp_options['content_color'] ); ?>; }
<?php if ( is_page() && $post->content_font_size ) { ?>
.p-entry-page__body { font-size: <?php echo esc_html( $post->content_font_size ); ?>px; }
<?php } ?>
<?php /* Information */ ?>
.p-entry-information__title { font-size: <?php echo esc_html( $dp_options['information_title_font_size'] ); ?>px; }
.p-entry-information__title, .p-article-information__title { color: <?php echo esc_html( $dp_options['information_title_color'] ); ?>; }
.p-entry-information__body, .p-entry-information__body .pb_simple_table a { color: <?php echo esc_html( $dp_options['information_content_color'] ); ?>; font-size: <?php echo esc_html( $dp_options['information_content_font_size'] ); ?>px; }
<?php /* Works */ ?>
.p-entry-works__title { color: <?php echo esc_html( $dp_options['works_title_color'] ); ?>; font-size: <?php echo esc_html( $dp_options['works_title_font_size'] ); ?>px; }
.p-entry-works__body { color: <?php echo esc_html( $dp_options['works_content_color'] ); ?>; font-size: <?php echo esc_html( $dp_options['works_content_font_size'] ); ?>px; }
.p-gallery-modal__overlay { background: rgba(<?php echo esc_html( implode( ', ', hex2rgb( $dp_options['works_modal_overlay_color'] ) ) ); ?>, <?php echo esc_html( $dp_options['works_modal_overlay_opacity'] ); ?>); }
<?php /* Voice */ ?>
.p-article-voice__title { color: <?php echo esc_html( $dp_options['voice_title_color'] ); ?>; font-size: <?php echo esc_html( $dp_options['voice_title_font_size'] ); ?>px; }
.p-entry-voice__body { color: <?php echo esc_html( $dp_options['voice_content_color'] ); ?>; font-size: <?php echo esc_html( $dp_options['voice_content_font_size'] ); ?>px; }
<?php /* Header */ ?>
.l-header__bar { background: rgba(<?php echo esc_html( implode( ', ', hex2rgb( $dp_options['header_bg'] ) ) ); ?>, <?php echo esc_html( $dp_options['header_opacity'] ); ?>); }
body.l-header__fix .is-header-fixed .l-header__bar { background: rgba(<?php echo esc_html( implode( ', ', hex2rgb( $dp_options['header_bg'] ) ) ); ?>, <?php echo esc_html( $dp_options['header_opacity_fixed'] ); ?>); }
<?php /* logo */ ?>
.p-header__logo--text { font-size: <?php echo esc_html( $dp_options['header_logo_font_size'] ); ?>px; }
.p-footer__logo--text { font-size: <?php echo esc_html( $dp_options['footer_logo_font_size'] ); ?>px; }
<?php /* Global menu */ ?>
.l-header a, .p-global-nav a { color: <?php echo esc_html( $dp_options['header_font_color'] ); ?>; }
.p-global-nav .sub-menu { background-color: <?php echo esc_html( $dp_options['submenu_bg_color'] ); ?>; }
.p-global-nav .sub-menu a { color: <?php echo esc_html( $dp_options['submenu_color'] ); ?>; }
.p-global-nav .sub-menu a:hover, .p-global-nav .sub-menu .current-menu-item > a { background-color: <?php echo esc_html( $dp_options['submenu_bg_color_hover'] ); ?>; color: <?php echo esc_html( $dp_options['submenu_color_hover'] ); ?>; }
<?php /* Footer */ ?>
.p-footer-info, .p-footer__logo--text a { color: <?php echo esc_html( $dp_options['footer_desc_color'] ); ?>; }
.p-footer-info.has-bg-image::after { background-color: rgba(<?php echo implode( ',', hex2rgb( $dp_options['footer_overlay_color'] ) ) . ', ' . esc_html( $dp_options['footer_overlay_opacity'] ); ?>); }
.p-footer-info__desc { font-size: <?php echo esc_html( $dp_options['footer_desc_font_size'] ); ?>px; }
.p-footer-info .p-social-nav a { color: <?php echo esc_html( $dp_options['footer_sns_icon_color'] ); ?>; }
.p-footer-info .p-social-nav a:hover { color: <?php echo esc_html( $dp_options['footer_sns_icon_color_hover'] ); ?>; }
.p-footer-nav__container { background-color: <?php echo esc_html( $dp_options['footer_menu_bg_color'] ); ?>; }
.p-footer-nav, .p-footer-nav li a { color: <?php echo esc_html( $dp_options['footer_menu_font_color'] ); ?>; }
.p-footer-nav li a:hover { color: <?php echo esc_html( $dp_options['footer_menu_font_color_hover'] ); ?>; }
.p-copyright { background-color: <?php echo esc_html( $dp_options['copyright_bg_color'] ); ?>; color: <?php echo esc_html( $dp_options['copyright_font_color'] ); ?>; }
<?php /* Footer bar */ ?>
<?php if ( is_mobile() && ( 'type1' === $dp_options['footer_bar_display'] || 'type2' === $dp_options['footer_bar_display'] ) ) : ?>
.c-footer-bar { background: rgba(<?php echo implode( ',', hex2rgb( $dp_options['footer_bar_bg'] ) ) . ', ' . esc_html( $dp_options['footer_bar_tp'] ); ?>); border-top: 1px solid <?php echo esc_html( $dp_options['footer_bar_border'] ); ?>; color:<?php echo esc_html( $dp_options['footer_bar_color'] ); ?>; }
.c-footer-bar a { color: <?php echo esc_html( $dp_options['footer_bar_color'] ); ?>; }
.c-footer-bar__item + .c-footer-bar__item { border-left: 1px solid <?php echo esc_html( $dp_options['footer_bar_border'] ); ?>; }
<?php endif; ?>
<?php /* Responsive */ ?>
@media (min-width: 1200px) {
	.p-global-nav a:hover, .p-global-nav > li:hover > a, .p-global-nav > li.current-menu-item > a, .p-global-nav > li.is-active > a { color: <?php echo esc_html( $dp_options['header_font_color_hover'] ); ?>; }
}
@media only screen and (max-width: 1199px) {
	.l-header__bar { background-color: rgba(<?php echo esc_html( implode( ', ', hex2rgb( $dp_options['header_bg'] ) ) ); ?>, <?php echo esc_html( $dp_options['header_opacity'] ); ?>); }
	.p-header__logo--text { font-size: <?php echo esc_html( $dp_options['header_logo_font_size_mobile'] ); ?>px; }
	.p-global-nav { background-color: rgba(<?php echo implode( ',', hex2rgb( $dp_options['submenu_bg_color'] ) ) . ', ' . esc_html( $dp_options['header_opacity'] ); ?>); }
	.p-global-nav a { color: <?php echo esc_html( $dp_options['submenu_color'] ); ?>; }
	.p-global-nav a:hover, .p-global-nav .current-menu-item > a { background-color: rgba(<?php echo implode( ',', hex2rgb( $dp_options['submenu_bg_color_hover'] ) ) . ', ' . esc_html( $dp_options['header_opacity'] ); ?>); color: <?php echo esc_html( $dp_options['submenu_color_hover'] ); ?>; }
}
@media only screen and (max-width: 991px) {
	.p-footer__logo--text { font-size: <?php echo esc_html( $dp_options['footer_logo_font_size_mobile'] ); ?>px; }
	.p-footer-info__desc { font-size: <?php echo esc_html( $dp_options['footer_desc_font_size_mobile'] ); ?>px; }
	.p-entry__title { font-size: <?php echo esc_html( $dp_options['title_font_size_mobile'] ); ?>px; }
	.p-entry__body { font-size: <?php echo esc_html( $dp_options['content_font_size_mobile'] ); ?>px; }
	.p-entry-information__title { font-size: <?php echo esc_html( $dp_options['information_title_font_size_mobile'] ); ?>px; }
	.p-entry-information__body { font-size: <?php echo esc_html( $dp_options['information_content_font_size_mobile'] ); ?>px; }
	.p-entry-works__title { font-size: <?php echo esc_html( $dp_options['works_title_font_size_mobile'] ); ?>px; }
	.p-entry-works__body { font-size: <?php echo esc_html( $dp_options['works_content_font_size_mobile'] ); ?>px; }
	.p-article-voice__title { font-size: <?php echo esc_html( $dp_options['voice_title_font_size_mobile'] ); ?>px; }
	.p-entry-voice__body { font-size: <?php echo esc_html( $dp_options['voice_content_font_size_mobile'] ); ?>px; }
<?php	if ( is_page() && $post->content_font_size_mobile ) { ?>
	.p-entry-page__body { font-size: <?php echo esc_html( $post->content_font_size_mobile ); ?>px; }
<?php	} ?>
}
<?php if ( 'type2' == $dp_options['load_icon'] ) : ?>
@media only screen and (max-width: 767px) {
	@-webkit-keyframes loading-square-loader {
		0% { box-shadow: 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		5% { box-shadow: 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		10% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		15% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		20% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		25% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		30% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -50px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		35% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -50px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		40% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -50px rgba(242, 205, 123, 0); }
		45%, 55% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		60% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		65% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		70% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		75% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		80% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		85% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		90% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		95%, 100% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -15px rgba(<?php echo $load_color1_hex; ?>, 0); }
	}
	@keyframes loading-square-loader {
		0% { box-shadow: 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		5% { box-shadow: 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		10% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		15% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		20% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		25% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		30% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -50px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		35% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -50px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
		40% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -50px rgba(242, 205, 123, 0); }
		45%, 55% { box-shadow: 10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		60% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		65% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -10px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		70% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		75% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -10px rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		80% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		85% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		90% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 1); }
		95%, 100% { box-shadow: 10px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px 5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -5px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -5px rgba(<?php echo $load_color2_hex; ?>, 0), 0 -15px rgba(<?php echo $load_color2_hex; ?>, 0), 10px -15px rgba(<?php echo $load_color2_hex; ?>, 0), 20px -15px rgba(<?php echo $load_color1_hex; ?>, 0); }
	}
	.c-load--type2:before { box-shadow: 10px 0 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px 0 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 10px -10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 20px -10px 0 rgba(<?php echo $load_color2_hex; ?>, 1), 0 -20px rgba(<?php echo $load_color2_hex; ?>, 1), 10px -20px rgba(<?php echo $load_color2_hex; ?>, 1), 20px -20px rgba(<?php echo $load_color1_hex; ?>, 0); }
}
<?php endif; ?>
<?php
if ( is_front_page() ) {
	$css = array();
	$css_mobile = array();
	$css_sp = array();

	// 動画, Youtube
	if ( in_array( $dp_options['header_content_type'], array( 'type2', 'type3' ) ) ) {
		if ( 'type2' === $dp_options['header_video_content_type'] && $dp_options['header_video_catch'] ) {
			if ( $dp_options['header_video_catch_vertical'] ) {
				$css[] = '.p-header-content__catch { color: ' . esc_attr( $dp_options['header_video_catch_color'] ) . '; font-size: ' . esc_attr( $dp_options['header_video_catch_font_size'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['header_video_catch_shadow2'] * -1 ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow1'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow3'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow_color'] ) . '; }';
			} else {
				$css[] = '.p-header-content__catch { color: ' . esc_attr( $dp_options['header_video_catch_color'] ) . '; font-size: ' . esc_attr( $dp_options['header_video_catch_font_size'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['header_video_catch_shadow1'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow2'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow3'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow_color'] ) . '; }';
			}

			if ( ! in_array( $dp_options['header_video_content_type_mobile'], array( 'type1', 'type2' ) ) ) {
				$css_sp[] = '.p-header-content__catch { font-size: ' . esc_attr( $dp_options['header_video_catch_font_size_mobile'] ) . 'px; }';
			}
		}

		if ( $dp_options['display_header_video_desc'] && $dp_options['header_video_desc'] ) {
			$css[] = '.p-header-content__desc { color: ' . esc_attr( $dp_options['header_video_desc_color'] ) . '; font-size: ' . esc_attr( $dp_options['header_video_desc_font_size'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['header_video_desc_shadow1'] ) . 'px ' . esc_attr( $dp_options['header_video_desc_shadow2'] ) . 'px ' . esc_attr( $dp_options['header_video_desc_shadow3'] ) . 'px ' . esc_attr( $dp_options['header_video_desc_shadow_color'] ) . '; }';

			if ( ! in_array( $dp_options['header_video_content_type_mobile'], array( 'type1', 'type2' ) ) ) {
				$css_sp[] = '.p-header-content__desc { font-size: ' . esc_attr( $dp_options['header_video_desc_font_size_mobile'] ) . 'px; }';
			}
		}

		if ( $dp_options['display_header_video_button'] && $dp_options['header_video_button_label'] ) {
			$css[] = '.p-header-content__button .p-button { background-color: ' . esc_attr( $dp_options['header_video_button_bg_color'] ) . '; color: ' . esc_attr( $dp_options['header_video_button_font_color'] ) . '; }';
			$css[] = '.p-header-content__button a.p-button:hover { background-color: ' . esc_attr( $dp_options['header_video_button_bg_color_hover'] ) . '; color: ' . esc_attr( $dp_options['header_video_button_font_color_hover'] ) . '; }';
		}

		if ( $dp_options['display_header_video_overlay'] && 0 < $dp_options['header_video_overlay_opacity'] ) {
			$css[] = '.p-header-content__overlay { background-color: rgba(' . esc_attr( implode( ', ', hex2rgb( $dp_options['header_video_overlay_color'] ) ) . ', ' . $dp_options['header_video_overlay_opacity'] ) . '); }';
		}

		if ( ! in_array( $dp_options['header_video_content_type_mobile'], array( 'type1', 'type2' ) ) && $dp_options['header_video_logo_width_mobile'] ) {
			$css_sp[] = '.p-header-content__logo img { width: ' . esc_attr( $dp_options['header_video_logo_width_mobile'] ) . 'px; }';
		}

		if ( 'type2' === $dp_options['header_video_content_type_mobile'] && $dp_options['header_video_catch_mobile_type2'] ) {
			if ( $dp_options['header_video_catch_vertical_mobile_type2'] ) {
				$css_sp[] = '.p-header-content--mobile .p-header-content__catch { color: ' . esc_attr( $dp_options['header_video_catch_color_mobile_type2'] ) . '; font-size: ' . esc_attr( $dp_options['header_video_catch_font_size_mobile_type2'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['header_video_catch_shadow2_mobile_type2'] * -1 ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow1_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow3_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow_color_mobile_type2'] ) . '; }';
			} else {
				$css_sp[] = '.p-header-content--mobile .p-header-content__catch { color: ' . esc_attr( $dp_options['header_video_catch_color_mobile_type2'] ) . '; font-size: ' . esc_attr( $dp_options['header_video_catch_font_size_mobile_type2'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['header_video_catch_shadow1_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow2_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow3_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['header_video_catch_shadow_color_mobile_type2'] ) . '; }';
			}
		}

		if ( in_array( $dp_options['header_video_content_type_mobile'], array( 'type1', 'type2' ) ) ) {
			$css_sp[] = '.p-header-content__overlay { background-color: transparent; }';
			if ( $dp_options['display_header_video_overlay_mobile'] && 0 < $dp_options['header_video_overlay_opacity_mobile'] ) {
				$css_sp[] = '.p-header-content--mobile { background-color: rgba(' . esc_attr( implode( ', ', hex2rgb( $dp_options['header_video_overlay_color_mobile'] ) ) . ', ' . $dp_options['header_video_overlay_opacity_mobile'] ) . '); }';
			}
		}


	// 画像スライダー
	} else {
		for ( $i = 1; $i <= 3; $i++ ) {
			if ( is_mobile() && $dp_options['slider_image_sp' . $i] ) :
				$slider_image = wp_get_attachment_image_src( $dp_options['slider_image_sp' . $i], 'full' );
			else :
				$slider_image = wp_get_attachment_image_src( $dp_options['slider_image' . $i], 'full' );
			endif;
			if ( empty( $slider_image[0] ) ) continue;

			if ( 'type2' === $dp_options['slider_content_type' . $i] && $dp_options['slider_catch' . $i] ) {
				if ( $dp_options['slider_catch_vertical' . $i] ) {
					$css[] = '.p-index-slider__item--' . $i . ' .p-header-content__catch { color: ' . esc_attr( $dp_options['slider_catch_color' . $i] ) . '; font-size: ' . esc_attr( $dp_options['slider_catch_font_size' . $i] ) . 'px; text-shadow: ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow2'] * -1 ) . 'px ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow1'] ) . 'px ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow3'] ) . 'px ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow_color'] ) . '; }';
				} else {
					$css[] = '.p-index-slider__item--' . $i . ' .p-header-content__catch { color: ' . esc_attr( $dp_options['slider_catch_color' . $i] ) . '; font-size: ' . esc_attr( $dp_options['slider_catch_font_size' . $i] ) . 'px; text-shadow: ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow1'] ) . 'px ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow2'] ) . 'px ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow3'] ) . 'px ' . esc_attr( $dp_options['slider_catch' . $i . '_shadow_color'] ) . '; }';
				}

				if ( ! in_array( $dp_options['slider_content_type_mobile'], array( 'type1', 'type2' ) ) ) {
					$css_sp[] = '.p-index-slider__item--' . $i . ' .p-header-content__catch { font-size: ' . esc_attr( $dp_options['slider_catch_font_size_mobile' . $i] ) . 'px; }';
				}
			}

			if ( $dp_options['display_slider_desc' . $i] && $dp_options['slider_desc' . $i] ) {
				$css[] = '.p-index-slider__item--' . $i . ' .p-header-content__desc { color: ' . esc_attr( $dp_options['slider_desc_color' . $i] ) . '; font-size: ' . esc_attr( $dp_options['slider_desc_font_size' . $i] ) . 'px; text-shadow: ' . esc_attr( $dp_options['slider_desc' . $i . '_shadow1'] ) . 'px ' . esc_attr( $dp_options['slider_desc' . $i . '_shadow2'] ) . 'px ' . esc_attr( $dp_options['slider_desc' . $i . '_shadow3'] ) . 'px ' . esc_attr( $dp_options['slider_desc' . $i . '_shadow_color'] ) . '; }';

				if ( ! in_array( $dp_options['slider_content_type_mobile'], array( 'type1', 'type2' ) ) ) {
					$css_sp[] = '.p-index-slider__item--' . $i . ' .p-header-content__desc { font-size: ' . esc_attr( $dp_options['slider_desc_font_size_mobile' . $i] ) . 'px; }';
				}
			}

			if ( $dp_options['display_slider_button' . $i] && $dp_options['slider_button_label' . $i] ) {
				$css[] = '.p-index-slider__item--' . $i . ' .p-header-content__button .p-button { background-color: ' . esc_attr( $dp_options['slider_button_bg_color' . $i] ) . '; color: ' . esc_attr( $dp_options['slider_button_font_color' . $i] ) . ' !important; }';
				$css[] = '.p-index-slider__item--' . $i . ' .p-header-content__button a.p-button:hover { background-color: ' . esc_attr( $dp_options['slider_button_bg_color_hover' . $i] ) . '; color: ' . esc_attr( $dp_options['slider_button_font_color_hover' . $i] ) . ' !important; }';
			}

			if ( $dp_options['display_slider_overlay' . $i] && 0 < $dp_options['slider_overlay_opacity' . $i] ) {
				$css[] = '.p-index-slider__item--' . $i . ' .p-header-content__overlay { background-color: rgba(' . esc_attr( implode( ', ', hex2rgb( $dp_options['slider_overlay_color' . $i] ) ) . ', ' . $dp_options['slider_overlay_opacity' . $i] ) . '); }';
			}

			if ( in_array( $dp_options['slider_content_type_mobile'], array( 'type1', 'type2' ) ) ) {
				if ( $dp_options['display_slider_overlay_mobile' . $i] && 0 < $dp_options['slider_overlay_opacity_mobile' . $i] ) {
					$css_sp[] = '.p-index-slider__item--' . $i . ' .p-header-content__overlay { background-color: rgba(' . esc_attr( implode( ', ', hex2rgb( $dp_options['slider_overlay_color_mobile' . $i] ) ) . ', ' . $dp_options['slider_overlay_opacity_mobile' . $i] ) . '); }';
				} else {
					$css_sp[] = '.p-index-slider__item--' . $i . ' .p-header-content__overlay { background-color: transparent; }';
				}
			} elseif ( $dp_options['slider_logo_width_mobile' . $i] ) {
				$css_sp[] = '.p-index-slider__item--' . $i . ' .p-header-content__logo img { width: ' . esc_attr( $dp_options['slider_logo_width_mobile' . $i] ) . 'px; }';
			}
		}

		if ( 'type2' === $dp_options['slider_content_type_mobile'] && $dp_options['slider_catch_mobile_type2'] ) {
			if ( $dp_options['slider_catch_vertical_mobile_type2'] ) {
				$css_sp[] = '.p-header-content--mobile .p-header-content__catch { color: ' . esc_attr( $dp_options['slider_catch_color_mobile_type2'] ) . '; font-size: ' . esc_attr( $dp_options['slider_catch_font_size_mobile_type2'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['slider_catch_shadow2_mobile_type2'] * -1 ) . 'px ' . esc_attr( $dp_options['slider_catch_shadow1_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['slider_catch_shadow3_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['slider_catch_shadow_color_mobile_type2'] ) . '; }';
			} else {
				$css_sp[] = '.p-header-content--mobile .p-header-content__catch { color: ' . esc_attr( $dp_options['slider_catch_color_mobile_type2'] ) . '; font-size: ' . esc_attr( $dp_options['slider_catch_font_size_mobile_type2'] ) . 'px; text-shadow: ' . esc_attr( $dp_options['slider_catch_shadow1_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['slider_catch_shadow2_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['slider_catch_shadow3_mobile_type2'] ) . 'px ' . esc_attr( $dp_options['slider_catch_shadow_color_mobile_type2'] ) . '; }';
			}
		}
	}

	// コンテンツビルダー
	if ( ! empty( $dp_options['contents_builder'] ) ) {
		foreach ( $dp_options['contents_builder'] as $key => $cb_content ) {
			$cb_index = 'cb_' . ( $key + 1 );
			if ( empty( $cb_content['cb_content_select'] ) || empty( $cb_content['cb_display'] ) ) continue;

			if ( ! empty( $cb_content['cb_headline'] ) ) {
				$css[] = '#' . $cb_index . ' .p-cb__item-headline { color: ' . esc_attr( $cb_content['cb_headline_color'] ) . '; font-size: ' . esc_attr( $cb_content['cb_headline_font_size'] ) . 'px; }';
				$css_mobile[] = '#' . $cb_index . ' .p-cb__item-headline { font-size: ' . esc_attr( $cb_content['cb_headline_font_size_mobile'] ) . 'px; }';
			}

			if ( ! empty( $cb_content['cb_desc'] ) ) {
				$css[] = '#' . $cb_index . ' .p-cb__item-desc { color: ' . esc_attr( $cb_content['cb_desc_color'] ) . '; font-size: ' . esc_attr( $cb_content['cb_desc_font_size'] ) . 'px; }';
				$css_mobile[] = '#' . $cb_index . ' .p-cb__item-desc { font-size: ' . esc_attr( $cb_content['cb_desc_font_size_mobile'] ) . 'px; }';
			}

			if ( ! empty( $cb_content['cb_desc2'] ) ) {
				$css[] = '#' . $cb_index . ' .p-cb__item-desc2 { color: ' . esc_attr( $cb_content['cb_desc_color2'] ) . '; font-size: ' . esc_attr( $cb_content['cb_desc_font_size2'] ) . 'px; }';
				$css_mobile[] = '#' . $cb_index . ' .p-cb__item-desc2 { font-size: ' . esc_attr( $cb_content['cb_desc_font_size_mobile2'] ) . 'px; }';
			}

			if ( ! empty( $cb_content['cb_show_archive_link'] ) && ! empty( $cb_content['cb_archive_link_text'] ) ) {
				$css[] = '#' . $cb_index . ' .p-cb__item-button { background-color: ' . esc_attr( $cb_content['cb_archive_link_bg_color'] ) . '; color: ' . esc_attr( $cb_content['cb_archive_link_font_color'] ) . ' !important; }';
				$css[] = '#' . $cb_index . ' .p-cb__item-button:hover { background-color: ' . esc_attr( $cb_content['cb_archive_link_bg_color_hover'] ) . '; color: ' . esc_attr( $cb_content['cb_archive_link_font_color_hover'] ) . ' !important; }';
			}

			if ( ! empty( $cb_content['cb_button_label'] ) && ! empty( $cb_content['cb_button_label'] ) ) {
				$css[] = '#' . $cb_index . ' .p-cb__item-button { background-color: ' . esc_attr( $cb_content['cb_button_bg_color'] ) . '; color: ' . esc_attr( $cb_content['cb_button_font_color'] ) . ' !important; }';
				$css[] = '#' . $cb_index . ' .p-cb__item-button:hover { background-color: ' . esc_attr( $cb_content['cb_button_bg_color_hover'] ) . '; color: ' . esc_attr( $cb_content['cb_button_font_color_hover'] ) . ' !important; }';
			}

			if ( ! empty( $cb_content['cb_background_image'] ) && wp_get_attachment_url( $cb_content['cb_background_image'] ) ) {
				$css[] = '#' . $cb_index . '::after { background-color: rgba(' . esc_attr( implode( ', ', hex2rgb( $cb_content['cb_background_image_overlay_color'] ) ) . ', ' . $cb_content['cb_background_image_overlay_opacity'] ) . '); }';
			}

			// Voiceカルーセル
			if ( 'voice_carousel' == $cb_content['cb_content_select'] ) {
				$css[] = '#' . $cb_index . ' .slick-arrow { color: ' . esc_attr( $cb_content['cb_arrow_font_color'] ) . '; }';
				$css[] = '#' . $cb_index . ' .slick-arrow:hover { color: ' . esc_attr( $cb_content['cb_arrow_font_color_hover'] ) . '; }';

			// PR&ACCESS
			} elseif ( 'pr' == $cb_content['cb_content_select'] ) {
				if ( $cb_content['cb_show_googlemap'] && $cb_content['cb_googlemap_address'] ) {
					 // Use custom marker in Theme Options
					if ( 'type1' === $cb_content['cb_googlemap_marker_type'] && 'type2' === $dp_options['gmap_marker_type'] ) {
						$marker_color = $dp_options['gmap_marker_color'];
						$marker_bg = $dp_options['gmap_marker_bg'];
					// Use custom overlay in content
					} elseif ( 'type3' === $cb_content['cb_googlemap_marker_type'] ) {
						$marker_color = $cb_content['cb_googlemap_marker_color'];
						$marker_bg = $cb_content['cb_googlemap_marker_bg'];
					}

					$css[] = '#p-index-pr__map--' . ( $key + 1 ) . ' .p-index-pr__map-custom-marker-inner { background: ' . esc_html( $marker_bg ) . '; color: ' . esc_html( $marker_color ) . '; }';
					$css[] = '#p-index-pr__map--' . ( $key + 1 ) . ' .p-index-pr__map-custom-marker-inner::after { border-color: ' . esc_html( $marker_bg ) . ' transparent transparent transparent; }';

					if ( $cb_content['cb_map_link'] ) {
						$css[] = '#' . $cb_index . ' .p-index-pr__map-link a { background: ' . esc_html( $cb_content['cb_map_link_bg'] ) . '; border: 1px solid ' . esc_html( $cb_content['cb_map_link_border_color'] ) . '; color: ' . esc_html( $cb_content['cb_map_link_color'] ) . '; }';
						$css[] = '#' . $cb_index . ' .p-index-pr__map-link a:hover { background: ' . esc_html( $cb_content['cb_map_link_bg_hover'] ) . '; border: 1px solid ' . esc_html( $cb_content['cb_map_link_border_color_hover'] ) . '; color: ' . esc_html( $cb_content['cb_map_link_color_hover'] ) . '; }';
					}
				}
			}
		}
	}

	if ( $css ) {
		echo implode( "\n", $css ) . "\n";
	}
	if ( $css_mobile ) {
		echo "@media only screen and (max-width: 991px) {\n";
		echo "\t" . implode( "\n\t", $css_mobile ) . "\n";
		echo "}\n";
	}
	if ( $css_sp ) {
		echo "@media only screen and (max-width: 767px) {\n";
		echo "\t" . implode( "\n\t", $css_sp ) . "\n";
		echo "}\n";
	}
}
?>
<?php /* Custom CSS */ ?>
<?php if ( $dp_options['css_code'] ) { echo $dp_options['css_code']; } ?>
</style>
<?php
}
add_action( 'wp_head', 'tcd_head' );

// Custom head/script
function tcd_custom_head() {
  $options = get_design_plus_option();

  if ( $options['custom_head'] ) {
    echo $options['custom_head'] . "\n";
  }
}
add_action( 'wp_head', 'tcd_custom_head', 9999 );