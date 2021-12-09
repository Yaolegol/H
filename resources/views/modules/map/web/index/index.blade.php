<div class="map-web-index">
    <div class="map-web-index__content-area">
        <div class="map-web-index__location-container">
            @include('modules.location.components.choose.infoBlock.block.index')
        </div>
        <div class="map-web-index__filters-container">
            @include('modules.map.web.filters.components.button.index')
        </div>
        <div class="map-web-index__info-item-container">
            <div>Где купить?</div>
            <div>
                @include('components.map.2gis.components.viewAll.index')
            </div>
        </div>
    </div>
</div>

@include('modules.map.web.filters.components.modal.index')
