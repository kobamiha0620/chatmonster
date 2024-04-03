<?php
global $dp_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php if ( $dp_options['use_ogp'] ) { echo 'prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"'; } ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php seo_description(); ?>">
<meta name="viewport" content="width=device-width">
<?php if ( $dp_options['use_ogp'] ) { ogp(); } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( $dp_options['use_load_icon'] ) :
?>
<div id="site_loader_overlay">
	<div id="site_loader_animation" class="c-load--<?php echo esc_attr( $dp_options['load_icon'] ); ?>">
<?php
	if ( 'type3' === $dp_options['load_icon'] ) :
?>
		<i></i><i></i><i></i><i></i>
<?php
	endif;
?>
	</div>
</div>
<?php
endif;

if ( ( is_front_page() && ( 'type4' != $dp_options['header_bar_front'] || 'type4' != $dp_options['header_bar_front_mobile'] ) ) || ( ! is_front_page() && ( 'type4' != $dp_options['header_bar_sub'] || 'type4' != $dp_options['header_bar_sub_mobile'] ) ) ) :
?>
<header id="js-header" class="l-header">
	<div class="l-header__bar p-header__bar">
		<div class="p-header__bar__inner l-inner">
<?php
	$logotag = is_front_page() ? 'h1' : 'div';
	if ( 'yes' == $dp_options['use_header_logo_image'] && $image = wp_get_attachment_image_src( $dp_options['header_logo_image'], 'full' ) ) :
?>
			<<?php echo $logotag; ?> class="p-logo p-header__logo<?php if ( $dp_options['header_logo_image_retina'] ) { echo ' p-header__logo--retina'; } ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( $image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>"<?php if ( $dp_options['header_logo_image_retina'] ) echo ' width="' . floor( $image[1] / 2 ) . '"'; ?>></a>
			</<?php echo $logotag; ?>>
<?php
	else :
?>
			<<?php echo $logotag; ?> class="p-logo p-header__logo p-header__logo--text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</<?php echo $logotag; ?>>
<?php
	endif;

	if ( 'yes' == $dp_options['use_header_logo_image_mobile'] && $image = wp_get_attachment_image_src( $dp_options['header_logo_image_mobile'], 'full' ) ) :
?>
			<div class="p-logo p-header__logo--mobile<?php if ( $dp_options['header_logo_image_mobile_retina'] ) echo ' p-header__logo--retina'; ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( $image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>"<?php if ( $dp_options['header_logo_image_mobile_retina'] ) echo ' width="' . floor( $image[1] / 2 ) . '"'; ?>></a>
			</div>
<?php
	else :
?>
			<div class="p-logo p-header__logo--mobile p-header__logo--text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>
<?php
	endif;
?>
			<a href="#" id="js-menu-button" class="p-menu-button c-menu-button"></a>
<?php
	if ( has_nav_menu( is_front_page() ? 'global_front' : 'global_sub' ) ) :
		wp_nav_menu( array(
			'container' => 'nav',
			'container_class' => 'p-global-nav__container',
			'menu_class' => 'p-global-nav',
			'menu_id' => 'js-global-nav',
			'theme_location' => is_front_page() ? 'global_front' : 'global_sub',
			'link_after' => '<span></span>'
		) );
	endif;
?>
		</div>
	</div>
</header>
<?php
endif;
?>
