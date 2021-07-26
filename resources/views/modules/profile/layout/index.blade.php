<div class="profile">
    <div class="profile__title-container">
        <h1 class="profile__title">Ваш профиль</h1>
    </div>
    <div class="profile__tabs-block">
        <div class="profile__tabs-container">
            <div class="profile__tab-item-container">
                <a
                    class="profile__tab-button profile__tab-button_active"
                    href="/profile/personal-info"
                >
                    Личные данные
                </a>
            </div>
            <div class="profile__tab-item-container">
                <a
                    class="profile__tab-button"
                    href="/profile/organization-info"
                >
                    Информация об организации
                </a>
            </div>
            <div class="profile__tab-item-container">
                <a
                    class="profile__tab-button"
                    href="/profile/sale-points"
                >
                    Информация о торговых точках
                </a>
            </div>
            <div class="profile__tab-item-container">
                <a
                    class="profile__tab-button"
                    href="/profile/offers"
                >
                    Мои торговые предложения
                </a>
            </div>
        </div>
    </div>
    <div class="profile__info-container">
        @if($section === 'personal-info')
            @include('modules.profile.personal-info.index')
        @endif
    </div>
</div>


