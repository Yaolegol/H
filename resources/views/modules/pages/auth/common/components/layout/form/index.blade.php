<form
    action="{{$formAction}}"
    class="{{$formClass ?? 'modules-pages-auth-common-components-layout-form'}}"
    method="POST"
>
    @csrf

    {{$slot}}

    <div class="modules-pages-auth-common-components-layout-form__send-button-container">
        <button
            class="
                button
                modules-pages-auth-common-components-layout-form__send-button
                j-components-click-block
            "
        >Отправить</button>
    </div>
    <div class="modules-pages-auth-common-components-layout-form__info-container-required">
        <div>* Для отправки необходимо заполнить все поля</div>
    </div>

    @include('components.form.error.index', [
        'message' => session('commonError'),
    ])

    {{$slot_footer ?? ''}}
</form>
