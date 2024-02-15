$(".buttonDrop").click(function(){
  $("."+$(this).attr("data-class")).toggleClass("active");
  $(this).toggleClass("active");
});

$('.newsTabs-button').click(function(){
	$('.newsTabs-button').removeClass('active');
	$(this).addClass('active');
	$('.tabsBlock').removeClass('active');
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
  var div;

  open_modal.click(function(event){ 
      event.preventDefault(); 
      div = $(this).attr('href'); 
      overlay.fadeIn(400, 
          function(){ 
              $(div) 
                  .css('display', 'flex') 
                  .animate({opacity: 1, top: '50%'}, 200); 
      });
  });

  close.click( function(){
    $(div).animate({opacity: 0, top: '265px'}, 200, function () {
      $(div).css('display', 'none');
      overlay.fadeOut(400); 
    });
  });
});


$(document).on('click', function(e) {
	if (!$(e.target).closest(".parent_block").length) {
	  $('.toggled_block').hide();
	}
	if (!$(e.target).closest(".parent_block_account").length) {
	  $('.toggled_block_account').hide();
	}
	e.stopPropagation();
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
