@php
    $cityData = $locationSearchData['city'];
    $regionData = $locationSearchData['region'];

    $title = 'Все регионы';

    if($cityData) {
        $title = $cityData['title'];
    } elseif($regionData) {
        $title = $regionData['title'];
    }
@endphp
<div class="modules-common-location-components-choose-filter-button j-modules-common-location-components-choose-filter-button">
    @include('components.buttons.filter.index', [
                'className' => 'j-components-buttons-modal-open',
                'dataset' => [
                    [
                        'key' => 'data-template-id',
                        'value' => 'location',
                    ],
                ],
                'defaultTitle' => 'Все регионы',
                'title' => $title,
            ])
</div>
