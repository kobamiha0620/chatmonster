<?php
$dp_options = get_design_plus_option();
$active_sidebar = get_active_sidebar();
get_header();
?>
<main class="l-main">
<?php
get_template_part( 'template-parts/page-header' );
if ( $dp_options['show_breadcrumb_archive_voice'] ) :
	get_template_part( 'template-parts/breadcrumb' );
endif;

if ( $active_sidebar ) :
?>
	<div class="l-inner l-2columns">
		<div class="l-primary">
<?php
else :
?>
	<div class="l-inner">
<?php
endif;

if ( have_posts() ) :
?>
			<div class="p-archive-voice">
<?php
	while ( have_posts() ) :
		the_post();
?>
				<article class="p-archive-voice__item">
<?php
		if ( $dp_options['show_thumbnail_voice'] ) :
			echo "\t\t\t\t\t";
			echo '<div class="p-archive-voice__item-thumbnail js-object-fit-cover">';
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'size1' );
			else :
				echo '<img src="' . get_template_directory_uri() . '/img/no-image-300x300.gif" alt="">';
			endif;
			echo '</div>';
			echo "\n";
		endif;
?>
					<h3 class="p-archive-voice__item-title p-article-voice__title p-article__title"><?php the_title(); ?></h3>
					<div class="p-archive-voice__item-desc p-entry__body p-entry-voice__body">
<?php
		if ( post_password_required() ) :
			echo tcd_the_excerpt();
		else :
			the_content( '' );
		endif;
?>
					</div>
				</article>
<?php
	endwhile;
?>
			</div>
<?php
	$paginate_links = paginate_links( array(
		'current' => max( 1, get_query_var( 'paged' ) ),
		'next_text' => '&#xe910;',
		'prev_text' => '&#xe90f;',
		'total' => $wp_query->max_num_pages,
		'type' => 'array',
	) );
	if ( $paginate_links ) :
?>
			<ul class="p-pager p-pager-voice">
<?php
		foreach ( $paginate_links as $paginate_link ) :
?>
				<li class="p-pager__item<?php if ( strpos( $paginate_link, 'current' ) ) echo ' p-pager__item--current'; ?>"><?php echo $paginate_link; ?></li>
<?php
		endforeach;
?>
			</ul>
<?php
	endif;
endif;

if ( $active_sidebar ) :
?>
		</div>
<?php
	get_sidebar();
?>
	</div>
<?php
else :
?>
	</div>
<?php
endif;
?>
</main>
<?php get_footer(); ?>
