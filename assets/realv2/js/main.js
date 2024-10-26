(function($) {
	"use strict";
	$(window).on('load', function() {
		$('.preloader').hide();
	});
	if ($('.preloader').length > 0) {
		$('.preloaderCls').each(function() {
			$(this).on('click', function(e) {
				e.preventDefault();
				$('.preloader').css('display', 'none');
			})
		});
	};
	$('.mobile-menu-active').vsmobilemenu({
		menuContainer: '.vs-mobile-menu',
		expandScreenWidth: $('.mobile-menu-active').data('expand'),
		menuToggleBtn: '.vs-menu-toggle',
	});
	var lastScrollTop = '';
	var scrollToTopBtn = '.scrollToTop'

	function stickyMenu($targetMenu, $toggleClass) {
		var st = $(window).scrollTop();
		if ($(window).scrollTop() > 600) {
			$targetMenu.addClass($toggleClass);
			if (st > lastScrollTop) {} else {
				$targetMenu.addClass($toggleClass);
			};
		} else {
			$targetMenu.removeClass($toggleClass);
		};
		lastScrollTop = st;
	};
	$(window).on("scroll", function() {
		stickyMenu($('.sticky-header'), "active");
		if ($(this).scrollTop() > 400) {
			$(scrollToTopBtn).addClass('show');
		} else {
			$(scrollToTopBtn).removeClass('show');
		}
	});
	$(scrollToTopBtn).on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 3000);
		return false;
	});
	if ($('[data-bg-src]').length > 0) {
		$('[data-bg-src]').each(function() {
			var src = $(this).attr('data-bg-src');
			$(this).css({
				'background-image': 'url(' + src + ')'
			});
		});
	};
	
	function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
        $($sideMunuOpen).on('click', function(e) {
            e.preventDefault();
            $($sideMenu).addClass($toggleCls);
        });
        $($sideMenu).on('click', function(e) {
            e.stopPropagation();
            $($sideMenu).removeClass($toggleCls)
        });
        var sideMenuChild = $sideMenu + ' > div';
        $(sideMenuChild).on('click', function(e) {
            e.stopPropagation();
            $($sideMenu).addClass($toggleCls)
        });
        $($sideMenuCls).on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $($sideMenu).removeClass($toggleCls);
        });
    };
    popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');

	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});
	$('.filter-active').imagesLoaded(function() {
		var $filter = '.filter-active',
			$filterItem = '.grid-item',
			$filterMenu = '.filter-menu-active';
		if ($($filterMenu).length > 0) {
			var $grid = $($filter).isotope({
				itemSelector: $filterItem,
				filter: '*',
				masonry: {
					columnWidth: $filterItem
				}
			});
			$($filterMenu).on('click', 'button', function() {
				var filterValue = $(this).attr('data-filter');
				$grid.isotope({
					filter: filterValue
				});
			});
			$($filterMenu).on('click', 'button', function(event) {
				event.preventDefault();
				$(this).addClass('active');
				$(this).siblings('.active').removeClass('active');
			});
		};
	});
	$.fn.indicator = function() {
		var $menu = $(this),
			$linkBtn = $menu.find('a'),
			$btn = $menu.find('button');
		$menu.append('<span class="indicator"></span>');
		var $line = $menu.find('.indicator');
		if ($linkBtn.length) {
			var $currentBtn = $linkBtn;
		} else if ($btn.length) {
			var $currentBtn = $btn
		}
		$currentBtn.on('click', function(e) {
			e.preventDefault();
			$(this).addClass('active');
			$(this).siblings('.active').removeClass('active');
			linePos()
		})

		function linePos() {
			var $btnActive = $menu.find('.active'),
				$height = $btnActive.css('height'),
				$width = $btnActive.css('width'),
				$top = $btnActive.position().top + 'px',
				$left = $btnActive.position().left + 'px';
			$line.css({
				top: $top,
				left: $left,
				width: $width,
				height: $height,
			})
		}
		if ($menu.hasClass('vs-slider-tab')) {
			var linkslide = $menu.data('asnavfor');
			$(linkslide).on('afterChange', function(event, slick, currentSlide, nextSlide) {
				setTimeout(linePos, 10)
			});
		}
		linePos()
	}
	if ($('.filter-menu-style1').length) {
		$('.filter-menu-style1').indicator();
	}
	if ($('.tab-indicator').length) {
		$('.tab-indicator').indicator();
	}
	if ($('.title-rotate').length) {
		$('.title-rotate').each(function() {
			var $title = $(this);
			var $letter = $title.text().split('');
			$title.html('')
			for (var i = 0; i < $letter.length; i++) {
				$title.prepend('<span class="letter">' + $letter[i] + '</span>')
			}
		})
	}
	$.fn.vsslideTab = function(btn) {
		$(this).each(function() {
			var $menu = $(this),
				slider = $menu.data('asnavfor'),
				$btn = $menu.find(btn);
			var i = 0;
			$btn.each(function() {
				$(this).attr('data-slide-go-to', i)
				i++
				$(this).on('click', function(e) {
					e.preventDefault();
					var slideno = $(this).data('slide-go-to');
					$(slider).slick('slickGoTo', slideno);
				})
			})
			$(slider).on('afterChange', function(event, slick, currentSlide, nextSlide) {
				$btn.removeClass('active');
				$('[data-slide-go-to=' + currentSlide + ']').addClass('active');
			});
		});
	};
	if ($('.vs-slider-tab').length) {
		$('.vs-slider-tab').vsslideTab('.tab-btn');
	}
	$.fn.tabAnimation = function() {
		$(this).on('hide.bs.tab', function(e) {
			var $old_tab = $($(e.target).attr("href"));
			var $new_tab = $($(e.relatedTarget).attr("href"));
			if ($new_tab.index() < $old_tab.index()) {
				$old_tab.css('position', 'relative').css("bottom", "0").show();
				$old_tab.animate({
					"bottom": "-200px"
				}, 300, function() {
					$old_tab.css("bottom", 0).removeAttr("style");
				});
			} else {
				$old_tab.css('position', 'relative').css("top", "0").show();
				$old_tab.animate({
					"top": "-200px"
				}, 300, function() {
					$old_tab.css("top", 0).removeAttr("style");
				});
			}
		});
		$(this).on('show.bs.tab', function(e) {
			var $new_tab = $($(e.target).attr("href"));
			var $old_tab = $($(e.relatedTarget).attr("href"));
			if ($new_tab.index() > $old_tab.index()) {
				$new_tab.css('position', 'relative').css("bottom", "-200px");
				$new_tab.animate({
					"bottom": "0"
				}, 500);
			} else {
				$new_tab.css('position', 'relative').css("top", "-200px");
				$new_tab.animate({
					"top": "0"
				}, 500);
			}
		});
	}
	$('a[data-bs-toggle="tab"]').tabAnimation();
	$.fn.hoverClass = function(element, eleClass) {
		$(this).each(function() {
			$(this).on('mouseenter', function() {
				$(element).addClass(eleClass);
			}).on('mouseleave', function() {
				$(element).removeClass(eleClass);
			})
		})
	};
	$(document).ready(function(){
		$('.vs-btn:not(.style3), .ls-arrow, .slick-arrow').hoverClass('.vs-cursor, .vs-cursor2', 'style2');
		$('.vs-hero-carousel').each(function() {
			var vsHslide = $(this);

			function d(data) {
				return vsHslide.data(data)
			}
			vsHslide.on('sliderWillLoad', function(event, slider) {
				var respLayer = jQuery(this).find('.ls-responsive'),
					lsDesktop = 'ls-desktop',
					lsLaptop = 'ls-laptop',
					lsTablet = 'ls-tablet',
					lsMobile = 'ls-mobile',
					windowWid = jQuery(window).width(),
					lgDevice = 1025,
					mdDevice = 993,
					smDevice = 768;
				respLayer.each(function() {
					var layer = jQuery(this);

					function lsd(data) {
						return (layer.data(data) === '') ? layer.data(null) : layer.data(data);
					}
					var respStyle = (windowWid < smDevice) ? lsd(lsMobile) : ((windowWid < mdDevice ? lsd(lsTablet) : ((windowWid < lgDevice) ? lsd(lsLaptop) : lsd(lsDesktop)))),
						mainStyle = (layer.attr('style') !== undefined) ? layer.attr('style') : ' ';
					layer.attr('style', mainStyle + respStyle);
				});
			});
			vsHslide.layerSlider({
				allowRestartOnResize: true,
				maxRatio: (d('maxratio') ? d('maxratio') : 1),
				type: (d('slidertype') ? d('slidertype') : 'responsive'),
				pauseOnHover: (d('pauseonhover') ? true : false),
				navPrevNext: (d('navprevnext') ? true : false),
				hoverPrevNext: (d('hoverprevnext') ? true : false),
				hoverBottomNav: (d('hoverbottomnav') ? true : false),
				navStartStop: (d('navstartstop') ? true : false),
				navButtons: (d('navbuttons') ? true : false),
				loop: ((d('loop') == false) ? false : true),
				autostart: (d('autostart') ? true : false),
				height: (($(window).width() < 767) ? (d('sm-height') ? d('sm-height') : d('height')) : (d('height') ? d('height') : 1080)),
				responsiveUnder: (d('responsiveunder') ? d('responsiveunder') : 1220),
				layersContainer: (d('container') ? d('container') : 1220),
				showCircleTimer: (d('showcircletimer') ? true : false),
				skinsPath: 'assets/' + DmNConfig.tmp_dir + '/css/layerslider/skins/',
				thumbnailNavigation: ((d('thumbnailnavigation') == false) ? false : true)
			});
			vsHslide.find('[data-ls-go]').each(function() {
				$(this).on('click', function(e) {
					e.preventDefault();
					var target = $(this).data('ls-go');
					vsHslide.layerSlider(target)
				});
			});
		});

		$('.open_modal').on('click', function(event){
			event.preventDefault();
			var div = $(this).attr('href');
			$('#overlay').fadeIn(400, function() {
				$(div).css('display', 'block').animate({
					opacity: 1,
					top: '10%'
				}, 200);
			});
		});
		$('.modal_close, #overlay').on('click', function(event){
			$('.modal_div').animate({
				opacity: 0,
				top: '15%'
			}, 200, function() {
				$(this).css('display', 'none');
				$('#overlay').fadeOut(400);
			});
		});
	});
	$.fn.slickHero = function() {
		var slider = $(this);
		$('[data-ani-duration]').each(function() {
			var durationTime = $(this).data('ani-duration');
			$(this).css('animation-duration', durationTime);
		});
		$('[data-ani-delay]').each(function() {
			var delayTime = $(this).data('ani-delay');
			$(this).css('animation-delay', delayTime);
		});
		$('[data-ani]').each(function() {
			var animaionName = $(this).data('ani');
			$(this).addClass(animaionName);
			$('.slick-current [data-ani]').addClass('animated');
		});
		$('.vs-carousel').on('afterChange', function(event, slick, currentSlide, nextSlide) {
			$('[data-ani]').removeClass('animated');
			$('.slick-current [data-ani]').addClass('animated');
		});
	}
	if ($('.hero-slick').length) {
		$('.hero-slick').slickHero();
	}
})(jQuery);

const paginateRankings = (elem) => {
	let n = document.querySelectorAll(elem);
	n.forEach(n => {
		let e = n.querySelector(".ranking"),
			r = n.querySelector(".page-left"),
			i = n.querySelector(".page-right"),
			t = n.querySelector(".page-center"),
			a = 1,
			g = e.children.length,
			l = Math.ceil(g / 5);

		function k(n) {
			let r = (n - 1) * 5,
				i = Math.min(r + 5, g);
			for (let a = 0; a < g; a++) e.children[a].style.display = "none";
			for (let l = r; l < i; l++) e.children[l].style.display = "";
			t.textContent = "Page " + n
		}
		r.addEventListener("click", function(n) {
			n.preventDefault(), a > 1 && k(--a)
		}), i.addEventListener("click", function(n) {
			n.preventDefault(), a < l && k(++a)
		}), k(a)
	})
}

let currentSlide = 0;
let slides = document.querySelectorAll('.slide');
let navDots = document.querySelectorAll('.nav-dot');

function changeSlide(slideIndex = null) {
    slides[currentSlide].classList.remove('active');
    navDots[currentSlide].classList.remove('active');
    if (slideIndex !== null) {
        currentSlide = slideIndex;
    } else {
        currentSlide++;
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
    }
    slides[currentSlide].classList.add('active');
    navDots[currentSlide].classList.add('active');
}
if(slides.length > 0){
	setInterval(changeSlide, 8000);
}
navDots.forEach(dot => {
    dot.addEventListener('click', function() {
        const slideIndex = parseInt(this.getAttribute('data-slide'));
        changeSlide(slideIndex);
    });
});

const sidePromotion = document.querySelector('.side-promotion');

if(sidePromotion != null){
	let isSticky = false;
	window.addEventListener('scroll', () => {
		const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
		if (scrollPosition >= 600 && !isSticky) {
			sidePromotion.classList.add('sticky');
			sidePromotion.style.transform = 'translateY(-50%)';
			isSticky = true;
		} else if (scrollPosition < 600 && isSticky) {
			sidePromotion.style.transform = '';
			sidePromotion.classList.remove('sticky');
			isSticky = false;
		}
	});
}

if(navDots.length > 0){
	navDots[0].classList.add('active');
}