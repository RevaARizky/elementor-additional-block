(()=>{var e;e=jQuery,document.addEventListener("DOMContentLoaded",(function(){var n=document.querySelector(".wpgmp_map");if(!n)return!1;var t=new MutationObserver((function(){var a;(null===(a=e(n).data("wpgmp_maps"))||void 0===a?void 0:a.map)instanceof google.maps.Map&&(t.disconnect(),o())}));t.observe(n,{attributes:!0});var o=function(){var t,o=jQuery(".wpgmp_map").data("wpgmp_maps"),a=o.places;o.infobox.setOptions({pixelOffset:new google.maps.Size(-150,-55),alignBottom:!0,boxStyle:{width:"300px"}}),t=null,a.forEach((function(e){e.marker.setMap(t)})),window.mapActiveIndex=!1,document.querySelectorAll(".link-to-map").forEach((function(t){t.addEventListener("click",(function(i){var r;i.preventDefault(),r=e(t).attr("id"),a.forEach((function(e,n){e.id==r?window.mapActiveIndex=n:e.marker.setMap(null)})),o.infobox.setContent(a[window.mapActiveIndex].infowindow_data),a[window.mapActiveIndex].marker.setMap(o.map),o.map.setCenter(a[window.mapActiveIndex].marker.getPosition()),o.infobox.open(a[window.mapActiveIndex].marker.map,a[window.mapActiveIndex].marker),setTimeout((function(){o.infobox.panBox_()}),200),window.scrollTo(0,e(n).offset().top)}))}))}}))})();