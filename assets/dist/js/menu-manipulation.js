/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./src/js/blocks/menu-manipulation.js ***!
  \********************************************/
(function ($) {
  document.addEventListener("DOMContentLoaded", function () {
    var changeUrl = function changeUrl(el, url) {
      $(el).attr('href', url);
    };
    if (window.location.pathname.endsWith('v5/') || window.location.pathname.endsWith('v5')) {
      $('a').each(function (i, el) {
        var url = $(el).attr('href');
        switch (url) {
          case "https://ab.gaiada.com/the-experience":
          case "https://ab.gaiada.com/the-experience/":
            changeUrl(el, "https://ab.gaiada.com/the-experience-v5/");
            break;
          case "https://ab.gaiada.com/the-story":
          case "https://ab.gaiada.com/the-story/":
            changeUrl(el, "https://ab.gaiada.com/the-story-v5/");
            break;
          case "https://ab.gaiada.com/gallery":
          case "https://ab.gaiada.com/gallery/":
            changeUrl(el, "https://ab.gaiada.com/gallery-v5/");
            break;
          case "https://ab.gaiada.com/blog":
          case "https://ab.gaiada.com/blog/":
            changeUrl(el, "https://ab.gaiada.com/blog-v5/");
            break;
          case "https://ab.gaiada.com/contact-us":
          case "https://ab.gaiada.com/contact-us/":
            changeUrl(el, "https://ab.gaiada.com/contact-us-v5/");
            break;
          case "/":
          case "https://ab.gaiada.com":
          case "https://ab.gaiada.com/":
            changeUrl(el, "https://ab.gaiada.com/home-v5/");
            break;
        }
      });
    }
    if (window.location.pathname.endsWith('v6/') || window.location.pathname.endsWith('v6')) {
      $('a').each(function (i, el) {
        var url = $(el).attr('href');
        switch (url) {
          case "https://ab.gaiada.com/the-experience":
          case "https://ab.gaiada.com/the-experience/":
            changeUrl(el, "https://ab.gaiada.com/the-experience-v6/");
            break;
          case "https://ab.gaiada.com/the-story":
          case "https://ab.gaiada.com/the-story/":
            changeUrl(el, "https://ab.gaiada.com/the-story-v6/");
            break;
          case "https://ab.gaiada.com/gallery":
          case "https://ab.gaiada.com/gallery/":
            changeUrl(el, "https://ab.gaiada.com/gallery-v6/");
            break;
          case "https://ab.gaiada.com/blog":
          case "https://ab.gaiada.com/blog/":
            changeUrl(el, "https://ab.gaiada.com/blog-v6/");
            break;
          case "https://ab.gaiada.com/contact-us":
          case "https://ab.gaiada.com/contact-us/":
            changeUrl(el, "https://ab.gaiada.com/contact-us-v6/");
            break;
          case "/":
          case "https://ab.gaiada.com":
          case "https://ab.gaiada.com/":
            changeUrl(el, "https://ab.gaiada.com/home-v6/");
            break;
        }
      });
    }
    return false;
  });
})(jQuery);
/******/ })()
;