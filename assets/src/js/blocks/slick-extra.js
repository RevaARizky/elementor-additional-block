(() => {

    document.addEventListener("DOMContentLoaded", () => {
        const mainel = document.querySelectorAll('.jet-carousel .elementor-slick-slider')
        if(!mainel.length) {
            return false
        }

        const setSliderOpt = (el) => {
            jQuery(el).slick('slickSetOption', 'adaptiveHeight', true)
        }

        mainel.forEach(el => {
            const observer = new MutationObserver((list) => {
                if(el.classList.contains('slick-initialized')) {
                    observer.disconnect()
                    setSliderOpt(el)
                }
            })
            observer.observe(el, {attributes: true})
        })

    })

})()