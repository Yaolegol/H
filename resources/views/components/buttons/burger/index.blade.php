<div
    class="components-buttons-burger {{$className ?? ''}}"
    @isset($dataset)
        @foreach($dataset as $datasetItem)
            {{$datasetItem['name']}}="{{$datasetItem['value']}}"
        @endforeach
    @endisset
>
    <div class="components-buttons-burger__line"></div>
    <div class="components-buttons-burger__line"></div>
    <div class="components-buttons-burger__line"></div>
</div>
