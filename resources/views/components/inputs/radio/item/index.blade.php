<div class="inputs-radio-item">
    <label
        class="inputs-radio-item__category-input-label"
    >
        <input
            @if($isChecked ?? false)
                checked
            @endif
            class="inputs-radio-item__category-input"
            name="{{$name}}"
            type="radio"
            value="{{$value}}"
        >
        <span>{{$title}}</span>
    </label>
</div>
