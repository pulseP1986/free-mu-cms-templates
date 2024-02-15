$('.toTop').click(function() {
	$('body, html').animate({scrollTop:0},800);
});

$(".buttonDrop").click(function(){
  $("."+$(this).attr("data-class")).toggleClass("active");
  $(this).toggleClass("active");
});

$(document).on('ready', function() {
	$(".regular").slick({
		speed: 1500,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
		responsive: [
			{
			  breakpoint: 1200,
			  settings: {
				slidesToShow: 2,
			  }
			},
			{
				breakpoint: 992,
				settings: {
				  slidesToShow: 1,
				}
			  }
		]
	});
});