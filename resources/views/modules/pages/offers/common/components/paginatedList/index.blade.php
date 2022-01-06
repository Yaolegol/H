<div class="modules-pages-offers-common-components-paginated-list">
    @include('modules.pages.offers.shared.components.list.index', [
        'offersList' => $offersPaginatedData['data']
    ])

    @component('components.pagination.common.container.index')
        @include('components.pagination.common.main.index', [
            'data' => $offersPaginatedData,
        ])
    @endcomponent
</div>


