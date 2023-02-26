@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
    @component('modules.pages.profile.common.components.body.index.index', [
            'createLink' => '/profile/sale-offers/create',
            'createTitle' => 'Добавить торговое предложение',
            'title' => 'Ваши торговые предложения'
        ])
        @if(count($saleOffersList) > 0)
            @foreach ($saleOffersList as $saleOfferItem)
                @component('modules.pages.profile.common.components.container.card.index')
                    @include('components.cards.sale-offer.index', [
                                            'saleOffer' => $saleOfferItem,
                                        ])
                @endcomponent
            @endforeach
        @else
            <div>Чтобы создать торговое предложение, нажмите "Добавить торговое предложение"</div>
            <div>Это просто и бесплатно!</div>
        @endif
    @endcomponent
@endcomponent
