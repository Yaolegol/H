<div class="profile-common-footer">
    <div class="profile-common-footer__send-button-container">
        <button class="profile-common-footer__send-button">Сохранить</button>
    </div>
    @include('components.form.error.index', [
        'message' => session('commonError'),
    ])
</div>
