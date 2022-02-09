<div
    class="modules-pages-map-web-common-components-filters-modal-modal-content j-map-web-filters-components-modal-modal-content"
>
    <h2 class="modules-pages-map-web-common-components-filters-modal-modal-content__title">Фильтры</h2>
    <div class="modules-pages-map-web-common-components-filters-modal-modal-content__filter-item-container">
        <div class="modules-pages-map-web-common-components-filters-modal-modal-content__filter-item-title">Категория:</div>
        <div class="modules-pages-map-web-common-components-filters-modal-modal-content__content-container">
            @component('components.catalog.container.index')
                @component('components.catalog.navigation-item-container.index')
                    @foreach($catalogHeader as $catalogItem)
                        @component('components.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
                            @component('modules.pages.map.web.common.components.filters.modal.modalContent.navigationItem.index')
                                {{ $catalogItem['title'] }}
                            @endcomponent
                        @endcomponent
                    @endforeach
                @endcomponent
                @component('components.catalog.content-item-container.index')
                    @foreach($catalogHeader as $catalogItem)
                        @component('components.catalog.content-item.index', [ 'itemId' => $loop->index ])
                            <div>{{ $catalogItem['title'] }}</div>
                            <div class="modules-pages-map-web-common-components-filters-modal-modal-content__categories-container">
                                @foreach( $catalogItem['catalog_level_two'] as $category )
                                    @component('components.catalog.category-item.index')
                                        @component('modules.pages.map.web.common.components.filters.modal.modalContent.navigationContentButton.index', [
                                            'id' => $category['id']
                                        ])
                                            {{ $category['title'] }}
                                        @endcomponent
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
