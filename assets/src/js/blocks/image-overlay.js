($ => {

    document.addEventListener("DOMContentLoaded", () => {

        const mainel = document.querySelectorAll('.image-overlay-block.custom-block')
        if(!mainel.length) {
            return false
        }


        mainel.forEach(el => {
            var triggerButton = el.querySelector('.overlay-button-trigger')
            var imageWrapper = el.querySelector('.image-wrapper')
            triggerButton.addEventListener('click', () => {
                if(imageWrapper.classList.contains('active')) {
                    imageWrapper.classList.remove('active')
                } else {
                    imageWrapper.classList.add('active')
                }
            })
            
        })
        
        var minHeight = 0
        const sameHeight = (param) => {
            document.querySelectorAll(param).forEach(el => {
                if(jQuery(el).siblings().height() > minHeight) {
                    minHeight = jQuery(el).siblings().height()
                }
            })
            document.querySelectorAll(param).forEach(el => {
                jQuery(el).siblings().css('height', `${minHeight}px`)
            })
        }
        setTimeout(() => {
            sameHeight('.elementor-widget.elementor-widget-custom-image-overlay')
        }, 2000)
        

    })

})(jQuery)