/* JS script for giaidieu theme - made by giaidieu.com */
(function ($, Drupal) {
  Drupal.behaviors.giaidieu = {
    attach: function (context, settings) {
			// remove dropdown menu left 
			$('.menu--danh-muc-san-pham > li > a').removeAttr('data-toggle');

			// add icon dropdown menu left 
			$('.menu--danh-muc-san-pham > li.expanded.dropdown').append('<i class="fas fa-chevron-right"></i>');
			$('.menu--danh-muc-san-pham .dropdown-menu > li.expanded.dropdown').append('<i class="fas fa-chevron-right"></i>');
			// $('.menu--danh-muc-san-pham .dropdown-menu').slideUp();

			//add class user register drupal, experience
      if(jQuery('.user-register-form').hasClass('user-register-form')){
        jQuery('.region-content').addClass('login-register');
      }

      if(jQuery('.user-pass').hasClass('user-pass')){
        jQuery('.region-content').addClass('login-register');
      }

			// check page product detail and not product tyoe other run event
			if ($(".page-name-entity-commerce_product-canonical div").hasClass("product-full") == true && $(".page-name-entity-commerce_product-canonical div").hasClass("product-type-product_other") == false ) {
				// click show/hide product variation mau-san-pham
				$(".product-full .field--name-field-mau-san-pham .field--label").click(function (e) { 
					e.preventDefault();
					giaidieu_toogle_product_variation(this);
				});


				// click show/hide product variation mau-san-pham
				$(".product-full .field--name-field-mau-sac-den .field--label").click(function (e) { 
					e.preventDefault();
					giaidieu_toogle_product_variation(this);
				});
			}

			if ($(".view-id-product_search_category > div").hasClass("view-empty") == true) {
				$(".view-id-product_search_category > .view-empty").prev().addClass("hide");
				console.log(1);
			}

			// check product detail run event click and scroll active tabs
			if ($("body").hasClass("page-name-entity-commerce_product-canonical") == true) {
				// click scroll tab page product detail
				$(".product-full #custom-tabs li").click(function (e) { 
					e.preventDefault();
					let id_tab = jQuery(this).attr("rel");
					let location_tab = $("#" + id_tab).offset().top;
					$('html, body').animate({
						scrollTop: location_tab 
					}, 0);
					$(this).siblings().removeClass("active");
					$(this).addClass("active");
				});

				// scroll active title tab page product detail
				let length_tabs = document.querySelectorAll(".product-full #custom-tabs li").length;
				var arr_id_tab = []; // arry contain id tab
				var arr_location_tab = []; // arry contain number offset top tab
				for (let index = 1; index <= length_tabs; index++) {
					arr_id_tab.push($(".product-full #custom-tabs li:nth-child("+ index +")").attr("rel"));
				}
				for (let index = 0; index < arr_id_tab.length; index++) {
					arr_location_tab.push($("#" + arr_id_tab[index]).offset().top);
					if (index + 1 == arr_id_tab.length) {
						arr_location_tab.push($("#" + arr_id_tab[index]).offset().top + $("#" + arr_id_tab[index]).height());
					}
				}
			}

			window.onscroll = function() {scrollFunction()};
			function scrollFunction() {
				//check page product detail run function scroll
				if ($("body").hasClass("page-name-entity-commerce_product-canonical") == true) {
					for (let index = 0; index < arr_location_tab.length; index++) {
						if(($(this).scrollTop() >= (arr_location_tab[index] - 1)) && ($(this).scrollTop() < arr_location_tab[index + 1])) {
							$(".product-full #custom-tabs li[rel="+ arr_id_tab[index] +"]").siblings().removeClass("active");
							$(".product-full #custom-tabs li[rel="+ arr_id_tab[index] +"]").addClass("active");
						}
					}
				}

				if ( document.documentElement.scrollTop > 500) {
          jQuery(".social-fixed .sroll-top").addClass("active");
        } 
        else {
          jQuery(".social-fixed .sroll-top").removeClass("active");
        }
			}

			jQuery(".social-fixed .sroll-top").on("click", function (e) {
        e.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, "600");
      });

			
			// click toggle cate product
			$("#block-danhmucsanpham-2-menu").click(function (e) { 
				e.preventDefault();
				$(this).parent().toggleClass("active");
				$(".wapper_header_top_right").removeClass('active');
				$(".search-wrapper").removeClass('active');
			});

			if ($(window).width() < 1200) {
				// click toggle show/hide cate product child
				$("#block-danhmucsanpham-2 ul.menu--danh-muc-san-pham li i").click(function (e) { 
					e.preventDefault();
					$(this).parent().toggleClass("active");
					$(this).prev().slideToggle();
					console.log(1);
				});
			}



      if(jQuery(window).width() < 768){
        jQuery('.footer_top_left .menu_about_us_footer .menu--about-us ').slideUp();
        jQuery('.footer_top_left .menu_product_footer_footer .menu--product-footer').slideUp();
        jQuery('.footer_top_right .menu_policy_footer .menu--chinh-sach').slideUp();

        jQuery(".wapper_footer_top .footer_top_item:not(.block_hotline_footer) h3").click(function(e) {
					$(this).toggleClass("active");
          $(this).next().slideToggle();
        });           
      }


    }
  };
})
(jQuery, Drupal);
// namespace_namfunciton

function hung_funtion_click_open_zalo_chat(params) {
	jQuery('.zalo-chat-widget').toggleClass('active');
	jQuery('.zalo-chat-widget #drag-holder').click();
}


// show/hide product variation
function giaidieu_toogle_product_variation(obj) {
	jQuery(obj).next().slideToggle();
	jQuery(obj).parent().toggleClass("show");
}

// toggle header menu right mb
function giaidieu_toogle_menu_right(obj) {
	jQuery(obj).parent().toggleClass("active");
	jQuery(".header-menu_left__icon").removeClass("active");
	jQuery("#header .header_bottom .menu--main").removeClass("active");
	jQuery("#block-danhmucsanpham-2").removeClass('active');
	jQuery(".search-wrapper").removeClass('active');
	giaidieu_hide_cate();
}

// toggle header menu left mb
function giaidieu_toogle_menu_left(obj) {
	jQuery(obj).toggleClass("active");
	jQuery("#header .header_bottom .menu--main").toggleClass("active");
	jQuery(".wapper_header_top_right").removeClass("active");
	jQuery(".search-wrapper").removeClass('active');
	giaidieu_hide_cate();
}

// show/hide search
function giaidieu_toogle_search(obj) {
	jQuery(obj).parent().toggleClass("active");
	jQuery(".wapper_header_top_right").removeClass("active");
	jQuery(".header-menu_left__icon").removeClass("active");
	jQuery("#header .header_bottom .menu--main").removeClass("active");
	jQuery("#block-danhmucsanpham-2").removeClass('active');
}

// show/hide cate product
function giaidieu_toogle_cate(obj) {
	jQuery(obj).parent().toggleClass("active");
}

function giaidieu_hide_cate() {
	if (jQuery("#block-danhmucsanpham-2").length > 0) {
		jQuery("#block-danhmucsanpham-2").removeClass("active");
	}
	if (jQuery("body").hasClass("page-name-view-product_search_category-page_product_search") == true) {
		jQuery(".page-name-view-product_search_category-page_product_search .sidebar").removeClass("active");
	}
}
