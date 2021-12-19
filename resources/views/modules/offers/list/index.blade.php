<div class="offers-list">
    @foreach($offersPaginatedData['data'] as $offerItem)
        <div class="offers-list__item-container">
            @include('modules.offers.item.index', [
                'offer' => $offerItem,
                'withSeller' => $withSeller ?? false,
            ])
        </div>
    @endforeach

    @component('components.pagination.common.container.index')
        @include('components.pagination.common.main.index', [
            'data' => $offersPaginatedData,
        ])
    @endcomponent
</div>


