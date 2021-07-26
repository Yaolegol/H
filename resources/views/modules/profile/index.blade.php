<div class="profile">
    <div class="profile__title-container">
        <h1 class="profile__title">Ваш профиль</h1>
    </div>
    <div class="profile__tabs-container">
        <a
            class="profile__tab-button profile__tab-button_active"
            href="/profile"
        >
            Личные данные
        </a>
        <a
            class="profile__tab-button profile__tab-button_with-offset"
            href="/profile"
        >
            Мои предложения
        </a>
    </div>
    <div class="profile__info-container">
        @include('modules.profile.info.index')
    </div>
</div>


