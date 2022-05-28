<div class="modules-pages-map-web-common-components-filters-product j-modules-pages-map-web-common-components-filters-product">
    @include('components.buttons.filter.index', [
                'defaultTitle' => 'Все продукты',
                'title' => $productFilterData['category']['title'] ? $productFilterData['category']['title'] : 'Все продукты',
            ])
</div>
