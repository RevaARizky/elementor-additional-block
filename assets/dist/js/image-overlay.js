/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./src/js/blocks/image-overlay.js ***!
  \****************************************/
(function ($) {
  document.addEventListener("DOMContentLoaded", function () {
    var mainel = document.querySelectorAll('.image-overlay-block.custom-block');
    if (!mainel.length) {
      return false;
    }
    mainel.forEach(function (el) {
      var triggerButton = el.querySelector('.overlay-button-trigger');
      var imageWrapper = el.querySelector('.image-wrapper');
      triggerButton.addEventListener('click', function () {
        if (imageWrapper.classList.contains('active')) {
          imageWrapper.classList.remove('active');
        } else {
          imageWrapper.classList.add('active');
        }
      });
    });
    var minHeight = 0;
    var sameHeight = function sameHeight(param) {
      document.querySelectorAll(param).forEach(function (el) {
        if (jQuery(el).siblings().height() > minHeight) {
          minHeight = jQuery(el).siblings().height();
        }
      });
      document.querySelectorAll(param).forEach(function (el) {
        jQuery(el).siblings().css('height', "".concat(minHeight, "px"));
      });
    };
    setTimeout(function () {
      sameHeight('.elementor-widget.elementor-widget-custom-image-overlay');
    }, 2000);
  });
})(jQuery);
/******/ })()
;