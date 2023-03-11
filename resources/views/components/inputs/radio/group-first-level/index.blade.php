<div
    class="components-inputs-radio-group-first-level j-inputs-radio-group-first-level"
    data-group-name="{{$groupName}}"
>
    @foreach($itemsList as $item)
        @include('components.inputs.radio.radio-item.index', [
            'isChecked' => $item['isChecked'] ?? false,
            'name' => $inputName,
            'required' => $required ?? false,
            'title' => $item['title'],
            'value' => $item['value'],
        ])
    @endforeach
</div>
