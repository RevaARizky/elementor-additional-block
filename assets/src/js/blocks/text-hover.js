import gsap from "gsap";
"use strict";
(() => {

    document.addEventListener('DOMContentLoaded', function() {
        let mainel = document.querySelector('.text-hover-block.custom-block')
        if(!mainel) {
            return false;
        }

        const fadeInOut = (item) => {
            
            item.anim = gsap.timeline({
                paused: true,
            })
            item.animEl = {
                content: item.querySelector('.description-wrapper'),
                image: mainel.querySelector(`.image-wrapper img[data-index="${item.dataset.index}"]`),
                line: item.querySelector('.button-wrapper .bottom-line')
            }
            item.anim.from(item.animEl.image, {
                autoAlpha: 0,
                zIndex: 0,
                duration: .2,
                delay: 0,
                ease: "power3.out",
            }, 0)
            item.anim.to(item.animEl.image, {
                autoAlpha: 1,
                zIndex: 1,
            }, 0)
            item.anim.from(item.animEl.content, {
                autoAlpha: 0,
                translateY: '100%',
                height: 0,
                duration: .6,
                delay: 0,
                ease: "power3.out",
            }, 0)
            item.anim.to(item.animEl.content, {
                autoAlpha: 1,
                translateY: 0,
                height: 'auto'
            }, 0)
            item.anim.from(item.animEl.line, {
                width: 26,
                duration: .2,
                delay: 0,
                ease: "power3.out",
            }, 0)
            item.anim.to(item.animEl.line, {
                width: '100%',
            }, 0)
        }

        let contentItems = gsap.utils.toArray(mainel.querySelectorAll('.content-wrapper'))
        let mm = gsap.matchMedia()
        contentItems.forEach((el, i) => {
            // mm.add('min-width: 1025px', () => {
                fadeInOut(el)
                if(i == 0) {
                    el.anim.play()
                }
                el.addEventListener('mouseenter', e=> {
                    contentItems.forEach((ele, k) => {
                        if(i != k) {
                            ele.anim.reverse()
                        }
                    })
                    el.anim.play()
                })
            // })
            // el.addEventListener('mouseleave', e => {
            //     el.anim.reverse()
            // })
        })
    })

})()