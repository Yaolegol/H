<div
    class="components-admin-cards-sale-point j-components-admin-cards-sale-point"
    data-id="{{$notApprovedListItem['id']}}"
>
    <h2>Торговые точки</h2>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">ID</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['id']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Название</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['title']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Описание</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['description']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Адрес</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['address']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Рабочие часы</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['working_hours']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Контактное лицо</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['contact_person']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Телефон</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['phone']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Lat</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['map_marker_lat']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Lng</div>
        <div class="components-admin-cards-sale-point__value">{{$notApprovedListItem['map_marker_lng']}}</div>
    </div>
    <div class="components-admin-cards-sale-point__item-container">
        <div class="components-admin-cards-sale-point__title">Фото</div>
        <div class="components-admin-cards-sale-point__image-list-container">
            @foreach($notApprovedListItem['photoArray'] as $photoImg)
                <div class="components-admin-cards-sale-point__image-item-container">
                    <img alt="" class="components-admin-cards-sale-point__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="components-admin-cards-sale-point__buttons-container">
        <div class="components-admin-cards-sale-point__button-container">
            <button
                class="components-admin-cards-sale-point__button j-components-admin-cards-sale-point__button-approve"
                type="button"
            >Одобрить</button>
        </div>
        <div class="components-admin-cards-sale-point__button-container">
            <button
                class="components-admin-cards-sale-point__button components-admin-cards-sale-point__button_red j-components-admin-cards-sale-point__button-reject"
                type="button"
            >Заблокировать</button>
        </div>
    </div>
</div>


