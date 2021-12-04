<div class="header-location-modal-content j-location-modal-content">
    <h2 class="header-location-modal-content__title">Выберите город или регион:</h2>
    <div class="header-location-modal-content__content-container">
        @foreach($locationList as $locationItem)
            <div class="header-location-modal-content__location-item">
                <button
                    class="header-location-modal-content__region-title j-location-modal-content__location-button"
                    data-search-country-id="1"
                    data-search-region-id="{{$locationItem['id']}}"
                >
                    {{$locationItem['title']}}
                </button>
                <div class="header-location-modal-content__cities-container">
                    @foreach($locationItem['cities'] as $cityItem)
                        <button
                            class="header-location-modal-content__city-title j-location-modal-content__location-button"
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
