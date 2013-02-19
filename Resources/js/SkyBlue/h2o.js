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

jQuery(document).ready(function() {
	startSlider();

	$('.formBlock').on('focus', '.element', function() {
		$(this).parent().find('.elemHint').slideToggle();
	}).on('blur', '.element', function() {
		$(this).parent().find('.elemHint').slideToggle();
	});
});