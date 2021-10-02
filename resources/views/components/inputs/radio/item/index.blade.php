<div class="inputs-radio-item">
    <input
        @if($isChecked)
            checked
        @endif
        class="inputs-radio-item__category-input"
        id="{{$id}}"
        name="{{$name}}"
        type="radio"
        value="{{$value}}"
    >
    <label
        class="inputs-radio-item__category-input-label"
        for="{{$id}}"
    >
        {{$title}}
    </label>
</div>
