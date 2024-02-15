$(".btn-drop").click(function(){
  $(this).toggleClass("active");
  $("."+$(this).attr("data-class")).toggleClass("active");
});

$(".buttonDrop").click(function(){
	$(this).toggleClass("active");
	$('.'+$(this).attr('data-class')).slideToggle(400);
});

$(function() {
    $('.toTop').click(function() {
    $('body,html').animate({scrollTop:0},800);
  });
});





