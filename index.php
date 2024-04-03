<?php
$dp_options = get_design_plus_option();

if ( is_post_type_archive( $dp_options['information_slug'] ) ) :
	get_template_part( 'archive-information' );
	return;
elseif ( is_post_type_archive( $dp_options['works_slug'] ) || is_tax( $dp_options['works_category_slug'] ) ) :
	get_template_part( 'archive-works' );
	return;
elseif ( is_post_type_archive( $dp_options['voice_slug'] ) ) :
	get_template_part( 'archive-voice' );
	return;
endif;

$active_sidebar = get_active_sidebar();
get_header();
?>
<main class="l-main">
<?php
get_template_part( 'template-parts/page-header' );
if ( $dp_options['show_breadcrumb_archive'] ) :
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

if ( is_author() ):
	$author = get_queried_object();
	if ( $author->show_author ) :
		$sns_html = '';
		if ( $author->user_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--url"><a href="' . esc_attr( $author->user_url ) . '" target="_blank"></a></li>';
		endif;
		if ( $author->facebook_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--facebook"><a href="' . esc_attr( $author->facebook_url ) . '" target="_blank"></a></li>';
		endif;
		if ( $author->twitter_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--twitter"><a href="' . esc_attr( $author->twitter_url ) . '" target="_blank"></a></li>';
		endif;
		if ( $author->instagram_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--instagram"><a href="' . esc_attr( $author->instagram_url ) . '" target="_blank"></a></li>';
		endif;
		if ( $author->pinterest_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--pinterest"><a href="' . esc_attr( $author->pinterest_url ) . '" target="_blank"></a></li>';
		endif;
		if ( $author->youtube_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--youtube"><a href="' . esc_attr( $author->youtube_url ) . '" target="_blank"></a></li>';
		endif;
		if ( $author->contact_url ) :
			$sns_html .= '<li class="p-social-nav__item p-social-nav__item--contact"><a href="' . esc_attr( $author->contact_url ) . '" target="_blank"></a></li>';
		endif;
?>
			<div class="p-author">
				<div class="p-author__box">
					<div class="p-author__thumbnail">
						<?php echo get_avatar( $author->ID, 300 ); ?>
					</div>
					<div class="p-author__info">
						<h3 class="p-author__title"><?php echo esc_html( $author->display_name ); ?></h3>
						<div class="p-author__desc"><?php
		// URL自動リンク
		$pattern = '/(href=")?https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+/';
		$desc = preg_replace_callback( $pattern, function( $matches ) {
			// 既にリンクの場合はそのまま
			if ( isset( $matches[1] ) ) return $matches[0];
			return "<a href=\"{$matches[0]}\" target=\"_blank\">{$matches[0]}</a>";
		}, $author->description );
		echo wpautop( trim( $desc ) );
						?></div>
<?php
		if ( $sns_html ) :
?>
						<ul class="p-social-nav"><?php echo $sns_html; ?></ul>
<?php
		endif;
?>
					</div>
				</div>
			</div>
<?php
	endif;
endif;

if ( have_posts() ) :
?>
			<div class="p-blog-archive">
<?php
	while ( have_posts() ) :
		the_post();

		$catlist_float = array();
		if ( $dp_options['show_category'] && has_category() ) :
			$categories = get_the_category();
			if ( $categories && ! is_wp_error( $categories ) ) :
				foreach( $categories as $category ) :
					$catlist_float[] = '<span class="p-category-item" data-url="' . get_category_link( $category ) . '">' . esc_html( $category->name ) . '</span>';
					break;
				endforeach;
			endif;
		endif;
?>
				<article class="p-blog-archive__item">
					<a class="p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?>" href="<?php the_permalink(); ?>">
<?php
		if ( $dp_options['show_date'] ) :
?>
						<time class="p-blog-archive__item-date p-article__date" datetime="<?php the_time( 'c' ); ?>"><span class="p-article__date-day"><?php the_time( 'd' ); ?></span><span class="p-article__date-month"><?php echo mysql2date( 'M', $post->post_date, false ); ?></span><span class="p-article__date-year"><?php the_time( 'Y' ); ?></span></time>
<?php
		endif;
?>
						<div class="p-blog-archive__item__inner">
							<div class="p-blog-archive__item-thumbnail p-hover-effect__image js-object-fit-cover">
<?php
		echo "\t\t\t\t\t\t\t\t";
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'size4' );
		else :
			echo '<img src="' . get_template_directory_uri() . '/img/no-image-600x600.gif" alt="">';
		endif;
		echo "\n";

		if ( $catlist_float ) :
?>
								<div class="p-float-category"><?php echo implode( '', $catlist_float ); ?></div>
<?php
		endif;
?>
							</div>
							<h2 class="p-blog-archive__item-title p-article-<?php echo esc_attr( $post->post_type ); ?>__title p-article__title"><?php the_title(); ?></h2>
							<p class="p-blog-archive__item-excerpt"><?php echo tcd_the_excerpt(); ?></p>
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
			<ul class="p-pager">
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
else :
?>
			<p class="no_post"><?php _e( 'There is no registered post.', 'tcd-w' ); ?></p>
<?php
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
