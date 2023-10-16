<div class="components-cards-sale-point">
    @if($salePoint['approved_error_message'])
        <div class="components-cards-sale-point__moderation-label components-cards-sale-point__moderation-label_reject">
            Отклонено
            <div class="components-cards-sale-point__moderation-hint">
                <div>Причина отклонения:</div>
                <div class="components-cards-sale-point__moderation-hint-container">
                    {{$salePoint['approved_error_message']}}
                </div>
                <div class="components-cards-sale-point__moderation-hint-container">
                    Как исправить?
                </div>
                <div class="components-cards-sale-point__moderation-hint-container">
                    Вы можете отредактировать сообщение и оно сново будет отправлено на проверку
                </div>
            </div>
        </div>
    @else
        <div class="components-cards-sale-point__moderation-label {{$salePoint['is_approved'] ? 'components-cards-sale-point__moderation-label_approved' : ''}}">
            {{$salePoint['is_approved'] ? 'Одобрено' : 'На проверке'}}
            <div class="components-cards-sale-point__moderation-hint">
                <div>Ваше сообщение проверяется администрацией сайта!</div>
                <div class="components-cards-sale-point__moderation-hint-container">После проверки оно будет одобрено или отклонено с указанием причины</div>
                <div class="components-cards-sale-point__moderation-hint-container">Обычно проверка занимает не более суток</div>
                <div class="components-cards-sale-point__moderation-hint-container">Спасибо за терпение!</div>
            </div>
        </div>
    @endif
    <div class="components-cards-sale-point__item-container components-cards-sale-point__item-container_without-offset">
        <div class="components-cards-sale-point__title">Название</div>
        <div class="components-cards-sale-point__value">{{$salePoint['title']}}</div>
    </div>
    <div class="components-cards-sale-point__item-container">
        <div class="components-cards-sale-point__title">Описание</div>
        <div class="components-cards-sale-point__value">{{$salePoint['description']}}</div>
    </div>
    <div class="components-cards-sale-point__item-container">
        <div class="components-cards-sale-point__title">Контактное лицо</div>
        <div class="components-cards-sale-point__value">{{$salePoint['contact_person']}}</div>
    </div>
    <div class="components-cards-sale-point__item-container">
        <div class="components-cards-sale-point__title">Телефон</div>
        <div class="components-cards-sale-point__value">{{$salePoint['phone']}}</div>
    </div>
    <div class="components-cards-sale-point__item-container">
        <div class="components-cards-sale-point__title">Режим работы</div>
        <div class="components-cards-sale-point__value">{{$salePoint['working_hours']}}</div>
    </div>
    <div class="components-cards-sale-point__item-container">
        <div class="components-cards-sale-point__title">Адрес</div>
        <div class="components-cards-sale-point__value">{{$salePoint['address']}}</div>
    </div>
    <div class="components-cards-sale-point__item-container">
        <div class="components-cards-sale-point__title">Фото</div>
        <div class="components-cards-sale-point__image-list-container">
            @foreach($salePoint['photoArray'] as $photoImg)
                <div class="components-cards-sale-point__image-item-container">
                    <img alt="" class="components-cards-sale-point__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="components-cards-sale-point__item-container components-cards-sale-point__item-container_service">
        <div class="components-cards-sale-point__edit-button-container">
            <a class="components-cards-sale-point__link components-cards-sale-point__link_edit" href="./sale-points-info/edit/{{$salePoint['id']}}">Редактировать</a>
        </div>
        <div class="components-cards-sale-point__remove-button-container">
            <button
                class="components-cards-sale-point__link components-cards-sale-point__link_remove j-components-buttons-modal-open"
                data-href="/profile/sale-points-info/destroy/{{$salePoint['id']}}"
                data-template-id="confirm-remove"
            >Удалить</button>
        </div>
    </div>
</div>
