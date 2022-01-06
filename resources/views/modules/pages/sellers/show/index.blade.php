<div class="modules-pages-sellers-show">
    <div class="modules-pages-sellers-show__content-area">
        <h2 class="modules-pages-sellers-show__title">Продавец</h2>
        <div class="modules-pages-sellers-show__header-block">
            <div class="modules-pages-sellers-show__avatar-container">
                <img  alt="" class="modules-pages-sellers-show__avatar" src="{{$sellerData['avatar']}}">
            </div>
            <div class="modules-pages-sellers-show__header-info-container">
                <div>Имя</div>
                <div>{{$sellerData['name']}}</div>
            </div>
            <div class="modules-pages-sellers-show__header-info-container">
                <div>Телефон</div>
                <div>{{$sellerData['phone']}}</div>
            </div>
            <div class="modules-pages-sellers-show__header-info-container">
                <div>Email</div>
                <div>{{$sellerData['visible_email']}}</div>
            </div>
        </div>
        <div class="modules-pages-sellers-show__offers-block">
            <div class="modules-pages-sellers-show__offers-title">Предложения продавца</div>
            <div class="modules-pages-sellers-show__offers-container">
                @include('modules.pages.offers.shared.components.list.index', [
                    'offersList' => $sellerData['offers'],
                ])
            </div>
        </div>
    </div>
</div>
