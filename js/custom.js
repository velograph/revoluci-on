(function($){
	'use strict';
	/*jslint undef: false, browser: true, devel: false, eqeqeq: false, bitwise: false, white: false, plusplus: false, regexp: false, nomen: false */
	/*jshint undef: false, browser: true, devel: false, eqeqeq: false, bitwise: false, white: false, plusplus: false, regexp: false, nomen: false, validthis: true */
	/*global jQuery */

	$(function(){

		var $window     = $( window ),
			$body       = $( 'body' ),
			$navWrap    = $( '#nav-holder' ),
			$navigation = $( '#thenavigation' ),
			$nav        = $navWrap.find( '#thenavigation > div > div > ul' ),
			isMobile    = $( 'html.mobile' ).length,
			adminBar    = $( '#wpadminbar' ),
			barOffset   = adminBar.length ? adminBar.outerHeight() : 0;

		$( document ).foundation();

		// navigation
		$nav.addClass( 'menu' );

		var $navItems = $nav.find( 'li' );

		if ( 2 <= $navItems.length ) {

			var half = parseInt( $navItems.length / 2 );

			$navItems.each( function( index ) {

				if ( index >= half && 0 === $navItems.length % 2 ) {

					jQuery( this ).appendTo( $nav.eq( 1 ) );

				} else if ( index > half ) {

					jQuery( this ).appendTo( $nav.eq( 1 ) );

				}

			});

		}

		if ( $( '.background-grey' ).length ) {

			$body.addClass( 'has-background-gray' );

		}

		// smooth scroll
		$body.on( 'click', 'a[href]', function() {

			var $this = jQuery( this );

			if ( '' === $this.prop( 'hash' ) && ( window.location.href === $this.attr( 'href' ) || window.location.href + '/' === $this.attr( 'href' ) ) ) {

				jQuery( 'html,body' ).animate({
					scrollTop: 0
				}, 600);

				return false;

			}

			if ( '' === $this.prop( 'hash' ) ) return;

			var $target = $body.find( $this.prop( 'hash' ) );

			if ( ! $target.length ) return;

			jQuery( 'html,body' ).animate({
				scrollTop: $target.offset().top - $navigation.outerHeight() - barOffset
			}, 600);

			return false;

		});

		// contact form
		if ( $( '.peThemeContactForm' ).length > 0 ) {

			$( '.peThemeContactForm' ).peThemeContactForm();

			$( '#form-btn button' ).click( function(e) {

				e.stopImmediatePropagation();

			});

			$( '#form-btn' ).click( function(e) {

				$( this ).find( 'button' ).click();

			});

		}

		// title icons colors
		$( '.line .icon' ).each( function() {

			var $this = $( this );

			$this.css( 'background-color', $this.closest( 'section' ).css( 'background-color' ) );

		});

		// comments markup fix
		//$( '.row-fluid' ).addClass( 'row' );

		//$( '.vendor' ).fitVids();

		var $comments_wrap = $( '#comments' );

		if ( $comments_wrap.length ) {

			$( '#commentform button' ).addClass( 'btn btn-success' );

			$comments_wrap.find( '.span1' ).addClass( 'large-1 columns' ).removeClass( 'span1' );
			$comments_wrap.find( '.span11' ).addClass( 'large-11 columns' ).removeClass( 'span11' );
			$comments_wrap.find( '.span12' ).addClass( 'large-12 columns' ).removeClass( 'span12' );
			$comments_wrap.find( '.row-fluid' ).addClass( 'row' ).removeClass( 'row-fluid' );
			$comments_wrap.find( '.pull-right' ).addClass( 'right' ).removeClass( 'row-fluid' );

		}

		$( '.vendor' ).fitVids();

		$window.load( function() {

			// initial scroll
			if ( '' !== window.location.hash ) {

				console.log( 'ddd' );

				var $target = $body.find( window.location.hash );

				if ( $target.length ) {

					jQuery( 'html,body' ).animate({
						scrollTop: $target.offset().top - $navigation.outerHeight() - barOffset
					}, 0);

				}

			}

			// testimonials minimal height
			$( '.testimonials-slider' ).each( function() {

				var $this      = $( this ),
					min_height = 0;

				$this.find( '.slides > li' ).each( function() {

					var $_this = $( this );

					if ( $_this.height() > min_height ) min_height = $_this.height();

				});

				$this.css( 'min-height', min_height );

			});

			$window.resize();

		});

		$window.resize();

		$window.resize( function() {

			// testimonials minimal height
			$( '.testimonials-slider' ).each( function() {

				var $this      = $( this ),
					min_height = 0;

				$this.find( '.slides > li' ).each( function() {

					var $_this = $( this );

					if ( $_this.height() > min_height ) min_height = $_this.height();

				});

				$this.css( 'min-height', min_height );

			});

		});

	});

})(jQuery);