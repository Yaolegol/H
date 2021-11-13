<div class="offer">
    @include('modules.breadcrumbs.index')
    <div class="offer__content-area">
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
    </div>
</div>


