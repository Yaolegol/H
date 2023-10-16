<div class="components-inputs-checkbox-common__item-container">
    <label
        class="components-inputs-checkbox-common__input-label"
    >
        <input
            @if($isChecked ?? false)
                checked
            @endif
            class="components-inputs-checkbox-common__input {{$classNameInput ?? ''}}"
            name="{{$name ?? ''}}"
            @if($isRequired ?? false)
                required
            @endif
            type="checkbox"
            value="{{$value}}"
        >
        <span class="components-inputs-checkbox-common__marker-block">
            <span class="components-inputs-checkbox-common__marker-container">
                @include('icons.checkmark')
            </span>
        </span>
        <span class="components-inputs-checkbox-common__title">
            {{$title}}
        </span>
    </label>
</div>
