<div class="offers-list">
    @foreach($offersList as $offerItem)
        <div class="offers-list__item-container">
            @include('modules.offers.item.index', ['offer' => $offerItem])
        </div>
    @endforeach
</div>


