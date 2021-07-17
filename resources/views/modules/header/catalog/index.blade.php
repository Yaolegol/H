<div class="header-catalog j-header-catalog" data-initial-selected-item-id="0">
    <div class="header-catalog__backdrop j-header-catalog__backdrop"></div>
    <div class="header-catalog__catalog-container">
        <div class="header-catalog__navigation-container">
            @foreach($catalogHeader as $catalogItem)
                @include('modules.header.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
            @endforeach
        </div>
        <div class="header-catalog__content-container">
            @foreach($catalogHeader as $catalogItem)
                @include('modules.header.catalog.content-item.index', [ 'itemId' => $loop->index ])
            @endforeach
        </div>
    </div>
</div>
