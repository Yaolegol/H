<button
    class="buttons-filter j-style-default-state j-buttons-filter {{$className}}"
    data-default-title="{{$defaultTitle ?? ''}}"
    @foreach($dataset ?? [] as $datasetItem)
        {{$datasetItem['key']}}="{{$datasetItem['value']}}"
    @endforeach
    type="button"
>
    <span class="buttons-filter__title-block">
        @if($icon ?? false)
            <span class="buttons-filter__title-icon-container">
                @include($icon)
            </span>
        @endif
        <span class="buttons-filter__title j-buttons-filter__title">
            {{$title ?? ''}}
        </span>
    </span>
    <span class="buttons-filter__reset-button j-buttons-filter__button-reset">
        @include('icons.close')
    </span>
</button>
