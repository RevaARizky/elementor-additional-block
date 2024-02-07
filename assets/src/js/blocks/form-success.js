(($) => {

    document.addEventListener('DOMContentLoaded', () => {

        if(!document.querySelectorAll('[data-form-id]').length) {
            return false
        }

        const ajaxPost = (data, cb) => {
            $.ajax({
                method: 'POST',
                url: '/wp-admin/admin-ajax.php',
                data: data,
                success: cb
            })
        }
        var formIds = []
        $('form').each((i, el) => {
            if(!$(el).data('form-id')) {
                return false
            }
            formIds.push(parseInt($(el).data('form-id')))
        })

        ajaxPost({id: formIds, action: 'get_custom_form'}, (res) => {
            const data = JSON.parse(res)

            window.customFormMessage = data
        })

        $(document).on('forminator:form:submit:success', (e) => {
            let formPopup = $('.form-success .popup-form-success')
            let form = $(e.target)

            formPopup.find('.target-message').text(window.customFormMessage[parseInt(form.data('form-id'))])
            formPopup.removeClass('hidden')
        })

    })

})(jQuery)