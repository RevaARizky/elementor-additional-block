/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./src/js/blocks/form-success.js ***!
  \***************************************/
(function ($) {
  document.addEventListener('DOMContentLoaded', function () {
    if (!document.querySelectorAll('[data-form-id]').length) {
      return false;
    }
    var ajaxPost = function ajaxPost(data, cb) {
      $.ajax({
        method: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: data,
        success: cb
      });
    };
    var formIds = [];
    $('form').each(function (i, el) {
      if (!$(el).data('form-id')) {
        return false;
      }
      formIds.push(parseInt($(el).data('form-id')));
    });
    ajaxPost({
      id: formIds,
      action: 'get_custom_form'
    }, function (res) {
      var data = JSON.parse(res);
      window.customFormMessage = data;
    });
    $(document).on('forminator:form:submit:success', function (e) {
      var formPopup = $('.form-success .popup-form-success');
      var form = $(e.target);
      formPopup.find('.target-message').text(window.customFormMessage[parseInt(form.data('form-id'))]);
      formPopup.removeClass('hidden');
    });
  });
})(jQuery);
/******/ })()
;