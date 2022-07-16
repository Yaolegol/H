<div class="modules-common-location-components-choose-filter-button j-modules-common-location-components-choose-filter-button">
    @if(isset($locationSearchData['city']))
        @include('components.buttons.filter.index', [
                'className' => 'j-components-buttons-modal-open',
                'dataset' => [
                    [
                        'key' => 'data-template-id',
                        'value' => 'location',
                    ],
                ],
                'defaultTitle' => 'Все регионы',
                'title' => $locationSearchData['city']['title'],
            ])
    @elseif(isset($locationSearchData['region']))
        @include('components.buttons.filter.index', [
               'className' => 'j-components-buttons-modal-open',
               'dataset' => [
                    [
                        'key' => 'data-template-id',
                        'value' => 'location',
                    ],
                ],
               'defaultTitle' => 'Все регионы',
               'title' => $locationSearchData['region']['title'],
           ])
    @else
        @include('components.buttons.filter.index', [
                'className' => 'j-components-buttons-modal-open',
                'dataset' => [
                    [
                        'key' => 'data-template-id',
                        'value' => 'location',
                    ],
                ],
                'defaultTitle' => 'Все регионы',
                'title' => 'Все регионы',
            ])
    @endif
</div>
