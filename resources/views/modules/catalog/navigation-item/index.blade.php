<div class="catalog-navigation-item">
    <div class="catalog-navigation-item__title-container">
        <div class="catalog-navigation-item__title">{{ $catalogItem['title'] }}</div>
        <div class="catalog-navigation-item__content-container">
            @foreach( $catalogItem['content']['categoriesList'] as $category )
                <div>
                    <a href="{{ $category['link'] }}">
                        {{ $category['title'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
