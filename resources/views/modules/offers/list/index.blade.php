<div class="offers-list">
    @foreach($offersList as $offerItem)
        @include('modules.offers.item.index', ['offer' => $offerItem])
    @endforeach
</div>


