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
                <div>{{$offer['description']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Цена:</div>
                <div>{{$offer['price']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Адрес:</div>
                <div>{{$offer['address']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Где купить?</div>
                <div class="modules-pages-offers-routes-show__map-container">
                    @include('components.map.2gis.components.viewItem.index', [
                        'offerId' => $offer['id'],
                    ])
                </div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div class="modules-pages-offers-routes-show__info-item-title">Продавец:</div>
                <a href="{{$offer['user']['sellerLink']}}">{{$offer['user']['name']}}</a>
            </div>
            @isset($offer['organization'])
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <div class="modules-pages-offers-routes-show__info-item-title">Организация:</div>
                    <div>{{$offer['organization']['title']}}</div>

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
            @endisset
            @isset($offer['sale_points'])
                <div class="modules-pages-offers-routes-show__info-item-container">
                    <div class="modules-pages-offers-routes-show__info-item-title">Торговые точки:</div>
                    @foreach($offer['sale_points'] as $salePointItem)
                        <div class="modules-pages-offers-routes-show__info-item-container">
                            <div class="modules-pages-offers-routes-show__info-item-title">Название: </div>
                            <div>{{$salePointItem['title']}}</div>

                            <div class="modules-pages-offers-routes-show__map-container">
                                @include('components.map.2gis.components.showMarker.index', [
                                    'markerLat' => $salePointItem['map_marker_lat'],
                                    'markerLng' => $salePointItem['map_marker_lng'],
                                ])
                            </div>

                            @if(!empty($salePointItem['photoArray']))
                                <div class="modules-pages-offers-routes-show__slider-container">
                                    @component('components.sliders.base.slider.index')
                                        @foreach($salePointItem['photoArray'] as $photoUrl)
                                            @component('components.sliders.base.slide.index')
                                                <div class="modules-pages-offers-routes-show__slider-image-container">
                                                    <img alt="" class="modules-pages-offers-routes-show__slider-image" src="{{$photoUrl}}">
                                                </div>
                                            @endcomponent
                                        @endforeach
                                    @endcomponent
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
    </div>
</div>


