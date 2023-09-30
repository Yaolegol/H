<div class="modules-pages-profile-common-components-container-header">
    <div class="modules-pages-profile-common-components-container-header__title-container">
        <h1 class="modules-pages-profile-common-components-container-header__title">Профиль</h1>
    </div>
    <div class="modules-pages-profile-common-components-container-header__mobile-container">
        <a href="/logout">Выйти</a>
    </div>
    <div class="modules-pages-profile-common-components-container-header__help-area">
        <div>Возникли трудности?</div>
        <div>Напишите нам - мы обязательно Вам поможем!</div>
        <div>
            @include('components.contacts.links.common.index')
        </div>
    </div>
    <div class="modules-pages-profile-common-components-container-header__tabs-block">
        <div class="modules-pages-profile-common-components-container-header__tabs-container">
            <div class="modules-pages-profile-common-components-container-header__tab-item-container">
                <a
                    class="modules-pages-profile-common-components-container-header__tab-button modules-pages-profile-common-components-container-header__tab-button_size-large {{$activeTab === 'sale-offers' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                    href="/profile/sale-offers"
                >
                    Мои товары
                </a>
            </div>
            <div class="modules-pages-profile-common-components-container-header__tabs-secondary-container">
                <div class="modules-pages-profile-common-components-container-header__tab-item-container">
                    <a
                        class="modules-pages-profile-common-components-container-header__tab-button modules-pages-profile-common-components-container-header__tab-button_size-medium {{$activeTab === 'personal-info' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                        href="/profile/personal-info"
                    >
                        Личные данные
                    </a>
                </div>
                <div
                    class="modules-pages-profile-common-components-container-header__tab-item-container">
                    <a
                        class="modules-pages-profile-common-components-container-header__tab-button modules-pages-profile-common-components-container-header__tab-button_size-medium {{$activeTab === 'organization-info' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                        href="/profile/organization-info"
                    >
                        Организации
                    </a>
                </div>
                <div
                    class="modules-pages-profile-common-components-container-header__tab-item-container">
                    <a
                        class="modules-pages-profile-common-components-container-header__tab-button modules-pages-profile-common-components-container-header__tab-button_size-medium {{$activeTab === 'sale-points-info' ? 'modules-pages-profile-common-components-container-header__tab-button_active' : ''}}"
                        href="/profile/sale-points-info"
                    >
                        Торговые точки
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modules-pages-profile-common-components-container-header__info-container">
        {{$slot}}
    </div>
</div>
