<span class="components-inputs-textarea-base">
    <textarea
        class="components-inputs-textarea-base__textarea"
        name="{{$name}}"
        placeholder="{{$placeholder ?? ''}}"
        @if($required ?? false)
            required
        @endif
    >{{$value ?? ''}}</textarea>
</span>
