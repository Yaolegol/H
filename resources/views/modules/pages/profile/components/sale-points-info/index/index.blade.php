@component('modules.pages.profile.common.body.index.index', [
        'createLink' => '/profile/sale-points-info/create',
        'createTitle' => 'Добавить торговую точку',
        'title' => 'Ваши торговые точки'
    ])
    @foreach ($salePointsList as $salePointItem)
        @component('modules.pages.profile.common.container.card.index')
            @include('components.cards.sale-point.index', [
                            'salePoint' => $salePointItem,
                        ])
        @endcomponent
    @endforeach
@endcomponent


