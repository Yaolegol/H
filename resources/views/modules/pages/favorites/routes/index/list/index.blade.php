<div class="offers-list">
    @foreach($offersList as $offerItem)
        <div class="offers-list__item-container">
            @include('modules.pages.favorites.routes.index.item.index', [
                'offer' => $offerItem,
                'withSeller' => true,
            ])
        </div>
    @endforeach
</div>


