import Swiper, {EffectFade} from "swiper"
import gsap from "gsap";
import { SplitText } from "gsap/SplitText";

(() => {

    document.addEventListener('DOMContentLoaded', function() {
        if(!document.querySelector('.carousel-block.custom-block')) {
            return false;
        }

        gsap.registerPlugin(SplitText)

        const animateText = (el) => {
            el.split = new SplitText(el, {
                type: 'lines',
                linesClass: 'split-line overflow-hidden',
            })
        
            el.anim = gsap.timeline({
                paused: true
            })
            el.anim.from(el.split.lines, 
                {
                    translateY: '100%',
                    opacity: 0,
                    duration: .4,
                    stagger: .1
                } 
            )
            el.anim.to(el.split.lines, 
                {
                    ease: 'power3.out',
                    translateY: 0,
                    opacity: 1,
                    duration: .2
                }
            )
        }

        const imageSlider = document.querySelector('.carousel-block .image-slider-wrapper')
        const contentSlider = document.querySelector('.carousel-block .content-slider-wrapper')
        const titleSlider = document.querySelector('.carousel-block .title-slider-wrapper')
        const buttons = document.querySelector('.carousel-block .button-wrapper')
        const counter = document.querySelector('.carousel-block .counter-wrapper')

        contentSlider.querySelectorAll('.swiper-slide p').forEach(el => {
            animateText(el)
        })
        
        const opt = (opt) => {
            return {
                slidesPerView: 1,
                spaceBetween: 0,
                allowTouchMove: false,
                ...opt
            }
        }

        const contentInit = (e) => {
            e.slides[e.activeIndex].querySelectorAll('p').forEach(p => {p.anim.play()})
        }

        new Swiper(imageSlider, opt({modules: [EffectFade], effect: 'fade'}))
        new Swiper(contentSlider, opt({on: {init: contentInit}, modules: [EffectFade], effect: 'fade'}))
        new Swiper(titleSlider, opt( {modules: [EffectFade], effect: 'fade', fadeEffect: {crossFade: true}} ) )

        buttons.querySelector('.prev').addEventListener('click', function() {
            imageSlider.swiper.slidePrev()
            contentSlider.swiper.slidePrev()
            titleSlider.swiper.slidePrev()
        })
        buttons.querySelector('.next').addEventListener('click', function() {
            imageSlider.swiper.slideNext()
            contentSlider.swiper.slideNext()
            titleSlider.swiper.slideNext()
        })

        contentSlider.swiper.on('slideChange', function(e) {
            counter.querySelector('.current-counter').innerHTML = `0${e.activeIndex+1}`
            e.slides.forEach((el, i) => {
                el.querySelectorAll('p').forEach(p => {p.anim.pause(0)})
                if(i == e.activeIndex){
                    el.querySelectorAll('p').forEach(p => {p.anim.play()})
                }    
            })
        })

    })

})()