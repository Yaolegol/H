<div class="components-cards-sale-offer">
    @if($saleOffer['approved_error_message'])
        <div class="components-cards-sale-offer__moderation-label components-cards-sale-offer__moderation-label_reject">
            Отклонено
            <div class="components-cards-sale-offer__moderation-hint">
                <div>Причина отклонения:</div>
                <div class="components-cards-sale-offer__moderation-hint-container">
                    {{$saleOffer['approved_error_message']}}
                </div>
                <div class="components-cards-sale-offer__moderation-hint-container">
                    Как исправить?
                </div>
                <div class="components-cards-sale-offer__moderation-hint-container">
                    Вы можете отредактировать сообщение и оно сново будет отправлено на проверку
                </div>
            </div>
        </div>
    @else
        @if($saleOffer['is_enabled'])
            <div class="components-cards-sale-offer__moderation-label {{$saleOffer['is_approved'] ? 'components-cards-sale-offer__moderation-label_approved' : ''}}">
                {{$saleOffer['is_approved'] ? 'Опубликовано' : 'На проверке'}}
                <div class="components-cards-sale-offer__moderation-hint">
                    <div>Ваше сообщение проверяется администрацией сайта!</div>
                    <div class="components-cards-sale-offer__moderation-hint-container">После проверки оно будет опубликовано или отклонено с указанием причины</div>
                    <div class="components-cards-sale-offer__moderation-hint-container">Обычно проверка занимает не более суток</div>
                    <div class="components-cards-sale-offer__moderation-hint-container">Спасибо за терпение!</div>
                </div>
            </div>
        @else
            <div class="components-cards-sale-offer__moderation-label">
                Вы приостановили публикацию
                <div class="components-cards-sale-offer__moderation-hint">
                    <div>Вы приостановили публикацию</div>
                    <div class="components-cards-sale-offer__moderation-hint-container">Чтобы возобновить публикацию, нажмите "Возобновить публикацию" ниже</div>
                </div>
            </div>
        @endif
    @endif

    <div class="components-cards-sale-offer__info-area">
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Заголовок объявления</div>
            <div class="components-cards-sale-offer__value">{{$saleOffer['title']}}</div>
        </div>
        @if($saleOffer['description'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Описание</div>
                <div class="components-cards-sale-offer__value">{{$saleOffer['description']}}</div>
            </div>
        @endif
        @if($saleOffer['contact_person'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Контактное лицо</div>
                <div class="components-cards-sale-offer__value">{{$saleOffer['contact_person']}}</div>
            </div>
        @endif
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Телефон</div>
            <div class="components-cards-sale-offer__value">{{$saleOffer['phone']}}</div>
        </div>
        @if($saleOffer['working_hours'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Режим работы</div>
                <div class="components-cards-sale-offer__value">{{$saleOffer['working_hours']}}</div>
            </div>
        @endif
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Цена</div>
            <div class="components-cards-sale-offer__value">{{$saleOffer['price']}}</div>
        </div>
        @if($saleOffer['price_description'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Примечание к цене</div>
                <div class="components-cards-sale-offer__value">{{$saleOffer['price_description']}}</div>
            </div>
        @endif
        @if($saleOffer['delivery'] === 1 || $saleOffer['delivery'] === true)
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Доставка: есть</div>
            </div>
        @endif
        @if($saleOffer['delivery_description'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Примечание к доставке</div>
                <div class="components-cards-sale-offer__value">{{$saleOffer['delivery_description']}}</div>
            </div>
        @endif
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Адрес</div>
            <div class="components-cards-sale-offer__value">{{$saleOffer['address']}}</div>
        </div>
        @if($saleOffer['organization'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Организация</div>
                <div class="components-cards-sale-offer__value">{{$saleOffer['organization']['title']}}</div>
            </div>
        @endif
        @if($saleOffer['sale_points'])
            <div class="components-cards-sale-offer__item-container">
                <div class="components-cards-sale-offer__title">Торговые точки</div>
                <div class="components-cards-sale-offer__value">
                    @foreach($saleOffer['sale_points'] as $salePointItem)
                        <div>{{$salePointItem['title']}}</div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Фото</div>
            <div class="components-cards-sale-offer__image-list-container">
                @foreach($saleOffer['photoArray'] as $photoImg)
                    <div class="components-cards-sale-offer__image-item-container">
                        <img alt="" class="components-cards-sale-offer__image" src="{{$photoImg}}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

   <div>
       @if($saleOffer['is_enabled'])
           @if($saleOffer['is_approved'])
               <div class="components-cards-sale-offer__approved-block">
                   <div class="components-cards-sale-offer__approved-block-title">Поздравляем!</div>
                   <div class="components-cards-sale-offer__approved-block-container">Для Вашего товара создана отдельная страница:</div>
                   <div>
                       <a
                           class="components-cards-sale-offer__approved-block-link"
                           href="/offers/{{$saleOffer['id']}}"
                       >
                           {{request()->getHost()}}/offers/{{$saleOffer['id']}}
                       </a>
                   </div>
                   <div class="components-cards-sale-offer__approved-block-container">
                       Отправьте эту ссылку покупателям, чтобы его можно было легко найти на сайте!
                   </div>
               </div>
           @endif
       @endif
   </div>

    <div class="components-cards-sale-offer__service-area">
        <div class="components-cards-sale-offer__service-buttons-container-additional">
            <div>
                @if($saleOffer['is_enabled'])
                    <a
                        class="components-cards-sale-offer__link"
                        href="./sale-offers/{{$saleOffer['id']}}/disable"
                    >
                        Приостановить публикацию
                    </a>
                @else
                    <a
                        class="components-cards-sale-offer__link"
                        href="./sale-offers/{{$saleOffer['id']}}/enable"
                    >
                        Возобновить публикацию
                    </a>
                @endif
            </div>
        </div>
        <div class="components-cards-sale-offer__service-buttons-container-main">
            <div class="components-cards-sale-offer__edit-button-container">
                <a
                    class="components-cards-sale-offer__link components-cards-sale-offer__link_edit"
                    href="./sale-offers/edit/{{$saleOffer['id']}}"
                >Редактировать</a>
            </div>
            <div class="components-cards-sale-offer__remove-button-container">
                <button
                    class="components-cards-sale-offer__link components-cards-sale-offer__link_remove j-components-buttons-modal-open"
                    data-href="/profile/sale-offers/destroy/{{$saleOffer['id']}}"
                    data-template-id="confirm-remove"
                >Удалить</button>
            </div>
        </div>
    </div>
</div>
