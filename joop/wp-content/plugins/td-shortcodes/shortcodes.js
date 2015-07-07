// @codekit-prepend "src/js-dev/animate-this.js"


jQuery(document).ready(function() {

	jQuery('.tds-tabs').each(function() {
		var tabContainer = jQuery(this);
		var tabTitleList = jQuery('.titles', tabContainer);
		var tabContentList = jQuery('.content', tabContainer);
		var contentWidth = tabContainer.width();

		// Tab buttons
		jQuery('.tds-tab-title', this).each(function(index, element) {
			var tabTitle = jQuery(this);
			var tabContent = tabTitle.next();


			// Move title into title container
			tabTitle.detach();
			tabTitleList.append(tabTitle);

			// Move content into content container
			tabContent.detach();
			tabContentList.append(tabContent);

			// Hide all but the first tab
			if (index > 0) {
				tabContent.hide();
			} else {
				tabTitle.addClass('active');
			}

			// Tab title click
			tabTitle.click(function() {
				if (tabContent.css('display') !== 'none') {
					return;
				}

				// Toggle tab style and content visibility
				tabContainer.find('.tds-tab:visible').slideUp(200);
				tabTitleList.find('.active').removeClass('active');
				tabContent.slideDown(200);

				tabTitle.addClass('active');
			});
		});
	});

	// Tabs Title arrows
	//
	jQuery('.tds-tabs.left .tds-tab-title').each(function() {
		var tabItem =  jQuery(this);
		tabItem.append('<i class="fa fa-angle-right tds-arrow"></i> ');
	});
	//
	jQuery('.tds-tabs.right .tds-tab-title').each(function() {
		var tabItem =  jQuery(this);
		tabItem.prepend('<i class="fa fa-angle-left tds-arrow"></i> ');
	});

	// Toggle shortcode
	//
	jQuery('.tds-toggle > li > div.toggle-header').each(function(index, element) {
		element = jQuery(element);
		var content = element.siblings('div.content');
		var arrow = element.find('span.arrow');
		var icon = element.find('.icon');

		arrow.css('top', ((element.outerHeight(true) / 2) - (arrow.outerHeight(true) / 2)) + 'px');

		element.bind('mouseenter', function() {
			arrow.stop(true, true).animate({right: '-5px'}, 200);
		});

		element.bind('mouseleave', function() {
			arrow.stop(true, true).animate({right: '5px'}, 200);
		});

		element.bind('click', function() {
			if (content.hasClass('visible')) {
				content.stop(true, true).slideUp(300);
				content.removeClass('visible');
				icon.removeClass('fa-minus');
				icon.addClass('fa-plus');
				icon.removeClass('active');
			} else {
				content.stop(true, true).slideDown(300);
				content.addClass('visible');
				icon.removeClass('fa-plus');
				icon.addClass('active');
				icon.addClass('fa-minus');
			}
		});
	});

	// To top divider
	jQuery('.tds-divider.totop > a.totop').bind('click', function() {
		jQuery('html, body').animate({scrollTop: 0}, 300);
		return false;
	});

	adjustIconGridHeight();

	adjustcaptionHover();

	toggledivider();

	adjustPostThumbnail();
	//scrollToSection();

	//transferStylesToHead();

});

jQuery(window).load(function(e) {
	//scrollToSectionOnLoad();
});

/*Progress Bar Script */
function mainProgressBar(pID, percent, elementName){
	var elemName = '#' + pID.replace(/ /g,'');
	var progressBarWidth = percent * jQuery(elemName).width() / 100;

	var element = jQuery(elemName);
	var winHeight = jQuery(window).height();
	var position = element.offset();
	var animation = element.attr('data-animation');

	if ( position.top <= winHeight ){
		jQuery(elemName).find('div.main-pbar').animate({ width: progressBarWidth }, 3000);
	}

	jQuery('.title-pblk').hide().fadeIn('slow');
}

function mpb_updateScroll(pID, percent, elementName) {
		var elemName = '#' + pID.replace(/ /g,'');
		var progressBarWidth = percent * jQuery(elemName).width() / 100;

		var element = jQuery(elemName);
		var winHeight = jQuery(window).height();
		var position = element.offset();
		var animation = element.attr('data-animation');

		if ( winHeight > ( position.top-jQuery(window).scrollTop() ) ) {
			jQuery(elemName).find('div.main-pbar').animate({ width: progressBarWidth }, 3000);
		}
}

function adjustIconGridHeight() {
	jQuery('.cbp-ig-grid').each(function(){
		var highestBox = 100;
		jQuery('> li > a', this).each(function(){
            if(jQuery(this).height() > highestBox) {
               highestBox = jQuery(this).height();
           }
        });
		jQuery('> li > a', this).each(function(){
			jQuery(this).css({'min-height':highestBox});
		});
	});
}


//Add Google Plus to PrettyPhoto
function onPictureChanged() {
	jQuery('.pp_social').append('<g:plusone data-action="share" href="'+ encodeURIComponent(location.href.replace(location.hash,"")) +'" width="160px" ></g:plusone>');
	jQuery('.pp_social').append("<script type='text/javascript'>(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })(); <" + "/" +  "script>");
}

// News Scroller
function textRotate(id,duration,transition) {
	id = id || '';
	duration = duration || 6000;
	transition = transition || 3000;

	var current = jQuery(id + '> .current');
	if (current.next().length === 0) {
		current.removeClass('current').fadeOut(transition, function(){
			jQuery(id + ' .tds-textitem:first').addClass('current').fadeIn(transition);
		});
	} else {
		current.removeClass('current').fadeOut(transition, function(){
		current.next().addClass('current').fadeIn(transition);
		});
	}
}

function setupRotator(id,duration,transition) {
	id = id || '';
	duration = duration || 10000;
	transition = transition || 3000;
   	if (jQuery(id+' .tds-textitem').length > 1) {
		jQuery(id+ ' .tds-textitem:first').addClass('current').fadeIn(transition);
		setInterval( function(){ textRotate(id,duration,transition); }, duration);
	}
}

function adjustcaptionHover() {
	jQuery('.tds-captionhover .icon-blk').each(function(){
		var blkH = jQuery(this).height();
		var blkW = jQuery(this).width();
		var iH = jQuery('i',this).height();
		var vartblkH;

		var tblkH = 0;
		var margTOp = 0;

		if(blkH !== blkW) {
			jQuery(this).css({height:blkW});
			tblkH = blkW;
		}else{
			vartblkH = blkH;
		}
		if(iH < tblkH) {
			margTOp = (tblkH - iH) / 2;
			jQuery('i',this).css({marginTop:margTOp});
		}

	});
}

function toggledivider(){
	jQuery('.tds-toggledivider').each(function(){
		jQuery( '.tds-toggledivider-title', this ).click(function() {

			var block = jQuery(this).siblings('.tds-toggledivider-content');

			if( block.is(':visible') ){
				jQuery(block).slideToggle('normal', function() {
					jQuery(block).css('opacity',0);
				});

			} else {
				jQuery(block).slideToggle('normal', function() {
					jQuery(block).fadeTo('normal',1);
				});
			}

			jQuery('i', this).each(function(){
				if(jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
					jQuery(this).removeClass('fa-angle-down');
					jQuery(this).addClass('fa-angle-up');
				}else{
					jQuery(this).addClass('active');
					jQuery(this).removeClass('fa-angle-up');
					jQuery(this).addClass('fa-angle-down');
				}
			});
		});
	});
}
function adjustPostThumbnail () {
	jQuery('.tds_postWidget_posts').each(function(){
		var panelWidth = jQuery(this).width();
		if(panelWidth < 400){
			jQuery(' li img.medium',this).addClass('tds-fullwidth');
			jQuery(' li img.thumbnail',this).addClass('tds-35pw');
		}
	});
}

function scrollToSection () {
	var headH = 0;
	if(jQuery('#header').css('position') === 'fixed'){
		headH =jQuery('#header').outerHeight();
	}
	var topH = headH + jQuery('#wpadminbar').outerHeight();


	jQuery('a[href*=#]:not([href=#])').each(function(){
		jQuery(this).click(function(e) {
		    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
		      var target = jQuery(this.hash);
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		          scrollTop: target.offset().top - topH
		        }, 10);
		        return false;
		      }
			}
		});
	});

}

function scrollToSectionOnLoad () {
	var hash = window.location.hash;
	var headH = 0 ;
	if(jQuery('#header').css('position') === 'fixed'){
		headH = jQuery('#header').outerHeight();
	}
	var topH = headH + jQuery('#wpadminbar').outerHeight();
	var target = '';
	var ID = '';

	if(hash.length){
		var IDload = hash.replace('#', '');
		ID = '#'+ IDload;
		target = jQuery(ID);
		jQuery(this).scrollTop(0);
		if(target.length){
			jQuery('html,body').animate({
			scrollTop: target.offset().top - topH
			}, 1000);
			return false;
		}
	}
}

function transferStylesToHead(){
	jQuery('.tds-styleblk style').each(function(){
		jQuery(this).appendTo('head');
	});
	jQuery('.tds-styleblk').each(function(){
		jQuery(this).remove();
	});
}
