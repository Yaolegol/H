<div class="modules-pages-profile-routes-sale-points-info-index">
    @component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-points-info'])
        @component('modules.pages.profile.common.components.body.index.index', [
                'createLink' => '/profile/sale-points-info/create',
                'createTitle' => 'Добавить торговую точку',
                'title' => 'Ваши торговые точки'
            ])
            @if(count($salePointsList) > 0)
                @foreach ($salePointsList as $salePointItem)
                    @component('modules.pages.profile.common.components.container.card.index')
                        @include('components.cards.sale-point.index', [
                                        'salePoint' => $salePointItem,
                                    ])
                    @endcomponent
                @endforeach
            @else
                <div class="modules-pages-profile-routes-sale-points-info-index__empty-block">
                    <div>У Вас пока не добавлено торговых точек</div>
                    <div class="modules-pages-profile-routes-sale-points-info-index__empty-container">Чтобы добавить торговую точку, нажмите
                        <a
                            class="modules-pages-profile-routes-sale-points-info-index__empty-link"
                            href="/profile/sale-points-info/create"
                        >
                            "Добавить торговую точку"
                        </a>
                    </div>
                    <div class="modules-pages-profile-routes-sale-points-info-index__empty-container modules-pages-profile-routes-sale-points-info-index__empty-container_bold">
                        Это просто и бесплатно!
                    </div>
                </div>
            @endif
        @endcomponent
    @endcomponent
</div>
