<div
    class="inputs-radio-group j-inputs-radio-group"
    @if($dispatchEvents)
        data-dispatch-events
    @endif
    data-radio-group-name="{{$name}}"
>
    @foreach($itemsList as $item)
        @include('components.inputs.radio.item.index', [
            'id' => $item['id'],
            'name' => $name,
            'title' => $item['title'],
            'value' => $item['value'],
        ])
    @endforeach
</div>
