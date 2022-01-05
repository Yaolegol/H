<div class="offers-list">
    @foreach($offersList as $offerItem)
        <div class="offers-list__item-container">
            @include('modules.pages.offers.item.index', [
                'offer' => $offerItem,
                'withSeller' => $withSeller ?? false,
            ])
        </div>
    @endforeach
</div>


