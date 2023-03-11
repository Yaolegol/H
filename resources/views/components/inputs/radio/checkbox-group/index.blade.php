<div class="components-inputs-radio-checkbox-group">
    @foreach($list as $item)
        <div class="components-inputs-radio-checkbox-group__item-container">
            <label
                class="components-inputs-radio-checkbox-group__input-label"
            >
                <input
                    @if($item['isChecked'] ?? false)
                        checked
                    @endif
                    class="components-inputs-radio-checkbox-group__input j-components-inputs-radio-checkbox-group__input"
                    name="{{$name . '_' . $loop->index}}"
                    type="checkbox"
                    value="{{$item['value']}}"
                >
                <span class="components-inputs-radio-checkbox-group__marker-block">
                    <span class="components-inputs-radio-checkbox-group__marker-container">
                        @include('icons.checkmark')
                    </span>
                </span>
                <span class="components-inputs-radio-checkbox-group__title">
                    {{$item['title']}}
                </span>
            </label>
        </div>
    @endforeach
</div>
