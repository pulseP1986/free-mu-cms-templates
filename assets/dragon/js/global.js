$('.button-to-the-top').click(function() {
	$('body, html').animate({scrollTop:0},800);
});

$('.tab-button').click(function(){
	$('.tab-button').removeClass('active');
	$(this).addClass('active');
	$('.tab-block').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
})

$(".buttonDrop").click(function(){
  $("."+$(this).attr("data-class")).toggleClass("active");
  $(this).toggleClass("active");
});

var res = $(".dropDown-menu");
$('[data-class^="m"]').on("click", funk);

$(document).click(function(e) {
  if ($(e.target).closest(res).length || $(e.target).closest('.menu-a').length) return;
  res.fadeOut(100);
});
function funk(){
  $(this).toggleClass("show");
  var link = $(this).attr('data-class'),
      el = $('.dropDown-menu.'+link);
  if(el.css("display") == "none"){
    res.hide();
    el.slideToggle(400);
  }
  else{
    el.slideToggle(400);
  }
}