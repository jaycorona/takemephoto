(function( $ ) {

	"use strict";

	var wW = $(window).width();

	$(document).ready(function() {

		// Target your #container, #wrapper etc.
		var imgLogoH = $('#menu-logo img').height();
		$("#wrapper").fitVids();

		$('#container, #footer').each(function(index, element) {
			var element = $(element);
			element.css({
				'opacity': 0
			});
		});
		// Sub Menu Item Arrows
		$('#site-navigation #theme-menu-main li').each(function(index, element) {
			var item = $(element);
			var parent = $('#theme-menu-main > li:first-child');
			var subMenu = item.children('ul');
			var isSubmenu = item.parent().hasClass('sub-menu');

			//Check for icons
			var iconclass = item.attr('class').split(' ')[0];
			if (iconclass.indexOf("fa-") === 0){
				var newIcon = '<i class="fa fa-menu '+ iconclass +'"></i>&nbsp;&nbsp;';
				item.children('a').prepend(newIcon);
				item.removeClass(iconclass);
			}

			// Add dropdown indicators
			if (parent && item.children().hasClass('sub-menu') && !isSubmenu) {
				var arrowDown = ' <i class="fa fa-stop"></i>';
				//item.children('a').append(arrowDown);
			}
			// Submenus in submenus
			if (isSubmenu && subMenu.length) {
				var arrowRight = ' <i class="fa fa-stop"></i>&nbsp;&nbsp;';
				item.children('a').append(arrowRight);
			}

		});

		$('.menu').each(function() {
			$('li', this).each(function(index, element) {
				var item = $(element);
				var iconclass = item.attr('class').split(' ')[0];
				if (iconclass.indexOf("fa") === 0){
					var newIcon = '<i class="fa fa-menu '+ iconclass +'"></i>&nbsp;&nbsp;';
					item.children('a').prepend(newIcon);
					item.removeClass(iconclass);
				}
			});
		});

		// Input field placeholder text
		$('input[placeholder]').each(function(index, element) {
			var element = $(element);
			var placeholderText = element.attr('placeholder');
			if (placeholderText === '') { return; }
			element.removeAttr('placeholder');
			// Place first placeholder
			if (element.val() === '') {
				element.val(placeholderText);
				element.addClass('placeholderActive');
			}
			element.bind('focus', function() {
				if (element.val() === placeholderText) {
					element.val('');
					element.removeClass('placeholderActive');
				}
			});
			element.bind('blur', function() {
				if (element.val() === '') {
					element.val(placeholderText);
					element.addClass('placeholderActive');
				}
			});
		});

		// Setup PrettyPhoto links
		//
		$('a[data-rel^="prettyPhoto"]').prettyPhoto({
			animationSpeed: 'normal',
			/* fast/slow/normal */
			slideshow: 3000,
			autoplay_slideshow: false,
			theme: "pp_default",
			/*pp_default/light_rounded/dark_rounded/dark_square/light_square/facebook */
			opacity: 0.35,
			/* Value between 0 and 1 */
			hook: 'data-rel',
			showTitle: false /* true/false */
		});

		// Cleanup empty p tags
		$('p').each(function(index, element) {
			element = $(element);
			if (element.html() === '' || element.html() === '<br>') { element.remove(); }
		});

		// Search
		$('#icon-search').click(function(e) {
			if( ! $('#theme-search').hasClass('active') ) {
				pullDown();
				$('#theme-search').addClass('active');
				$('#theme-search').slideDown(300);
				$('#theme-search').find('.theme-wrap').delay(100).animate({'opacity': 1}, 200);
			} else {
				$('#theme-search').removeClass('active');
				$('#theme-search').find('.theme-wrap').animate({'opacity': 0}, 100,
					function() {
						$('#theme-search').stop(true,true).slideUp(300);
					});
			}
		});

		// Language
		$('#icon-language').click(function(e) {
			if( ! $('#theme-language').hasClass('active') ) {
				pullDown();
				$('#theme-language').addClass('active');
				$('#theme-language').slideDown(300);
				$('#theme-language').find('.theme-wrap').delay(100).animate({'opacity': 1}, 200);
			} else {
				$('#theme-language').removeClass('active');
				$('#theme-language').find('.theme-wrap').animate({'opacity': 0}, 100,
					function() {
						$('#theme-language').stop(true,true).slideUp(300);
					});
			}
		});

		// My Account
		$('#icon-user').click(function(e) {
			if( ! $('#theme-my-account').hasClass('active') ) {
				pullDown();
				$('#theme-my-account').addClass('active');
				$('#theme-my-account').slideDown(300);
				$('#theme-my-account').find('.theme-wrap').delay(100).animate({'opacity': 1}, 1000);
			} else {
				$('#theme-my-account').removeClass('active');
				$('#theme-my-account').find('.theme-wrap').animate({'opacity': 0}, 200,
					function() {
						$('#theme-my-account').stop(true,true).slideUp(300);
					});
			}
		});

		// Cart
		$('#icon-cart').click(function(e) {
			if( ! $('#theme-cart').hasClass('active') ) {
				pullDown();
				$('#theme-cart').addClass('active');
				$('#theme-cart').slideDown(300);
				$('#theme-cart').find('.theme-wrap').delay(100).animate({'opacity': 1}, 1000);
			} else {
				$('#theme-cart').removeClass('active');
				$('#theme-cart').find('.theme-wrap').animate({'opacity': 0}, 200,
					function() {
						$('#theme-cart').stop().slideUp(300);
					});
			}
		});

		// Remove icon
		$('.remove-icon').each(function(index, element) {
			var element = $(element);

			element.click(function(){
				element.parent().parent().removeClass('active');
				element.parent().animate({'opacity': 0}, 300);
				element.parent().parent().delay(300).slideUp(300);
			});
		});

		$(".comment-reply-link").click(function() {
			//$("#respond").slideDown("slow");
			$("#respond").hide().slideDown('slow');
		});

		//Product Page tabs
		$('.detail-menu li').each(function(index, element) {
			var element = $(element);

			element.click(function () {

				if( ! element.hasClass('active') ){
					$('.detail-menu li').removeClass('active');
					$('.tab-contents .tab-content').removeClass('active animated fadeIn');
					element.addClass('active');
					$('.tab-contents .tab-content:eq('+index+')').addClass('active animated fadeIn');
				}
			});

		});

		// Collapsible Menu
		jQuery('.widget .menu li').each(function(index, element) {
			var item = jQuery(element);
			var parent = jQuery('.widget .menu > li:first-child');
			var subMenu = item.children('ul');
			var isSubmenu = item.parent().hasClass('sub-menu');

			// Add dropdown indicators
			// parent
			if ( parent && item.children().hasClass('sub-menu') && !isSubmenu ) {
				var contentHtml = item.children('a').html();
				item.children('a').html('<span>' + contentHtml + '</span>');
				var iconPlus = ' <i class="fa fa-plus"></i>';
				item.children('a').append(iconPlus);
			}

			// Submenus in submenus
			if (isSubmenu && subMenu.length) {
				var iconPlus = ' <i class="fa fa-plus"></i>';
				item.children('a').append(iconPlus);
			}

		});

		jQuery('.widget .menu li a [class^="fa-"], .widget .menu li a [class*=" fa-"]').each(function(index, element) {
			var item = jQuery(element);

			item.click(function(e) {
				e.preventDefault();

				if( item.hasClass('fa-plus') ){
					item.removeClass('fa-plus');
					item.addClass('fa-minus');
				} else {
					item.removeClass('fa-minus');
					item.addClass('fa-plus');
				}

				item.parent().next('.sub-menu').slideToggle(400);
			});
		});

		//check theme logo width
		$('#theme-logo').css({'width': $('#theme-logo img').width() });

		// Liquid Fill
		$('.imgLiquidFill').imgLiquid({fill:true});

		$('#background-area, img').bind('contextmenu', function(e) {
		    return false;
		});

		setupRotator();

	});

	$(window).load(function() {
		$('#container, #footer').each(function(index, element) {
			var element = $(element);
			element.css({
				'opacity': 1
			});
		});

		// Remove loader when ready
		$('.core-loader').delay(50).fadeOut(150);

		//adjustWrapperMargins();
		get_flexslide_height();

	});


	/*
	 * Window Scrolling function
	 */
	var scrollTimeout = null;
	var scrollendDelay = 500; // ms

	function scrollbeginHandler() {
	    // this code executes on "scrollbegin"
	    //$('#footer').css({'opacity': 0});
	}

	function scrollendHandler() {
	    // this code executes on "scrollend"
	    scrollTimeout = null;
	    //$('#footer').css({'opacity': 1});
	}

	$(window).scroll(function(){

		if ( scrollTimeout === null ) {
	        scrollbeginHandler();
	    } else {
	        clearTimeout( scrollTimeout );
	    }
	    scrollTimeout = setTimeout( scrollendHandler, scrollendDelay );

		// show the back top link
		toTop();
	});

	$(window).resize(function() {
		//adjustWrapperMargins();
		get_flexslide_height();
	});

	// News Scroller
	function textRotate() {
		var current = $('#scroller > .current');
		if (current.next().length === 0) {
			current.removeClass('current').fadeOut("slow");
			$('.textItem:first').addClass('current').fadeIn("slow");
		} else {
			current.removeClass('current').fadeOut("slow");
			current.next().addClass('current').fadeIn("slow");
		}
	}

	function setupRotator() {
		if ($('.textItem').length > 1) {
			$('.textItem:first').addClass('current').fadeIn("slow");
			setInterval(textRotate, 6000);
		}
	}

	/*!
	 * Responsive JS Plugins v1.2.2
	 */
	// Placeholder
	//$(function() {
		//$('input[placeholder], textarea[placeholder]').placeholder();
	//});
	// Have a custom video player? We now have a customSelector option where you can add your own specific video vendor selector (mileage may vary depending on vendor and fluidity of player):
	// $("#thing-with-videos").fitVids({ customSelector: "iframe[src^='http://example.com'], iframe[src^='http://example.org']"});
	// Selectors are comma separated, just like CSS
	// Note: This will be the quickest way to add your own custom vendor as well as test your player's compatibility with FitVids.
	$(".theme-content").fitVids();

	// ToTop Scroll
	// toTop function will also show/hide the footer
	function toTop() {
		var TOP_MINIMUM = 200, pageH = $('body'), ANIMATE_SPEED = 500, gotoTop = $('.scroll-top'), logo = $('#theme-logo img'), navigation = $('#site-navigation'), footer = $('#footer');

		function updateToTop() {
			var scrollTop = $(window).scrollTop();
			var w = $(window).width();

			if (scrollTop > TOP_MINIMUM){
				gotoTop.show();
				gotoTop.addClass('animated fadeIn');

				if ( logo.parents('.theme-logo').hasClass('resize') && ! logo.hasClass('smaller') ) {
					if (w > 768) {
						navigation.css({'padding-top': '0px', 'padding-bottom': '0px'});
						logo.addClass('smaller');
					}
				}

			} else if (scrollTop <= TOP_MINIMUM) {
				gotoTop.hide();
				gotoTop.removeClass('animated fadeIn');

				if ( logo.hasClass('smaller') && w > 768 ) {
					navigation.css({'padding-top': '30px', 'padding-bottom': '30px'});
					logo.removeClass('smaller');
				}
			}
		}

		$(window).scroll(updateToTop);
		updateToTop();
		// To top button
		gotoTop.bind('click', function() {
			$('html, body').stop(true, true).animate({
				scrollTop: 0
			}, ANIMATE_SPEED);
			return false;
		});
	}

	function pullDown() {
		var item = $('.pull-down');
		item.each(function(index, element) {
			var element = $(element);

			if( element.hasClass('active') ) {
				element.slideUp(300);
				element.find('.theme-wrap').animate({'opacity': 0}, 300);
				element.removeClass('active');
			}
		});
	}

	function adjustWrapperMargins() {
		var wW = $(window).width();
		var headerH = $('#header').height();
		var maxHeight = $('#background-area').height();
		var breadcrumbH = $('#breadcrumb').height();
		var contentH = $('#container').height();
		var contentE = $('#wrapper .theme-content').height();
		var footerH = $('#footer').height()+20;

		if ( contentH > maxHeight ) {
			if( $('#breadcrumb').length ) {
				$('#breadcrumb').css({'margin-top':headerH});
			} else if( $('.featured-img.entry-media').length ) {
				$('.featured-img.entry-media').css({'margin-top':headerH});
			} else {
				$('#wrapper').css({'margin-top':headerH});
			}
		} else if ( $('.error404').length ) {
			// do nothing
		} else if ( $('.page-template-template-blank-php').length ) {
			// do nothing
		} else if ( $('.search-no-results').length ) {
			// do nothing
		} else {
			if( $('#breadcrumb').length ) {
				$('#breadcrumb').css({'margin-top':headerH});
			} else if( $('.featured-img.entry-media').length ) {
				$('.featured-img.entry-media').css({'margin-top':headerH});
			} else {
				$('#wrapper').css({'margin-top':headerH});
			}

			if( $('#footer-widget-area').length ) {
				$('#footer-widget-area').css({'min-height': ((maxHeight-(headerH+breadcrumbH+footerH+30))-contentE)});
			} else {
				$('#wrapper').css({'min-height': (maxHeight-(headerH+breadcrumbH+footerH+30))});
			}
		}

		if ( $('#container').hasClass('no-content') ) {
			$('#wrapper').css({'margin-bottom':footerH});
		}

		if ( wW < 769 ) {
			if( $('#breadcrumb').length ) {
				$('#breadcrumb').css({'margin-top': 5});
			} else if( $('.featured-img.entry-media').length ) {
				$('.featured-img.entry-media').css({'margin-top': 5});
			} else {
				$('#wrapper').css({'margin-top': 5});
			}
		}

		if ( ! $('#container').hasClass('no-content') || wW < 769  ) {
			//$('#footer').css({'position': 'relative'});
		}
	}

	function get_flexslide_height(){
		var height = $(window).height();
		if( $('.flex-bg .slides .slider-latest-image').length ) {
        	$(".flex-bg .slides .slider-latest-image").each(function(index, element) {
				var element = $(element);
				element.css({'height':height });
			});
		}

		if ( $('#header-image img').length ) {
			$('#header-image img').each(function(index, element) {
				var element = $(element);
				element.css({'height':height });
			});
		}
	}

	function add_dl_menu() {
		var wW = $(window).width();

  		if (  wW < 769 && $('#dl-menu').length <= 0  ) {
			console.log('smaller-screen');

			//$('#site-navigation').find('.main-navigation').clone().after('#header').attr('id', 'dl-menu');
			$('#header').after( $('#site-navigation').find('.main-navigation').clone().after('#header').attr('id', 'dl-menu') );

			var responsiveMenu = $('#dl-menu');
			responsiveMenu.removeClass().addClass('dl-menuwrapper');
			responsiveMenu.prepend('<button class="dl-trigger">Open Menu</button>');
			responsiveMenu.find('.menu').removeAttr('id').removeClass().addClass('dl-menu');
			responsiveMenu.find('.sub-menu').removeClass().addClass('dl-submenu');

			responsiveMenu.find('li').each(function(index, element) {
				var item = $(element);

				//Check for icons
				var iconclass = item.attr('class').split(' ')[0];
				if (iconclass.indexOf("fa-") === 0){
					var newIcon = '<i class="fa '+ iconclass +'"></i>&nbsp;&nbsp;';
					item.children('a').prepend(newIcon);
					item.removeClass(iconclass);
				}
			});

			responsiveMenu.dlmenu({
				animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
			});

		}

		if ( wW > 768 ) {
			$('#dl-menu').remove();
		}
	}

	$(window).on("load resize orientationchange", add_dl_menu);
	$(window).on("load resize orientationchange", adjustWrapperMargins);

} ) ( jQuery );