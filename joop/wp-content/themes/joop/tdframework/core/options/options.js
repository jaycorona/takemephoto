// True if the options are currently being saved
var saving = false;

(function( $ ) {



	// Binds color picker events
	//
	function coreBindColorPicker(colorBox, colorInput) {
		colorBox.ColorPicker({
			color: colorInput.val(),
			onChange: function (hsb, hex, rgb) {
				colorBox.css('backgroundColor', '#' + hex);
				colorInput.val(hex).trigger('change');
			}
		});
		colorInput.bind('keyup', function() {
			colorBox.css('backgroundColor', '#' + colorInput.val());
		});
		colorInput.bind('change', function() {
			colorBox.css('backgroundColor', '#' + colorInput.val());
		});
	}

	// Disables saving of theme options
	// This prevents some conflicts when the user saves twice or changes page
	//
	function disableSaving() {
		saving = true;
		$('#core-theme-options #content').animate({opacity: 0.25}, 500).prop('disabled', true);
	}
	function enableSaving() {
		saving = false;
		$('#core-theme-options #content').animate({opacity: 1.0}, 500).prop('disabled', false);
	}

	function productTabs() {
		var tabSize = $('.folio-tab-size select').val();
		for (x=0; x<=10; x++){
			var tabClass= '.folio-tab'+x;
			if(x <= tabSize){
				$(tabClass).css({'display':'block'})
			}else{
				$(tabClass).css({'display':'none'})
			}
		}
	}

	$(document).ready(function() {

		// Keep option buttons at the bottom of the screen
		//
		var contentContainer = $('#content');
		var optionContainer = $('.core-option-group-head');
		if (contentContainer.length) {
			var buttonBar = $('.core-option-theme-buttons');
			var windowElement = $(window);
			var lastTop = 0;

			function positionButtons() {
				//var destinationTop = (windowElement.scrollTop() + optionContainer.height() + 250 );
				var destinationTop = (windowElement.scrollTop() + windowElement.height() - 80 - contentContainer.offset().top)
				var maxTop = contentContainer.height();
				if (destinationTop > maxTop)
					destinationTop = maxTop - buttonBar.height();

				if (lastTop === destinationTop)
					return;

				buttonBar.stop(true, false).animate({top: destinationTop}, 500);
				lastTop = destinationTop;
			}
			$(window).scroll(positionButtons);
			$(window).resize(positionButtons);
			setInterval(positionButtons, 100);
			positionButtons();
		}

		// General Page
		$('#core-option-group-link-general').addClass('active');

		// Number option arrows
		//
		$('.core-option-number-input').each(function(index, element) {
			element = $(element);

			var step = parseFloat(element.attr('data-step'));
			var min = parseFloat(element.attr('data-min'));
			var max = parseFloat(element.attr('data-max'));

			// Prevent clicking from selecting elements
			element.siblings('.core-option-number-down, .core-option-number-up').bind('mousedown', function() { return false; });

			element.siblings('.core-option-number-up').bind('click', function() {
				var value = parseFloat(element.val());
				value = Math.min(value + step, max);
				element.val(value).trigger('change');
			});

			element.siblings('.core-option-number-down').bind('click', function() {
				var value = parseFloat(element.val());
				value = Math.max(value - step, min);
				element.val(value).trigger('change');
			});
		});

		// Image selection functions
		//
		$('.core-option-image-select-container').each(function(index, element) {
			var previewImageBox = $(element).find('.preview-thumb');
			var previewImage = previewImageBox.find('img');
			var previewImageRemove = previewImageBox.find('.remove');
			var imageText = $(element).find('input[type="text"]');

			// Hide remove button if no image is selected
			if (imageText.val() === '')
				previewImageRemove.hide();

			// Store\restore current sendtoeditor function
			function saveEditFunction() {
				window.originalSendToEditor = window.send_to_editor;
			}

			function restoreEditFunction() {
				if (window.originalSendToEditor !== null) {
	    			window.send_to_editor = window.originalSendToEditor;
	    			window.originalSendToEditor = null;
				}
			}

			// Uploading files
			var file_frame;

			  previewImageBox.live('click', function( event ){
				var send_attachment_bkp = wp.media.editor.send.attachment;
				var button = $(this);
				var destination = button.attr('data-destination');
				var destinationElement = $('#' + destination + ' ');
			    event.preventDefault();

			    // If the media frame already exists, reopen it.
			    if ( file_frame ) {
			      file_frame.open();
			      return;
			    }

			    // Create the media frame.
			    file_frame = wp.media.frames.file_frame = wp.media({
			      title: $( this ).data( 'title' ),
			      button: {
			        text: 'Insert Image',
			      destination: $( this ).data( 'destination' ),
			      },
			      multiple: false  // Set to true to allow multiple files to be selected
			    });

			    // When an image is selected, run a callback.
			    file_frame.on( 'select', function() {
			      // We set multiple to false so only get one image from the uploader
			      attachment = file_frame.state().get('selection').first().toJSON();
		          destinationElement.val(attachment.url);
				  previewImage.attr('src', attachment.url);
				  if (destinationElement.val() !== '')
					previewImageRemove.show();

			    });

			    // Finally, open the modal
			    file_frame.open();
			});

			// Remove selected image
			previewImageRemove.bind('click', function(ev) {
				// Erase input field
				imageText.val('');

				// Replace <img> thumbnail with empty <img> tag
				previewImage.remove();
				previewImage = $('<img class="preview">')
				previewImage.prependTo(previewImageBox);

				// Hide remove button
				previewImageRemove.hide();

				ev.preventDefault();
				return false;
			});

		});

		// Bind color pickers
		//
		$('.core-option-color').each(function() {
			var colorBox = $(this);
			var colorInput = colorBox.siblings('input');

			coreBindColorPicker(colorBox, colorInput);
		});

		// Pattern selection preview
		//
		$('.core-option-pattern-container > select').each(function(index, element) {
			element = $(element);
			var container = element.parent().parent();

			function changePattern() {
				var value = element.find(':selected').val();
				container.css('background-image', 'url(' + templateDir + '/images/patterns/' + value + ')');
			}

			element.bind('change', changePattern);
			changePattern();
		});

		// Theme options submit button
		//
		$('#core-options-submit').bind('click', function(event) {
			if (saving)
				return;

			disableSaving();

			var resultP = $('#core-options-result');
			var busy = $('#core-options-busy');

			var ANIMATE_SPEED = 150;
			var DELAY = 2000;

			// Show the busy animation
	        busy.stop(true, true).animate({opacity: 1}, ANIMATE_SPEED);
	        resultP.html('').fadeIn(ANIMATE_SPEED);

	        // Send the form's options
	        $.post(ajaxurl, $('#core-theme-options-form').serialize(), function(result) {


	        	// Update result
	        	busy.stop(true, true).animate({opacity: 0}, ANIMATE_SPEED, function() {
	        		resultP.stop(true, true);
	        		resultP.html('<i class="icon-ok green"></i> ' + result);
	        		resultP.stop(true, true).animate({opacity: 1}, ANIMATE_SPEED);
	        		resultP.delay(DELAY).fadeOut(ANIMATE_SPEED);
	        	});

	        	// TODO: Update sidebar select boxes
	        	$('.core-layout-sidebar > select').each(function(index, element) {

	        	});

	        	enableSaving();
	        });

	        event.preventDefault();
	        return false;
	    });

		// Bind group navigation
		//
		$('.core-option-group-link').bind('click', function() {
			var ANIMATE_SPEED = 100;

			var newGroup = $('#' + $(this).attr('id').replace('core-option-group-link-', 'core-option-group-'));

			$(this).parent().children('li').removeClass('active');
	    	$(this).addClass('active');

			// Exit if we are already displaying the clicked group
			if (newGroup.css('display') != 'none')
				return;

			// Toggle group visibility
			$('.core-option-group:visible').each(function() {
				$(this).slideUp(ANIMATE_SPEED);
			});
			newGroup.slideDown(ANIMATE_SPEED);
		});

	    // Theme options section tabs
	    //
	    $('.core-options-tabs > li').bind('click', function() {
	    	var section = $(this).attr('data-section');
	    	var element = $('#core-option-section-' + section);

	    	var ANIMATE_SPEED = 100;

	    	$(this).parent().children('li').removeClass('active');
	    	$(this).addClass('active');

	    	//$('#content div[id*=core-option-section-]').slideUp(ANIMATE_SPEED);
	    	$(this).parents('.core-option-group').find('.core-option-section').slideUp(ANIMATE_SPEED);
	    	element.slideDown(ANIMATE_SPEED);
	    });

	    // Trigger the background selection
	    $('.bg-options select').each(function(index, element) {
	    	var item = $(element);
	    	var itemID = item.parent().parent();

	    	//Initialize the background options and check for current options
	    	var bgSetup = item.parent().find('option:selected').val();

	    	if (bgSetup == 'image') {
				itemID.find('.bg-slider').slideUp('slow');
				itemID.find('.bg-img').slideDown('slow');
			} else if(bgSetup == 'slider') {
				itemID.find('.bg-slider').slideDown('slow');
				itemID.find('.bg-img').slideUp('slow');
			} else {
				itemID.find('.bg-slider').slideUp('slow');
				itemID.find('.bg-img').slideUp('slow');
			}

	    	item.change(function() {
	    		var bgSetup = item.parent().find('option:selected').val();
				if (bgSetup == 'image') {
					itemID.find('.bg-slider').slideUp('slow');
					itemID.find('.bg-img').slideDown('slow');
				} else if(bgSetup == 'slider') {
					itemID.find('.bg-slider').slideDown('slow');
					itemID.find('.bg-img').slideUp('slow');
				} else {
					itemID.find('.bg-slider').slideUp('slow');
					itemID.find('.bg-img').slideUp('slow');
				}

			});

	    });

		// Products Tabs
		productTabs();
		$( ".folio-tab-size select" ).change(function (){
			productTabs();
		});


	});

})(jQuery);
