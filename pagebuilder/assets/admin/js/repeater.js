jQuery(document).ready(function($){

	var $pb_metabox = $('#page_builder-metabox');
	if (!$pb_metabox.size()) return false;

	if ($('.pb_repeater_wrap').size() == 0) return;

	// リピーター ソータブル
	var repeater_sortable = function(){
		$('.pb-rows-container .pb_repeater_wrap .pb_repeater_sortable:not(.ui-sortable)').sortable({
			handle: '.pb_repeater_move',
			tolerance: 'pointer'
		});

		// リピーター内リピーター ソータブル
		$('.pb-rows-container .pb_repeater_wrap .pb_repeater_level2_sortable:not(.ui-sortable)').sortable({
			handle: '.pb_repeater_level2_move',
			tolerance: 'pointer',
			axis: 'y'
		});
	};
	repeater_sortable();

	// リピーター アコーディオンの開閉
	$pb_metabox.on('click', '.pb_repeater .pb_repeater_headline', function(){
		$(this).closest('.pb_repeater').toggleClass('open');
		return false;
	});
	$pb_metabox.on('click', '.pb_repeater .pb_repeater_headline a', function(){
		$(this).closest('.pb_repeater').toggleClass('open');
		return false;
	});

	// リピーター タブ名
	$pb_metabox.on('change keyup', '.pb_repeater .index_label:input', function(){
		$(this).closest('.pb_repeater').find('span.index_label:first').text($(this).val());
	});

	// リピーター 追加ボタン
	$pb_metabox.on('click', '.pb_repeater_wrap .pb_add_repeater', function(){
		var $wrap = $(this).closest('.pb_repeater_wrap');
		var html = $wrap.find('.add_pb_repeater_clone').html();
		var next_index = parseInt($wrap.attr('data-rows')) || 0;

		next_index++;
		$wrap.find('.pb_repeater_sortable').append(html.replace(/pb_repeater_add_index/g, next_index));
		$wrap.attr('data-rows', next_index);

		// リッチエディターがある場合
		if (html.indexOf('wp-editor-area') > -1) {
			var $meta_wrap = $(this).closest('.postbox');
			var $row = $wrap.find('.pb_repeater-' + next_index);
			var $widget = $(this).closest('.pb-widget');
			var widget_id = $widget.attr('data-widget-id');
			var widget_index = $widget.attr('data-widget-index');

			// リッチエディター化が正常動作しなくなったため暫定的に遅延処理させる
			setTimeout(function(){
				// クローン元のリッチエディターをループ（リピーターではなくページビルダーのクローン元）
				$meta_wrap.find('.pb-clone .' + widget_id + ' .add_pb_repeater_clone .wp-editor-area').each(function(){
					var replace_widget_index = $(this).closest('.pb-widget').attr('data-widget-index');
					var regexp = new RegExp(replace_widget_index, 'g');

					// id
					var id_old = $(this).attr('id');
					var id_new = id_old.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);

					// クローン元のmceInitをコピー置換
					if (typeof tinyMCEPreInit.mceInit[id_old] != 'undefined') {
						// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
						var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_old]);
						mce_init_new.body_class = mce_init_new.body_class.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);
						mce_init_new.selector = mce_init_new.selector.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);
						tinyMCEPreInit.mceInit[id_new] = mce_init_new;

						// リッチエディター化
						tinymce.init(mce_init_new);

						// クローン前のリッチエディターを非表示に
						var $wp_editor_tinymce = $widget.find('#wp-'+id_new+'-wrap .mce-tinymce');
						if ($wp_editor_tinymce.length > 1) {
							$wp_editor_tinymce.not(':last').hide();
						}
					}

					// クローン元のqtInitをコピー置換
					if (typeof tinyMCEPreInit.qtInit[id_old] != 'undefined') {
						// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
						var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_old]);
						qt_init_new.id = qt_init_new.id.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);
						tinyMCEPreInit.qtInit[id_new] = qt_init_new;

						// テキスト入力のタグボタン有効化
						quicktags(tinyMCEPreInit.qtInit[id_new]);
						try {
							if (QTags.instances['0'].theButtons) {
								QTags.instances[id_new].theButtons = QTags.instances['0'].theButtons;
							}
						} catch(err) {
						}
					}

					// ビジュアル/テキストをクローン元に合わせる
					var $wp_editor_wrap_clone = $widget.find('#wp-'+id_old+'-wrap');
					var $wp_editor_wrap_new = $widget.find('#wp-'+id_new+'-wrap');
					setTimeout(function(){
						$wp_editor_wrap_new.show();
						if ($wp_editor_wrap_clone.hasClass('tmce-active')) {
							switchEditors.go(id_new, 'toggle');
							switchEditors.go(id_new, 'tmce');
						} else {
							switchEditors.go(id_new, 'toggle');
							switchEditors.go(id_new, 'html');
							$('#'+id_new).show();
						}
					}, 250);
				});
			}, 250);
		}

		// WordPress Color Picker
		if (html.indexOf('wp-color-picker') > -1) {
			$wrap.find('.pb_repeater-' + next_index + ' .wp-color-picker').each(function(){
				// WordPress Color Picker 解除して再セット
				var $pickercontainer = $(this).closest('.wp-picker-container');
				var $clone = $(this).clone();
				$pickercontainer.after($clone).remove();
				$clone.wpColorPicker();
			});
		}

		$(this).blur();
		return false;
	});

	// リピーター 削除ボタン
	$pb_metabox.on('click', '.pb_repeater .pb_repeater_delete', function(){
		var del = true;
		if ($(this).attr('data-confirm')) {
			del = confirm($(this).attr('data-confirm'));
		}
		if (del) {
			$(this).closest('.pb_repeater').fadeOut('fast', function(){
				$(this).remove();
			});
		}
		return false;
	});

	// リピーター内リピーター 追加ボタン
	$pb_metabox.on('click', '.pb_repeater_level2_wrap .pb_add_repeater_level2', function(){
		var $wrap = $(this).closest('.pb_repeater_level2_wrap');
		var html = $(this).attr('data-clone');
		var next_index = parseInt($wrap.attr('data-rows')) || 0;

		next_index++;
		$wrap.find('.pb_repeater_level2_sortable').append(html.replace(/pb_repeater_level2_add_index/g, next_index));
		$wrap.attr('data-rows', next_index);

		// WordPress Color Picker
		$wrap.find('.pb_repeater-' + next_index + ' .pb-wp-color-picker').wpColorPicker();

		$(this).blur();
		return false;
	});

	// ウィジェット追加モーダルのリピーターウィジェットクリック
	$('#pb-add-widget-modal .pb-select-widget a.pb-repeater-widget').on('click', function(e){
		repeater_sortable();
	});

	// ウィジェット編集モーダル表示
	$pb_metabox.on('click', '.pb-widget.pb-repeater-widget .pb-widget-wrapper', function(e){
		// リピーター アコーディオンを閉じる
		$(this).closest('.pb-repeater-widget').find('.pb-modal .pb_repeater.open').removeClass('open');
	});

	// ウィジェット複製イベント（ウィジェット複製・行複製で共通処理）
	$pb_metabox.on('page-builder-widget-cloned', function(event, $cloned_widget, $source_widget){
		// リピーターウィジェット以外は終了
		if (!$cloned_widget.hasClass('pb-repeater-widget')) return;

		var source_widget_index = $source_widget.attr('data-widget-index');
		var cloned_widget_index = $cloned_widget.attr('data-widget-index');
		var widget_id = $cloned_widget.attr('data-widget-id');

		// リピーター ソータブル
		$cloned_widget.find('.pb_repeater_sortable, .pb_repeater_level2_sortable').removeClass('ui-sortable');
		repeater_sortable();

		// リピーター行id属性のウィジェットインデックス置換
		$cloned_widget.find('.pb_repeater_wrap .pb_repeater').each(function(){
			var id_old = $(this).attr('id');
			var id_new = id_old;
			if (!id_old) return;
			id_new = id_new.replace('-' + source_widget_index + '-', '-' + cloned_widget_index + '-');
			if (id_old != id_new) {
				$(this).attr('id', id_new);
			}
		});

		// リッチエディターがある場合
		if ($cloned_widget.find(' .pb_repeater .wp-editor-area').length) {
			// クローン元のリッチエディターをループ（リピーターではなくページビルダーのクローン元）
			var $meta_wrap = $(this).closest('.postbox');
			$meta_wrap.find('.pb-clone .' + widget_id + ' .add_pb_repeater_clone .wp-editor-area').each(function(i){
				var replace_widget_index = $(this).closest('.pb-widget').attr('data-widget-index');
				var regexp = new RegExp(replace_widget_index, 'g');

				// id
				var id_old = $(this).attr('id');

				// クローンするエディターHTML
				var clone_editor_html = $(this).closest('.wp-editor-wrap').prop('outerHTML');

				// 複製先のリピータークローン用HTML置換 エディター関連のIDが置換されていないため
				var add_pb_repeater_clone_html = $(this).closest('.add_pb_repeater_clone').html();
				$cloned_widget.find('.pb_repeater_wrap  .add_pb_repeater_clone').html(add_pb_repeater_clone_html.replace(regexp, cloned_widget_index));

				// 複製先リピーター行をループ
				$cloned_widget.find('.pb_repeater_sortable .pb_repeater').each(function(row){
					// 行インデックス
					var row_index = $(this).find('input[name*="repeater_index"]').val();
					// エディターid
					var id_new = id_old.replace(regexp, cloned_widget_index).replace(/pb_repeater_add_index/g, row_index);

					// リピーター行内の現エディター
					var $current_editor_wrap = $(this).find('.wp-editor-wrap').eq(i);
					if (!$current_editor_wrap.length) return;

					// 現エディターの入力値
					var current_editor_val = $current_editor_wrap.find('.wp-editor-area').val();

					// ウィジェットID置換してクローンエディターHTMLを挿入
					$current_editor_wrap.after(clone_editor_html.replace(regexp, cloned_widget_index).replace(/pb_repeater_add_index/g, row_index));

					// 現エディター削除
					$current_editor_wrap.remove();

					// 挿入したクローンエディター
					var $new_editor_wrap = $(this).find('.wp-editor-wrap').eq(i);

					// テキストエリアに値代入
					$new_editor_wrap.find('.wp-editor-area').val(current_editor_val);
					// クローン元のmceInitをコピー置換
					if (typeof tinyMCEPreInit.mceInit[id_old] != 'undefined') {
						// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
						var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_old]);
						mce_init_new.body_class = mce_init_new.body_class.replace(regexp, cloned_widget_index).replace(/pb_repeater_add_index/g, row_index);
						mce_init_new.selector = mce_init_new.selector.replace(regexp, cloned_widget_index).replace(/pb_repeater_add_index/g, row_index);
						tinyMCEPreInit.mceInit[id_new] = mce_init_new;

						// リッチエディター化
						tinymce.init(mce_init_new);
					}

					// クローン元のqtInitをコピー置換
					if (typeof tinyMCEPreInit.qtInit[id_old] != 'undefined') {
						// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
						var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_old]);
						qt_init_new.id = qt_init_new.id.replace(regexp, cloned_widget_index).replace(/pb_repeater_add_index/g, row_index);
						tinyMCEPreInit.qtInit[id_new] = qt_init_new;

						// テキスト入力のタグボタン有効化
						quicktags(tinyMCEPreInit.qtInit[id_new]);
						try {
							if (QTags.instances['0'].theButtons) {
								QTags.instances[id_new].theButtons = QTags.instances['0'].theButtons;
							}
						} catch(err) {
						}
					}

					// ビジュアル/テキストを複製元に合わせる
					setTimeout(function(){
						if ($source_widget.find('.pb_repeater_wrap .pb_repeater').eq(row).find('.wp-editor-wrap').eq(i).hasClass('tmce-active')) {
							switchEditors.go(id_new, 'toggle');
							switchEditors.go(id_new, 'tmce');
						} else {
							switchEditors.go(id_new, 'toggle');
							switchEditors.go(id_new, 'html');
						}
					}, 500);
				});
			});
		}
	});

	// リッチエディターの異なるセルへのドラッグ対策
	var cell_id_before, cell_id_after;
	$(document).on('page-builder-widget-sortable-start', function(e, item) {
		if (!$(item).hasClass('pb-repeater-widget') || !$(item).find('.wp-editor-area').length) return;

		cell_id_before = $(item).closest('.cell').attr('id') || null;
	});
	$(document).on('page-builder-widget-sortable-stop', function(e, item) {
		if (!$(item).hasClass('pb-repeater-widget') || !$(item).find('.wp-editor-area').length) return;

		cell_id_after = $(item).closest('.cell').attr('id') || null;
		if (!cell_id_before || cell_id_before == cell_id_after) return;

		var $this = $(this);

		$(item).find('.wp-editor-area').each(function(){
			var id = $(this).attr('id');
			var $editor_wrap = $(this).closest('.wp-editor-wrap');

			if (!id || $(this).closest('.add_pb_repeater_clone').length) return;

			if (window.tinymce) {
				var mceInstance = window.tinymce.get(id);
				if (mceInstance) {
					mceInstance.remove();
					tinymce.init(tinyMCEPreInit.mceInit[id]);
				}
			}

			if (window.quicktags) {
				var qtInstance = window.QTags.getInstance(id);
				if (qtInstance) {
					qtInstance.remove();
					quicktags(tinyMCEPreInit.qtInit[id]);
				}
			}

			setTimeout(function(){
				if ($editor_wrap.hasClass('tmce-active')) {
					switchEditors.go(id, 'toggle');
					switchEditors.go(id, 'tmce');
				} else {
					switchEditors.go(id, 'toggle');
					switchEditors.go(id, 'html');
				}
			}, 500);
		});
	});

	// リピーター追加後のリッチエディターでテキスト切り替え時にテキストエリアが表示されない場合がある対策
	$pb_metabox.on('click', '.pb_repeater .wp-editor-wrap .wp-switch-editor.switch-html', function(){
		var $this = $(this);
		var $textarea = $this.closest('.wp-editor-wrap').find('textarea.wp-editor-area')
		setTimeout(function(){
			if ($textarea.is(':hidden')) {
				$textarea.show();
			}
		},10);
	});

});