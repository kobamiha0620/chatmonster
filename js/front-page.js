jQuery(function($){

	// モバイル判別
	var ua = window.navigator.userAgent.toLowerCase();
	var isMobile = (ua.indexOf('iphone') > -1 || ua.indexOf('ipod') > -1  || ua.indexOf('ipad') > -1 || ua.indexOf('android') > -1);

	/**
	 * 初期化処理
	 */
	$(document).on('js-initialized', function(){
		/**
		 * モバイル全高表示でcssでのvh指定だとアドレスバー分ずれる対策初期化処理
		 */
		var hcmlLastWidth = 0;
		var hcmlLastHeight = 0;
		var setHeaderContentMobileHeight = function(){
			var w = window.innerWidth || $('body').width();
			var h = window.innerHeight || $(window).innerHeight();
			if (isMobile && hcmlLastWidth === w || (!isMobile && hcmlLastWidth === w && hcmlLastHeight === h)) return;
			hcmlLastWidth = w;
			hcmlLastHeight = h;

			if (w > 767) {
				$('.p-index-video, .p-index-slider, .p-index-slider .slick-list, .p-header-content__image > img, #js-index-youtube').removeAttr('style');
			} else {
				// ヘッダーバー分減らす
				h -= $('body.l-header--type1--mobile #js-header,body.l-header--type2--mobile #js-header').height();

				// アドミンバー分減らす
				h -= $('#wpadminbar').height();

				$('.p-index-video, .p-index-slider, .p-index-slider .slick-list, .p-header-content__image > img').height(h);

				// youtubeの場合16：9に合わせて左右をはみ出して表示
				if ($('#js-index-youtube').length) {
					var ytw = Math.ceil(h / 9 * 16);
					var ytl = (ytw - w) / -2;
					$('#js-index-youtube').css({
						width: ytw,
						left: ytl
					});
				}
			}
		};

		/**
		 * header video/youtube
		 */
		if ($('.p-index-video').length) {
			setHeaderContentMobileHeight();
			$(window).on('resize', function(){
				setHeaderContentMobileHeight();
			});
		}

		/**
		 * header video
		 */
		if ($('#js-index-video').length) {
			$('#js-index-video').get(0).play();

			// モーダルCTA表示中は閉じてからアクティブ化
			if ($('#js-modal-cta.is-active').length) {
				$(document).on('click', function(event){
					setTimeout(function(){
						$('.p-index-video').addClass('is-active');
					}, 500);
				});
			} else {
				$('.p-index-video').addClass('is-active');
			}
		}

		/**
		 * header youtube
		 */
		if ($('#js-index-youtube').length) {
			var $youtube = $('#js-index-youtube');
			$youtube.on('load', function(){
				if (!$('#js-modal-cta.is-active').length) {
					$youtube.closest('.p-index-video').addClass('is-active');
				}
				$youtube.animate({opacity:1}, 300).get(0).contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
			});

			// loadイベントが発火しない対策
			if ($youtube.attr('data-src')) {
				$youtube.attr('src', $youtube.attr('data-src'));
			}

			// モーダルCTA表示中は閉じてからアクティブ化
			if ($('#js-modal-cta.is-active').length) {
				$(document).on('click', function(event){
					setTimeout(function(){
						$youtube.closest('.p-index-video').addClass('is-active');
					}, 500);
				});
			}
		}

		/**
		 * header slider
		 */
		if ($('#js-index-slider').length) {
			var $slider = $('#js-index-slider');
			var $slides = $('#js-index-slider .p-index-slider__item');

			$slider.slick({
				adaptiveHeight: true,
				arrows: false,
				prevArrow: '<button type="button" class="slick-prev">&#xe90f;</button>',
				nextArrow: '<button type="button" class="slick-next">&#xe910;</button>',
				autoplay: true,
				autoplaySpeed: $('#js-index-slider').attr('data-interval') * 1000 || 7000,
				dots: $slides.length > 1,
				fade: true,
				infinite: true,
				lazyLoad: 'progressive',
				slide: '.p-index-slider__item',
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 600,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							dots: false
						}
					}
				]
			});

			// モバイル全高表示でcssでのvh指定だとアドレスバー分ずれる対策
			setHeaderContentMobileHeight();

			// first slide activate
			setTimeout(function(){
				$slider.addClass('is-active');
				$slides.filter('.slick-active').addClass('is-active');
			}, 600);

			// beforeChange
			$slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
				$slides.filter('.is-active').removeClass('is-active')
				$slides.filter('.slick-active').addClass('slick-last-active');
			});

			// afterChange
			$slider.on('afterChange', function(event, slick, currentSlide) {
				$slides.filter('.slick-active').addClass('is-active');
				$slides.filter('.slick-last-active').removeClass('slick-last-active');
			});

			// スマホ全高表示でのスライスがずれる対策
			var setMobileSliceLastWidth = 0;
			var setMobileSlice = function(baseimg) {
				var w = window.innerWidth || $('body').width();
				var $baseimg;
				if (baseimg) {
					if (w > 767) {
						$slider.find('.p-header-content__image-slice img').removeAttr('style');
						return;
					}
					$baseimg = $(baseimg);
				} else {
					// モバイル全高表示でcssでのvh指定だとアドレスバー分ずれる対策
					setHeaderContentMobileHeight();

					if (setMobileSliceLastWidth === w) return;
					setMobileSliceLastWidth = w;
					if (w > 767) {
						$slider.find('.p-header-content__image-slice img').removeAttr('style');
						return;
					}

					$baseimg = $slider.find('.p-header-content__image > img[src]');
				}

				$baseimg.each(function(){
					if (this.complete || this.readyState === 4 || this.readyState === 'complete') {
						var $cl, img, box_w, box_w8, box_h, box_ratio, img_w, img_h, img_ratio;
						$cl = $(this).closest('.p-header-content__image');

						img = new Image();
						img.onload = function(){
							box_w = $cl.width();
							box_w8 = box_w / 8;
							box_h = $cl.height();
							box_ratio = box_w / box_h;
							img_w = img.width;
							img_h = img.height;
							img_ratio = img_w / img_h;

							// コンテナの方が縦長 = 画像の左右が切れる
							if (box_ratio < img_ratio) {
								// 左に見切れているサイズ
								var l = (box_h / img_h * img_w - box_w) / 2;
								for (var i = 1; i <= 8; i++) {
									$cl.find('.p-header-content__image-slice--' + i + ' img').removeAttr('style').css('left', ((i - 1) * box_w8 + l) * -1 );
								}

							// コンテナの方が横長 = 画像の上下が切れる
							} else if (box_ratio > img_ratio) {
								// 上に見切れているサイズ
								var t = (box_w / img_w * img_h - box_h) / 2 * -1;
								$cl.find('.p-header-content__image-slice img').removeAttr('style').css({
									bottom: t,
									height: 'auto',
									top: t,
									width: '800%'
								});
							}
						};

						img.src = this.src;
					}
				});
			};

			// スライド2枚目以降
			$slider.find('.p-header-content__image > img').on('load', function(){
				setMobileSlice(this);

			// スライド1枚目
			}).first().each(function(){
				if (this.complete || this.readyState === 4 || this.readyState === 'complete') {
					setMobileSlice(this);
				}
			});

			$slider.on('setPosition', function(event, slick) {
				setMobileSlice();
			});
		}else{ // スライダーが選択されていないときで、かつMP4動画もYouTubeも非表示になっている＝スマホ表示の場合
			if(!$('#js-index-youtube').length && !$('#js-index-video').length){
				$('.p-index-video').addClass('is-active');	
			}
		}

		/**
		 * header content mobile arrow
		 */
		$('.p-header-content__mobile-arrow').click(function(){
			var $cl = $(this).closest('.p-index-slider, .p-index-video');
			if ($cl.length) {
				$('body, html').animate({
					scrollTop: $cl.offset().top + $cl.outerHeight()
				}, 500);
			}
			return false;
		});

		/**
		 * コンテンツビルダー カルーセル
		 */
		if ($('.p-index-carousel').length) {
			$('.p-index-carousel').each(function(){
				var $slider = $(this);
				var $slides = $('.p-index-carousel__item', this);

				$slider.slick({
					adaptiveHeight: true,
					arrows: true,
					prevArrow: '<button type="button" class="slick-prev">&#xe90f;</button>',
					nextArrow: '<button type="button" class="slick-next">&#xe910;</button>',
					autoplay: true,
					autoplaySpeed: $slider.attr('data-interval') * 1000 || 7000,
					dots: false,
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
					speed: 1000,
					responsive: [
						{
							breakpoint: 992,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},
					]
				});
			});
		}
	});

	$(document).on('js-initialized-after', function(){
		/**
		 * headline inview fedein
		 */
		$('.p-cb__item .p-cb__item-headline').one('inview', function(event, isInView) {
			if (isInView) {
				$(this).closest('.p-cb__item').addClass('is-active');
			}
		});
	});

	/**
	 * コンテンツビルダー MAP
	 */
	if ($('.p-index-pr__map').length) {
		$(window).load(function(){
			PBCustomOverlay.prototype = new google.maps.OverlayView();

			function PBCustomOverlay(bounds, image, map, text) {
				this.bounds_ = bounds;
				this.image_ = image;
				this.map_ = map;
				this.text_ = text;
				this.div_ = null;
				this.setMap(map);
			}

			PBCustomOverlay.prototype.onAdd = function() {
				var div = document.createElement('div');
				div.className = 'p-index-pr__map-custom-marker';
				div.style.borderStyle = 'none';
				div.style.borderWidth = '0px';
				div.style.position = 'absolute';

				var inner = document.createElement('div');
				inner.className = 'p-index-pr__map-custom-marker-inner';

				if (this.image_) {
					var img = document.createElement('img');
					img.src = this.image_;
					img.className = 'p-index-pr__map-custom-marker-img';
					inner.appendChild(img);
				} else {
					inner.textContent = this.text_;
				}

				div.appendChild(inner);

				this.div_ = div;
				var panes = this.getPanes();
				panes.overlayLayer.appendChild(div);
			};

			PBCustomOverlay.prototype.draw = function() {
				var overlayProjection = this.getProjection();
				var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
				var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());
				var div = this.div_;
				div.style.left = sw.x + 'px';
				div.style.top = ne.y + 'px';
				div.style.width = (ne.x - sw.x) + 'px';
				div.style.height = (sw.y - ne.y) + 'px';
			};

			PBCustomOverlay.prototype.onRemove = function() {
				this.div_.parentNode.removeChild(this.div_);
				this.div_ = null;
			};

			$('.p-index-pr__map').each(function(){
				if (!this.id) return;

				var mapId = this.id;
				var address = $(this).attr('data-address');
				var mapSaturation = $(this).attr('data-saturation');
				var useCustomMarker = $(this).attr('data-custom-marker');
				var markerImage = $(this).attr('data-marker-image');
				var markerText = $(this).attr('data-marker-text');

				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({'address': address}, function(results, status) {
					if (status == 'OK') {
						var mapOptions = {
							center: results[0].geometry.location,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							disableDefaultUI: true,
							zoom: 18,
							styles: [{
								stylers: [{
									saturation: mapSaturation
								}]
							}]
						};
						var map = new google.maps.Map(document.getElementById(mapId), mapOptions);
						if (useCustomMarker) {
							var swBound = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
							var neBound = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
							var bounds = new google.maps.LatLngBounds(swBound, neBound);
							var overlay = new PBCustomOverlay(bounds, markerImage, map, markerText);
						} else {
							var marker = new google.maps.Marker({
								position: results[0].geometry.location,
								map: map
							});
						}
					}
				});
			});
		});
	}

});
