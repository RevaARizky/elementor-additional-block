import gsap from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"
import { ScrollToPlugin } from "gsap/all"
(() => {

    document.addEventListener('DOMContentLoaded', () => {
        var calculateContainer = 0
        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
        if(!document.querySelector('.slider-block.custom-block')) {
            return false
        }
        if(document.querySelector('.slider-block.calculate-container')) {
            calculateContainer = parseInt(document.querySelector('.slider-block.calculate-container').dataset.calculateContainer)
        }
        let mm = gsap.matchMedia()

        var sliderWidth = 0
        var sliderWidthX
        document.querySelectorAll('.slider-block .slider-wrapper .slide-item').forEach((el, i) => {
            sliderWidth += el.clientWidth
            console.log(sliderWidth)
            if(i+1 == document.querySelectorAll('.slider-wrapper .slide-item').length) {
                sliderWidthX = sliderWidth - el.clientWidth
            }
        })

        document.querySelector('.slider-block .slider-wrapper').classList.add('lg:flex')


        const checkResize = () => {
            if(window.innerWidth >= 1024) {
                document.querySelector('.slider-block .slider-wrapper').style.width = `${sliderWidth}px`
            } else {
                document.querySelector('.slider-block .slider-wrapper').style.width = '100%'
            }

            window.gsap = gsap

            var tl = gsap.timeline()
            let sections = gsap.utils.toArray(".slider-block .slide-item");
            sections.forEach((el, i) => {
                el.label = tl.add(`label${i}`, el.clientWidth * i)
            })
            let threshold = 1/sections.length
            let activeBefore = 1
            mm.add('(min-width: 1024px)', () => {
                window.gsapScroll = gsap.to(sections, {
                    x: -sliderWidthX + calculateContainer + 48,
                    ease: "none", // <-- IMPORTANT!
                    scrollTrigger: {
                        start: 'top top',
                        trigger: ".slider-block .outer-wrapper",
                        pin: true,
                        scrub: true,
                        end: `+=${sliderWidthX + calculateContainer + 48}`,
                        onUpdate: (self) => {
                            console.log(self)
                            window.scrollTrig = self.labelToScroll
                            let currentProgress = Math.ceil(self.progress / threshold)
                            if(currentProgress == activeBefore || currentProgress == 0) {
                                return false
                            }
                            activeBefore = currentProgress
                            document.querySelectorAll('.slider-block .navigation-slider .navigation').forEach(el => {
                                el.classList.remove('active')
                            })
                            document.querySelector(`.slider-block .navigation-slider .navigation[data-index="${currentProgress}"]`).classList.add('active')
                        },
                    }
                });
            })
        }

        window.onresize = checkResize

        checkResize()
        let navigations = document.querySelectorAll('.slider-block .navigation-slider .navigation')
        navigations.forEach((el, i) => {
            el.addEventListener('click', () => {
                if(i+1 == navigations.length) {
                    gsap.to(window, {scrollTo: window.gsapScroll.scrollTrigger.end})
                } else if(i == 0) {
                    gsap.to(window, {scrollTo: window.gsapScroll.scrollTrigger.start})
                } else {
                    gsap.to(window, {scrollTo: ((sliderWidth/4) * i) + (i * calculateContainer) + window.gsapScroll.scrollTrigger.start})
                }
            })
        })

        document.querySelectorAll('.slider-block .overlay-button-wrapper').forEach((el, i) => {
            el.addEventListener('click', function() {
                if(document.querySelector(`.slider-block .slide-item[data-overlay="${el.dataset.target}"]`).classList.contains('active')) {
                    document.querySelector(`.slider-block .slide-item[data-overlay="${el.dataset.target}"]`).classList.remove('active')
                    return                    
                }
                document.querySelector(`.slider-block .slide-item[data-overlay="${el.dataset.target}"]`).classList.add('active')
            })
        })

    })

})()