<div
    class="components-admin-cards-user j-components-admin-cards-user"
    data-id="{{$notApprovedListItem['id']}}"
>
    <h2>ПОЛЬЗОВАТЕЛЬ</h2>
    <div class="components-admin-cards-user__item-container components-admin-cards-user__item-container_without-offset">
        <div class="components-admin-cards-user__title">ID</div>
        <div class="components-admin-cards-user__value">{{$notApprovedListItem['id']}}</div>
    </div>

    @if($notApprovedListItem['avatar_photo'] !== '')
        <div class="components-admin-cards-user__item-container">
            <div class="components-admin-cards-user__title">Аватар</div>
            <div class="components-admin-cards-user__value">
                <img
                    alt=""
                    class="components-admin-cards-user__image"
                    src="{{$notApprovedListItem['avatar_photo']}}"
                >
            </div>
        </div>
    @endif

    <div class="components-admin-cards-user__item-container">
        <div class="components-admin-cards-user__title">Имя</div>
        <div class="components-admin-cards-user__value">{{$notApprovedListItem['name']}}</div>
    </div>
    <div class="components-admin-cards-user__item-container">
        <div class="components-admin-cards-user__title">Описание</div>
        <div class="components-admin-cards-user__value">{{$notApprovedListItem['description']}}</div>
    </div>
    <div class="components-admin-cards-user__item-container">
        <div class="components-admin-cards-user__title">Телефон</div>
        <div class="components-admin-cards-user__value">{{$notApprovedListItem['phone']}}</div>
    </div>
    <div class="components-admin-cards-user__item-container">
        <div class="components-admin-cards-user__title">Видимый email</div>
        <div class="components-admin-cards-user__value">{{$notApprovedListItem['visible_email']}}</div>
    </div>

    <div class="components-admin-cards-user__buttons-container">
        <div class="components-admin-cards-user__button-container">
            <button
                class="components-admin-cards-user__button j-components-admin-cards-user__button-approve"
                type="button"
            >Одобрить</button>
        </div>
        <div class="components-admin-cards-user__button-container">
            <button
                class="components-admin-cards-user__button components-admin-cards-user__button_red j-components-admin-cards-user__button-reject"
                type="button"
            >Заблокировать</button>
        </div>
    </div>
</div>


