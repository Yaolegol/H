<div
    class="
        components-inputs-radio-checkbox-group
        {{$fullHeight ?? false ? 'components-inputs-radio-checkbox-group_full-height' : ''}}
        j-components-inputs-radio-checkbox-group
    "
    data-group-id="{{$groupId ?? ''}}"
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
            'classNameInput' => $classNameInput ?? false ? $classNameInput . ' ' . 'j-components-inputs-radio-checkbox-group__input' : 'j-components-inputs-radio-checkbox-group__input',
            'isChecked' => $item['isChecked'] ?? false,
            'name' => $name . $loop->index,
            'title' => $item['title'],
            'value' => $item['value'],
        ])
    @endforeach
</div>
