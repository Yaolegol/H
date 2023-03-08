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
        Я прочитал
        <a
            class="components-checkboxes-agreement__link"
            href="/legal"
            target="_blank"
        >правовую информацию</a> и даю согласие на обработку и хранение персональных данных*
    </span>
</div>
