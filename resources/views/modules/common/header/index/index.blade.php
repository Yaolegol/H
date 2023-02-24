<div class="modules-common-header-index j-favorites-components-section">
    <div class="modules-common-header-index__map-block">
        <div class="modules-common-header-index__map-container">
            <a class="modules-common-header-index__map-link" href="/">Карта</a>
        </div>
    </div>
    <div class="modules-common-header-index__main">
        <div class="modules-common-header-index__main-menu-container">
            <div class="modules-common-header-index__area-left">
                <div class="modules-common-header-index__area-item">
                    @include('icons.logo')
                </div>
                <div class="modules-common-header-index__area-item">
                    @include('components.buttons.burger.index', [
                        'className' => 'j-components-buttons-modal-open',
                        'dataset' => [
                            [
                                'name' => 'data-template-id',
                                'value' => 'catalog',
                            ]
                        ]
                    ])
                </div>
            </div>
            <div class="modules-common-header-index__area-center">
                <div class="modules-common-header-index__search-container">
                    @include('modules.common.header.search.index')
                </div>
            </div>
            <div class="modules-common-header-index__area-right">
                <div class="modules-common-header-index__area-item">
                    <div class="modules-common-header-index__favorites-container j-favorites-components-header-counter">
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
                </div>

                <div class="modules-common-header-index__area-item">
                    <div class="modules-common-header-index__profile-container">
                        <a class="modules-common-header-index__profile-link" href="/profile">
                            @include('icons.profile')
                        </a>
                    </div>
                </div>

                <div class="modules-common-header-index__area-item">
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
        </div>
    </div>
</div>

@include('modules.common.catalog.modal.index')
@include('modules.common.location.components.modal.index')
