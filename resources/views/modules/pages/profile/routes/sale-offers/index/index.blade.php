@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
    @component('modules.pages.profile.common.components.body.index.index', [
            'createLink' => '/profile/sale-offers/create',
            'createTitle' => 'Добавить торговое предложение',
            'title' => 'Ваши торговые предложения'
        ])
        @foreach ($saleOffersList as $saleOfferItem)
            @component('modules.pages.profile.common.components.container.card.index')
                @include('components.cards.sale-offer.index', [
                                        'saleOffer' => $saleOfferItem,
                                    ])
            @endcomponent
        @endforeach
    @endcomponent
@endcomponent
