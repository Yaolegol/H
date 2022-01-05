<div class="map-web-index">
    <h2 class="map-web-index__title">Карта</h2>
    <div class="map-web-index__content-area">
        <div class="map-web-index__location-container">
            @include('modules.common.location.components.choose.infoBlock.block.index')
        </div>
        <div class="map-web-index__filters-container">
            @include('modules.pages.map.web.filters.components.button.index')
        </div>
        <div class="map-web-index__info-item-container">
            <div>Где купить?</div>
            <div>
                @include('components.map.2gis.components.viewAll.index')
            </div>
        </div>
    </div>
</div>

@include('modules.pages.map.web.filters.components.modal.index')
