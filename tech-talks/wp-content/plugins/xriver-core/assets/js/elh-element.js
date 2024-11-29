(function ($) {
	"use strict";

	/*----- ELEMENTOR LOAD FUNTION CALL ---*/
	$(window).on("elementor/frontend/init", function () {
		var heroSlider = function () {

		}; // end

		// heroslider
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/ta_hero_slider.default",
			function ($scope, $) {
				//heroSlider();
			}
		);

	});

	/*----- ELEMENTOR LOAD FUNTION CALL ---*/
	$(window).on("elementor/frontend/init", function () {

		var heroSlider = function () {
			var heroSlider = $("[data-tf-hero-slider]");
			heroSlider.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				slideSpeed: 3000,
				nav: false,
				responsiveClass: true,
				items: 1,
				dots: true,
				dotsData: true,
				slideSpeed: 3000,
				animateIn: 'fadeIn',
				animateOut: 'fadeOut',
			});

			heroSlider.on('translate.owl.carousel', function () {
				var layer = $("[data-animation]");
				layer.each(function () {
					var s_animation = $(this).data('animation');
					$(this).removeClass('animated ' + s_animation).css('opacity', '0');
				});
			});

			$("[data-delay]").each(function () {
				var animation_del = $(this).data('delay');
				$(this).css('animation-delay', animation_del);
			});

			$("[data-duration]").each(function () {
				var animation_dur = $(this).data('duration');
				$(this).css('animation-duration', animation_dur);
			});

			heroSlider.on('translated.owl.carousel', function () {
				var layer = heroSlider.find('.owl-item.active').find("[data-animation]");
				layer.each(function () {
					var s_animation = $(this).data('animation');
					$(this).addClass('animated ' + s_animation).css("opacity", "1");
				});
			});

			var heroSlider2 = $("[data-tf-hero-slider-2]");
			heroSlider2.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				nav: true,
				responsiveClass: true,
				items: 1,
				dots: true,
				dotsData: true,
				navText: [
					"<i class='fal fa-long-arrow-left'></i>",
					"<i class='fal fa-long-arrow-right'></i>",
				],
				animateIn: 'fadeIn',
				animateOut: 'fadeOut',
			});

			heroSlider2.on('translate.owl.carousel', function () {
				var layer = $("[data-animation]");
				layer.each(function () {
					var s_animation = $(this).data('animation');
					$(this).removeClass('animated ' + s_animation).css('opacity', '0');
				});
			});

			$("[data-delay]").each(function () {
				var animation_del = $(this).data('delay');
				$(this).css('animation-delay', animation_del);
			});

			$("[data-duration]").each(function () {
				var animation_dur = $(this).data('duration');
				$(this).css('animation-duration', animation_dur);
			});

			heroSlider2.on('translated.owl.carousel', function () {
				var layer = heroSlider2.find('.owl-item.active').find("[data-animation]");
				layer.each(function () {
					var s_animation = $(this).data('animation');
					$(this).addClass('animated ' + s_animation).css("opacity", "1");
				});
			});
		}; // end

		var taBrand = function () {
			var taBrand2 = $("[data-tf-brand-2]");
			taBrand2.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				slideSpeed: 3000,
				nav: false,
				dots: false,
				responsiveClass: true,
				items: 6,
				autoplay:true,
    			autoplayTimeout:1500,
    			autoplayHoverPause:true,
				responsive:{
					0:{
						items: 1,
						margin: 0,
					},
					575:{
						items: 3
					},
					992:{
						items: 5
					},
					1200:{
						items: 6
					}
				}
			});

			var taBrand3 = $("[data-tf-brand-3]");
			taBrand3.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				slideSpeed: 3000,
				nav: false,
				dots: false,
				responsiveClass: true,
				items: 7,
				autoplay:true,
    			autoplayTimeout:1500,
    			autoplayHoverPause:true,
				responsive:{
					0:{
						items: 1,
						margin: 0,
					},
					575:{
						items: 2
					},
					768:{
						items: 3,
						margin: 30,
					},
					1200:{
						items: 6,
					},
					1600:{
						items: 7
					}
				}
			});
		}; // end

		var ctaBrand = function () {
			var taBrand = $("[data-tf-brand]");
			taBrand.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				slideSpeed: 3000,
				nav: false,
				dots: false,
				responsiveClass: true,
				items: 3,
				autoplay:true,
    			autoplayTimeout:1500,
    			autoplayHoverPause:true,
				responsive:{
					767:{
						items: 3
					},
					992:{
						items: 5
					},
					1200:{
						items:3
					}
				}
			});
		}; // end

		var testimonialSlider = function () {
			var taTestimonial = $("[data-testimonial-slider]");
			taTestimonial.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				slideSpeed: 3000,
				nav: true,
				dots: false,
				responsiveClass: true,
				items: 3,
				navText: [
					"<i class='fal fa-long-arrow-left'></i> PREV",
					"NEXT <i class='fal fa-long-arrow-right'></i>",
				],
				responsive:{
					0:{
						items: 1,
					},
					768:{
						items: 2
					},
					1200:{
						items: 3
					}
				}
			});
		}; // end

		var productSlider = function () {
			var taProductSlider = $("[data-product-slider]");
			taProductSlider.owlCarousel({
				loop: true,
				margin: 40,
				loop: true,
				slideSpeed: 3000,
				nav: true,
				dots: false,
				responsiveClass: true,
				items: 4,
				navText: [
					"<i class='fal fa-long-arrow-left'></i> PREV",
					"NEXT <i class='fal fa-long-arrow-right'></i>",
				],
				responsive:{
					0:{
						items: 1,
					},
					768:{
						items: 2
					},
					1200:{
						items: 4
					}
				}
			});
			// Woo compare button
			if($(".tf-product-box .woosc-btn").length) {
				var categoriesWrap = $(".tf-product-box .woosc-btn");
				var categoriesIcon = $("<span class='action-text'>Compare</span>");

				categoriesIcon.appendTo(categoriesWrap);
			};
		}; // end

		//heroslider
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/slider.default",
			function ($scope, $) {
				heroSlider();
			}
		);

		elementorFrontend.hooks.addAction(
			"frontend/element_ready/brand.default",
			function ($scope, $) {
				taBrand();
			}
		);

		elementorFrontend.hooks.addAction(
			"frontend/element_ready/cta.default",
			function ($scope, $) {
				ctaBrand();
			}
		);

		elementorFrontend.hooks.addAction(
			"frontend/element_ready/testimonial_slider.default",
			function ($scope, $) {
				testimonialSlider();
			}
		);

		elementorFrontend.hooks.addAction(
			"frontend/element_ready/woo_product.default",
			function ($scope, $) {
				productSlider();
			}
		);

	});

})(jQuery);
