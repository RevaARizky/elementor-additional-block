(() => {

    document.addEventListener("loadingScreenCompleted", () => {
        const mainel = document.querySelectorAll('.jet-carousel .elementor-slick-slider')
        if(!mainel.length) {
            return false
        }

        const setSliderOpt = (el) => {
            console.log(jQuery(el).slick('getSlick'))
            jQuery(el).slick('slickSetOption', 'adaptiveHeight', true, true)
            jQuery(el).slick('refresh')
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

})()