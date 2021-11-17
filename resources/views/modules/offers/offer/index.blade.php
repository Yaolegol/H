<div class="offer">
    @include('modules.breadcrumbs.index')
    <div class="offer__content-area">
        <div class="offer__title">{{$offer['title']}}</div>
        <div class="offer__slider-container">
            @component('components.sliders.base.index')
                @component('components.sliders.base.slide.index')
                    <div class="offer__slider-image-container">
                        <img alt="" class="offer__slider-image" src="https://picsum.photos/200/300">
                    </div>
                @endcomponent
                @component('components.sliders.base.slide.index')
                    <div class="offer__slider-image-container">
                        <img alt="" class="offer__slider-image" src="https://picsum.photos/200/300">
                    </div>
                @endcomponent
                @component('components.sliders.base.slide.index')
                    <div class="offer__slider-image-container">
                        <img alt="" class="offer__slider-image" src="https://picsum.photos/200/300">
                    </div>
                @endcomponent
            @endcomponent
        </div>
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
                @isset($offer['organization'])
                    <div>
                        <div>Организация: </div>
                        <div>{{$offer['organization']['title']}}</div>
                    </div>
                @endisset
            </div>
            <div class="offer__info-item-container">
                @isset($offer['sale_points'])
                    <div>
                        <div>Торговые точки: </div>
                        @foreach($offer['sale_points'] as $salePointItem)
                            <div>
                                <span>Название: </span>
                                <span>{{$salePointItem['title']}}</span>
                            </div>
                        @endforeach
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>


