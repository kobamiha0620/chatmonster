<?php
$dp_options = get_design_plus_option();
$active_sidebar = get_active_sidebar();
get_header();
?>
<main class="l-main">
<?php
get_template_part( 'template-parts/page-header' );
if ( $dp_options['show_breadcrumb_archive_information'] ) :
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
			<div class="p-archive-information">
<?php
	while ( have_posts() ) :
		the_post();
?>
				<article class="p-archive-information__item">
					<a class="p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?>" href="<?php the_permalink(); ?>">
<?php
		if ( $dp_options['show_thumbnail_information'] ) :
			echo "\t\t\t\t\t\t";
			echo '<div class="p-archive-information__item-thumbnail p-hover-effect__image">';
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'size2' );
			else :
				echo '<img src="' . get_template_directory_uri() . '/img/no-image-600x600.gif" alt="">';
			endif;
			echo '</div>';
			echo "\n";
		endif;
?>
						<div class="p-archive-information__item-info">
							<h3 class="p-archive-information__item-title p-article-information__title p-article__title"><?php echo mb_strimwidth( strip_tags( get_the_title() ), 0, is_mobile() ? 52 : 80, '...' ); ?></h3>
<?php
		if ( $dp_options['show_date_information'] ) :
?>
							<p class="p-archive-information__item-meta p-article__meta"><time class="p-archive-information__item-date p-article__date" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'Y.m.d' ); ?></time></p>
<?php
		endif;
?>
						</div>
					</a>
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
			<ul class="p-pager p-pager-information">
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
