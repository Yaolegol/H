<div class="header-catalog j-header-catalog">
    <div class="header-catalog__backdrop j-header-catalog__backdrop"></div>
    <div class="header-catalog__catalog-container">
        @component('components.catalog.index')
            @component('components.catalog.navigation-item-container.index')
                @foreach($catalogHeader as $catalogItem)
                    @component('components.catalog.navigation-item.index', [ 'itemId' => $loop->index ])
                        @component('modules.common.header.catalog.catalogLink.index', [
                            'link' => $catalogItem['linkFull']
                        ])
                            {{ $catalogItem['title'] }}
                        @endcomponent
                    @endcomponent
                @endforeach
            @endcomponent
            @component('components.catalog.content-item-container.index')
                @foreach($catalogHeader as $catalogItem)
                    @component('components.catalog.content-item.index', [ 'itemId' => $loop->index ])
                        <div class="j-header-catalog__search-element">{{ $catalogItem['title'] }}</div>
                        <div class="components-catalog__categories-container">
                            @foreach( $catalogItem['catalog_level_two'] as $category )
                                @component('components.catalog.category-item.index')
                                    <a class="header-catalog__link j-header-catalog__search-element" href="{{ $category['linkFull'] }}">
                                        {{ $category['title'] }}
                                    </a>
                                @endcomponent
                            @endforeach
                        </div>
                    @endcomponent
                @endforeach
            @endcomponent
        @endcomponent
    </div>
</div>
