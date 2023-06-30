<div class="modules-pages-sellers-show">
    <div class="modules-pages-sellers-show__content-area">
        @if($sellerData['is_approved'] === 1)
            <h2 class="modules-pages-sellers-show__title">Фермер</h2>
            <div class="modules-pages-sellers-show__header-block">
                <div class="modules-pages-sellers-show__avatar-container">
                    <img  alt="" class="modules-pages-sellers-show__avatar" src="{{$sellerData['avatar'] ? $sellerData['avatar'] : '/build/icons/person.svg'}}">
                </div>
                <div class="modules-pages-sellers-show__header-info-container">
                    <div class="modules-pages-sellers-show__header-info-title">{{$sellerData['name']}}</div>
                    <div>{{$sellerData['description']}}</div>
                </div>
                <div class="modules-pages-sellers-show__header-info-container">
                    <div class="modules-pages-sellers-show__header-info-title">Телефон</div>
                    <a href="tel:+{{$sellerData['phone']}}">+{{$sellerData['phone']}}</a>
                </div>
            </div>
        @endif

        <div class="modules-pages-sellers-show__offers-block">
            <h3 class="modules-pages-sellers-show__offers-title">Предложения продавца</h3>
            <div class="modules-pages-sellers-show__offers-container">
                @include('modules.pages.offers.shared.components.list.index', [
                    'offersList' => $sellerData['offers'],
                ])
            </div>
        </div>
    </div>
</div>
