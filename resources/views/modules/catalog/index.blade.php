<div class="catalog">
    <div class="catalog__items-container">
        @foreach($catalogList as $catalogItem)
            <div class="catalog__item">
                @include('modules.catalog.item.index', [ 'catalogItem' => $catalogItem ])
            </div>
        @endforeach
    </div>
</div>
