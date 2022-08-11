<div class="modules-pages-map-web-routes-index">
    <h2 class="modules-pages-map-web-routes-index__title">Карта</h2>
    <div class="modules-pages-map-web-routes-index__content-area">
        <div class="modules-pages-map-web-routes-index__filters-block">
            <div class="modules-pages-map-web-routes-index__filters-container">
                @include('modules.common.location.components.buttons.filterButton.index')
            </div>
            <div class="modules-pages-map-web-routes-index__filters-container">
                @include('modules.common.map.common.components.filters.product.index')
            </div>
        </div>
        <div class="modules-pages-map-web-routes-index__info-item-container">
            @include('modules.common.map.yandex.components.viewAll.index')
        </div>
    </div>
</div>
