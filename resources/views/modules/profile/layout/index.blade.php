<div class="profile-layout">
    <div class="profile-layout__title-container">
        <h1 class="profile-layout__title">Ваш профиль</h1>
    </div>
    <div class="profile-layout__tabs-block">
        <div class="profile-layout__tabs-container">
            <div class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button profile-layout__tab-button_active"
                    href="/profile/personal-info"
                >
                    Личные данные
                </a>
            </div>
            <div class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button"
                    href="/profile/organization-info"
                >
                    Информация об организации
                </a>
            </div>
            <div class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button"
                    href="/profile/sale-points"
                >
                    Информация о торговых точках
                </a>
            </div>
            <div class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button"
                    href="/profile/offers"
                >
                    Мои торговые предложения
                </a>
            </div>
        </div>
    </div>
    <div class="profile-layout__info-container">
        @if($section === 'personal-info')
            @include('modules.profile.personal-info.index')
        @endif
    </div>
</div>


