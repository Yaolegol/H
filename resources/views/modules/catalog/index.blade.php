<div class="catalog j-modules-catalog" data-initial-selected-item-id="0">
    <div class="catalog__backdrop j-modules-catalog__backdrop"></div>
    <div class="catalog__catalog-container">
        <div class="catalog__navigation-container">
            @foreach($catalogList as $catalogItem)
                @include('modules.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
            @endforeach
        </div>
        <div class="catalog__content-container">
            @foreach($catalogList as $catalogItem)
                @include('modules.catalog.content-item.index', [ 'itemId' => $loop->index ])
            @endforeach
        </div>
    </div>
</div>
