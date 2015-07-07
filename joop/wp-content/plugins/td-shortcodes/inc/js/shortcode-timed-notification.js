(function($){
	/* Timed Notifications
	================================================== */
	$.fn.timeNotification = function(blkID,durTime){
		var blkID = this;
		var durTimeX = durTime * 1000;

		setTimeout(function() {
	        $(blkID).stop().fadeOut();
	    }, durTimeX);
		$('.tds-tnprogbar', blkID).stop().animate({width:0}, {duration:durTimeX});
	};
} ) ( jQuery );

(function( $ ) {

	"use strict";

	function adjustTimeNotifyDivs(){
		$('.tds-timenotifyblk').each(function(){
			var iconH = $('.tds-tniconblk', this).height();
			var contentH = $('.tds-tnmcontent', this).height();

			if (iconH < contentH) {
				$('.tds-tniconblk', this).css({height:contentH})
			}

		});
	}

	$(document).ready(function() {
		$("#tdtimenotification").timeNotification(this, 5);
		adjustTimeNotifyDivs();
	});

} ) ( jQuery );