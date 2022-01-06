<div class="modules-pages-catalog-common-components-list">
    <div class="modules-pages-catalog-common-components-list__items-container">
        @foreach($catalogPage as $catalogItem)
            <div class="modules-pages-catalog-common-components-list__item">
                @include('modules.pages.catalog.common.components.item.index', [ 'catalogItem' => $catalogItem ])
            </div>
        @endforeach
    </div>
</div>
