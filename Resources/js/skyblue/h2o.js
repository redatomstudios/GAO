var currentSlide = 0;
var maxSlides = 0;

function startSlider() {
	var slideElements = $('.liteSlide').get();

	for(thisElement in slideElements) {
		thisSlides = 0;
		thisElement = $(slideElements[thisElement]).get()[0];
		
		thisSlides = $(thisElement).children().get().length;

		if(!maxSlides || thisSlides < maxSlides) {
			maxSlides = thisSlides;
		}
	}

	cycleSlides();
}

function gotoslide(slide) {
	var slideElements = $('.liteSlide').get();

	if(maxSlides) {
		$(slideElements).children().queue('fx', []).animate({ opacity: 0 }, 200, function() {
			$(this).hide();
			$(slideElements).each(function() {
				$(this.children[slide]).queue('fx', []).show().animate({ opacity: 1 }, 200);
			});
		});
	}
}

function cycleSlides() {
	gotoslide(currentSlide++ % maxSlides);
	setTimeout(cycleSlides, 8000);
}

function checkForm(dataString) {
	var splitParams = dataString.split('&'),
			paramCount = splitParams.length,
			everythingsFilled = true;

	// Splitting the keys and values
	for( var i = 0; i < paramCount; i++ ) {
		splitParams[i] = splitParams[i].split('=');
		if( !splitParams[i][0].length || !splitParams[i][1].length ) {
			everythingsFilled = false;
		}
	}

	return everythingsFilled;
}

jQuery(document).ready(function() {
	startSlider();

	$('.formBlock').on('focus', '.element', function() {
		$(this).parent().find('.elemHint').queue('fx', []).slideDown();
	}).on('blur', '.element', function() {
		$(this).parent().find('.elemHint').queue('fx', []).slideUp();
	});

	var $firstHalf = $('div.firstHalf'),
			$secondHalf = $('div.secondHalf'),
			$stageOne = $firstHalf.find('input[type="button"]'),
			$stageTwo = $secondHalf.find('input[type="button"]');

	$stageOne.click(function(){
		var formParams = $('#initData').serialize(),
				isFilled = checkForm(formParams);
		console.log('isFilled', isFilled);
		if(isFilled) {
		// 	$.get( '/page/catchMe/?' + formParams, function(r) {
		// 		r = $.parseJSON(r);
		// 		console.log('response', r);

		// 		if(r.response == "success") {
					$firstHalf.slideUp();
					$secondHalf.slideDown();

					$secondHalf.find('input[name="fundraiserName"]').val( $firstHalf.find('input[name="fundraiserName"]').val() );
					$secondHalf.find('input[name="charityName"]').val( $firstHalf.find('input[name="charityName"]').val() );
					$secondHalf.find('input[name="eventDescription"]').val( $firstHalf.find('textarea[name="eventDescription"]').val() );

		// 		} else {
		// 			var error = r.errorMessages,
		// 					messageCount = error.length;

		// 			for(var i = 0; i < messageCount; i++) {
		// 				$('input[name="' + error[i].fieldName + '"]').animate({'border-color': '#F00'});
		// 			}
		// 		}
		// 	});
		}
	});

	$stageTwo.click(function(){
		var formParams = $('#fullData').serialize(),
				isFilled = checkForm(formParams);
		console.log('isFilled', isFilled);
		if(isFilled) {
			$.get( '/page/register/?' + formParams, function(r) {
				r = $.parseJSON(r);
				console.log('response', r);

				if(r.response == "success") {
					$firstHalf.slideUp();
					$secondHalf.slideDown();
				} else {
					var error = r.errorMessages,
							messageCount = error.length;

					for(var i = 0; i < messageCount; i++) {
						$('input[name="' + error[i].fieldName + '"]').animate({'border-color': '#F00'});
					}
				}
			});
		}
	});

});