<div class="offer">
    @include('modules.breadcrumbs.index')
    <div class="offer__content-area">
        <div class="offer__title">{{$offer['title']}}</div>
        @if(!empty($offer['photoArray']))
            <div class="offer__slider-container">
                @component('components.sliders.base.index')
                    @foreach($offer['photoArray'] as $photoUrl)
                        @component('components.sliders.base.slide.index')
                            <div class="offer__slider-image-container">
                                <img alt="" class="offer__slider-image" src="{{$photoUrl}}">
                            </div>
                        @endcomponent
                    @endforeach
                @endcomponent
            </div>
        @endif
        <div class="offer__info-section">
            <div class="offer__info-item-container">
                <div>{{$offer['description']}}</div>
            </div>
            <div class="offer__info-item-container">
                <span>Цена: </span>
                <span>{{$offer['price']}}</span>
            </div>
            <div class="offer__info-item-container">
                <div>{{$offer['user']['name']}}</div>
            </div>
            <div class="offer__info-item-container">
                <div>map</div>
                <div>
                    @include('components.map.2gis.components.view.index', [
                        'offerId' => $offer['id'],
                    ])
                </div>
            </div>
            <div class="offer__info-item-container">
                @isset($offer['organization'])
                    <div>
                        <div>Организация:</div>
                        <div>{{$offer['organization']['title']}}</div>

                        @if(!empty($offer['organization']['certificateArray']))
                            <div class="offer__slider-container">
                                @component('components.sliders.base.index')
                                    @foreach($offer['organization']['certificateArray'] as $certificateUrl)
                                        @component('components.sliders.base.slide.index')
                                            <div class="offer__slider-image-container">
                                                <img alt="" class="offer__slider-image" src="{{$certificateUrl}}">
                                            </div>
                                        @endcomponent
                                    @endforeach
                                @endcomponent
                            </div>
                        @endif
                        @if(!empty($offer['organization']['photoArray']))
                            <div class="offer__slider-container">
                                @component('components.sliders.base.index')
                                    @foreach($offer['organization']['photoArray'] as $photoUrl)
                                        @component('components.sliders.base.slide.index')
                                            <div class="offer__slider-image-container">
                                                <img alt="" class="offer__slider-image" src="{{$photoUrl}}">
                                            </div>
                                        @endcomponent
                                    @endforeach
                                @endcomponent
                            </div>
                        @endif
                    </div>
                @endisset
            </div>
            <div class="offer__info-item-container">
                @isset($offer['sale_points'])
                    <div>
                        <div>Торговые точки:</div>
                        @foreach($offer['sale_points'] as $salePointItem)
                            <div>
                                <span>Название: </span>
                                <span>{{$salePointItem['title']}}</span>

                                @if(!empty($salePointItem['photoArray']))
                                    <div class="offer__slider-container">
                                        @component('components.sliders.base.index')
                                            @foreach($salePointItem['photoArray'] as $photoUrl)
                                                @component('components.sliders.base.slide.index')
                                                    <div class="offer__slider-image-container">
                                                        <img alt="" class="offer__slider-image" src="{{$photoUrl}}">
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


