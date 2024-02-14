(($) => {

    document.addEventListener("DOMContentLoaded", () => {
        const mainel = document.querySelectorAll('.custom-select')
        if(!mainel.length) {
            return false;
        }
        setTimeout(() => {
            const matchCustom = (params, data) => {
                // If there are no search terms, return all of the data
                if (jQuery.trim(params.term) === '') {
                    return data;
                  }
                
                  // Do not display the item if there is no 'text' property
                  if (typeof data.text === 'undefined') {
                    return null;
                  }
                
                  // `params.term` should be the term that is used for searching
                  // `data.text` is the text that is displayed for the data object
                  if (data.text.indexOf(params.term) > -1 || data.text == 'Custom') {
                    var modifiedData = jQuery.extend({}, data, true);
                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                  }
                
                  // Return `null` if the term should not be displayed
                  return null;
            }
    
            mainel.forEach(el => {
                let options = el.querySelectorAll('option')
                for (let i = 0; i < options.length; i++) {
                    if(options[i].value.startsWith('group-')) {
                        stateWhile = true;
                        let optgroup = document.createElement("optgroup")
                        optgroup.label = options[i].value.slice(6)
                        options[i].remove()
                        while(i < options.length && stateWhile) {
                            ++i
                            if(options[i]?.value.startsWith('group-')) {
                                stateWhile = false
                                --i
                            } else {
                                if(options[i]) {
                                    optgroup.append(options[i])
                                }
                            }
                        }
                        el.querySelector('select').append(optgroup)
                    }
                }
                jQuery(el.querySelector('select')).select2({
                    matcher: matchCustom
                })
            })
        }, 2500)


        arrowHandler = (act, el) => {

        }
        document.querySelectorAll('.custom-number-arrow').forEach(el => {
            let par = el.querySelector('.forminator-field')
            let input = el.querySelector('input')

            let arrowUp = document.createElement('div')
            arrowUp.classList.add('arrow-up')
            arrowUp.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 14" fill="none"><path d="M15.4453 9.42107L10.6505 3.8647C10.6066 3.81392 10.5526 3.77325 10.4921 3.74539C10.4316 3.71753 10.366 3.70312 10.2996 3.70312C10.2333 3.70312 10.1676 3.71753 10.1071 3.74539C10.0466 3.77325 9.99266 3.81392 9.94875 3.8647L5.15301 9.42107" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>`
            arrowUp.addEventListener('click', () => {
                if(parseInt(input.value) >= parseInt(input.max)) {
                    return false
                }
                input.value++
            })
            let arrowDown = document.createElement('div')
            arrowDown.classList.add('arrow-down')
            arrowDown.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" style="rotate: 180deg;" width="21" height="21" viewBox="0 0 21 14" fill="none"><path d="M15.4453 9.42107L10.6505 3.8647C10.6066 3.81392 10.5526 3.77325 10.4921 3.74539C10.4316 3.71753 10.366 3.70312 10.2996 3.70312C10.2333 3.70312 10.1676 3.71753 10.1071 3.74539C10.0466 3.77325 9.99266 3.81392 9.94875 3.8647L5.15301 9.42107" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>`
            arrowDown.addEventListener('click', () => {
                if(parseInt(input.value) <= 0 || input.value == '') {
                    return false
                }
                input.value--
            })
            let wrapper = document.createElement('div')
            wrapper.classList.add('custom-number-wrapper')
            wrapper.classList.add('relative')
            wrapper.append(input)
            wrapper.append(arrowUp)
            wrapper.append(arrowDown)

            par.append(wrapper)


            
        })

    })

})(jQuery)