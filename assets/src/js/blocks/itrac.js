import Swiper from "swiper"
import gsap from "gsap"
import SplitText from "gsap/SplitText"


($ => {

    document.addEventListener("DOMContentLoaded", () => {

        const mainel = document.querySelector('.itrac-block')

        if(!mainel) {
            return false
        }

        gsap.registerPlugin(SplitText)

        var popupSlider = mainel.querySelector('.popup-target .swiper')
        new Swiper(popupSlider, {
            slidesPerView: 1,
            spaceBetween: 0,
        })
        popupSlider = popupSlider.swiper
        mainel.querySelectorAll('.icon-popup-trigger').forEach(el => {
            el.addEventListener('click', () => {
                mainel.querySelector('.popup-target').classList.remove('hidden')
                popupSlider.slideTo(el.dataset.index)
            })
        })

        const hidePopup = () => {
            var popup = mainel.querySelector('.popup-target')
            popup.classList.add('hidden')
        }

        mainel.querySelector('.popup-target .prev-button').addEventListener('click', e => {
            popupSlider.slidePrev()
        })
        mainel.querySelector('.popup-target .next-button').addEventListener('click', e => {
            popupSlider.slideNext()
        })

        mainel.querySelector('.popup-target .overlay').addEventListener('click', e => {
            hidePopup()
        })
        mainel.querySelectorAll('.popup-target .close-button').forEach(el => {
            el.addEventListener('click', e => {
                hidePopup()
            })
        })

        popupSlider.on('activeIndexChange', (slider) => {
            if(slider.activeIndex > 0) {
                mainel.querySelector('.popup-target .prev-button').classList.remove('hidden')
            }
            if(slider.activeIndex < slider.slides.length) {
                mainel.querySelector('.popup-target .next-button').classList.remove('hidden')
            }
            if(slider.activeIndex == 0) {
                mainel.querySelector('.popup-target .prev-button').classList.add('hidden')
            }
            if(slider.activeIndex + 1 == slider.slides.length) {
                mainel.querySelector('.popup-target .next-button').classList.add('hidden')
            }
        })

    })

})(jQuery)