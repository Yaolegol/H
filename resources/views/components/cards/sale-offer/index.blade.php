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
        <div class="components-cards-sale-offer__moderation-label {{$saleOffer['is_approved'] ? 'components-cards-sale-offer__moderation-label_approved' : ''}}">
            {{$saleOffer['is_approved'] ? 'Опубликовано' : 'На проверке'}}
            <div class="components-cards-sale-offer__moderation-hint">
                <div>Ваше сообщение проверяется администрацией сайта!</div>
                <div class="components-cards-sale-offer__moderation-hint-container">После проверки оно будет опубликовано или отклонено с указанием причины</div>
                <div class="components-cards-sale-offer__moderation-hint-container">Обычно проверка занимает не более суток</div>
                <div class="components-cards-sale-offer__moderation-hint-container">Спасибо за терпение!</div>
            </div>
        </div>
    @endif

    <div class="components-cards-sale-offer__content-area">
        <div class="components-cards-sale-offer__image-block">
            <div class="components-cards-sale-offer__image-container">
                <img alt="{{$saleOffer['title']}}" class="components-cards-sale-offer__image" src="{{$saleOffer['photoArray'][0] ?? ''}}">
                <a class="components-cards-sale-offer__image-link" href="{{$saleOffer['offerLink']}}"></a>
            </div>
        </div>
        <div class="components-cards-sale-offer__content-block">
            <div class="components-cards-sale-offer__info-section">
                <div>
                    <a
                        class="components-cards-sale-offer__product-link"
                        href="{{$saleOffer['offerLink']}}"
                    >{{$saleOffer['title']}}</a>
                </div>
                <div class="components-cards-sale-offer__description-container">
                    {{$saleOffer['description']}}
                </div>
                <div class="components-cards-sale-offer__price-container">
                    <span>Цена: </span>
                    <span class="components-cards-sale-offer__price">{{$saleOffer['price']}}</span>
                    <span>₽</span>
                    @if($saleOffer['measure_id'] !== 4)
                        <span class="components-cards-sale-offer__measure">(за {{$saleOffer['measure']}})</span>
                    @endif
                </div>
                <div class="components-cards-sale-offer__contacts-block">
                    <div class="components-cards-sale-offer__phone-container">
                        Телефон: {{$saleOffer['phone']}}
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div>
       @if($saleOffer['is_approved'])
           <div class="components-cards-sale-offer__approved-block">
               Поздравляем!
               <div>Для Вашего товара создана отдельная страница:</div>
               <div class="components-cards-sale-offer__approved-block-container">
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
   </div>

    <div class="components-cards-sale-offer__service-container">
        <div class="components-cards-sale-offer__edit-button-container">
            <a class="components-cards-sale-offer__link components-cards-sale-offer__link_edit" href="./sale-offers/edit/{{$saleOffer['id']}}">Редактировать</a>
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
