<?php
$dp_options = get_design_plus_option();
$active_sidebar = get_active_sidebar();
get_header();
?>
<main class="l-main">
<?php
get_template_part( 'template-parts/page-header' );
if ( $dp_options['show_breadcrumb_single_information'] ) :
	get_template_part( 'template-parts/breadcrumb' );
endif;

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		if ( $active_sidebar ) :
?>
	<div class="l-inner l-2columns">
<?php
		endif;
?>
		<article class="p-entry p-entry-information <?php echo $active_sidebar ? 'l-primary' : 'l-inner'; ?>">
<?php
		if ( $dp_options['show_thumbnail_information'] && has_post_thumbnail() ) :
			echo "\t\t\t\t" . '<div class="p-entry__thumbnail">';
			the_post_thumbnail( 'size5' );
			echo "</div>\n";
		endif;

		if ( $dp_options['show_date_information'] ) :
?>
			<div class="p-entry__date_title">
				<time class="p-entry__date p-article__date" datetime="<?php the_modified_time( 'c' ); ?>"><span class="p-article__date-day"><?php the_time( 'd' ); ?></span><span class="p-article__date-month"><?php echo mysql2date( 'M', $post->post_date, false ); ?></span><span class="p-article__date-year"><?php the_time( 'Y' ); ?></span></time>
				<h1 class="p-entry__title p-entry-information__title"><?php the_title(); ?></h1>
			</div>
<?php
		else :
?>
			<h1 class="p-entry__title p-entry-information__title"><?php the_title(); ?></h1>
<?php
		endif;
?>
			<div class="p-entry__inner">
<?php

		if ( $dp_options['show_sns_top_information'] ) :
			get_template_part( 'template-parts/sns-btn-top' );
		endif;
?>
				<div class="p-entry__body p-entry-information__body">
<?php
		the_content();

		if ( ! post_password_required() ) :
			wp_link_pages( array(
				'before' => '<div class="p-page-links">',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>'
			) );
		endif;
?>
				</div>
<?php
		if ( $dp_options['show_sns_btm_information'] ) :
			get_template_part( 'template-parts/sns-btn-btm' );
		endif;
?>
			</div>
<?php
		get_template_part( 'template-parts/advertisement' );

		$previous_post = get_previous_post();
		$next_post = get_next_post();
		if ( $dp_options['show_next_post_information'] && ( $previous_post || $next_post ) ) :
?>
			<ul class="p-entry__nav c-entry-nav">
<?php
			if ( $previous_post ) :
?>
				<li class="c-entry-nav__item c-entry-nav__item--prev"><a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" data-prev="<?php _e( 'Previous post', 'tcd-w' ); ?>"><span class="u-hidden-sm"><?php echo esc_html( mb_strimwidth( strip_tags( $previous_post->post_title ), 0, 82, '...' ) ); ?></span></a></li>
<?php
			else :
?>
				<li class="c-entry-nav__item c-entry-nav__item--empty"></li>
<?php
			endif;
			if ( $next_post ) :
?>
				<li class="c-entry-nav__item c-entry-nav__item--next"><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" data-next="<?php _e( 'Next post', 'tcd-w' ); ?>"><span class="u-hidden-sm"><?php echo esc_html( mb_strimwidth( strip_tags( $next_post->post_title ), 0, 82, '...' ) ); ?></span></a></li>
<?php
			else :
?>
				<li class="c-entry-nav__item c-entry-nav__item--empty"></li>
<?php
			endif;
?>
			</ul>
<?php
		endif;

		if ( $dp_options['show_recent_information'] ) :
			$args = array(
				'post_type' => $dp_options['information_slug'],
				'post_status' => 'publish',
				'post__not_in' => array( $post->ID ),
				'posts_per_page' => $dp_options['recent_information_num']
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
?>
			<section class="p-entry__recent-information">
<?php
				if ( $dp_options['recent_information_headline'] ) :
?>
				<h2 class="p-headline"><?php
					echo esc_html( $dp_options['recent_information_headline'] );
					if ( $dp_options['recent_information_link_text'] ) :
						echo '<a class="p-headline__link" href="' . esc_attr( get_post_type_archive_link( $dp_options['information_slug'] ) ) . '">' . esc_html( $dp_options['recent_information_link_text'] ) . '</a>';
					endif;
				?></h2>
<?php
				endif;
?>
				<div class="p-entry__recent-information__list">
<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
?>
					<article class="p-entry__recent-information__item">
						<a class="p-hover-effect--<?php echo esc_attr( $dp_options['hover_type'] ); ?>" href="<?php the_permalink(); ?>">
							<h3 class="p-entry__recent-information__item-title p-article-information__title p-article__title"><?php echo mb_strimwidth( strip_tags( get_the_title() ), 0, is_mobile() ? 98 : 186, '...' ); ?></h3>
<?php
					if ( $dp_options['show_date_information'] ) :
?>
							<p class="p-entry__recent-information__item-meta p-article__meta"><time class="p-entry__recent-information__item-date p-article__date" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'Y.m.d' ); ?></time></p>
<?php
					endif;
?>
						</a>
					</article>
<?php
				endwhile;
				wp_reset_postdata();
?>
				</div>
			</section>
<?php
			endif;
		endif;
?>
		</article>
<?php
	endwhile;
endif;

if ( $active_sidebar ) :
	get_sidebar();
?>
	</div>
<?php
endif;
?>
</main>
<?php get_footer(); ?>