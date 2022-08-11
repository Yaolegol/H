<div
    class="components-map-yandex-components-add-marker j-map-yandex-components-add-marker"
    data-marker-lat="{{$markerLat ?? ''}}"
    data-marker-lng="{{$markerLng ?? ''}}"
>
    <input
        class="j-map-yandex-components-add-marker__lat-input"
        name="map_marker_lat"
        type="hidden"
    >
    <input
        class="j-map-yandex-components-add-marker__lng-input"
        name="map_marker_lng"
        type="hidden"
    >
    <div
        class="
            components-map-yandex-components-add-marker__map-container
            @if($isMobileApp ?? false)
                components-map-yandex-components-add-marker__map-container_mobile-app
            @endif
            j-map-yandex-components-add-marker__map-container
        "
    ></div>
</div>
