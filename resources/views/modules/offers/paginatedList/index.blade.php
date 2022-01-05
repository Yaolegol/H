<div class="offers-paginated-list">
    @include('modules.offers.list.index', [
        'offersList' => $offersPaginatedData['data']
    ])

    @component('components.pagination.common.container.index')
        @include('components.pagination.common.main.index', [
            'data' => $offersPaginatedData,
        ])
    @endcomponent
</div>


