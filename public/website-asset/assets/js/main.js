(function ($) {
	"use strict";

	var changeValue = $('.slider-main');
	changeValue.owlCarousel({
		loop: true,
		animateIn: 'fadeIn',
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav: true,
		dots: false,
		autoplay: true,
		items: 1
	});
	changeValue.on('changed.owl.carousel', function (event) {
		var item = event.item.index - 2;
		$('h1').removeClass('animated bounceInDown');
		$('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated bounceInDown');
		$('h2').removeClass('animated bounceInLeft');
		$('.owl-item').not('.cloned').eq(item).find('h2').addClass('animated bounceInLeft');
		$('h4').removeClass('animated bounceInDown');
		$('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated bounceInDown');
		$('h3').removeClass('animated rollIn');
		$('.owl-item').not('.cloned').eq(item).find('h3').addClass('animated rollIn');
		$('a').removeClass('animated rollIn');
		$('.owl-item').not('.cloned').eq(item).find('a').addClass('animated rollIn');
		$('.slider_animation').removeClass('animated bounceInRight');
		$('.owl-item').not('.cloned').eq(item).find('.slider_animation').addClass('animated bounceInRight');
	});
	//  coding for review slider
	$('.slider_review').owlCarousel({
		loop: true,
		animateIn: 'fadeIn',
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav: true,
		dots: false,
		autoplay: true,
		responsive: {
			0: {
				items: 1,
				nav: false,
			},
			600: {
				items: 2,
				nav: true,
			},
			1000: {
				items: 3,
				nav: true,
				loop: false
			}
		}
	});
	//    for page loader
	$(window).load(function () {
		$(".preloader").fadeOut("slow");
	});
	// for wow js
	new WOW().init();

	// ===== Scroll to Top ==== 
	$(window).scroll(function () {
		if ($(this).scrollTop() >= 10) {        // If page is scrolled more than 50px
			$('.scroll_top').fadeIn(200);    // Fade in the arrow
			$('.scroll_top').css('display', 'block');    // Fade in the arrow
		} else {
			$('.scroll_top').fadeOut(200);   // Else fade out the arrow
		}
	});
	$('.scroll_top').click(function () {      // When arrow is clicked
		$('body,html').animate({
			scrollTop: 0                       // Scroll to top of body
		}, 500);
	});

	/*=========================sticky nav js for fixed menu bar top======================*/
	var shrinkHeader = 50;
	$(window).scroll(function () {
		var scroll = getCurrentScroll();
		if (scroll >= shrinkHeader) {
			$('nav').addClass('menu');
		}
		else {
			$('nav').removeClass('menu');
		}
	});
	function getCurrentScroll() {
		return window.pageYOffset || document.documentElement.scrollTop;
	}
	/*=====coding for fancy box=====*/
	$(".shape").fancybox({
		fitToView: false, // avoids scaling the image to fit in the viewport
		beforeShow: function () {
			// set size to (fancybox) img
			$(".fancybox-image").css({
				"width": 600,
				"height": 600
			});
			// set size for parent container
			this.width = 600;
			this.height = 400;
		}
	});
	$('.gellary_slider').slick({
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
	});
	//Progress Bar start
	$('.progress-bar').each(function () {
		var width = $(this).data('percentage');
		$(this).css({ 'transition': 'width 3s ease-in-out' });
		$(this).appear(function () {
			$(this).css('width', width + '%');
		});
	});
	//Progress Bar end

})(jQuery);


/**************
 * coding for select box
 */
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
	selElmnt = x[i].getElementsByTagName("select")[0];
	/*for each element, create a new DIV that will act as the selected item:*/
	a = document.createElement("DIV");
	a.setAttribute("class", "select-selected");
	a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	x[i].appendChild(a);
	/*for each element, create a new DIV that will contain the option list:*/
	b = document.createElement("DIV");
	b.setAttribute("class", "select-items select-hide");
	for (j = 0; j < selElmnt.length; j++) {
		/*for each option in the original select element,
		create a new DIV that will act as an option item:*/
		c = document.createElement("DIV");
		c.innerHTML = selElmnt.options[j].innerHTML;
		c.addEventListener("click", function (e) {
			/*when an item is clicked, update the original select box,
			and the selected item:*/
			var y, i, k, s, h;
			s = this.parentNode.parentNode.getElementsByTagName("select")[0];
			h = this.parentNode.previousSibling;
			for (i = 0; i < s.length; i++) {
				if (s.options[i].innerHTML == this.innerHTML) {
					s.selectedIndex = i;
					h.innerHTML = this.innerHTML;
					y = this.parentNode.getElementsByClassName("same-as-selected");
					for (k = 0; k < y.length; k++) {
						y[k].removeAttribute("class");
					}
					this.setAttribute("class", "same-as-selected");
					break;
				}
			}
			h.click();
		});
		b.appendChild(c);
	}
	x[i].appendChild(b);
	a.addEventListener("click", function (e) {
		/*when the select box is clicked, close any other select boxes,
		and open/close the current select box:*/
		e.stopPropagation();
		closeAllSelect(this);
		this.nextSibling.classList.toggle("select-hide");
		this.classList.toggle("select-arrow-active");
	});
}
function closeAllSelect(elmnt) {
	/*a function that will close all select boxes in the document,
	except the current select box:*/
	var x, y, i, arrNo = [];
	x = document.getElementsByClassName("select-items");
	y = document.getElementsByClassName("select-selected");
	for (i = 0; i < y.length; i++) {
		if (elmnt == y[i]) {
			arrNo.push(i)
		} else {
			y[i].classList.remove("select-arrow-active");
		}
	}
	for (i = 0; i < x.length; i++) {
		if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
		}
	}
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);