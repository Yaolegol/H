<div class="modules-common-header-catalog j-header-catalog">
    <div class="modules-common-header-catalog__backdrop j-header-catalog__backdrop"></div>
    <div class="modules-common-header-catalog__catalog-container">
        <div class="modules-common-header-catalog__catalog-search-container">
            @include('components.inputs.search.index', [
                'name' => 'catalog'
            ])
        </div>
        @component('components.catalog.container.index')
            @component('components.catalog.navigation-item-container.index')
                @foreach($catalogHeader as $catalogItem)
                    @component('components.catalog.navigation-item.index', [
                        'itemId' => $loop->index,
                        'itemValue' => $catalogItem['title'],
                    ])
                        @component('modules.common.header.catalog.catalogLink.index', [
                            'link' => $catalogItem['linkFull'],
                        ])
                            {{ $catalogItem['title'] }}
                        @endcomponent
                    @endcomponent
                @endforeach
            @endcomponent
            @component('components.catalog.content-item-container.index')
                @foreach($catalogHeader as $catalogItem)
                    @component('components.catalog.content-item.index', [
                        'itemId' => $loop->index,
                    ])
                        <div class="j-header-catalog__search-element">
                            <a
                                class="modules-common-header-catalog__link"
                                href="{{ $catalogItem['linkFull'] }}"
                            >{{ $catalogItem['title'] }}</a>
                        </div>
                        <div class="modules-common-header-catalog__categories-container">
                            @foreach( $catalogItem['catalog_level_two'] as $category )
                                @component('components.catalog.category-item.index', [
                                    'className' => 'j-components-catalog-content-item__category',
                                    'value' => $category['title'],
                                ])
                                    <a
                                        class="modules-common-header-catalog__link j-header-catalog__search-element"
                                        href="{{ $category['linkFull'] }}"
                                    >
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
