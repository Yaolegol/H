<div class="modules-common-location-components-modal-modal-content j-location-modal-content">
    <h2 class="modules-common-location-components-modal-modal-content__title">Выберите город или регион:</h2>
    <div class="modules-common-location-components-modal-modal-content__content-container">
        @foreach($locationList as $locationItem)
            <div class="modules-common-location-components-modal-modal-content__location-item">
                <button
                    class="modules-common-location-components-modal-modal-content__region-title j-location-modal-content__location-button"
                    data-link="{{$locationItem['link']}}"
                >
                    {{$locationItem['title']}}
                </button>
                <div class="modules-common-location-components-modal-modal-content__cities-container">
                    @foreach($locationItem['cities'] as $cityItem)
                        <button
                            class="modules-common-location-components-modal-modal-content__city-title j-location-modal-content__location-button"
                            data-link="{{$cityItem['linkFull']}}"
                        >
                            {{$cityItem['title']}}
                        </button>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
