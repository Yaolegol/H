<div class="sellers-show">
    <div class="sellers-show__content-area">
        <h2 class="sellers-show__title">Продавец</h2>
        <div class="sellers-show__header-block">
            <div class="sellers-show__avatar-container">
                <img  alt="" class="sellers-show__avatar" src="{{$sellerData['avatar']}}">
            </div>
            <div class="sellers-show__header-info-container">
                <div>Имя</div>
                <div>{{$sellerData['name']}}</div>
            </div>
            <div class="sellers-show__header-info-container">
                <div>Телефон</div>
                <div>{{$sellerData['phone']}}</div>
            </div>
            <div class="sellers-show__header-info-container">
                <div>Email</div>
                <div>{{$sellerData['visible_email']}}</div>
            </div>
        </div>
        <div class="sellers-show__offers-block">
            <div class="sellers-show__offers-title">Предложения продавца</div>
            <div class="sellers-show__offers-container">
                @include('modules.offers.list.index', [
                    'offersList' => $sellerData['offers'],
                ])
            </div>
        </div>
    </div>
</div>
