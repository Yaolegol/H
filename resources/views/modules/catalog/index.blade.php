<div class="catalog">
    <div class="catalog__items-container">
        @foreach($catalogList as $catalogItem)
            @include('modules.catalog.item.index', [ 'catalogItem' => $catalogItem ])
        @endforeach
    </div>
</div>
