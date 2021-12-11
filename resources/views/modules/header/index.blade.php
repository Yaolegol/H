<div class="header j-favorites-components-section">
    <div class="header__map-block">
        <div class="header__map-container">
            <a class="header__map-link" href="/map">Карта</a>
        </div>
    </div>
    <div class="header__main">
        <div class="header__logo-container">
            @include('icons.logo')
        </div>
        <div>
            @include('components.buttons.burger.index')
        </div>
        <div>
            @include('components.inputs.search.index')
        </div>
        <div class="header__location-container">
            @include('modules.location.components.choose.iconButton.index')
        </div>
        <div class="header__favorites-container j-favorites-components-header-counter">
            <div class="header__favorites-count-container j-favorites-components-header-counter__count"></div>
            @include('icons.favorite')
        </div>
        <div class="header__profile-container">
            <a class="header__profile-link" href="/profile">
                @include('icons.profile')
            </a>
        </div>
        @auth
            <div class="header__login-container">
                <a class="header__login-link" href="/logout">Выйти</a>
            </div>
        @endauth

        @guest
            <div class="header__login-container">
                <a class="header__login-link" href="/login">Войти</a>
            </div>
        @endguest
    </div>
</div>

@include('modules.location.components.modal.index')
