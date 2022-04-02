<div class="components-inputs-radio-item">
    <label
        class="components-inputs-radio-item__input-label"
    >
        <input
            @if($isChecked ?? false)
                checked
            @endif
            class="components-inputs-radio-item__input"
            name="{{$name}}"
            type="radio"
            value="{{$value}}"
        >
        <span class="components-inputs-radio-item__marker-block">
            <span class="components-inputs-radio-item__marker-container">
                @include('icons.checkmark')
            </span>
        </span>
        <span class="components-inputs-radio-item__title">{{$title}}</span>
    </label>
</div>
