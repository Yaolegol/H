<div class="components-cards-organization">
    @if($organization['approved_error_message'])
        <div class="components-cards-organization__moderation-label components-cards-organization__moderation-label_reject">
            Отклонено
            <div class="components-cards-organization__moderation-hint">
                <div>Причина отклонения:</div>
                <div class="components-cards-organization__moderation-hint-container">
                    {{$organization['approved_error_message']}}
                </div>
                <div class="components-cards-organization__moderation-hint-container">
                    Как исправить?
                </div>
                <div class="components-cards-organization__moderation-hint-container">
                    Вы можете отредактировать сообщение и оно сново будет отправлено на проверку
                </div>
            </div>
        </div>
    @else
        <div class="components-cards-organization__moderation-label {{$organization['is_approved'] ? 'components-cards-organization__moderation-label_approved' : ''}}">
            {{$organization['is_approved'] ? 'Опубликовано' : 'На проверке'}}
            <div class="components-cards-organization__moderation-hint">
                <div>Ваше сообщение проверяется администрацией сайта!</div>
                <div class="components-cards-organization__moderation-hint-container">После проверки оно будет опубликовано или отклонено с указанием причины</div>
                <div class="components-cards-organization__moderation-hint-container">Обычно проверка занимает не более суток</div>
                <div class="components-cards-organization__moderation-hint-container">Спасибо за терпение!</div>
            </div>
        </div>
    @endif
    <div class="components-cards-organization__item-container components-cards-organization__item-container_without-offset">
        <div class="components-cards-organization__title">Название</div>
        <div class="components-cards-organization__value">{{$organization['title']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">ИНН</div>
        <div class="components-cards-organization__value">{{$organization['inn']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Юридический адрес</div>
        <div class="components-cards-organization__value">{{$organization['legal_address']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Фактический адрес</div>
        <div class="components-cards-organization__value">{{$organization['real_address']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Email</div>
        <div class="components-cards-organization__value">{{$organization['email']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Телефон</div>
        <div class="components-cards-organization__value">{{$organization['phone']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Сертификаты</div>
        <div class="components-cards-organization__image-list-container">
            @foreach($organization['certificateArray'] as $photoImg)
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Фото</div>
        <div class="components-cards-organization__image-list-container">
            @foreach($organization['photoArray'] as $photoImg)
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$photoImg}}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="components-cards-organization__item-container components-cards-organization__item-container_service">
        <div class="components-cards-organization__edit-button-container">
            <a class="components-cards-organization__link components-cards-organization__link_edit" href="./organization-info/edit/{{$organization['id']}}">Редактировать</a>
        </div>
        <div class="components-cards-organization__remove-button-container">
            <a class="components-cards-organization__link components-cards-organization__link_remove" href="./organization-info/destroy/{{$organization['id']}}">Удалить</a>
        </div>
    </div>
</div>


