<div class="modules-pages-map-web-routes-index">
    <div class="modules-pages-map-web-routes-index__content-area">
        <div class="modules-pages-map-web-routes-index__content-header">
            <div class="modules-pages-map-web-routes-index__content-header-top">
                @include('components.info.common.index', [
                    'className' => 'modules-pages-map-web-routes-index__share-block',
                    'id' => 'local_storage__info_share',
                    'text' => 'Мы только открылись!<br /> Вы можете поддержать проект - поделитесь ссылкой на сайт!',
                ])
                <div class="modules-pages-map-web-routes-index__add-product-block">
                    @guest
                        <div class="modules-pages-map-web-routes-index__add-product-container">
                            <div class="modules-pages-map-web-routes-index__add-product-text">
                                Разместить объявление!
                            </div>
                            @include('components.hint.common.index', [
                                'text' => 'Чтобы разместить объявление нужно',
                            ])
                        </div>
                    @endguest
                    @auth
                        <a
                            class="modules-pages-map-web-routes-index__link"
                            href="/profile/sale-offers/create"
                        >Разместить объявление!</a>
                    @endauth
                    <div>Это просто и бесплатно!</div>
                </div>
            </div>
            <div class="modules-pages-map-web-routes-index__content-header-main">
                <div class="modules-pages-map-web-routes-index__filters-block">
                    <div class="modules-pages-map-web-routes-index__buttons-block">
                        <div class="modules-pages-map-web-routes-index__button-container">
                            @include('modules.common.map.common.components.filters.product.index')
                        </div>
                        <div class="modules-pages-map-web-routes-index__button-container">
                            @include('components.buttons.filter.index', [
                                'className' => 'j-modules-common-geo-components-button',
                                'dataset' => [],
                                'defaultTitle' => 'Показать рядом со мной',
                                'icon' => 'icons.location',
                                'title' => 'Показать рядом со мной',
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modules-pages-map-web-routes-index__map-area">
            <div class="modules-pages-map-web-routes-index__map-block">
                @include('modules.common.map.yandex.components.viewAll.index')
            </div>
            <div class="modules-pages-map-web-routes-index__offers-area">
                <div class="modules-pages-map-web-routes-index__offers-block">
                    <div class="modules-pages-map-web-routes-index__offers-header">
                        <h4>Товары в видимой области карты*</h4>
                        <div class="modules-pages-map-web-routes-index__offers-header-description">*чтобы посмотреть другие товары перемещайте или приблизьте карту!</div>
                    </div>
                    <div class="modules-pages-map-web-routes-index__offers-full-screen-container">
                        <button
                            class="modules-pages-map-web-routes-index__offers-full-screen-button j-components-buttons-modal-open"
                            data-template-id="map-catalog-offers"
                            type="button"
                        >На весь экран</button>
                    </div>
                    @include('modules.common.offers.modal.index')
                    <div class="modules-pages-map-web-routes-index__offers-container">
                        @include('modules.common.offers.list.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
