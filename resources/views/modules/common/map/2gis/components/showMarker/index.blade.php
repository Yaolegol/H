<div
    class="components-map-2gis-components-show-marker j-map-2gis-components-show-marker"
    data-marker-lat="{{$markerLat ?? ''}}"
    data-marker-lng="{{$markerLng ?? ''}}"
>
    <div
        class="
            components-map-2gis-components-show-marker__map-container
            @if($isMobileApp ?? false)
                components-map-2gis-components-show-marker__map-container_mobile-app
            @endif
            j-map-2gis-components-show-marker__map-container
        "
    ></div>
</div>
