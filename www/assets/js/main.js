$(function() {
	replaceSVG();

	var scroll = new SmoothScroll('a[href*="#"]');

	$('#project-slider').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: $('#projects-slider-prev'),
      	nextArrow: $('#projects-slider-next'),
		responsive: [
			{
				breakpoint: 980,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 700,
				settings: {
					slidesToShow: 1,
				}
			}
		]
	});

	$('#selling-slider').slick({
		infinite: true,
		slidesToShow: 1,
		prevArrow: $('#selling-slider-prev'),
      	nextArrow: $('#selling-slider-next')
	});

	baguetteBox.run('#projects-detail-gallery');
});