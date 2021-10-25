@component('modules.profile.common.body.index.index', [
        'createLink' => '/profile/sale-offers/create',
        'createTitle' => 'Добавить торговое предложение',
        'title' => 'Ваши торговые предложения'
    ])
    @component('modules.profile.common.container.card.index')
        @foreach ($saleOffersList as $saleOfferItem)
            @include('components.cards.sale-offer.index', [
                            'saleOffer' => $saleOfferItem,
                        ])
        @endforeach
    @endcomponent
@endcomponent


