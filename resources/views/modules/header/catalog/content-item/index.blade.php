<div class="header-catalog-content-item"
     data-item-id="{{ $itemId }}"
     data-item-role="header-catalog-content-item"
>
    <div>{{ $catalogItem['title'] }}</div>

    <div class="header-catalog-content-item__categories-container">
        @foreach( $catalogItem['content']['categoriesList'] as $category )
            @include('modules.header.catalog.category-item.index', [ 'category' => $category ])
        @endforeach
    </div>
</div>
