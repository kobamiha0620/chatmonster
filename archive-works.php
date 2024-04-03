<?php
$dp_options = get_design_plus_option();

get_header();
?>
<main class="l-main">
<?php
get_template_part( 'template-parts/page-header' );
if ( $dp_options['show_breadcrumb_archive_works'] ) :
	get_template_part( 'template-parts/breadcrumb' );
endif;
?>
	<div class="p-archive-works l-inner">
<?php
if ( is_tax( $dp_options['works_category_slug'] ) ) :
	$queried_object = get_queried_object();
	if ( ! empty( $queried_object->term_id ) ) :
		// works-archive-gallery.phpへ渡すグローバル変数
		global $works_archive_gallery_vars;
		$works_archive_gallery_vars = array(
			'works_category_id' => $queried_object->term_id
		);
	endif;
elseif ( $dp_options['works_archive_desc'] ) :
?>
		<div class="p-archive-works__desc"><?php echo str_replace(array( "\r\n", "\r", "\n" ), '<br>', $dp_options['works_archive_desc'] ); ?></div>
<?php
endif;

get_template_part( 'template-parts/works-archive-gallery' );
?>
	</div>
</main>
<?php get_footer(); ?>
