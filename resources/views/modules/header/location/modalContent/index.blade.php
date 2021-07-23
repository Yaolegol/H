<div class="header-location-modal-content">
    <h2 class="header-location-modal-content__title">Выберите город или регион:</h2>
    <div class="header-location-modal-content__content-container">
        @foreach($locationList as $locationItem)
            <div class="header-location-modal-content__location-item">
                <div class="header-location-modal-content__region-title">
                    {{$locationItem['title']}}
                </div>
                <div class="header-location-modal-content__cities-container">
                    @foreach($locationItem['cities'] as $cityItem)
                        <div class="header-location-modal-content__city-title">
                            {{$cityItem['title']}}
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
