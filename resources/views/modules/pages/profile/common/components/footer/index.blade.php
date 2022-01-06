<div class="modules-pages-profile-common-components-container-footer">
    <div class="modules-pages-profile-common-components-container-footer__send-button-container">
        <button class="modules-pages-profile-common-components-container-footer__send-button">Сохранить</button>
    </div>
    @include('components.form.error.index', [
        'message' => session('commonError'),
    ])
</div>
