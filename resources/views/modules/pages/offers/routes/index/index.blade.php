<div class="offers">
    @include('modules.common.breadcrumbs.list.index')
    <div class="offers__location-container">
        @include('modules.common.location.components.choose.infoBlock.block.index')
    </div>
    @include('modules.pages.offers.common.components.paginatedList.index', [
        'paginationData' => $offersPaginatedData,
        'withSeller' => true
    ])
</div>


