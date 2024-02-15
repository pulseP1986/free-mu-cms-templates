// Slick Sliders
$(document).ready(function(){
  $('.header-slider').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    autoplay: true,
  });
});

$('.media-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  spaceBetween: 30,
  variableWidth: true,
  responsive: [
    {
      breakpoint: 860,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 525,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

//Tabs
(function($) {
  $(function() {
    $("ul.tabs-caption").on("click", "li:not(.active)", function() {
      $(this)
        .addClass("active")
        .siblings()
        .removeClass("active")
        .closest("div.tabs")
        .find("div.tabs-content")
        .removeClass("active")
        .eq($(this).index())
        .addClass("active");
    });
  });
})(jQuery);

// lightzoom
jQuery('.lightzoom').lightzoom({speed: 400, viewTitle: true});

// button to top
$(function() {
  $(window).scroll(function() {
    if($(this).scrollTop() != 0) {
    $('.toTop').fadeIn();
  } else {
    $('.toTop').fadeOut();
  }
  });
    $('.toTop').click(function() {
    $('body,html').animate({scrollTop:0},800);
  });
});

//Click Drop Blocks
$(".btn-drop").click(function(){
  $(this).toggleClass("active");
  $("."+$(this).attr("data-class")).toggleClass("active");
});

// drop block
$(".buttonDrop").click(function(){
  $(this).toggleClass("active");
  $('.'+$(this).attr('data-class')).slideToggle(400);
});

$(document).on('click', function(e) {
  if (!$(e.target).closest(".parent_block").length) {
    $('.toggled_block').hide();
  }
  if (!$(e.target).closest(".parent_block_theme").length) {
    $('.toggled_block_theme').hide();
  }
  e.stopPropagation();
});

// modal
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
                   .animate({opacity: 1, top: '0%'}, 200); 
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