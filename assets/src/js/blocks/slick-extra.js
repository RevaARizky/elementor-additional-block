(($) => {

    jQuery(document).on("loadingScreenCompleted", () => {
        const mainel = document.querySelectorAll('.jet-carousel .elementor-slick-slider')
        if(!mainel.length) {
            return false
        }

        const setSliderOpt = (el) => {
            jQuery(el).slick('slickSetOption', 'adaptiveHeight', true, false)
            console.log(jQuery(el).slick('getSlick'))
        }

        mainel.forEach(el => {
            if(el.classList.contains('slick-initialized')) {
                setSliderOpt(el)
                return false
            } else {
                const observer = new MutationObserver((list) => {
                    if(el.classList.contains('slick-initialized')) {
                        observer.disconnect()
                        setSliderOpt(el)
                    }
                })
                observer.observe(el, {attributes: true})
            }
        })

    })

})(jQuery)