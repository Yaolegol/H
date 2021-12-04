<div
    class="components-catalog-content-item j-components-catalog-content-item"
    data-item-id="{{ $itemId }}"
>
    <div>{{ $catalogItem['title'] }}</div>

    <div class="components-catalog-content-item__categories-container">
        @foreach( $catalogItem['catalog_level_two'] as $category )
            @include('components.catalog.category-item.index', [ 'category' => $category ])
        @endforeach
    </div>
</div>
