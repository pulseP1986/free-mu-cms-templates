document.addEventListener('DOMContentLoaded', () => {
	const nextAll = element => {
		const nextElements = [];

		while (element.nextElementSibling) {
			nextElements.push(element.nextElementSibling);
			element = element.nextElementSibling;
		}

		return nextElements;
	}

	const menu = document.querySelector('.menu-main'),
				more = document.querySelector('.menu-more'),
				subMenu = document.querySelector('.menu-sub'),
				parent = document.querySelector('.menu-wrapper'),
				root = document.documentElement,
				moreWidth = getComputedStyle(root).getPropertyValue('--more-width'),
				moreMargin = getComputedStyle(root).getPropertyValue('--more-margin'),
				menuMargin = getComputedStyle(root).getPropertyValue('--menu-margin');
	
	let windowWidth = window.innerWidth;

	const contract = () => {
		let w = 0,
				outerWidth = parent.offsetWidth - (parseInt(moreWidth) + parseInt(moreMargin) + parseInt(menuMargin) + 30);

		let menuItems = menu.querySelectorAll('li');

		for (let i = 0; i < menuItems.length; i++) {
			w += menuItems[i].offsetWidth;

			if (w > outerWidth) {
				let nextElements = nextAll(menuItems[i - 1]);

				let nextReverse = nextElements.reverse();

				nextReverse.forEach(el => {
					el.remove();
					subMenu.prepend(el);
				});

				break;
			}
		}
	};

	const expand = () => {
		let w = 0,
				outerWidth = parent.offsetWidth - (parseInt(moreWidth) + parseInt(moreMargin) + parseInt(menuMargin) + 30);

		let menuItems = menu.querySelectorAll('li');
		menuItems.forEach(el => {
			w += el.offsetWidth;
		});

		let submenuItems = subMenu.querySelectorAll('li');
		for (let i = 0; i < submenuItems.length; i++) {
			w += submenuItems[i].offsetWidth;
			if (w > outerWidth) {
				let a = 0;

				while(a < i) {
					submenuItems[a].remove();
					menu.appendChild(submenuItems[a]);

					a++;
				}

				break;
			}
		}

		if (submenuItems.length > 0) {
			let lastOffset = submenuItems[submenuItems.length - 1].offsetWidth;

			if ((menu.offsetWidth + lastOffset) <= outerWidth) {
				submenuItems[submenuItems.length - 1].remove();
				menu.appendChild(submenuItems[submenuItems.length - 1]);
			}
		}
	};

	const checkActive = () => {
		if (subMenu.querySelectorAll('li').length) {
			more.classList.add('active');
		} else {
			more.classList.remove('active');
		}
	};

	contract();
	checkActive();
	
	window.addEventListener('resize', () => {
		(window.innerWidth > windowWidth) ? expand() : contract();
		windowWidth = window.innerWidth;
		checkActive();
	});
});


$('.btn-tab').click(function(){
	$('.btn-tab').removeClass('active');
	$(this).addClass('active');
	$('.btn-block').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
  })
  
  //Click Drop Blocks
$(".btn-drop").click(function(){
	$(this).toggleClass("active");
	$("."+$(this).attr("data-class")).toggleClass("active");
  });
  
  $(".buttonDrop").click(function(){
	$(this).toggleClass("active");
	$('.'+$(this).attr('data-class')).slideToggle(400);
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
					 .animate({opacity: 1, top: '10%'}, 200); 
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