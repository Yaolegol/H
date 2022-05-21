<div class="modules-pages-map-web-common-components-filters-product">
    @if($productFilterData['category']['title'])
        @include('modules.pages.map.web.common.components.filters.button.index', [
                'buttonText' => 'изменить',
                'defaultTitle' => 'Все продукты',
                'title' => $productFilterData['category']['title'],
            ])
    @else
        @include('modules.pages.map.web.common.components.filters.button.index', [
                'buttonText' => 'Выбрать',
                'defaultTitle' => 'Все продукты',
                'title' => 'Все продукты',
            ])
    @endif
</div>
