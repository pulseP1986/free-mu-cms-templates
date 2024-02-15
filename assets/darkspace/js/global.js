var swiper = new Swiper('.swiper-container', {
  speed: 1500,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
  },
});

$(function() {
  $('.toTop').click(function() {
    $('body,html').animate({scrollTop:0},800);
  });
});


$(".buttonDrop").click(function(){
    $("."+$(this).attr("data-class")).toggleClass("active");
    $(this).toggleClass("active");
  });

$('.rang-button').click(function(){
	$('.rang-button').removeClass('active');
	$(this).addClass('active');
	$('.rangBlock').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
})

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

$(document).ready(function() { 
  var overlay = $('#overlay'); 
  var open_modal = $('.open_modal'); 
  var close = $('.modal_close, #overlay'); 
  var modal = $('.modal_div'); 
   open_modal.click( function(event){ 
       event.preventDefault(); 
       var div = $(this).attr('href'); 
       overlay.fadeIn(400, 
           function(){ 
               $(div) 
                   .css('display', 'block') 
                   .animate({opacity: 1, top: '15%'}, 200); 
       });
   });

   close.click( function(){ 
          modal 
           .animate({opacity: 0, top: '15%'}, 200, 
               function(){ 
                   $(this).css('display', 'none');
                   overlay.fadeOut(400); 
               }
           );
   });
});
