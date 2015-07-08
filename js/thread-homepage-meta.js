jQuery( window ).load( function() {

	var showWhenGallery = jQuery( '#pe_theme_meta_splash__gallery_, #pe_theme_meta_splash__type__buttonset, #pe_theme_meta_splash__headlines_type__buttonset' ).closest( '.option' );

	if ( jQuery( 'label[for="pe_theme_meta_splash__splash__1"]' ).hasClass( 'ui-state-active') ) { // image home

		showWhenGallery.show();

	} else {

		showWhenGallery.hide();

	}

	jQuery( 'label[for="pe_theme_meta_splash__splash__0"], label[for="pe_theme_meta_splash__splash__1"]' ).on( 'click', function(e) {

		if ( jQuery( 'label[for="pe_theme_meta_splash__splash__1"]' ).hasClass( 'ui-state-active') ) { // image home

			showWhenGallery.show();

		} else {

			showWhenGallery.hide();

		}

	});

});