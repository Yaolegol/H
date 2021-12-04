<div class="components-catalog j-components-catalog" data-initial-selected-item-id="0">
    <div class="components-catalog__navigation-container">
        @foreach($catalogHeader as $catalogItem)
            @component('components.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
                {{ $catalogItem['title'] }}
            @endcomponent
        @endforeach
    </div>
    <div class="components-catalog__content-container">
        @foreach($catalogHeader as $catalogItem)
            @component('components.catalog.content-item.index', [ 'itemId' => $loop->index ])
                <div>{{ $catalogItem['title'] }}</div>
                <div class="components-catalog__categories-container">
                    @foreach( $catalogItem['catalog_level_two'] as $category )
                        @include('components.catalog.category-item.index', [ 'category' => $category ])
                    @endforeach
                </div>
            @endcomponent
        @endforeach
    </div>
</div>
