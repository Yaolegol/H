<label class="components-inputs-phone j-inputs-phone">
    <input
        class="components-inputs-phone__input j-inputs-phone__input"
        name="{{$name}}"
        @if($required ?? false)
            required
        @endif
    >
    <input
        class="components-inputs-phone__input-mask j-inputs-phone__input-mask"
        type="tel"
    />
</label>
