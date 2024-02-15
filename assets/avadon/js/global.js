// Slick Sliders
$(document).ready(function(){
  $('.slick-slider').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    autoplay: true,
  });
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

// button to top
$(function() {
    $('.toTop').click(function() {
    $('body,html').animate({scrollTop:0},800);
  });
});

$(document).ready(function () {
  $(".modal-link").on("click", function() {
      $('.modal-overlay[data-modal-id="'+$(this).data('modal-id')+'"]').addClass("modal-overlay_visible");
      $('body').addClass("body-fixed");
  });

  $(".modal__close").on("click", function() {
      $(".modal-overlay").removeClass("modal-overlay_visible");
      $('body').removeClass("body-fixed");
  }); 
  $(document).on("click", function(e) {
      if(!$(e.target).closest(".modal").length && !$(e.target).closest(".modal-link").length) {
          $(".modal-overlay").removeClass("modal-overlay_visible");
          $('body').removeClass("body-fixed");
      }
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
  e.stopPropagation();
});