<div class="modules-common-catalog-content">
    @foreach($catalog as $catalogItem)
        <div
            class="modules-common-catalog-content__item j-components-catalog-content-item j-components-search-catalog__content-block"
            data-item-id="{{ $loop->index }}"
            data-value="{{ $catalogItem['title'] }}"
        >
            <div class="modules-common-catalog-content__header j-header-catalog__search-element">
                <div class="modules-common-catalog-content__header-item">
                    @include($navigationItem, [
                        'className' => 'j-modules-common-filters-product-modal-components-buttons-navigation',
                        'contentData' => $catalogItem,
                        'isBold' => true,
                    ])
                </div>
            </div>
            <div class="modules-common-catalog-content__categories-container">
                @foreach( $catalogItem['catalog_level_two'] as $contentData )
                    <div
                        class="modules-common-catalog-content__category-item j-components-catalog-content-item__category j-components-search-catalog__content-item"
                        data-value="{{$contentData['title']}}"
                    >
                        @include($contentItem, [
                            'contentData' => $contentData,
                            'navigationData' => $catalogItem,
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
