<div class="map-web-filters-components-modal-modal-content j-location-modal-content">
    <h2 class="map-web-filters-components-modal-modal-content__title">Фильтры</h2>
    <div class="map-web-filters-components-modal-modal-content__filter-item-container">
        <div class="map-web-filters-components-modal-modal-content__filter-item-title">Категория:</div>
        <div class="map-web-filters-components-modal-modal-content__content-container">
            @component('components.catalog.index')
                @component('components.catalog.navigation-item-container.index')
                    @foreach($catalogHeader as $catalogItem)
                        @component('components.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
                            {{ $catalogItem['title'] }}
                        @endcomponent
                    @endforeach
                @endcomponent
                @component('components.catalog.content-item-container.index')
                    @foreach($catalogHeader as $catalogItem)
                        @component('components.catalog.content-item.index', [ 'itemId' => $loop->index ])
                            <div>{{ $catalogItem['title'] }}</div>
                            <div class="components-catalog__categories-container">
                                @foreach( $catalogItem['catalog_level_two'] as $category )
                                    @component('components.catalog.category-item.index')
                                        {{ $category['title'] }}
                                    @endcomponent
                                @endforeach
                            </div>
                        @endcomponent
                    @endforeach
                @endcomponent
            @endcomponent
        </div>
    </div>
</div>
