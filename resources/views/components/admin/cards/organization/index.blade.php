<div
    class="components-admin-cards-organization j-components-admin-cards-organization"
    data-id="{{$notApprovedListItem['id']}}"
>
    <h2>ОРГАНИЗАЦИЯ</h2>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Наименование</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['title']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Описание</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['description']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">ИНН</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['inn']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Юридический адресс</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['legal_address']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Фактический адрес</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['real_address']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Email</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['email']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Телефон</div>
        <div class="components-admin-cards-organization__value">{{$notApprovedListItem['phone']}}</div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Сертификаты</div>
        <div class="components-admin-cards-organization__image-list-container">
            @foreach($notApprovedListItem['certificateArray'] as $photoImg)
                <div class="components-admin-cards-organization__image-item-container">
                    <img alt="" class="components-admin-cards-organization__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="components-admin-cards-organization__item-container">
        <div class="components-admin-cards-organization__title">Фото</div>
        <div class="components-admin-cards-organization__image-list-container">
            @foreach($notApprovedListItem['photoArray'] as $photoImg)
                <div class="components-admin-cards-organization__image-item-container">
                    <img alt="" class="components-admin-cards-organization__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>

    <div class="components-admin-cards-organization__buttons-container">
        <div class="components-admin-cards-organization__button-container">
            <button
                class="components-admin-cards-organization__button j-components-admin-cards-organization__button-approve"
                type="button"
            >Одобрить</button>
        </div>
        <div class="components-admin-cards-organization__button-container">
            <button
                class="components-admin-cards-organization__button components-admin-cards-organization__button_red j-components-admin-cards-organization__button-reject"
                type="button"
            >Заблокировать</button>
        </div>
    </div>
</div>


