<div
    class="components-inputs-radio-checkbox-group j-components-inputs-radio-checkbox-group"
    data-id="{{$id ?? ''}}"
>
    <input
        @foreach($list as $item)
            @if($item['isChecked'] ?? false)
                checked
            @endif
        @endforeach
        class="hidden j-components-inputs-radio-checkbox-group__hidden-input"
        type="checkbox"
    >
    @foreach($list as $item)
        @include('components.inputs.checkbox.common.index', [
            'classNameInput' => 'j-components-inputs-radio-checkbox-group__input',
            'isChecked' => $item['isChecked'] ?? false,
            'name' => $name . '_' . $loop->index,
            'title' => $item['title'],
            'value' => $item['value'],
        ])
    @endforeach
</div>
