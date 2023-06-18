<div class="modules-pages-offers-routes-show">
    @include('modules.common.breadcrumbs.list.index')
    <div class="modules-pages-offers-routes-show__content-area">
        <div class="modules-pages-offers-routes-show__favorites-section">
            @include('modules.pages.favorites.shared.components.button.index', [
                'id' => $offer['id'],
                'hintPosition' => 'left'
            ])
        </div>
        <h2 class="modules-pages-offers-routes-show__title">{{$offer['title']}}</h2>
        @if($offer['rating'] > 0)
            <div class="modules-pages-offers-routes-show__product-rating-container">
                @include('components.rating.common.get.index', [
                    'rating' => $offer['rating'],
                    'votes' => $offer['rating_votes'],
                    'votes_position_bottom' => true,
                ])
            </div>
        @endif
        <div class="modules-pages-offers-routes-show__product-created-at">
            Опубликовано: {{date('d.m.Y', strtotime($offer['created_at']))}}
        </div>
        @if(!empty($offer['photoArray']))
            <div class="modules-pages-offers-routes-show__slider-container">
                @component('components.sliders.base.slider.index')
                    @foreach($offer['photoArray'] as $photoUrl)
                        @component('components.sliders.base.slide.index')
                            <div class="modules-pages-offers-routes-show__slider-image-container">
                                <img alt="" class="modules-pages-offers-routes-show__slider-image" src="{{$photoUrl}}">
                            </div>
                        @endcomponent
                    @endforeach
                @endcomponent
            </div>
        @endif
        <div class="modules-pages-offers-routes-show__info-section">
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['description']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Товары</div>
                <div class="modules-pages-offers-routes-show__info-item-description">
                    @foreach($offer['catalog_level_two'] as $catalogLevelTwoItem)
                        {{$catalogLevelTwoItem['title']}}@if($loop->iteration < $loop->count), @endif
                    @endforeach
                </div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Цена</div>
                <div class="modules-pages-offers-routes-show__info-item-description">
                    <div class="modules-pages-offers-routes-show__price">{{$offer['price']}}</div>
                </div>
            </div>
            @if($offer['price_description'])
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <div class="modules-pages-offers-routes-show__info-item-title">
                        Комментарий к цене
                    </div>
                    <div class="modules-pages-offers-routes-show__info-item-description">
                        {{$offer['price_description']}}
                    </div>
                </div>
            @endif
            @if($offer['delivery'])
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <div class="modules-pages-offers-routes-show__info-item-title">
                        Доставка: есть
                    </div>
                    @if($offer['delivery_description'])
                        <div class="modules-pages-offers-routes-show__info-item-description">
                            {{$offer['delivery_description']}}
                        </div>
                    @endif
                </div>
            @endif
            @if($offer['contact_person'])
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <div class="modules-pages-offers-routes-show__info-item-title">
                        Контактное лицо
                    </div>
                    <div class="modules-pages-offers-routes-show__info-item-description">
                        {{$offer['contact_person']}}
                    </div>
                </div>
            @endif
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">
                    Телефон
                </div>
                <a
                    class="modules-pages-offers-routes-show__info-item-description"
                    href="tel:{{$offer['phone']}}"
                >{{$offer['phone']}}</a>
            </div>
            @if($offer['working_hours'])
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <div class="modules-pages-offers-routes-show__info-item-title">
                        Время работы
                    </div>
                    <div class="modules-pages-offers-routes-show__info-item-description">
                        {{$offer['working_hours']}}
                    </div>
                </div>
            @endif
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">
                    Где купить?
                </div>
                <div class="modules-pages-offers-routes-show__map-container">
                    @include('modules.common.map.yandex.components.viewItem.index', [
                        'offerId' => $offer['id'],
                    ])
                </div>
            </div>
            <div class="modules-pages-offers-routes-show__additional-info-block">
                <h4>Дополнительная информация</h4>
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <h6 class="modules-pages-offers-routes-show__info-item-title">Продавец:</h6>
                    <a
                        class="modules-pages-offers-routes-show__info-item-description modules-pages-offers-routes-show__info-item-description_link"
                        href="{{$offer['user']['sellerLink']}}"
                    >{{!$offer['user']['name'] ? 'имя не указано' : $offer['user']['name']}}</a>
                </div>
                @isset($offer['organization'])
                    @if($offer['organization']['is_approved'] == 1)
                        <div class="modules-pages-offers-routes-show__info-block">
                            <h6 class="modules-pages-offers-routes-show__info-block-title">
                                Организация
                            </h6>
                            <div class="modules-pages-offers-routes-show__info-block-content">
                                <div class="modules-pages-offers-routes-show__info-item-container">
                                    <div class="modules-pages-offers-routes-show__info-item-title">
                                        Название
                                    </div>
                                    <div class="modules-pages-offers-routes-show__info-item-description">
                                        {{$offer['organization']['title']}}
                                    </div>
                                </div>
                                <div class="modules-pages-offers-routes-show__info-item-container">
                                    <div class="modules-pages-offers-routes-show__info-item-title">
                                        ИНН
                                    </div>
                                    <div class="modules-pages-offers-routes-show__info-item-description">
                                        {{$offer['organization']['inn']}}
                                    </div>
                                </div>
                                @if($offer['organization']['real_address'])
                                    <div class="modules-pages-offers-routes-show__info-item-container">
                                        <div class="modules-pages-offers-routes-show__info-item-title">
                                            Фактический адрес
                                        </div>
                                        <div class="modules-pages-offers-routes-show__info-item-description">
                                            {{$offer['organization']['real_address']}}
                                        </div>
                                    </div>
                                @endif
                                @if($offer['organization']['legal_address'])
                                    <div class="modules-pages-offers-routes-show__info-item-container">
                                        <div class="modules-pages-offers-routes-show__info-item-title">
                                            Юридический адрес
                                        </div>
                                        <div class="modules-pages-offers-routes-show__info-item-description">
                                            {{$offer['organization']['legal_address']}}
                                        </div>
                                    </div>
                                @endif
                                @if($offer['organization']['email'])
                                    <div class="modules-pages-offers-routes-show__info-item-container">
                                        <div class="modules-pages-offers-routes-show__info-item-title">
                                            Email
                                        </div>
                                        <a
                                            class="modules-pages-offers-routes-show__info-item-description"
                                            href="mail:{{$offer['organization']['email']}}"
                                        >{{$offer['organization']['email']}}</a>
                                    </div>
                                @endif
                                @if($offer['organization']['phone'])
                                    <div class="modules-pages-offers-routes-show__info-item-container">
                                        <div class="modules-pages-offers-routes-show__info-item-title">
                                            Телефон:
                                        </div>
                                        <a
                                            class="modules-pages-offers-routes-show__info-item-description"
                                            href="tel:{{$offer['organization']['phone']}}"
                                        >
                                            {{$offer['organization']['phone']}}
                                        </a>
                                    </div>
                                @endif
                                @if(!empty($offer['organization']['certificateArray']))
                                    <div class="modules-pages-offers-routes-show__info-item-container">
                                        <div class="modules-pages-offers-routes-show__info-item-title">
                                            Сертификаты организации:
                                        </div>
                                        <div class="modules-pages-offers-routes-show__slider-container">
                                            @component('components.sliders.base.slider.index')
                                                @foreach($offer['organization']['certificateArray'] as $certificateImg)
                                                    @component('components.sliders.base.slide.index')
                                                        <div class="modules-pages-offers-routes-show__slider-image-container">
                                                            <img alt="" class="modules-pages-offers-routes-show__slider-image" src="{{$certificateImg}}">
                                                        </div>
                                                    @endcomponent
                                                @endforeach
                                            @endcomponent
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($offer['organization']['photoArray']))
                                    <div class="modules-pages-offers-routes-show__info-item-container">
                                        <div class="modules-pages-offers-routes-show__info-item-title">
                                            Фото организации:
                                        </div>
                                        <div class="modules-pages-offers-routes-show__slider-container">
                                            @component('components.sliders.base.slider.index')
                                                @foreach($offer['organization']['photoArray'] as $photoImg)
                                                    @component('components.sliders.base.slide.index')
                                                        <div class="modules-pages-offers-routes-show__slider-image-container">
                                                            <img alt="" class="modules-pages-offers-routes-show__slider-image" src="{{$photoImg}}">
                                                        </div>
                                                    @endcomponent
                                                @endforeach
                                            @endcomponent
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endisset
            </div>
            <div class="modules-pages-offers-routes-show__rating-block">
                <h4>Оценить</h4>
                @guest
                    <div class="modules-pages-offers-routes-show__rating-container">
                        Чтобы оценить товар нужно <a class="modules-pages-offers-routes-show__auth-link" href="/login">войти</a> или <a class="modules-pages-offers-routes-show__auth-link" href="/register">зарегистрироваться</a>!
                        <br />Это бесплатно!
                    </div>
                @endguest
                @auth
                    <div class="modules-pages-offers-routes-show__rating-container">
                        @component('components.rating.common.set.controller.index', [
                            'isUpdate' => count($authUserRatingData) > 0,
                            'offerId' => $offer['id'],
                        ])
                            @if(count($authUserRatingData) > 0)
                                @if($authUserRatingData['is_comment_approved'] === 0 && $authUserRatingData['approved_comment_error_message'] === null)
                                    <div class="modules-pages-offers-routes-show__rating-success-message">Спасибо!<br />Ваш отзыв отправлен на проверку и скоро будет опубликован или отклонен с указанием причины!</div>
                                @endif
                                @if($authUserRatingData['approved_comment_error_message'])
                                    <div class="modules-pages-offers-routes-show__rating-error-message-block">
                                        <div class="modules-pages-offers-routes-show__rating-error-message-title">
                                            Ваш отзыв отклонен!<br />Вы можете отредактировать отзыв и снова отправить на проверку!
                                        </div>
                                        <div class="modules-pages-offers-routes-show__rating-error-message-reason-title">
                                            Причина отклонения:
                                        </div>
                                        <div class="modules-pages-offers-routes-show__rating-error-message">
                                            {{$authUserRatingData['approved_comment_error_message']}}
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <div class="modules-pages-offers-routes-show__rating-item modules-pages-offers-routes-show__rating-item_center">
                                @include('components.rating.common.set.stars.index', [
                                    'defaultValue' => $authUserRatingData['value'] ?? 5,
                                ])
                            </div>
                            <div class="modules-pages-offers-routes-show__rating-item">
                                @include('components.textarea.common.index', [
                                    'defaultValue' => $authUserRatingData['comment'] ?? '',
                                    'name' => 'comment',
                                    'placeholder' => 'Напишите отзыв о товаре!'
                                ])
                            </div>
                            <div class="modules-pages-offers-routes-show__rating-footer">
                                <button class="modules-pages-offers-routes-show__rating-submit-button">Отправить</button>
                            </div>
                        @endcomponent
                    </div>
                @endauth
            </div>
            <div class="modules-pages-offers-routes-show__reviews-block">
                <h4>Отзывы</h4>
                <div class="modules-pages-offers-routes-show__reviews-container">
                    @if(count($offer['rating_data']) > 0)
                        @foreach($offer['rating_data'] as $ratingData)
                            <div class="modules-pages-offers-routes-show__review-item">
                                <div class="modules-pages-offers-routes-show__review-item-header">
                                    <div class="modules-pages-offers-routes-show__review-item-title">
                                        {{$ratingData['user_data']['name'] ?? 'Имя не указано'}}
                                    </div>
                                    <div class="modules-pages-offers-routes-show__review-item-date">
                                        {{date('d.m.Y', strtotime($ratingData['created_at']))}}
                                    </div>
                                </div>

                                <div class="modules-pages-offers-routes-show__review-item-rating">
                                    @include('components.rating.common.get.index', [
                                        'rating' => $ratingData['value'],
                                    ])
                                </div>
                                <div class="modules-pages-offers-routes-show__review-item-review-text">
                                    {{$ratingData['comment']}}
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="modules-pages-offers-routes-show__review-no">Пока нет отзывов! Вы можете быть первым!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


