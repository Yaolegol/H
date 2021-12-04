<div class="components-catalog j-components-catalog" data-initial-selected-item-id="0">
    <div class="components-catalog__navigation-container">
        @foreach($catalogHeader as $catalogItem)
            @include('components.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
        @endforeach
    </div>
    <div class="components-catalog__content-container">
        @foreach($catalogHeader as $catalogItem)
            @include('components.catalog.content-item.index', [ 'itemId' => $loop->index ])
        @endforeach
    </div>
</div>
