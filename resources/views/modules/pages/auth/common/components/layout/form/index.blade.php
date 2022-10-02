<form
    action="{{$formAction}}"
    class="{{$formClass ?? ''}}"
    method="POST"
>
    @csrf

    {{$slot}}

    <div class="modules-pages-auth-common-components-layout-form__send-button-container">
        <button class="button">Отправить</button>
    </div>

    @include('components.form.error.index', [
        'message' => session('commonError'),
    ])
</form>
