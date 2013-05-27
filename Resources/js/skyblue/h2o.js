var currentSlide = 0;
var maxSlides = 0;
var JS_mode = 'production'; // production or dev

// Disabled console.log in case of production
if( JS_mode === 'dev' ) {
	if(!console) {
		console = {};
	}
	console.log = function() {};
}

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
			everythingsFilled = { valid: true, fields: [] };

	// Splitting the keys and values
	for( var i = 0; i < paramCount; i++ ) {
		splitParams[i] = splitParams[i].split('=');
		if( !splitParams[i][0].length || !splitParams[i][1].length ) {
			everythingsFilled.valid = false;
			everythingsFilled.fields.push(splitParams[i][0]);
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

		$firstHalf.find('.highlighted').removeClass('highlighted');

		console.log('stageOne isFilled', isFilled);

		if(isFilled.valid) {
			$firstHalf.fadeOut(200, function() {
				$(this).slideUp();
				$secondHalf.slideDown();
			});

			$secondHalf.find('input[name="fundraiserName"]').val( $firstHalf.find('input[name="fundraiserName"]').val() );
			$secondHalf.find('input[name="charityName"]').val( $firstHalf.find('input[name="charityName"]').val() );
			$secondHalf.find('input[name="eventDescription"]').val( $firstHalf.find('textarea[name="eventDescription"]').val() );
		} else {
			Notify([['All fields highlighted in red are required!', 0]]);
			var fieldCount = isFilled.fields.length;
			for(var i = 0; i < fieldCount; i++) {
				$('input[name="' + isFilled.fields[i] + '"]').addClass('highlighted');
				$('select[name="' + isFilled.fields[i] + '"]').addClass('highlighted');
				$('textarea[name="' + isFilled.fields[i] + '"]').addClass('highlighted');
			}
		}
	});

	$stageTwo.click(function(){
		var formParams = $('#fullData').serialize(),
				isFilled = checkForm(formParams),
				error = [],
				redirectUrl = '';

		console.log('stageTwo isFilled', isFilled);

		$secondHalf.find('.highlighted').removeClass('highlighted');

		if(isFilled.valid) {
			$.get( '/page/register/?' + formParams, function(r) {
				r = $.parseJSON(r);
				if(r.statusString) {
					error = $.parseJSON(r.statusString);
				} else {
					error = [];
					redirectUrl = r.redirectUrl;
				}
				console.log('response', r.status);
				console.log('redirectUrl', redirectUrl);

				if(r.status == "success" && redirectUrl.length) {
					Notify([['Registration successfull! You\'ll be redirected to your fundraiser shortly.', 1]]);
					setTimeout(function() {
						window.location = redirectUrl;
					}, 2000);
				} else {
					var messageCount = error.length;

					for(var i = 0; i < messageCount; i++) {
						$('input[name="' + error[i].fieldName + '"]').animate({'border-color': '#F00'});
					}
				}
			});
		} else {
			Notify([['All fields highlighted in red are required!', 0]]);
			var fieldCount = isFilled.fields.length;
			for(var i = 0; i < fieldCount; i++) {
				$('input[name="' + isFilled.fields[i] + '"]').addClass('highlighted');
				$('select[name="' + isFilled.fields[i] + '"]').addClass('highlighted');
				$('textarea[name="' + isFilled.fields[i] + '"]').addClass('highlighted');
			}
		}
	});

});