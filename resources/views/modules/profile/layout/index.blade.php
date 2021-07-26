<div class="profile-layout">
    <div class="profile-layout__title-container">
        <h1 class="profile-layout__title">Ваш профиль</h1>
    </div>
    <div class="profile-layout__tabs-block">
        <div class="profile-layout__tabs-container">
            <div class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button {{$section === 'personal-info' ? 'profile-layout__tab-button_active' : '' }}"
                    href="/profile/personal-info"
                >
                    Личные данные
                </a>
            </div>
            <div
                class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button {{$section === 'organization-info' ? 'profile-layout__tab-button_active' : '' }}"
                    href="/profile/organization-info"
                >
                    Информация об организации
                </a>
            </div>
            <div
                class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button {{$section === 'sale-points' ? 'profile-layout__tab-button_active' : '' }}"
                    href="/profile/sale-points"
                >
                    Информация о торговых точках
                </a>
            </div>
            <div
                class="profile-layout__tab-item-container">
                <a
                    class="profile-layout__tab-button {{$section === 'offers' ? 'profile-layout__tab-button_active' : '' }}"
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
        @if($section === 'organization-info')
            @include('modules.profile.organization-info.index')
        @endif
        @if($section === 'sale-points')
            @include('modules.profile.sale-points.index')
        @endif
        @if($section === 'offers')
            @include('modules.profile.offers.index')
        @endif
    </div>
</div>
