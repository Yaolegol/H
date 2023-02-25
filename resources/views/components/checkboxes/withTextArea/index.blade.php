<div
    class="components-checkboxes-with-text-area"
>
    <input
        @isset($value)
            checked
        @endisset
        class="components-checkboxes-with-text-area__input"
        id="id-input-{{$name}}"
        name="{{$name}}"
        type="checkbox"
    >
    <div class="components-checkboxes-with-text-area__input-label-container">
        <label
            class="components-checkboxes-with-text-area__input-label"
            for="id-input-{{$name}}"
        >
        <span class="components-checkboxes-with-text-area__marker-block">
            <span class="components-checkboxes-with-text-area__marker-container">
                @include('icons.checkmark')
            </span>
        </span>
            <span class="components-checkboxes-with-text-area__title">{{$title}}</span>
        </label>
    </div>
    <div class="components-checkboxes-with-text-area__textarea-container">
        @include('components.inputs.textarea.base.index', [
            'name' => $name,
        ])
    </div>
</div>
