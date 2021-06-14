<div class="catalog-content-item"
     data-item-id="{{ $itemId }}"
     data-item-role="catalog-content-item"
>
    <div>{{ $catalogItem['title'] }}</div>

    @foreach( $catalogItem['content']['categoriesList'] as $category )
        @include('modules.catalog.category-item.index', [ 'category' => $category ])
    @endforeach
</div>
