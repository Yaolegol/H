<div class="modules-pages-map-web-routes-index">
    <div class="modules-pages-map-web-routes-index__content-area">
        <div class="modules-pages-map-web-routes-index__filters-block">
            <h4>Фильтры:</h4>
            <div class="modules-pages-map-web-routes-index__filters-container">
                <div class="modules-pages-map-web-routes-index__buttons-block">
                    <div class="modules-pages-map-web-routes-index__button-container">
                        @include('modules.common.map.common.components.filters.product.index')
                    </div>
                    <div class="modules-pages-map-web-routes-index__button-container">
                        @include('components.buttons.filter.index', [
                            'className' => 'j-modules-common-geo-components-button',
                            'dataset' => [],
                            'defaultTitle' => 'Показать рядом со мной',
                            'title' => 'Показать рядом со мной',
                        ])
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
                        <div class="modules-pages-map-web-routes-index__offers-header-description">*чтобы посмотреть другие товары перемещайте или приблизте карту!</div>
                    </div>
                    <div class="modules-pages-map-web-routes-index__offers-container">
                        @include('modules.common.offers.list.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
