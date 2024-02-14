/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./src/js/blocks/contact.js ***!
  \**********************************/
(function ($) {
  document.addEventListener("DOMContentLoaded", function () {
    var mainel = document.querySelectorAll('.custom-select');
    if (!mainel.length) {
      return false;
    }
    setTimeout(function () {
      var matchCustom = function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if (jQuery.trim(params.term) === '') {
          return data;
        }

        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
          return null;
        }

        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1 || data.text == 'Custom') {
          var modifiedData = jQuery.extend({}, data, true);
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }

        // Return `null` if the term should not be displayed
        return null;
      };
      mainel.forEach(function (el) {
        var options = el.querySelectorAll('option');
        for (var i = 0; i < options.length; i++) {
          if (options[i].value.startsWith('group-')) {
            stateWhile = true;
            var optgroup = document.createElement("optgroup");
            optgroup.label = options[i].value.slice(6);
            options[i].remove();
            while (i < options.length && stateWhile) {
              var _options$i;
              ++i;
              if ((_options$i = options[i]) !== null && _options$i !== void 0 && _options$i.value.startsWith('group-')) {
                stateWhile = false;
                --i;
              } else {
                if (options[i]) {
                  optgroup.append(options[i]);
                }
              }
            }
            el.querySelector('select').append(optgroup);
          }
        }
        jQuery(el.querySelector('select')).select2({
          matcher: matchCustom
        });
      });
    }, 2500);
  });
})(jQuery);
/******/ })()
;