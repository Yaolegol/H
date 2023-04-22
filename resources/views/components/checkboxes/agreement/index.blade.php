<div
    class="components-checkboxes-agreement"
>
    <label class="components-checkboxes-agreement__input-label">
        <input
            class="components-checkboxes-agreement__input"
            name="agreement"
            required
            type="checkbox"
        >
        <span class="components-checkboxes-agreement__marker-block">
            <span class="components-checkboxes-agreement__marker-container">
                @include('icons.checkmark')
            </span>
        </span>
    </label>
    <span class="components-checkboxes-agreement__title">
        Я согласен(-на) с
        <a
            class="components-checkboxes-agreement__link"
            href="/legal"
            target="_blank"
        >правовой информацией</a> и положениями "О персональных данных"
    </span>
</div>
