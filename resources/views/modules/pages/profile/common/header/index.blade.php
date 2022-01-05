<div class="profile-common-header">
    <div class="profile-common-header__title-container">
        <h1 class="profile-common-header__title">Ваш профиль</h1>
    </div>
    <div class="profile-common-header__tabs-block">
        <div class="profile-common-header__tabs-container">
            <div class="profile-common-header__tab-item-container">
                <a
                    class="profile-common-header__tab-button {{$activeTab === 'personal-info' ? 'profile-common-header__tab-button_active' : ''}}"
                    href="/profile/personal-info"
                >
                    Личные данные
                </a>
            </div>
            <div
                class="profile-common-header__tab-item-container">
                <a
                    class="profile-common-header__tab-button {{$activeTab === 'organization-info' ? 'profile-common-header__tab-button_active' : ''}}"
                    href="/profile/organization-info"
                >
                    Организации
                </a>
            </div>
            <div
                class="profile-common-header__tab-item-container">
                <a
                    class="profile-common-header__tab-button {{$activeTab === 'sale-points-info' ? 'profile-common-header__tab-button_active' : ''}}"
                    href="/profile/sale-points-info"
                >
                    Торговые точки
                </a>
            </div>
            <div
                class="profile-common-header__tab-item-container">
                <a
                    class="profile-common-header__tab-button {{$activeTab === 'sale-offers' ? 'profile-common-header__tab-button_active' : ''}}"
                    href="/profile/sale-offers"
                >
                    Торговые предложения
                </a>
            </div>
        </div>
    </div>
    <div class="profile-common-header__info-container">
        {{$slot}}
    </div>
</div>
