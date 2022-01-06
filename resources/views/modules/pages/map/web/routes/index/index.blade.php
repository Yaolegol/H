<div class="modules-pages-map-web-routes-index">
    <h2 class="modules-pages-map-web-routes-index__title">Карта</h2>
    <div class="modules-pages-map-web-routes-index__content-area">
        <div class="modules-pages-map-web-routes-index__location-container">
            @include('modules.common.location.components.choose.infoBlock.block.index')
        </div>
        <div class="modules-pages-map-web-routes-index__filters-container">
            @include('modules.pages.map.web.common.components.filters.button.index')
        </div>
        <div class="modules-pages-map-web-routes-index__info-item-container">
            <div>Где купить?</div>
            <div>
                @include('components.map.2gis.components.viewAll.index')
            </div>
        </div>
    </div>
</div>

@include('modules.pages.map.web.common.components.filters.modal.index')
