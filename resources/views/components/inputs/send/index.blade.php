<div class="components-inputs-send {{$className ?? ''}}">
    <div class="components-inputs-send__area-input">
        <input
            class="components-inputs-send__input {{$classNameInput ?? ''}}"
            name="{{$name}}"
            placeholder="{{$placeholder}}"
            @if($required ?? false)
            required
            @endif
            type="{{$type ?? 'text'}}"
            @isset($value)
            value="{{$value}}"
            @endisset
        >
    </div>
    <button
        class="components-inputs-send__button {{$classNameButton ?? ''}}"
        type="button"
    >
        Отправить
    </button>
</div>
