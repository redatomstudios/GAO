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

	var donorTrigger = $('#donorListTrigger'),
			donorList = $('#donorList'),
			donorTitle = donorList.find('h4'),
			editTrigger = $('.editTrigger a');

	donorTrigger.on('click', function() {
		if(!donorList.hasClass('expanded')) {
			donorTitle.html('All Donations');
			donorTrigger.html('Collapse List');
		} else {
			donorList.children('ul').animate({scrollTop: 0});
			donorTitle.html('Recent Donations');
			donorTrigger.html('View All Donations');
		}
		donorList.toggleClass('expanded');
	});

	editTrigger.nm();
});