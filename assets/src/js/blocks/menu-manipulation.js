(($) => {

    window.menuv5 = {
        "Home" : "https://ab.gaiada.com/home-v5/",
        "The Experience" : "https://ab.gaiada.com/the-experience-v5/",
        "The Story" : "https://ab.gaiada.com/the-story-v5/",
        "Gallery" : "https://ab.gaiada.com/gallery-v5/",
        "What’s New" : "https://ab.gaiada.com/blog-v5/",
        "Contact Us" : "https://ab.gaiada.com/contact-us-v5/"
    }

    document.addEventListener("DOMContentLoaded", () => {

        const changeUrl = (el, url)  => {
            $(el).attr('href', url)
        }

        if(window.location.pathname.endsWith('v5/') || window.location.pathname.endsWith('v5')) {
            // $('#jet-popup-3339').find('a').each((i, el) => {
            //     var text = $(el).find('.jet-nav-link-text').text()
            //     switch (text) {
            //         case "The Experience":
            //             changeUrl(el, "https://ab.gaiada.com/the-experience-v5/")
            //             break;
            //         case "The Story":
            //             changeUrl(el, "https://ab.gaiada.com/the-story-v5/")
            //             break;
            //         case "Gallery":
            //             changeUrl(el, "https://ab.gaiada.com/gallery-v5/")
            //             break;
            //         case "What’s New":
            //             changeUrl(el, "https://ab.gaiada.com/blog-v5/")
            //             break;
            //         case "Contact Us":
            //             changeUrl(el, "https://ab.gaiada.com/contact-us-v5/")
            //     }
            //     if($(el).attr('href') == '/') {
            //         changeUrl(el, "https://ab.gaiada.com/home-v5/")
            //     }
            // })


            $('a').each((i, el) => {
                var url = $(el).attr('href')
                console.log(url, el)
                switch (url) {
                    case "https://ab.gaiada.com/the-experience":
                    case "https://ab.gaiada.com/the-experience/":
                        changeUrl(el, "https://ab.gaiada.com/the-experience-v5/")
                        break;
                    case "https://ab.gaiada.com/the-story":
                    case "https://ab.gaiada.com/the-story/":
                        changeUrl(el, "https://ab.gaiada.com/the-story-v5/")
                        break;
                    case "https://ab.gaiada.com/gallery":
                    case "https://ab.gaiada.com/gallery/":
                        changeUrl(el, "https://ab.gaiada.com/gallery-v5/")
                        break;
                    case "https://ab.gaiada.com/blog":
                    case "https://ab.gaiada.com/blog/":
                        changeUrl(el, "https://ab.gaiada.com/blog-v5/")
                        break;
                    case "https://ab.gaiada.com/contact-us":
                    case "https://ab.gaiada.com/contact-us/":
                        changeUrl(el, "https://ab.gaiada.com/contact-us-v5/")
                        break;
                    case "/":
                    case "https://ab.gaiada.com":
                    case "https://ab.gaiada.com/":
                        changeUrl(el, "https://ab.gaiada.com/home-v5/")
                        break;
                }
            })

        }

        return false

    })

})(jQuery)