<div class="components-inputs-form">
    <input
            class="components-inputs-form__input"
            name="{{$name}}"
            placeholder="{{$placeholder}}"
            @if($required ?? false)
                required
            @endif
            type="{{$type}}"
            @isset($value)
                value="{{$value}}"
            @endisset
    >
</div>
