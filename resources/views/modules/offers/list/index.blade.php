<div class="offers-list j-favorites-components-section">
    @foreach($offersList as $offerItem)
        <div class="offers-list__item-container">
            @include('modules.offers.item.index', [
                'offer' => $offerItem,
                'withSeller' => $withSeller ?? false,
            ])
        </div>
    @endforeach
</div>


