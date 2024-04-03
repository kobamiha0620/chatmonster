jQuery(function($){

	/**
	 * グローバルナビゲーション モバイル
	 */
	$('#js-menu-button').click(function() {
		var w = window.innerWidth || $('#js-header').width();
		if (w < 1200) {
			$(this).toggleClass('is-active');
			$('#js-global-nav').stop().slideToggle(500);
		}
		return false;
	});
	$('#js-global-nav .menu-item-has-children > a span').click(function() {
		var w = window.innerWidth || $('#js-header').width();
		if (w < 1200) {
			$(this).toggleClass('is-active');
			$(this).closest('.menu-item-has-children').toggleClass('is-active').find('> .sub-menu').stop().slideToggle(300);
		}
		return false;
	});
	$('#js-global-nav a').click(function() {
		var w = window.innerWidth || $('#js-header').width();
		if (w < 1200) {
			if ($(this).is('[href^="#"]')) {
				$('#js-global-nav').removeClass('is-active').stop().slideToggle(300);
			}
		}
	});

	/**
	 * スムーススクロール
	 */
	$('a[href^="#"]').click(function() {
		if (this.hash) {
			if ($(this.hash).length) {
				var t = $(this.hash).offset().top;
				var w = window.innerWidth || $('#js-header').width();
				if (w < 992) {
					if ($('body').hasClass('l-header--type2--mobile') || $('body').hasClass('l-header--type3--mobile')) {
						t -= 60;
					}
				} else {
					if ($('body').hasClass('l-header--type2') || $('body').hasClass('l-header--type3')) {
						t -= 80;
					}
				}
				$('body, html').animate({
					scrollTop: t
				}, 800);
				return false;
			}
		}
	});

	/**
	 * ページトップ
	 */
	var pagetop = $('#js-pagetop');
	pagetop.hide().click(function() {
		$('body, html').animate({
			scrollTop: 0
		}, 1000);
		return false;
	});
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			pagetop.fadeIn(1000);
		} else {
			pagetop.fadeOut(300);
		}
	});

	/**
	 * 記事一覧でのカテゴリークリック
	 */
	$('a span[data-url]').hover(
		function(){
			var $a = $(this).closest('a');
			$a.attr('data-href', $a.attr('href'));
			if ($(this).attr('data-url')) {
				$a.attr('href', $(this).attr('data-url'));
			}
		},
		function(){
			var $a = $(this).closest('a');
			$a.attr('href', $a.attr('data-href'));
		}
	);

	/**
	 * コメント
	 */
	if ($('#js-comment__tab').length) {
		var commentTab = $('#js-comment__tab');
		commentTab.find('a').click(function() {
			if (!$(this).parent().hasClass('is-active')) {
				$($('.is-active a', commentTab).attr('href')).animate({opacity: 'hide'}, 0);
				$('.is-active', commentTab).removeClass('is-active');
				$(this).parent().addClass('is-active');
				$($(this).attr('href')).animate({opacity: 'show'}, 1000);
			}
			return false;
		});
	}

	/**
	 * カテゴリー ウィジェット
	 */
	$('.p-widget-categories li ul.children').each(function() {
		$(this).closest('li').addClass('has-children');
		$(this).hide().before('<span class="toggle-children"></span>');
	});
	$('.p-widget-categories .toggle-children').click(function() {
		$(this).closest('li').toggleClass('is-active').find('> ul.children').slideToggle();
	});
	$('.p-widget-categories li.current-cat').each(function() {
		$(this).parents('.has-children').each(function() {
			$(this).addClass('is-active').find('> ul.children').show();
		});
	});

	/**
	 * アーカイブウィジェット
	 */
	if ($('.p-dropdown').length) {
		$('.p-dropdown__title').click(function() {
			$(this).toggleClass('is-active');
			$('+ .p-dropdown__list:not(:animated)', this).slideToggle();
		});
	}

	/**
	 * WP検索ウィジェット
	 */
	$('.p-widget .searchform #searchsubmit').val($('<div>').html('&#xe915;').text());

	/**
	 * object-fit: cover未対応ブラウザ対策
	 */
	var ua = window.navigator.userAgent.toLowerCase();
	if (ua.indexOf('msie') > -1 || ua.indexOf('trident') > -1) {
		// object-fit: cover前提のcssをリセット
		var init_object_fit_cover = function(el) {
			$(el).css({
				width: 'auto',
				height: 'auto',
				maxWidth: 'none',
				minWidth: '100%',
				minHeight: '100%',
				top : 0,
				left : 0
			});
		};

		// サイズに応じてcss指定
		var fix_object_fit_cover = function(el) {
			$(el).each(function(){
				var $cl, cl_w, cl_h, cl_ratio, img_w, img_h, img_ratio, inc_ratio;
				$cl = $(this).closest('.js-object-fit-cover');
				cl_w = $cl.innerWidth();
				cl_h = $cl.innerHeight();
				cl_ratio = cl_w / cl_h;
				img_w = $(this).width();
				img_h = $(this).height();
				img_ratio = img_w / img_h;
				inc_ratio = cl_ratio - img_ratio;

				// 同じ縦横比
				if (inc_ratio >= 0 && inc_ratio < 0.1 || inc_ratio <= 0 && inc_ratio > -0.1) {
					$(this).removeAttr('style');

				// 縦長
				} else if (cl_ratio > img_ratio) {
					var t = (cl_w / img_w * img_h - cl_h) / 2 * -1;
					if (t < 0) {
						$(this).css({
							width: '100%',
							top: t
						});
					}

				// 横長・正方形
				} else {
					var l = (cl_h / img_h * img_w - cl_w) / 2 * -1;
					if (l < 0) {
						$(this).css({
							height: '100%',
							left: l
						});
					}
				}
			});
		};

		// cssリセット
		init_object_fit_cover($('.js-object-fit-cover img'));

		// 画像読み込み時処理
		$('.js-object-fit-cover img').load(function(){
			fix_object_fit_cover(this);
		}).each(function(){
			if (this.complete || this.readyState === 4 || this.readyState === 'complete') {
				fix_object_fit_cover(this);
			}
		});

		var object_fit_cover_resize_timer;
		$(window).on('resize', function(){
			clearTimeout(object_fit_cover_resize_timer);
			object_fit_cover_resize_timer = setTimeout(function(){
				$('.js-object-fit-cover img').each(function(){
					init_object_fit_cover(this);
					fix_object_fit_cover(this);
				});
			}, 500);
		});
	}

	/**
	 * モーダルCTA表示
	 */
	var show_modal_cta = function() {
		setTimeout(function(){
			$('#js-modal-cta').addClass('is-active');

			// Video自動再生
			if ($('#js-modal-cta--video[data-autoplay="1"]').length) {
				$('#js-modal-cta--video').get(0).play();

			// Youtube自動再生
			} else if ($('#js-modal-cta--youtube[data-src]').length) {
				$('#js-modal-cta--youtube').attr('src', $('#js-modal-cta--youtube').attr('data-src'));
			}
		}, $('#js-modal-cta').attr('data-delay') * 1000 || 0);
	}

	/**
	 * モーダルCTA表示 ロードアイコン前
	 */
	if ($('#js-modal-cta[data-delay-type="0"]').length) {
		show_modal_cta();
	}

	/**
	 * モーダルCTA 閉じる
	 */
	$('.p-modal-cta__close').click(function(){
		$('#js-modal-cta').removeClass('is-active');
		setTimeout(function(){
			$('#js-modal-cta').remove();
		}, 500);
	});

	$(document).on('click', function(event){
		if($('#js-modal-cta').hasClass("is-active")){
			if(!$(event.target).closest('.p-modal-cta__inner').length){
				$('#js-modal-cta').removeClass("is-active");
				setTimeout(function(){
					$('#js-modal-cta').remove();
				}, 500);
			}
		}
	});

	/**
	 * 初期化処理
	 */
	$(document).on('js-initialized', function(){
		/**
		 * モーダルCTA表示 ロードアイコン後
		 */
		if ($('#js-modal-cta[data-delay-type="1"]').length) {
			show_modal_cta();
		}

		/**
		 * ページヘッダー
		 */
		if ($('#js-page-header').length) {
			$('#js-page-header').addClass('is-active');
		}
		$(window).trigger('resize');

		/**
		 * パララックス
		 */
		if ($('.has-bg-image-parallax').length) {
			var parallaxVars = {
				// スクロール係数
				// ここの乗数を0～1の間で変えることで視差調整が可能。0=通常表示、1=background-attachment: fixed;と同等表示
				speed: 0.4,

				// パララックス開始するスクロールオフセット
				// 0だと早いスクロール時に背景画像の移動が見える可能性がある
				scrollOffset: 80,

				images: [],
				timer: null,
				winWidth: 0,
				winHeight: window.innerHeight || $(window).innerHeight()
			};

			// パララックススクロール処理
			var parallaxBgScroll = function() {
				var winScrollTop = $(window).scrollTop();

				$('.has-bg-image-parallax').each(function(i){
					var offsetTop = $(this).offset().top;

					// この領域がブラウザに表示されている場合
					if ((winScrollTop + parallaxVars.winHeight + parallaxVars.scrollOffset > offsetTop) && (offsetTop + $(this).innerHeight() + parallaxVars.scrollOffset > winScrollTop)) {
						var offsetY = Math.round(((winScrollTop - offsetTop) * parallaxVars.speed) * 2) / 2;
						$(this).css('backgroundPositionY', offsetY);
					}
	 			});
			};
			$(window).on('load scroll', parallaxBgScroll);

			// 背景画像サイズ計算
			var parallaxCalcBgImageSize = function(i, imgonload){
				if (!parallaxVars.images[i].img.complete) return;

				var img = parallaxVars.images[i].img;
				var $box = $('.has-bg-image-parallax[data-src]').eq(i);
				var box_h = $box.innerHeight();

				// パララックススクロール込みで必要な画像の高さ
				var requireHeight;
				if (parallaxVars.winHeight > box_h) {
					requireHeight = Math.ceil(parallaxVars.winHeight * parallaxVars.speed + box_h);
				} else {
					requireHeight = box_h;
				}

				var parallax_ratio, img_ratio;
				parallax_ratio = $box.innerWidth() / requireHeight;
				img_ratio = img.width / img.height;

				// 画像の方が横長
				if (parallax_ratio < img_ratio) {
					var backgroundSizeRasio = requireHeight / img.height;
					var backgroundSizeX = Math.ceil(requireHeight / img.height * img.width);
					$box.css('backgroundSize', backgroundSizeX + 'px ' + requireHeight + 'px');
				// 画像の方が縦長
				} else {
					$box.css('backgroundSize', 'cover');
				}

				if (imgonload) {
					parallaxBgScroll();
				}
			};

			// 背景画像にセット
			$('.has-bg-image-parallax[data-src]').each(function(i){
				var src = $(this).attr('data-src');
				$(this).css('backgroundImage', 'url(' + $(this).attr('data-src') + ')');

				// 画像サイズ取得
				parallaxVars.images[i] = {};
				parallaxVars.images[i].img = new Image();
				var img = parallaxVars.images[i].img;
				img.onload = function() {
					parallaxCalcBgImageSize(i, true);
				};
				img.src = src;
				if (img.complete) {
					parallaxCalcBgImageSize(i, true);
				}
			});

			// リサイズ
			$(window).on('resize', function(){
				var w = window.innerWidth || $('body').width();
				var h = window.innerHeight || $(window).innerHeight();
				if (parallaxVars.winWidth !== w || parallaxVars.winHeight !== h) {
					parallaxVars.winWidth = w;
					parallaxVars.winHeight = h;
					$('.has-bg-image-parallax').each(function(i){
						parallaxCalcBgImageSize(i);
					});
					parallaxBgScroll();
				}
			});
		}

		/**
		 * スライダーウィジェット
		 */
		if ($('.p-widget-slider').length) {
			$('.p-widget-slider').each(function(){
				$(this).slick({
					adaptiveHeight: false,
					arrows: true,
					prevArrow: '<button type="button" class="slick-prev">&#xe90f;</button>',
					nextArrow: '<button type="button" class="slick-next">&#xe910;</button>',
					autoplay: true,
					autoplaySpeed: $(this).attr('data-interval') * 1000 || 7000,
					dots: false,
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					speed: 1000
				});
			});
		}
	});

});
