!function(e){"use strict";var a=e("#header").outerHeight()-1;e(document).on("click",".nav-menu a, .mobile-nav a, .scrollto",(function(o){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var l=e(this.hash);if(l.length){o.preventDefault();var t=l.offset().top-a;return"#header"==e(this).attr("href")&&(t=0),e("html, body").animate({scrollTop:t},1500,"easeInOutExpo"),e(this).parents(".nav-menu, .mobile-nav").length&&(e(".nav-menu .active, .mobile-nav .active").removeClass("active"),e(this).closest("li").addClass("active")),e("body").hasClass("mobile-nav-active")&&(e("body").removeClass("mobile-nav-active"),e(".mobile-nav-overly").fadeOut()),!1}}})),e(document).ready((function(){if(window.location.hash){var o=window.location.hash;if(e(o).length){var l=e(o).offset().top-a;e("html, body").animate({scrollTop:l},1500,"easeInOutExpo")}}})),e(window).scroll((function(){e(this).scrollTop()>100?e("#header-friend").addClass("header-scrolled"):e("#header-friend").removeClass("header-scrolled")})),e(window).scrollTop()>100&&e("#header-friend").addClass("header-scrolled"),e(window).scroll((function(){e(this).scrollTop()>100?(e("#header").addClass("header-scrolled"),e("#topbar").addClass("topbar-scrolled")):(e("#header").removeClass("header-scrolled"),e("#topbar").removeClass("topbar-scrolled"))})),e(window).scrollTop()>100&&(e("#header").addClass("header-scrolled"),e("#topbar").addClass("topbar-scrolled"));var o=e("section"),l=e(".nav-menu, .mobile-nav");e(window).on("scroll",(function(){var a=e(this).scrollTop()+200;o.each((function(){var o=e(this).offset().top,t=o+e(this).outerHeight();a>=o&&a<=t&&(a<=t&&l.find("li").removeClass("active"),l.find('a[href="#'+e(this).attr("id")+'"]').parent("li").addClass("active")),a<300&&e(".nav-menu ul:first li:first").addClass("active")}))})),e(window).scroll((function(){e(this).scrollTop()>100?e(".back-to-top").fadeIn("slow"):e(".back-to-top").fadeOut("slow")})),e(".back-to-top").click((function(){return e("html, body").animate({scrollTop:0},1500,"easeInOutExpo"),!1})),e(".mobile-icon").click((function(){e("nav ul").toggleClass("showing")}))}(jQuery);