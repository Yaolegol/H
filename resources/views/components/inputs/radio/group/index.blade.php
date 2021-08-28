<div
    class="inputs-radio-group j-inputs-radio-group"
    @if($dispatchEvents)
        data-dispatch-events
    @endif
    data-group-name="{{$groupName}}"
>
    @foreach($itemsList as $item)
        @include('components.inputs.radio.item.index', [
            'id' => $item['id'],
            'name' => $inputName,
            'title' => $item['title'],
            'value' => $item['value'],
        ])
    @endforeach
</div>
