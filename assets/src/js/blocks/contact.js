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

    })

})(jQuery)