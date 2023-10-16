<div
    class="components-inputs-checkbox-select-all j-components-inputs-checkbox-select-all"
    data-id="{{$id}}"
>
    @include('components.inputs.checkbox.common.index', [
        'classNameInput' => 'j-components-inputs-checkbox-select-all__input',
        'isChecked' => false,
        'name' => '',
        'title' => 'Выбрать все',
        'value' => '',
    ])
</div>
