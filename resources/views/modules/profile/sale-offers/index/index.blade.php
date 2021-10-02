<div class="profile--sale-offers--index">
    <a
        class="profile--sale-offers--index__create-link"
        href="/profile/sale-offers/create"
    >
        Добавить торговое предложение
    </a>
    <div class="profile--sale-points-info--index__content-container">
        <h2>Ваши торговые предложения</h2>
        @foreach ($saleOffersList as $saleOfferItem)
            <div class="profile--sale-points-info--index__sale-point-container">
                @include('components.cards.sale-offer.index', [
                            'saleOffer' => $saleOfferItem,
                        ])
            </div>
        @endforeach
    </div>
</div>


