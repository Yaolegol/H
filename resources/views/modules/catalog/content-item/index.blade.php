<div class="catalog-content-item"
     data-item-id="{{ $itemId }}"
     data-item-role="catalog-content-item"
>
    @foreach( $catalogItem['content']['categoriesList'] as $category )
        <div>
            <a href="{{ $category['link'] }}">
                {{ $category['title'] }}
            </a>
        </div>
    @endforeach
</div>
