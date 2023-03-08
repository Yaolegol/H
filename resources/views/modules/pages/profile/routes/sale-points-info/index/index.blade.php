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
                <div>Чтобы создать торговую точку, нажмите "Добавить торговую точку"</div>
                <div>Это просто и бесплатно!</div>
            </div>
        @endif
    @endcomponent
@endcomponent
