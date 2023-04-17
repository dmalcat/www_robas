$(function() {
	replaceSVG();

	$('#project-slider').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3
	});

	$('#selling-slider').slick({
		infinite: true,
		slidesToShow: 1,
		prevArrow: $('#selling-slider-prev'),
      	nextArrow: $('#selling-slider-next')
	});
});