<div
    class="components-checkboxes-map j-checkboxes-map"
    data-marker-lat="{{$map_marker_lat ?? ''}}"
    data-marker-lng="{{$map_marker_lng ?? ''}}"
>
    <label>
        <input
            @if($salePointItem['active'] ?? false)
                checked
            @endif
            class="j-checkboxes-map__input"
            name="{{$name}}"
            type="checkbox"
            value="{{$value}}"
        >
        <span>{{$title}}</span>
    </label>
</div>
