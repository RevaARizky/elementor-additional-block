import Aos from "aos"

(() => {

    document.addEventListener('DOMContentLoaded', () => {
        const mainel = document.querySelector('.gallery-block')

        if(!mainel) {
            return false
        }
        Aos.init({
            once: true,
        })


    })

})()