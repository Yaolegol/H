<div
    class="components-admin-cards-offer j-components-admin-cards-offer"
    data-offer-id="{{$offersNotApprovedItem['id']}}"
>
    <div class="components-admin-cards-offer__item-container components-admin-cards-offer__item-container_without-offset">
        <div class="components-admin-cards-offer__title">Название</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['title']}}</div>
    </div>
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Описание</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['description']}}</div>
    </div>
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Адрес</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['address']}}</div>
    </div>
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Телефон</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['phone']}}</div>
    </div>
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Цена</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['price']}}</div>
    </div>
    @if($offersNotApprovedItem['organization'])
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Организация</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['title']}}</div>
        </div>
    @endif
    @if($offersNotApprovedItem['sale_points'])
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Торговые точки</div>
            <div class="components-admin-cards-offer__value">
                @foreach($offersNotApprovedItem['sale_points'] as $salePointItem)
                    <div>{{$salePointItem['title']}}</div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Фото</div>
        <div class="components-admin-cards-offer__image-list-container">
            @foreach($offersNotApprovedItem['photoArray'] as $photoImg)
                <div class="components-admin-cards-offer__image-item-container">
                    <img alt="" class="components-admin-cards-offer__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>

    <div class="components-admin-cards-offer__buttons-container">
        <div class="components-admin-cards-offer__button-container">
            <button
                class="components-admin-cards-offer__button j-components-admin-cards-offer__button-approve"
                type="button"
            >Одобрить</button>
        </div>
        <div class="components-admin-cards-offer__button-container">
            <button
                class="components-admin-cards-offer__button components-admin-cards-offer__button_red j-components-admin-cards-offer__button-reject"
                type="button"
            >Заблокировать</button>
        </div>
    </div>
</div>


