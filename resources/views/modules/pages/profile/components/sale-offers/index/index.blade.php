@component('modules.pages.profile.common.body.index.index', [
        'createLink' => '/profile/sale-offers/create',
        'createTitle' => 'Добавить торговое предложение',
        'title' => 'Ваши торговые предложения'
    ])
    @foreach ($saleOffersList as $saleOfferItem)
        @component('modules.pages.profile.common.container.card.index')
            @include('components.cards.sale-offer.index', [
                                    'saleOffer' => $saleOfferItem,
                                ])
        @endcomponent
    @endforeach
@endcomponent


