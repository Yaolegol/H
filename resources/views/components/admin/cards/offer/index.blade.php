<div
    class="components-admin-cards-offer j-components-admin-cards-offer"
    data-offer-id="{{$offersNotApprovedItem['id']}}"
>
    @if($offersNotApprovedItem['user'])
        <h2>ПОЛЬЗОВАТЕЛЬ</h2>
        <div class="components-admin-cards-offer__item-container components-admin-cards-offer__item-container_without-offset">
            <div class="components-admin-cards-offer__title">ID</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['user']['id']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Аватар</div>
            <div class="components-admin-cards-offer__value">
                <img
                    alt=""
                    class="components-admin-cards-offer__image"
                    src="{{$offersNotApprovedItem['user']['avatar_photo']}}"
                >
            </div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Имя</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['user']['name']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Описание</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['user']['description']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Телефон</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['user']['phone']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Видимый email</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['user']['visible_email']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Ссылка на профиль</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['user']['sellerLink']}}</div>
        </div>
    @endif

    <h2>ТОРГОВОЕ ПРЕДЛОЖЕНИЕ</h2>
    <div class="components-admin-cards-offer__item-container components-admin-cards-offer__item-container_without-offset">
        <div class="components-admin-cards-offer__title">ID</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['id']}}</div>
    </div>
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
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Описание цены</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['price_description']}}</div>
    </div>
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
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Lat</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['map_marker_lat']}}</div>
    </div>
    <div class="components-admin-cards-offer__item-container">
        <div class="components-admin-cards-offer__title">Lng</div>
        <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['map_marker_lng']}}</div>
    </div>
    @if($offersNotApprovedItem['organization'])
        <h2>ОРГАНИЗАЦИЯ</h2>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Наименование</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['title']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Описание</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['description']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">ИНН</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['inn']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Юридический адресс</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['legal_address']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Фактический адрес</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['real_address']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Email</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['email']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Телефон</div>
            <div class="components-admin-cards-offer__value">{{$offersNotApprovedItem['organization']['phone']}}</div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Сертификаты</div>
            <div class="components-admin-cards-offer__image-list-container">
                @foreach($offersNotApprovedItem['organization']['certificateArray'] as $photoImg)
                    <div class="components-admin-cards-offer__image-item-container">
                        <img alt="" class="components-admin-cards-offer__image" src="{{$photoImg}}">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="components-admin-cards-offer__item-container">
            <div class="components-admin-cards-offer__title">Фото</div>
            <div class="components-admin-cards-offer__image-list-container">
                @foreach($offersNotApprovedItem['organization']['photoArray'] as $photoImg)
                    <div class="components-admin-cards-offer__image-item-container">
                        <img alt="" class="components-admin-cards-offer__image" src="{{$photoImg}}">
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if(isset($offersNotApprovedItem['sale_points']) && count($offersNotApprovedItem['sale_points']) > 0)
        <h2>Торговые точки</h2>
        @foreach($offersNotApprovedItem['sale_points'] as $salePointItem)
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">ID</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['id']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Название</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['title']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Описание</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['description']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Адрес</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['address']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Рабочие часы</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['working_hours']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Контактное лицо</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['contact_person']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Телефон</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['phone']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Lat</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['map_marker_lat']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Lng</div>
                <div class="components-admin-cards-offer__value">{{$salePointItem['map_marker_lng']}}</div>
            </div>
            <div class="components-admin-cards-offer__item-container">
                <div class="components-admin-cards-offer__title">Фото</div>
                <div class="components-admin-cards-offer__image-list-container">
                    @foreach($salePointItem['photoArray'] as $photoImg)
                        <div class="components-admin-cards-offer__image-item-container">
                            <img alt="" class="components-admin-cards-offer__image" src="{{$photoImg}}">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
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


