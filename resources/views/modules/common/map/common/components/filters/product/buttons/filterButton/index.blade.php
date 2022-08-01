<div
    class="modules-common-filters-product-filter-button j-modules-common-filters-product-filter-button"
>
    @include('components.buttons.filter.index', [
                'className' => 'j-components-buttons-modal-open',
                'dataset' => [
                    [
                        'key' => 'data-template-id',
                        'value' => 'map-catalog-filter',
                    ],
                ],
                'defaultTitle' => 'Все продукты',
                'title' => $productFilterData['category']['title'] ? $productFilterData['category']['title'] : 'Все продукты',
            ])
</div>
