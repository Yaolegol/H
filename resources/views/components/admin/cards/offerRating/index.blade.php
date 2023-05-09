<div
    class="components-admin-cards-offer-rating j-components-admin-cards-offer-rating"
    data-offer-id="{{$notApprovedItem['id']}}"
>
    <h2>Рейтинг и отзыв</h2>
    <div class="components-admin-cards-offer-rating__item-container components-admin-cards-offer-rating__item-container_without-offset">
        <div class="components-admin-cards-offer-rating__title">ID</div>
        <div class="components-admin-cards-offer-rating__value">{{$notApprovedItem['id']}}</div>
    </div>
    <div class="components-admin-cards-offer-rating__item-container components-admin-cards-offer-rating__item-container_without-offset">
        <div class="components-admin-cards-offer-rating__title">Рейтинг</div>
        <div class="components-admin-cards-offer-rating__value">{{$notApprovedItem['value']}}</div>
    </div>
    <div class="components-admin-cards-offer-rating__item-container components-admin-cards-offer-rating__item-container_without-offset">
        <div class="components-admin-cards-offer-rating__title">Комментарий</div>
        <div class="components-admin-cards-offer-rating__value">{{$notApprovedItem['comment']}}</div>
    </div>
    <div class="components-admin-cards-offer-rating__buttons-container">
        <div class="components-admin-cards-offer-rating__button-container">
            <button
                class="components-admin-cards-offer-rating__button j-components-admin-cards-offer-rating__button-approve"
                type="button"
            >Одобрить</button>
        </div>
        <div class="components-admin-cards-offer-rating__button-container">
            <button
                class="components-admin-cards-offer-rating__button components-admin-cards-offer-rating__button_red j-components-admin-cards-offer-rating__button-reject"
                type="button"
            >Заблокировать</button>
        </div>
    </div>
    <div class="components-admin-cards-offer-rating__textarea-container">
        <textarea class="j-components-admin-cards-offer-rating__textarea"></textarea>
    </div>
</div>


