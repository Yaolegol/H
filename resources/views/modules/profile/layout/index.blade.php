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
                    class="
                        profile-layout__tab-button
                        {{
                            $section === 'sale-points-info/index'
                            || $section === 'sale-points-info/edit'
                            || $section === 'sale-points-info/create'
                            ? 'profile-layout__tab-button_active'
                            : ''
                        }}
                    "
                    href="/profile/sale-points-info"
                >
                    Информация о торговых точках
                </a>
            </div>
            <div
                class="profile-layout__tab-item-container">
                <a
                    class="
                        profile-layout__tab-button
                        {{
                            $section === 'sale-offers/index'
                            || $section === 'sale-offers/create'
                            || $section === 'sale-offers/edit'
                            ? 'profile-layout__tab-button_active'
                            : ''
                        }}
                    "
                    href="/profile/sale-offers"
                >
                    Мои торговые предложения
                </a>
            </div>
        </div>
    </div>
    <div class="profile-layout__info-container">
        @if($section === 'organization-info')
            @include('modules.profile.organization-info.index')
        @endif
        @if($section === 'personal-info')
            @include('modules.profile.personal-info.index')
        @endif
        @if($section === 'sale-offers/create')
            @include('modules.profile.sale-offers.create.index')
        @endif
        @if($section === 'sale-offers/edit')
            @include('modules.profile.sale-offers.edit.index')
        @endif
        @if($section === 'sale-offers/index')
            @include('modules.profile.sale-offers.index.index')
        @endif
        @if($section === 'sale-points-info/create')
            @include('modules.profile.sale-points-info.create.index')
        @endif
        @if($section === 'sale-points-info/edit')
            @include('modules.profile.sale-points-info.edit.index')
        @endif
        @if($section === 'sale-points-info/index')
            @include('modules.profile.sale-points-info.index.index')
        @endif
    </div>
</div>
