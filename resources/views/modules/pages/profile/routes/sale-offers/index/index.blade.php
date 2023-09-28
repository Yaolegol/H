<div class="modules-pages-profile-routes-sale-offers-info-index">
    @component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
        <div>
            @if(count($saleOffersList) > 0)
                <div class="modules-pages-profile-routes-sale-offers-info-index__seller-link-container">
                    <div class="modules-pages-profile-routes-sale-offers-info-index__moderation-label modules-pages-profile-routes-sale-offers-info-index__moderation-label_light-green">
                        <div class="modules-pages-profile-routes-sale-offers-info-index__seller-link-title">Поздравляем!</div>
                        <div class="modules-pages-profile-routes-sale-offers-info-index__seller-link-footer">Ваша персональная страница фермера:</div>
                        <div>
                            <a
                                class="modules-pages-profile-routes-sale-offers-info-index__seller-link"
                                href="/sellers/{{$userData['id']}}"
                            >
                                {{request()->getHost()}}/sellers/{{$userData['id']}}
                            </a>
                        </div>
                        <div class="modules-pages-profile-routes-sale-offers-info-index__seller-link-footer">
                            Отправьте эту ссылку покупателям, чтобы Вас можно было легко найти на сайте!
                        </div>
                    </div>
                </div>
            @endif
            <div class="modules-pages-profile-routes-sale-offers-info-index__form-container">
                @component('modules.pages.profile.common.components.body.index.index', [
                'createLink' => '/profile/sale-offers/create',
                'createTitle' => 'Добавить товары',
                'title' => 'Товары'
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
                        <div class="modules-pages-profile-routes-sale-offers-info-index__empty-block">
                            <div>Добавьте товары - <span style="font-weight: bold">это просто и бесплатно!</span></div>
                        </div>
                    @endif
                @endcomponent
            </div>
        </div>
    @endcomponent
</div>
