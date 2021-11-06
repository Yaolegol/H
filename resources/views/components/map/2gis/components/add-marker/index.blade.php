<div
    class="map-2gis-components-add-marker j-map-2gis-components-add-marker"
    data-marker-lat="{{$markerLat ?? ''}}"
    data-marker-lng="{{$markerLng ?? ''}}"
>
    <input
        class="j-map-2gis-components-add-marker__lat-input"
        name="map_marker_lat"
        type="hidden"
    >
    <input
        class="j-map-2gis-components-add-marker__lng-input"
        name="map_marker_lng"
        type="hidden"
    >
    <div
        class="
        map-2gis-components-add-marker__map-container
        @if($isMobileApp ?? false)
            map-2gis-components-add-marker__map-container_mobile-app
        @endif
        j-map-2gis-components-add-marker__map-container
        "
        id="map-2gis"
    ></div>
</div>
