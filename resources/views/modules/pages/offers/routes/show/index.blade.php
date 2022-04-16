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
                <div>{{$offer['description']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div>{{$offer['address']}}</div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <span>Цена: </span>
                <span>{{$offer['price']}}</span>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div>Продавец:</div>
                <a href="{{$offer['user']['sellerLink']}}">{{$offer['user']['name']}}</a>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                <div>Где купить?</div>
                <div class="modules-pages-offers-routes-show__map-container">
                    @include('components.map.2gis.components.viewItem.index', [
                        'offerId' => $offer['id'],
                    ])
                </div>
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                @isset($offer['organization'])
                    <div>
                        <div>Организация:</div>
                        <div>{{$offer['organization']['title']}}</div>

                        @if(!empty($offer['organization']['certificateArray']))
                            <div>Сертификаты организации:</div>
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
                        @endif
                        @if(!empty($offer['organization']['photoArray']))
                            <div>Фото оргинизации:</div>
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
                        @endif
                    </div>
                @endisset
            </div>
            <div class="modules-pages-offers-routes-show__info-item-container">
                @isset($offer['sale_points'])
                    <div>
                        <div>Торговые точки:</div>
                        @foreach($offer['sale_points'] as $salePointItem)
                            <div>
                                <span>Название: </span>
                                <span>{{$salePointItem['title']}}</span>

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
</div>


