<div class="modules-pages-map-web-common-components-filters-product j-modules-pages-map-web-common-components-filters-product">
    @include('components.buttons.filter.index', [
                'className' => 'j-components-buttons-modal-open',
                'dataset' => [
                    [
                        'key' => 'data-template-id',
                        'value' => 'catalog',
                    ],
                ],
                'defaultTitle' => 'Все продукты',
                'title' => $productFilterData['category']['title'] ? $productFilterData['category']['title'] : 'Все продукты',
            ])
</div>
