<div class="catalog">
    <div class="catalog__items-container">
        @foreach($catalogPage as $catalogItem)
            <div class="catalog__item">
                @include('modules.pages.catalog.item.index', [ 'catalogItem' => $catalogItem ])
            </div>
        @endforeach
    </div>
</div>
