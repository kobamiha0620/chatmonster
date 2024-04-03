jQuery(document).ready(function($){

	// layout
	$(document).on('change', '.pb-widget-profile .form-field-layout :radio', function(){
		if (this.checked) {
			$(this).closest('.pb-content').find('[class*=form-field-layout-]').hide();
			$(this).closest('.pb-content').find('.form-field-layout-'+this.value).show();
		}
	});
	$('.pb-widget-profile .form-field-layout :radio:checked').trigger('change');


	// use_sns_theme_options
	$(document).on('change', '.pb-widget-profile .checkbox-use_sns_theme_options:checkbox', function(){
		if (this.checked) {
			$(this).closest('.pb-content').find('.form-field-use_sns_theme_options-hide').hide();
		} else {
			$(this).closest('.pb-content').find('.form-field-use_sns_theme_options-hide').show();
		}
	});
	$('.pb-widget-profile .checkbox-use_sns_theme_options:checkbox').trigger('change');
});
