$(function() {
	replaceSVG();

	var scroll = new SmoothScroll('a[href*="#"]');

	$('#project-slider').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: $('#projects-slider-prev'),
      	nextArrow: $('#projects-slider-next')
	});

	$('#selling-slider').slick({
		infinite: true,
		slidesToShow: 1,
		prevArrow: $('#selling-slider-prev'),
      	nextArrow: $('#selling-slider-next')
	});
});