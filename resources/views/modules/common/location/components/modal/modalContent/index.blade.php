<div class="modules-common-location-components-modal-modal-content j-location-modal-content">
    <h2 class="modules-common-location-components-modal-modal-content__title">Город или регион для поиска:</h2>
    <div class="modules-common-location-components-modal-modal-content__content-container">
        <div class="modules-common-header-catalog__catalog-search-container">
            @include('components.inputs.search.index', [
                'name' => 'catalog'
            ])
        </div>
        @component('components.catalog.container.index')
            @component('components.catalog.navigation-item-container.index')
                @foreach($locationList as $locationItem)
                    @component('components.catalog.navigation-item.index', [
                        'itemId' => $loop->index,
                        'itemValue' => $locationItem['title'],
                    ])
                        <button
                            class="modules-common-location-components-modal-modal-content__region-title j-location-modal-content__location-button"
                            data-search-country-id="1"
                            data-search-region-id="{{$locationItem['id']}}"
                        >
                            {{$locationItem['title']}}
                        </button>
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
        @foreach($locationList as $locationItem)
            <div class="modules-common-location-components-modal-modal-content__location-item">
                <button
                    class="modules-common-location-components-modal-modal-content__region-title j-location-modal-content__location-button"
                    data-search-country-id="1"
                    data-search-region-id="{{$locationItem['id']}}"
                >
                    {{$locationItem['title']}}
                </button>
                <div class="modules-common-location-components-modal-modal-content__cities-container">
                    @foreach($locationItem['cities'] as $cityItem)
                        <button
                            class="modules-common-location-components-modal-modal-content__city-title j-location-modal-content__location-button"
                            data-search-country-id="1"
                            data-search-region-id="{{$locationItem['id']}}"
                            data-search-city-id="{{$cityItem['id']}}"
                        >
                            {{$cityItem['title']}}
                        </button>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
