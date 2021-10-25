@component('modules.profile.common.body.index.index', [
        'createLink' => '/profile/sale-points-info/create',
        'createTitle' => 'Добавить торговую точку',
        'title' => 'Ваши торговые точки'
    ])
    @component('modules.profile.common.container.card.index')
        @foreach ($salePointsList as $salePointItem)
            @include('components.cards.sale-point.index', [
                            'salePoint' => $salePointItem,
                        ])
        @endforeach
    @endcomponent
@endcomponent


