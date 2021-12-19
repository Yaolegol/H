<div class="offers-list">
    @foreach($offersPaginatedData['data'] as $offerItem)
        <div class="offers-list__item-container">
            @include('modules.offers.item.index', [
                'offer' => $offerItem,
                'withSeller' => $withSeller ?? false,
            ])
        </div>
    @endforeach

   @include('components.pagination.common.index', [
       'data' => $offersPaginatedData,
   ])
</div>


