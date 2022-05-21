<div class="modules-pages-map-web-common-components-filters-product">
    @if(isset($productFilterData['category']))
        @include('modules.pages.map.web.common.components.filters.button.index', [
                'buttonText' => 'Изменить',
                'title' => $productFilterData['category']['title'],
            ])
    @else
        @include('modules.pages.map.web.common.components.filters.button.index', [
                'buttonText' => 'Выбрать',
                'title' => 'Все продукты',
            ])
    @endif
</div>
