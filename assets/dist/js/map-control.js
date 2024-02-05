/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./src/js/blocks/map-control.js ***!
  \**************************************/
(function ($) {
  document.addEventListener("DOMContentLoaded", function () {
    var mainel = document.querySelector('.wpgmp_map');
    if (!mainel) {
      return false;
    }
    var observer = new MutationObserver(function () {
      var _$$data;
      if (((_$$data = $(mainel).data('wpgmp_maps')) === null || _$$data === void 0 ? void 0 : _$$data.map) instanceof google.maps.Map) {
        observer.disconnect();
        initMapCustomAction();
      }
    });
    observer.observe(mainel, {
      attributes: true
    });
    var initMapCustomAction = function initMapCustomAction() {
      var map = jQuery('.wpgmp_map').data('wpgmp_maps');
      var markers = map.places;
      map.infobox.setOptions({
        pixelOffset: new google.maps.Size(-150, -55),
        alignBottom: true,
        boxStyle: {
          width: "300px"
        }
      });
      var iconHandler = function iconHandler(act) {
        markers.forEach(function (data) {
          data.marker.setMap(act);
        });
        return;
      };
      iconHandler(null);

      // document.querySelector('.map-icon-trigger').addEventListener('change', (e) => { e.currentTarget.checked ? iconHandler(map.map) : iconHandler(null) })

      var popupHandler = function popupHandler(i) {
        markers.forEach(function (data) {
          if (data.id == i) {
            data.marker.setMap(map.map);
            map.infobox.setContent(data.infowindow_data);
            map.infobox.open(data.marker.map, data.marker);
          } else {
            data.marker.setMap(null);
          }
        });
      };
      document.querySelectorAll('.link-to-map').forEach(function (el) {
        el.addEventListener('click', function (e) {
          e.preventDefault();
          popupHandler($(el).attr('id'));
          window.scrollTo(0, $(mainel).offset().top);
        });
      });
    };
  });
})(jQuery);
/******/ })()
;