$('.media-slider').slick({
  dots: false,
  infinite: true,
  speed: 900,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1350,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 920,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

// button to top
$(function() {
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
  e.stopPropagation();
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

$('.dropdown-el').click(function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).toggleClass('expanded');
  $('#'+$(e.target).attr('for')).prop('checked',true);
});
$(document).click(function() {
  $('.dropdown-el').removeClass('expanded');
});

jQuery('.lightzoom').lightzoom({speed: 400, viewTitle: true});
