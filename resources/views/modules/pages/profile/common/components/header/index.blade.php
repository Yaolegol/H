<div class="modules-pages-profile-common-components-container-header">
    <div class="modules-pages-profile-common-components-container-header__title-container">
        <h1 class="modules-pages-profile-common-components-container-header__title">Ваш профиль</h1>
    </div>
    <div class="modules-pages-profile-common-components-container-header__mobile-container">
        <a href="/logout">Выйти</a>
    </div>
    <div class="modules-pages-profile-common-components-container-header__tabs-block">
        <div class="modules-pages-profile-common-components-container-header__tabs-container">
            <div class="modules-pages-profile-common-components-container-header__tab-item-container">
                <a
                    class="modules-pages-profile-common-components-container-header__tab-button {{$activeTab === 'personal-info' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                    href="/profile/personal-info"
                >
                    Личные данные
                </a>
            </div>
            <div
                class="modules-pages-profile-common-components-container-header__tab-item-container">
                <a
                    class="modules-pages-profile-common-components-container-header__tab-button {{$activeTab === 'organization-info' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                    href="/profile/organization-info"
                >
                    Организации
                </a>
            </div>
            <div
                class="modules-pages-profile-common-components-container-header__tab-item-container">
                <a
                    class="modules-pages-profile-common-components-container-header__tab-button {{$activeTab === 'sale-points-info' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                    href="/profile/sale-points-info"
                >
                    Торговые точки
                </a>
            </div>
            <div
                class="modules-pages-profile-common-components-container-header__tab-item-container">
                <a
                    class="modules-pages-profile-common-components-container-header__tab-button {{$activeTab === 'sale-offers' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                    href="/profile/sale-offers"
                >
                    Торговые предложения
                </a>
            </div>
        </div>
    </div>
    <div class="modules-pages-profile-common-components-container-header__info-container">
        {{$slot}}
    </div>
</div>
