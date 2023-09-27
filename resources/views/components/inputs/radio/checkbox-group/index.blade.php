<div
    class="components-inputs-radio-checkbox-group j-components-inputs-radio-checkbox-group"
    data-id="{{$id ?? ''}}"
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
