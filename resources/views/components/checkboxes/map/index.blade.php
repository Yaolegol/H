<div
    class="components-checkboxes-map j-checkboxes-map"
    data-marker-lat="{{$map_marker_lat ?? ''}}"
    data-marker-lng="{{$map_marker_lng ?? ''}}"
>
    <label class="components-checkboxes-map__input-label">
        <input
            @if($salePointItem['active'] ?? false)
                checked
            @endif
            class="components-checkboxes-map__input j-checkboxes-map__input"
            name="{{$name}}"
            type="checkbox"
            value="{{$value}}"
        >
        <span class="components-checkboxes-map__marker-block">
            <span class="components-checkboxes-map__marker-container">
                @include('icons.checkmark')
            </span>
        </span>
        <span class="components-checkboxes-map__title">{{$title}}</span>
    </label>
</div>
