jQuery,jQuery(document).on("loadingScreenCompleted",(function(){var e=document.querySelectorAll(".jet-carousel .elementor-slick-slider");if(!e.length)return!1;var i=function(e){console.log(jQuery(e).slick("getSlick")),jQuery(e).slick("slickSetOption","adaptiveHeight",!0)};e.forEach((function(e){if(e.classList.contains("slick-initialized"))return i(e),!1;var t=new MutationObserver((function(n){e.classList.contains("slick-initialized")&&(t.disconnect(),i(e))}));t.observe(e,{attributes:!0})}))}));