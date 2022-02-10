<div class="modules-common-header-index j-favorites-components-section">
    <div class="modules-common-header-index__map-block">
        <div class="modules-common-header-index__map-container">
            <a class="modules-common-header-index__map-link" href="/map">Карта</a>
        </div>
    </div>
    <div class="modules-common-header-index__main">
        <div class="modules-common-header-index__item-container modules-common-header-index__logo-container">
            @include('icons.logo')
        </div>
        <div class="modules-common-header-index__item-container">
            @include('components.buttons.burger.index')
        </div>
        <div class="modules-common-header-index__item-container modules-common-header-index__item-container_search-container">
            @include('modules.common.header.search.index')
        </div>
        <div class="modules-common-header-index__item-container modules-common-header-index__location-container">
            @include('modules.common.location.components.choose.iconButton.index')
        </div>
        <div class="modules-common-header-index__item-container modules-common-header-index__favorites-container j-favorites-components-header-counter">
            <div class="modules-common-header-index__favorites-count-container j-favorites-components-header-counter__count"></div>
            <div class="modules-common-header-index__favorites-icon-container">
                @include('icons.favorite')
                @auth
                    <a class="modules-common-header-index__favorites-link" href="/favorites"></a>
                @endauth
            </div>

            @guest
                <div class="modules-common-header-index__favorites-hint-block">
                    <div class="modules-common-header-index__favorites-hint-title">Чтобы просмотреть "Избранное" нужно</div>
                    <div class="modules-common-header-index__favorites-hint-text-container">
                        <a class="modules-common-header-index__favorites-hint-link" href="/login">Войти</a>
                    </div>
                    <div class="modules-common-header-index__favorites-hint-text-container">
                        <div class="modules-common-header-index__favorites-hint-text">или</div>
                    </div>
                    <div class="modules-common-header-index__favorites-hint-text-container">
                        <a class="modules-common-header-index__favorites-hint-link" href="/register">Зарегистрироваться</a>
                    </div>
                </div>
            @endguest
        </div>
        <div class="modules-common-header-index__item-container modules-common-header-index__profile-container">
            <a class="modules-common-header-index__profile-link" href="/profile">
                @include('icons.profile')
            </a>
        </div>
        @auth
            <div class="modules-common-header-index__item-container modules-common-header-index__item-container_mobile-hidden">
                <a class="modules-common-header-index__login-link" href="/logout">Выйти</a>
            </div>
        @endauth

        @guest
            <div class="modules-common-header-index__item-container modules-common-header-index__item-container_mobile-hidden">
                <a class="modules-common-header-index__login-link" href="/login">Войти</a>
            </div>
        @endguest
    </div>
</div>

@include('modules.common.location.components.modal.index')
