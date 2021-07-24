<div class="header-location-modal-content">
    <h2 class="header-location-modal-content__title">Выберите город или регион:</h2>
    <div class="header-location-modal-content__content-container">
        @foreach($locationList as $locationItem)
            <div class="header-location-modal-content__location-item">
                <a class="header-location-modal-content__region-title" href="{{$locationItem['link']}}">
                    {{$locationItem['title']}}
                </a>
                <div class="header-location-modal-content__cities-container">
                    @foreach($locationItem['cities'] as $cityItem)
                        <a class="header-location-modal-content__city-title" href="{{$cityItem['link']}}">
                            {{$cityItem['title']}}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
