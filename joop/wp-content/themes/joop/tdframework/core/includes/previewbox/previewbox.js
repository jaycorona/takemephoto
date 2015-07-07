(function( $ ) {
	
	$(document).ready(function() {
		preview_options();
		
		var col = $('#cp_prevMenuBGColor').css('background-color');
		if (col) {
			$('#cp_prevMenuBGColor').val(rgb2hex(col).replace('#',''));
		}
		

	});

	function preview_options() {
		var box = jQuery('#preview-box-container');
		var boxH = box.height();
		var winH = jQuery(window).height();
		var margTop = (winH-boxH)/2;
		if(winH > boxH){
			jQuery('#preview-box-container').css({'top':margTop})
		}else{
			jQuery('#preview-box-container').css({'top':0});
			jQuery('#preview-box').css({height:winH})
			
		}
		// Toggle button
		$('#preview-box-toggle').bind('click', function() {
			if (box.hasClass('expanded')) {
				box.stop(true, true).animate({left: (-box.width()) + 'px'}, 250);
				$(this).find('.fa').removeClass('fa-chevron-left');
				$(this).find('.fa').addClass('fa-chevron-right');
			} else {
				box.stop(true, true).animate({left: '0px'}, 250);
				$(this).find('.fa').removeClass('fa-chevron-right');
				$(this).find('.fa').addClass('fa-chevron-left');
			}
			box.toggleClass('expanded');
		});
		box.css('left', (-box.width()) + 'px');
		
		
		$('#prevNewsBGColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.social-row').css({'background-color':mainColor});
		});
		$('#prevNewsTextColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.social-row').css({'color':mainColor});
		});
		
		
		//$('#cp_prevMenuBGColor').css({'background-color':$('.site-navigation').css("background-color")});
		$('#prevMenuBGColor').change(function(){
			changeBlockColor('#prevMenuBGColor','#prevMenuBGOpacity','.site-navigation');
		});
		$('#prevMenuBGOpacity').change(function(){
			changeBlockColor('#prevMenuBGColor','#prevMenuBGOpacity','.site-navigation');
		});
		//$('#cp_prevMenuFontColor').css({'background-color':$('.theme-menu-main > li > a').css("color")});
		$('#prevMenuFontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.main-navigation a').css({'color':mainColor});
		});
		
		$('#prevBreadcrumbBGColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.breadcrumb').css({'background-color':mainColor});
		});
		$('#prevBCTxtColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.breadcrumb a').css({'color':mainColor});
		});
		$('#prevBCTxtHoverColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.breadcrumb').css({'color':mainColor});
		});
		//$('#cp_prevContentBGColor').css({'background-color':$('.wrapper').css("background-color")});
		$('#prevContentBGColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.wrapper, .wrapper .theme-sidebar').css({'background-color':mainColor});
		});
		//$('#cp_prevPFontColor').css({'background-color':$('body').css("color")});
		$('#prevPFontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('body, p').css({'color':mainColor});
		});
		//$('#cp_prevLinkColor').css({'background-color':$('a').css("color")});
		$('#prevLinkColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.theme-content a, .content-wrap a').css({'color':mainColor});
		});
		//$('#cp_prevHeadIconsColor').css({'background-color':$('.social_icons a').css("color")});
		$('#prevHeadIconsColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.social-row a').css({'color':mainColor});
		});
		
		//$('#cp_prevMenuFontColor').css({'background-color':$('.theme-menu-main > li > a').css("color")});
		$('#prevMenuFontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.main-navigation a').css({'color':mainColor});
		});
		$('#prevFooterBGColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.footer').css({'background-color':mainColor});
		});
		$('#prevFooterSocialColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.footer .social_icons a').css({'color':mainColor});
		});
		$('#prevFooterMenuColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('#footer-menu .menu li a').css({'color':mainColor});
		});
		$('#prevFooterCopyrightColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('.theme-copyright, .theme-copyright a').css({'color':mainColor});
		});


		
		//$('#cp_prevH1FontColor').css({'background-color':$('.theme-content h1').css("color")});
		$('#prevH1FontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('h1, h1 a').css({'color':mainColor});
		});
		
		//$('#cp_prevH2FontColor').css({'background-color':$('.theme-content h2').css("color")});
		$('#prevH2FontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('h2, h2 a').css({'color':mainColor});
		});
		//$('#cp_prevH3FontColor').css({'background-color':$('.theme-content h3').css("color")});
		$('#prevH3FontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('h3, h3 a').css({'color':mainColor});
		});
		//$('#cp_prevH4FontColor').css({'background-color':$('.theme-content h4').css("color")});
		$('#prevH4FontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('h4, h4 a').css({'color':mainColor});
		});
		//$('#cp_prevH5FontColor').css({'background-color':$('.theme-content h5').css("color")});
		$('#prevH5FontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('h5, h5 a').css({'color':mainColor});
		});
		//$('#cp_prevH6FontColor').css({'background-color':$('.theme-content h6').css("color")});
		$('#prevH6FontColor').change(function(){
			var mainColor = $(this).val();
			mainColor = '#'+mainColor;
      	 	$('h6, h6 a').css({'color':mainColor});
		});
	}
	function convertHex(hex,opacity){
		hex = hex.replace('#','');
		r = parseInt(hex.substring(0,2), 16);
		g = parseInt(hex.substring(2,4), 16);
		b = parseInt(hex.substring(4,6), 16);
	
		result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
		return result;
	}
	function changeBlockColor(hexcolorID,opacityID,targetID){
		var mainColor = $(hexcolorID).val();
		var bgOpacity = $(opacityID).val();
		var bgColor = convertHex(mainColor,bgOpacity);
      	$(targetID).css({'background-color':bgColor});
	}
	//Function to convert hex format to a rgb color

	var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 
	function rgb2hex(rgb) {
		if(typeof(rgb)==='undefined') rgb = 'rgb(255,255,255)';
		 rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		 return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
	function hex(x) {
	  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
	 }
 } ) ( jQuery );