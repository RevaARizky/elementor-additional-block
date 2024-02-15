($ => {

    document.addEventListener("DOMContentLoaded", () => {

        const mainel = document.querySelector('.wpgmp_map')

        if(!mainel) {
            return false
        }

        const observer = new MutationObserver(() => {
            if($(mainel).data('wpgmp_maps')?.map instanceof google.maps.Map) {
                observer.disconnect()
                initMapCustomAction()
            }
        });

        observer.observe(mainel, {attributes: true})

        const initMapCustomAction = () => {
            let map = jQuery('.wpgmp_map').data('wpgmp_maps')
            let markers = map.places
            map.infobox.setOptions({ pixelOffset: new google.maps.Size(-150, -55), alignBottom: true, boxStyle: { width: "300px" } })

            const iconHandler = (act) => {
                markers.forEach(data => {
                    data.marker.setMap(act)
                })
                return
            }
            iconHandler(null)

            // document.querySelector('.map-icon-trigger').addEventListener('change', (e) => { e.currentTarget.checked ? iconHandler(map.map) : iconHandler(null) })

            window.mapActiveIndex = false
            const popupHandler = (i) => {
                markers.forEach((data, index) => {
                    if(data.id == i) {
                        window.mapActiveIndex = index
                    } else {
                        data.marker.setMap(null)
                    }
                })
                map.infobox.setContent(markers[window.mapActiveIndex].infowindow_data)
                markers[window.mapActiveIndex].marker.setMap(map.map)
                map.infobox.open(markers[window.mapActiveIndex].marker.map, markers[window.mapActiveIndex].marker)
            }

            document.querySelectorAll('.link-to-map').forEach(el => {
                el.addEventListener('click', (e) => {
                    e.preventDefault()
                    popupHandler($(el).attr('id'))
                    window.scrollTo(0, $(mainel).offset().top)
                })
            })
        }

    })

})(jQuery)