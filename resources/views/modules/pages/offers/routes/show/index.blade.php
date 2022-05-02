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
                <div class="modules-pages-offers-routes-show__info-item-title">Описание:</div>
                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['description']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Цена:</div>
                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['price']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Телефон:</div>
                <a
                    class="modules-pages-offers-routes-show__info-item-description"
                    href="tel:{{$offer['phone']}}"
                >{{$offer['phone']}}</a>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Где купить?</div>
                <div class="modules-pages-offers-routes-show__map-container">
                    @include('components.map.2gis.components.viewItem.index', [
                        'offerId' => $offer['id'],
                    ])
                </div>
            </div>
            <div class="modules-pages-offers-routes-show__additional-info-block">
                <h4>Дополнительная информация</h4>
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <h4 class="modules-pages-offers-routes-show__info-item-title">Продавец:</h4>
                    <a
                        class="modules-pages-offers-routes-show__info-item-description"
                        href="{{$offer['user']['sellerLink']}}"
                    >{{$offer['user']['name']}}</a>
                </div>
                @isset($offer['organization'])
                    <div class="modules-pages-offers-routes-show__info-block">
                        <h4 class="modules-pages-offers-routes-show__info-block-title">Организация</h4>
                        <div class="modules-pages-offers-routes-show__info-block-content">
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">Название</div>
                                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['organization']['title']}}</div>
                            </div>
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">Описание</div>
                                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['organization']['description']}}</div>
                            </div>
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">ИНН</div>
                                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['organization']['inn']}}</div>
                            </div>
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">Фактический адрес</div>
                                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['organization']['real_address']}}</div>
                            </div>
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">Юридический адрес</div>
                                <div class="modules-pages-offers-routes-show__info-item-description">{{$offer['organization']['legal_address']}}</div>
                            </div>
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">Email</div>
                                <a
                                    class="modules-pages-offers-routes-show__info-item-description"
                                    href="mail:{{$offer['organization']['email']}}"
                                >{{$offer['organization']['email']}}</a>
                            </div>
                            <div class="modules-pages-offers-routes-show__info-item-container">
                                <div class="modules-pages-offers-routes-show__info-item-title">Телефон</div>
                                <a
                                    class="modules-pages-offers-routes-show__info-item-description"
                                    href="tel:{{$offer['organization']['phone']}}"
                                >{{$offer['organization']['phone']}}</a>
                            </div>
                            @if(!empty($offer['organization']['certificateArray']))
                                <div class="modules-pages-offers-routes-show__info-item-container">
                                    <div class="modules-pages-offers-routes-show__info-item-title">Сертификаты организации:</div>
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
                                    <div class="modules-pages-offers-routes-show__info-item-title">Фото оргинизации:</div>
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
                @endisset
            </div>
        </div>
    </div>
</div>


