<div class="inputs-form">
    <input
            class="inputs-form__input"
            name="{{$name}}"
            placeholder="{{$placeholder}}"
            type="{{$type}}"
            @isset($value)
                value="{{$value}}"
            @endisset
    >
</div>
