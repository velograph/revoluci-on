jQuery(document).ready(function () {

    "use strict";

    var $window = jQuery( window );

    // Detect Safari for font spacing hover on blog items

    (function (jQuery) {
        // console.log(navigator.userAgent);
        /* Adjustments for Safari on Mac */
        if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Mac') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
            // console.log('Safari on Mac detected, applying class...');
            jQuery('html').addClass('safari-mac'); // provide a class for the safari-mac specific css to filter with
        }
    })(jQuery);


    // Loader bar

    var count = 1;

    jQuery('img').load(function () {

        jQuery('#progress-bar').css('width', count * 170);
        count = count + 1;
    });

    jQuery('#loader').css('padding-top', jQuery(window).height() / 2);

    // Smooth Scroll to internal links

    jQuery('.smooth-scroll').smoothScroll({
        speed: 900,
        offset: -85
    });

    // Initialize Sliders

    jQuery('#home-slider').flexslider({
        directionNav: false,
        animationSpeed: 400,
        smoothHeight: true
    });

    jQuery('.testimonials-slider').flexslider({
        directionNav: false,
        smoothHeight: true
    });
    
    jQuery('.post-slider').flexslider({
        directionNav: false,
        smoothHeight: true
    });

    jQuery('.the-slider').flexslider({
        directionNav: false,
        smoothHeight: true
    });

    // Set nav holder height

    jQuery('#nav-holder').css('height', jQuery('#thenavigation').height());


    // Append HTML <img>'s as CSS Background for slides
    // also center the content of the slide and dividers


    jQuery('#home-slider .slides li').each(function () {

        jQuery(this).css('height', jQuery(window).height());

        var imgSrc = jQuery(this).children('.slider-bg').attr('src');
        jQuery(this).css('background', 'url("' + imgSrc + '")');
        jQuery(this).children('.slider-bg').remove();

        var slideHeight = jQuery(this).height() - 60;
        var contentHeight = jQuery(this).children('.slide-content').height();
        var padTop = (slideHeight / 2) - (contentHeight / 2);

        jQuery(this).children('.slide-content').css('padding-top', padTop);

    });

    jQuery('.text-divider').each(function () {

        var img = jQuery(this).children('.divider-bg'),
            imgSrc = img.attr('src');

        if ( ! img.length ) return;
        
        jQuery(this).css('background', 'url("' + imgSrc + '")');
        jQuery(this).children('.divider-bg').remove();

    });

    jQuery('.post-preview').each(function () {
		if(jQuery(this).children('.post-preview-bg').length){
			var imgSrc = jQuery(this).children('.post-preview-bg').attr('src');
			jQuery(this).css('background', 'url("' + imgSrc + '")');
			jQuery(this).children('.post-preview-bg').remove();
        }

    });


    // Turn dynamic animations for iOS devices (because it doesn't look right)

    var iOS = false,
        p = navigator.platform;

    if (p === 'iPad' || p === 'iPhone' || p === 'iPod') {
        iOS = true;
    }

    // Fade slider content

    $window.scroll(function () {

        if (iOS === false) {

            var scroll = $window.scrollTop();

            // Scroll opacity for shorter divider (blog page)
            var scroll2 = scroll / 300;
            scroll2 = 1 - scroll2;

            // Scroll for larger divider (homepage)
            scroll = scroll / 800;
            scroll = 1 - scroll;


            jQuery('.slide-content').css('opacity', scroll);
            jQuery('#home-slider .flex-control-nav').css('opacity', scroll);

            jQuery('.post-hero .divider-content').css('opacity', (scroll2));

        }

    });


    // Sticky Nav


    $window.scroll(function () {

        if ($window.scrollTop() > $window.height() && !jQuery('#main-container').hasClass('inner-container')) {
            jQuery('#thenavigation').addClass('sticky-nav');
        } else {
            jQuery('#thenavigation').removeClass('sticky-nav');
        }

        // Parallax

        if (iOS === false) {

            jQuery('.has-parallax').each(function () {

                var scrollAmount = $window.scrollTop() / 3;
                scrollAmount = Math.round(scrollAmount);
                jQuery(this).css('backgroundPosition', '50% ' + scrollAmount + 'px');

            });

        }
    });



    // New Parallax

    // Detect request animation frame
    var scroll = window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
    // IE Fallback, you can even fallback to onscroll
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };

    function loop() {

        var top = window.pageYOffset;

        if (iOS === false) {

            jQuery('.has-parallax').each(function () {

                var scrollAmount = $window.scrollTop() / 3;
                scrollAmount = Math.round(scrollAmount);
                jQuery(this).css('backgroundPosition', '50% ' + scrollAmount + 'px');

            });

            // Recall the loop
            scroll(loop);

        }
    }

    // Call the loop for the first time
    loop();

    // Portfolios

    jQuery('.filters li').click(function () {

        jQuery('.filters li').children('.btn').removeClass('active');
        jQuery(this).children('.btn').addClass('active');

        var category = jQuery(this).attr('data-category');
        jQuery(this).closest('.projects-wrapper').find('.project').removeClass('hide-project');

        if (category !== '*') {
            jQuery(this).closest('.projects-wrapper').find('.project').each(function () {

                if (!jQuery(this).hasClass(category)) {
                    jQuery(this).addClass('hide-project');
                }

            });
        }

    });

    // Project Clicks with AJAX call

    jQuery('.project').click(function (event) {
        event.preventDefault();
        var projectContainer = jQuery(this).closest('.projects-wrapper').children('.ajax-container').attr('data-container');

        if (jQuery('.ajax-container[data-container="' + projectContainer + '"]').hasClass('open-container')) {
            jQuery('.ajax-container[data-container="' + projectContainer + '"]').addClass('closed-container');
            jQuery('.ajax-container[data-container="' + projectContainer + '"]').removeClass('open-container');
        }

        var fileID = jQuery(this).attr('data-project-file');

        if (fileID !== null) {
            jQuery('html,body').animate({
                scrollTop: jQuery('.ajax-container[data-container="' + projectContainer + '"]').offset().top - 70
            }, 500);

        }

        jQuery('.ajax-container[data-container="' + projectContainer + '"]').load(fileID + " .project-body", function () {
            jQuery('.ajax-container[data-container="' + projectContainer + '"]').addClass('open-container');
            jQuery('.the-slider').flexslider({
                directionNav: false,
                smoothHeight: true
            });
            jQuery( '.vendor' ).fitVids();
            $window.resize();
            setTimeout( function() {
                $window.resize();
            },500);
            setTimeout( function() {
                $window.resize();
            },1000);
            jQuery('.ajax-container[data-container="' + projectContainer + '"]').removeClass('closed-container');

            jQuery('.close-project').click(function () {
                var projectContainer = jQuery(this).closest('.projects-wrapper').children('.ajax-container').attr('data-container');
                console.log( projectContainer );
                jQuery('.ajax-container[data-container="' + projectContainer + '"]').addClass('closed-container');
                jQuery('.ajax-container[data-container="' + projectContainer + '"]').removeClass('open-container');
                jQuery('html,body').animate({
                    scrollTop: jQuery('.projects-container[data-container="' + projectContainer + '"]').offset().top - 70
                }, 500);
                jQuery('.ajax-container[data-container="' + projectContainer + '"]').slideToggle(400, function() {jQuery( this ).show();});
                setTimeout(function () {
                    jQuery('.ajax-container[data-container="' + projectContainer + '"]').html('');
                }, 1000);
            });
        });

    });

    // Mobile Toggle for nav menu

    jQuery('.mobile-toggle').click(function () {
        if (jQuery('#thenavigation').hasClass('open-nav')) {
            jQuery('#thenavigation').removeClass('open-nav');
        } else {
            jQuery('#thenavigation').addClass('open-nav');
        }
    });

    // Contact Form Code

    jQuery('.clear-btn').click(function () {

        jQuery('#form-name').val('');
        jQuery('#form-email').val('');
        jQuery('#form-msg').val('');


    });

});

jQuery(window).load(function () {

    "use strict";

    // Remove loader

    jQuery('#progress-bar').width('100%');
    jQuery('#loader').hide();

});