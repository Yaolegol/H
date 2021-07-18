<div class="header-location-modal-content">
    <h2 class="header-location-modal-content__title">Выберите город:</h2>
    <div class="header-location-modal-content__content-container">
        @foreach($locationList as $locationItem)
            <div>
                {{$locationItem['title']}}
            </div>
            <div>
                @foreach($locationItem['cities'] as $cityItem)
                    {{$cityItem['title']}}
                @endforeach
            </div>
        @endforeach
    </div>
</div>
