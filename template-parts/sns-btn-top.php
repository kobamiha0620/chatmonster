<?php
global $dp_options;
if ( ! $dp_options ) $dp_options = get_design_plus_option();
$title_encode = urlencode( get_the_title( $post->ID ) );
$url_encode = rawurlencode( get_permalink( $post->ID ) );
$thumnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
if($thumnail_image){
	$pinterestimage = $thumnail_image;
}else{
	$noimage = array();
	$noimage[0] = esc_url(get_bloginfo('template_url')) . "/img/no-image-600x600.gif";
	$pinterestimage = $noimage;
}
?>
<div class="single_share ">
<div class="share-<?php echo esc_attr( $dp_options['sns_type_top'] ); ?> share-top">
<?php
// Type5
if ( $dp_options['sns_type_top'] === 'type5' ) :
?>
	<div class="sns_default_top">
		<ul class="clearfix">
<?php 
		if ( $dp_options['show_twitter_top'] ) : 
?>
			<li class="default twitter_button">
				<a href="https://twitter.com/share" class="twitter-share-button">Post</a>
			</li>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php 
		endif; 
		if ( $dp_options['show_fblike_top'] ) : 
?>
			<li class="default <?php echo ( is_mobile() ) ? 'facebook' : 'fblike'; ?>_button">
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share=""></div>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_fbshare_top'] ) : 
?>
			<li class="default <?php echo ( is_mobile() ) ? 'facebook' : 'fbshare'; ?>_button2">
				<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_hatena_top'] ) : 
?>
			<li class="default hatena_button">
				<a href="//b.hatena.ne.jp/entry/<?php the_permalink();?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="<?php echo ( is_mobile() ) ? 'simple' : 'standard'; ?>-balloon" data-hatena-bookmark-lang="<?php echo get_locale() === 'ja' ? 'ja' : 'en' ?>" title="このエントリーをはてなブックマークに追加"><img src="//b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_pocket_top'] ) : 
?>
			<li class="default pocket_button">
				<div class="socialbutton pocket-button">
					<a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en"></a>
				</div>
			</li>
			<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php 
		endif; 
?>
<?php 
		if ( $dp_options['show_feedly_top'] ) : 
?>
			<li class="default feedly_button">
				<a href='//feedly.com/i/subscription/feed%2F<?php bloginfo('rss2_url'); ?>' target='blank'><img id='feedlyFollow' src='//s1.feedly.com/legacy/feedly-follow-rectangle-flat-small_2x.png' alt='follow us in feedly' width='66' height='20'></a>
			</li>
<?php 
		endif; 
		if ( ($dp_options['show_pinterest_top'] && $dp_options['sns_type_top'] == 'type5') ): 
?>
			<li class="default pinterest_button">
				<a data-pin-do="buttonPin" data-pin-color="red" data-pin-count="beside" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title_encode ?>"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
			</li>
			<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php 
		endif; 
?>
	</ul>
</div>
<?php
// Type1, Type2, Type3, Type4
else :
	// for Mobile
	if ( is_mobile() ) :
?>
	<div class="sns">
		<ul class="<?php echo esc_attr( $dp_options['sns_type_top'] ); ?> clearfix">
<?php 
		if ( $dp_options['show_twitter_top'] ) : 
?>
			<li class="twitter">
				<a href="https://twitter.com/intent/tweet?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=<?php echo $dp_options['twitter_info']; ?>&tw_p=tweetbutton&related=<?php echo $dp_options['twitter_info']; ?>"><i class="icon-twitter"></i><span class="ttl">Post</span><span class="share-count"><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_fbshare_top'] ) : 
?>
			<li class="facebook">
				<a href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;t=<?php echo $title_encode ?>" class="facebook-btn-icon-link" target="blank" rel="nofollow"><i class="icon-facebook"></i><span class="ttl">Share</span><span class="share-count"><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_hatena_top'] ) : ?>
			<li class="hatebu">
				<a href="//b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>"><i class="icon-hatebu"></i><span class="ttl">Hatena</span><span class="share-count"><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_pocket_top'] ) : 
?>
			<li class="pocket">
				<a href="//getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><i class="icon-pocket"></i><span class="ttl">Pocket</span><span class="share-count"><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_rss_top'] ) : 
?>
			<li class="rss">
				<a href="<?php bloginfo('rss2_url'); ?>"><i class="icon-rss"></i><span class="ttl">RSS</span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_feedly_top'] ) : 
?>
			<li class="feedly">
				<a href="https://feedly.com/index.html#subscription/feed/<?php bloginfo('rss2_url'); ?>"><i class="icon-feedly"></i><span class="ttl">feedly</span><span class="share-count"><?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_pinterest_top'] ) : 
?>
			<li class="pinterest">
				<a rel="nofollow" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode; ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title_encode ?>" data-pin-do="buttonPin" data-pin-custom="true"><i class="icon-pinterest"></i><span class="ttl">Pin&nbsp;it</span></a>
			</li>
<?php
		endif; 
?>
		</ul>
	</div>
<?php
	// for PC 
	else :
?> 
	<div class="sns mt10">
		<ul class="<?php echo esc_attr( $dp_options['sns_type_top'] ); ?> clearfix">
<?php 
		if ( $dp_options['show_twitter_top'] ) : 
?>
			<li class="twitter">
				<a href="https://twitter.com/intent/tweet?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=<?php echo $dp_options['twitter_info']; ?>&tw_p=tweetbutton&related=<?php echo $dp_options['twitter_info']; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"><i class="icon-twitter"></i><span class="ttl">Post</span><span class="share-count"><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_fbshare_top'] ) : 
?>
			<li class="facebook">
				<a href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;t=<?php echo $title_encode ?>" class="facebook-btn-icon-link" target="blank" rel="nofollow"><i class="icon-facebook"></i><span class="ttl">Share</span><span class="share-count"><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_hatena_top'] ) : 
?>
			<li class="hatebu">
				<a href="//b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" ><i class="icon-hatebu"></i><span class="ttl">Hatena</span><span class="share-count"><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></span></a>
			</li>
<?php 
		endif; 
?>
<?php 
		if ( $dp_options['show_pocket_top'] ) : 
?>
			<li class="pocket">
				<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>" target="blank"><i class="icon-pocket"></i><span class="ttl">Pocket</span><span class="share-count"><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_rss_top'] ) : 
?>
			<li class="rss">
				<a href="<?php bloginfo('rss2_url'); ?>" target="blank"><i class="icon-rss"></i><span class="ttl">RSS</span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_feedly_top'] ) : 
?>
			<li class="feedly">
				<a href="https://feedly.com/index.html#subscription/feed/<?php bloginfo('rss2_url'); ?>" target="blank"><i class="icon-feedly"></i><span class="ttl">feedly</span><span class="share-count"><?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></span></a>
			</li>
<?php 
		endif; 
		if ( $dp_options['show_pinterest_top'] ) : 
?>
			<li class="pinterest">
				<a rel="nofollow" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title_encode ?>" data-pin-do="buttonPin" data-pin-custom="true"><i class="icon-pinterest"></i><span class="ttl">Pin&nbsp;it</span></a>
			</li>
<?php 
		endif; 
?>
		</ul>
	</div>
<?php
	endif; 
endif;
?>
</div>
</div>